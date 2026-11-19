<?php

require_once __DIR__ . '/../../Model.php';

class ExperimentationModel extends Model
{
    public function getAllExperimentations(): array
    {
        $pdo = $this->getPDO();
        $stmt = $pdo->query('SELECT * FROM experimentation');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getExperimentationById(int $id): ?array
    {
        $pdo = $this->getPDO();
        $stmt = $pdo->prepare('SELECT * FROM experimentation WHERE ID_EXP = :id');
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC) ?: null;
    }

    public function getExperimentationByUserID(int $id): array
    {
        $pdo = $this->getPDO();
        $stmt = $pdo->prepare('SELECT x.*,
                                    CASE
                                        WHEN x.ARCHIVE_EXP = 1 THEN "archived"
                                        WHEN x.DATE_FIN_EXP < CURDATE() THEN "done"
                                        WHEN x.nbCreneaux = 0 THEN "draft"
                                        ELSE "run"
                                    END AS STATUT,
                                    CASE
                                        WHEN x.ARCHIVE_EXP = 1 THEN "Archivée"
                                        WHEN x.DATE_FIN_EXP < CURDATE() THEN "Terminée"
                                        WHEN x.nbCreneaux = 0 THEN "Brouillon"
                                        WHEN x.nbCreneauxProposes > 0 THEN "Créneaux à valider"
                                        ELSE "En cours"
                                    END AS LIBELLE_STATUT,
                                    CASE
                                        WHEN x.ARCHIVE_EXP = 1 THEN ""
                                        WHEN x.DATE_FIN_EXP < CURDATE() THEN "ok"
                                        WHEN x.nbCreneaux = 0 THEN ""
                                        WHEN x.nbCreneauxProposes > 0 THEN "warn"
                                        ELSE "run"
                                    END AS CLASSE_STATUT,
                                    IF(x.nbMaxPar > 0, ROUND(x.nbpart * 100 / x.nbMaxPar), 0) AS POURCENT,
                                    COALESCE(CONCAT(x.JOUR_HEURE_CREN, IFNULL(CONCAT(" (", x.SALLE, ")"), "")),
                                             IF(x.nbCreneaux = 0, "Non planifié", "Aucun créneau à venir")) AS PROCHAIN_CRENEAU
                                FROM (
                                SELECT e.*,
                                    CONCAT("Du ", DATE_FORMAT(e.DATE_DEB_EXP, "%d/%m/%Y"), " au ", DATE_FORMAT(e.DATE_FIN_EXP, "%d/%m/%Y")) AS PERIODE,
                                    DATE_FORMAT(e.DATE_DEB_EXP, "%Y-%m") = DATE_FORMAT(CURDATE(), "%Y-%m") AS COMMENCEE_CE_MOIS,
                                    CONCAT(ELT(DAYOFWEEK(prochain.DATE_CREN), "Dim.", "Lun.", "Mar.", "Mer.", "Jeu.", "Ven.", "Sam."),
                                           " ", DATE_FORMAT(prochain.DATE_CREN, "%d/%m"),
                                           " ", DATE_FORMAT(prochain.HEURE_CREN, "%Hh%i")) AS JOUR_HEURE_CREN,
                                    (SELECT ressource_labo.NOM_RESS_LABO
                                       FROM reservation
                                       INNER JOIN ressource_labo ON ressource_labo.ID_RESS_LABO = reservation.ID_RESS_LABO
                                      WHERE reservation.ID_CREN = prochain.ID_CREN AND ressource_labo.TYPE_RESS_LABO = "Salle"
                                      LIMIT 1) AS SALLE
                                FROM (
                                    SELECT experimentation.ID_EXP, experimentation.TITRE_EXP, experimentation.DESC_EXP,
                                           experimentation.DATE_DEB_EXP, experimentation.DATE_FIN_EXP,
                                           experimentation.ARCHIVE_EXP, experimentation.VALID_INSC_EXP,
                                           (SELECT CONCAT(retribution.TYPE_RETRIB, " ", REPLACE(FORMAT(retribution.VAL_RETRIB, 2, "fr_FR"), ",00", ""), " €")
                                              FROM retribution
                                             WHERE retribution.ID_RETRIB = experimentation.ID_RETRIB) AS RETRIBUTION,
                                           (SELECT COUNT(*) FROM ressource
                                             WHERE ressource.ID_EXP = experimentation.ID_EXP) AS nbRessources,
                                           (SELECT IF(MIN(creneau.DUREE_CREN) = MAX(creneau.DUREE_CREN),
                                                      CONCAT(MIN(creneau.DUREE_CREN), " min"),
                                                      CONCAT(MIN(creneau.DUREE_CREN), " à ", MAX(creneau.DUREE_CREN), " min"))
                                              FROM creneau
                                             WHERE creneau.ID_EXP = experimentation.ID_EXP) AS DUREE_SESSIONS,
                                           (SELECT GROUP_CONCAT(restriction.LIB_REST SEPARATOR ", ")
                                              FROM restriction
                                             WHERE restriction.ID_EXP = experimentation.ID_EXP) AS RESTRICTIONS,
                                           (SELECT COUNT(*) FROM creneau
                                             WHERE creneau.ID_EXP = experimentation.ID_EXP) AS nbCreneaux,
                                           (SELECT COUNT(*) FROM creneau
                                             WHERE creneau.ID_EXP = experimentation.ID_EXP AND creneau.STATUT_CREN = "Propose") AS nbCreneauxProposes,
                                           (SELECT COALESCE(SUM(creneau.NB_MAX_PAR), 0) FROM creneau
                                             WHERE creneau.ID_EXP = experimentation.ID_EXP) AS nbMaxPar,
                                           (SELECT COUNT(*) FROM participation
                                             INNER JOIN creneau ON creneau.ID_CREN = participation.ID_CREN
                                             WHERE creneau.ID_EXP = experimentation.ID_EXP AND participation.STATUT_INSC = "Accepte") AS nbpart,
                                           (SELECT creneau.ID_CREN FROM creneau
                                             WHERE creneau.ID_EXP = experimentation.ID_EXP
                                               AND TIMESTAMP(creneau.DATE_CREN, creneau.HEURE_CREN) >= NOW()
                                             ORDER BY creneau.DATE_CREN, creneau.HEURE_CREN
                                             LIMIT 1) AS ID_PROCH_CREN
                                    FROM gestion
                                    INNER JOIN experimentation ON experimentation.ID_EXP = gestion.ID_EXP
                                    WHERE gestion.ID_USER = :id
                                ) AS e
                                LEFT JOIN creneau AS prochain ON prochain.ID_CREN = e.ID_PROCH_CREN
                                ) AS x
                                ORDER BY x.DATE_DEB_EXP DESC');
        $stmt->execute(['id' => $id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getExperimentationsEquipeByUserID(int $id): array
    {
        $pdo = $this->getPDO();
        $stmt = $pdo->prepare('SELECT x.*,
                                    CASE
                                        WHEN x.ARCHIVE_EXP = 1 THEN "archived"
                                        WHEN x.DATE_FIN_EXP < CURDATE() THEN "done"
                                        WHEN x.nbCreneaux = 0 THEN "draft"
                                        ELSE "run"
                                    END AS STATUT,
                                    CASE
                                        WHEN x.ARCHIVE_EXP = 1 THEN "Archivée"
                                        WHEN x.DATE_FIN_EXP < CURDATE() THEN "Terminée"
                                        WHEN x.nbCreneaux = 0 THEN "Brouillon"
                                        WHEN x.nbCreneauxProposes > 0 THEN "Créneaux à valider"
                                        ELSE "En cours"
                                    END AS LIBELLE_STATUT,
                                    CASE
                                        WHEN x.ARCHIVE_EXP = 1 OR x.DATE_FIN_EXP < CURDATE() THEN "done"
                                        WHEN x.nbCreneaux = 0 THEN ""
                                        WHEN x.nbCreneauxProposes > 0 THEN "warn"
                                        ELSE "run"
                                    END AS CLASSE_STATUT,
                                    IF(x.nbMaxPar > 0, LEAST(100, ROUND(x.nbpart * 100 / x.nbMaxPar)), 0) AS POURCENT,
                                    IF(x.nbpart > 0, ROUND(x.nbPresents * 100 / x.nbpart), NULL) AS TAUX,
                                    IF(x.nbParticipants > 0, ROUND(x.nbFemmes * 100 / x.nbParticipants), 0) AS POURCENT_FEMMES,
                                    IF(x.nbParticipants > 0, ROUND(x.nbHommes * 100 / x.nbParticipants), 0) AS POURCENT_HOMMES
                                FROM (
                                    SELECT experimentation.ID_EXP, experimentation.TITRE_EXP, experimentation.DESC_EXP,
                                           experimentation.DATE_DEB_EXP, experimentation.DATE_FIN_EXP, experimentation.ARCHIVE_EXP,
                                           equipe.ID_EQUIPE, equipe.NOM_EQUIPE, modele.NOM_MODELE,
                                           CONCAT(DATE_FORMAT(experimentation.DATE_DEB_EXP, "%d/%m/%Y"), " - ", DATE_FORMAT(experimentation.DATE_FIN_EXP, "%d/%m/%Y")) AS PERIODE,
                                           (SELECT GROUP_CONCAT(CONCAT(utilisateur.PRENOM_USER, " ", utilisateur.NOM_USER) SEPARATOR ", ")
                                              FROM gestion
                                              INNER JOIN utilisateur ON utilisateur.ID_USER = gestion.ID_USER
                                             WHERE gestion.ID_EXP = experimentation.ID_EXP AND utilisateur.ID_ROLE = 1) AS CHERCHEUR,
                                           (SELECT COUNT(*) FROM creneau
                                             WHERE creneau.ID_EXP = experimentation.ID_EXP) AS nbCreneaux,
                                           (SELECT COUNT(*) FROM creneau
                                             WHERE creneau.ID_EXP = experimentation.ID_EXP AND creneau.STATUT_CREN = "Propose") AS nbCreneauxProposes,
                                           (SELECT COALESCE(SUM(creneau.NB_MAX_PAR), 0) FROM creneau
                                             WHERE creneau.ID_EXP = experimentation.ID_EXP) AS nbMaxPar,
                                           (SELECT COUNT(*) FROM participation
                                             INNER JOIN creneau ON creneau.ID_CREN = participation.ID_CREN
                                             WHERE creneau.ID_EXP = experimentation.ID_EXP) AS nbInscrits,
                                           (SELECT COUNT(*) FROM participation
                                             INNER JOIN creneau ON creneau.ID_CREN = participation.ID_CREN
                                             WHERE creneau.ID_EXP = experimentation.ID_EXP AND participation.STATUT_INSC = "Accepte") AS nbpart,
                                           (SELECT COUNT(*) FROM participation
                                             INNER JOIN creneau ON creneau.ID_CREN = participation.ID_CREN
                                             WHERE creneau.ID_EXP = experimentation.ID_EXP AND participation.STATUT_INSC = "Accepte"
                                               AND participation.PRESENCE_PAR = "Present") AS nbPresents,
                                           (SELECT COUNT(*) FROM participation
                                             INNER JOIN creneau ON creneau.ID_CREN = participation.ID_CREN
                                             WHERE creneau.ID_EXP = experimentation.ID_EXP AND participation.RETRIB_ENV = 1) AS nbRetributions,
                                           (SELECT COUNT(DISTINCT participation.ID_PAR) FROM participation
                                             INNER JOIN creneau ON creneau.ID_CREN = participation.ID_CREN
                                             WHERE creneau.ID_EXP = experimentation.ID_EXP AND participation.STATUT_INSC = "Accepte") AS nbParticipants,
                                           (SELECT COUNT(DISTINCT participation.ID_PAR) FROM participation
                                             INNER JOIN creneau ON creneau.ID_CREN = participation.ID_CREN
                                             INNER JOIN participant ON participant.ID_PAR = participation.ID_PAR
                                             INNER JOIN utilisateur ON utilisateur.ID_USER = participant.ID_USER
                                             WHERE creneau.ID_EXP = experimentation.ID_EXP AND participation.STATUT_INSC = "Accepte"
                                               AND utilisateur.CONSENT_USER = 1) AS nbConsentements,
                                           (SELECT COUNT(DISTINCT participation.ID_PAR) FROM participation
                                             INNER JOIN creneau ON creneau.ID_CREN = participation.ID_CREN
                                             INNER JOIN participant ON participant.ID_PAR = participation.ID_PAR
                                             WHERE creneau.ID_EXP = experimentation.ID_EXP AND participation.STATUT_INSC = "Accepte"
                                               AND participant.GEN_PAR = "Femme") AS nbFemmes,
                                           (SELECT COUNT(DISTINCT participation.ID_PAR) FROM participation
                                             INNER JOIN creneau ON creneau.ID_CREN = participation.ID_CREN
                                             INNER JOIN participant ON participant.ID_PAR = participation.ID_PAR
                                             WHERE creneau.ID_EXP = experimentation.ID_EXP AND participation.STATUT_INSC = "Accepte"
                                               AND participant.GEN_PAR = "Homme") AS nbHommes
                                    FROM equipe
                                    INNER JOIN experimentation ON experimentation.ID_EQUIPE = equipe.ID_EQUIPE
                                    LEFT JOIN modele ON modele.ID_MODELE = experimentation.ID_MODELE
                                    WHERE equipe.ID_RESP = :id
                                ) AS x
                                ORDER BY x.DATE_DEB_EXP DESC');
        $stmt->execute(['id' => $id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getExperimentationsLaboratoireByUserID(int $id): array
    {
        $pdo = $this->getPDO();
        $stmt = $pdo->prepare('SELECT x.*,
                                    CASE
                                        WHEN x.ARCHIVE_EXP = 1 THEN "archived"
                                        WHEN x.DATE_FIN_EXP < CURDATE() THEN "done"
                                        WHEN x.nbCreneaux = 0 THEN "draft"
                                        ELSE "run"
                                    END AS STATUT,
                                    CASE
                                        WHEN x.ARCHIVE_EXP = 1 THEN "Archivée"
                                        WHEN x.DATE_FIN_EXP < CURDATE() THEN "Terminée"
                                        WHEN x.nbCreneaux = 0 THEN "Brouillon"
                                        WHEN x.nbCreneauxProposes > 0 THEN "Créneaux à valider"
                                        ELSE "En cours"
                                    END AS LIBELLE_STATUT,
                                    CASE
                                        WHEN x.ARCHIVE_EXP = 1 OR x.DATE_FIN_EXP < CURDATE() THEN "done"
                                        WHEN x.nbCreneaux = 0 THEN ""
                                        WHEN x.nbCreneauxProposes > 0 THEN "warn"
                                        ELSE "run"
                                    END AS CLASSE_STATUT,
                                    IF(x.nbMaxPar > 0, LEAST(100, ROUND(x.nbpart * 100 / x.nbMaxPar)), 0) AS POURCENT,
                                    IF(x.nbpart > 0, ROUND(x.nbPresents * 100 / x.nbpart), NULL) AS TAUX,
                                    IF(x.nbParticipants > 0, ROUND(x.nbFemmes * 100 / x.nbParticipants), 0) AS POURCENT_FEMMES,
                                    IF(x.nbParticipants > 0, ROUND(x.nbHommes * 100 / x.nbParticipants), 0) AS POURCENT_HOMMES
                                FROM (
                                    SELECT experimentation.ID_EXP, experimentation.TITRE_EXP, experimentation.DESC_EXP,
                                           experimentation.DATE_DEB_EXP, experimentation.DATE_FIN_EXP, experimentation.ARCHIVE_EXP,
                                           equipe.ID_EQUIPE, equipe.NOM_EQUIPE, modele.NOM_MODELE,
                                           CONCAT(DATE_FORMAT(experimentation.DATE_DEB_EXP, "%d/%m/%Y"), " - ", DATE_FORMAT(experimentation.DATE_FIN_EXP, "%d/%m/%Y")) AS PERIODE,
                                           (SELECT GROUP_CONCAT(CONCAT(utilisateur.PRENOM_USER, " ", utilisateur.NOM_USER) SEPARATOR ", ")
                                              FROM gestion
                                              INNER JOIN utilisateur ON utilisateur.ID_USER = gestion.ID_USER
                                             WHERE gestion.ID_EXP = experimentation.ID_EXP AND utilisateur.ID_ROLE = 1) AS CHERCHEUR,
                                           (SELECT COUNT(*) FROM creneau
                                             WHERE creneau.ID_EXP = experimentation.ID_EXP) AS nbCreneaux,
                                           (SELECT COUNT(*) FROM creneau
                                             WHERE creneau.ID_EXP = experimentation.ID_EXP AND creneau.STATUT_CREN = "Propose") AS nbCreneauxProposes,
                                           (SELECT COALESCE(SUM(creneau.NB_MAX_PAR), 0) FROM creneau
                                             WHERE creneau.ID_EXP = experimentation.ID_EXP) AS nbMaxPar,
                                           (SELECT COUNT(*) FROM participation
                                             INNER JOIN creneau ON creneau.ID_CREN = participation.ID_CREN
                                             WHERE creneau.ID_EXP = experimentation.ID_EXP) AS nbInscrits,
                                           (SELECT COUNT(*) FROM participation
                                             INNER JOIN creneau ON creneau.ID_CREN = participation.ID_CREN
                                             WHERE creneau.ID_EXP = experimentation.ID_EXP AND participation.STATUT_INSC = "Accepte") AS nbpart,
                                           (SELECT COUNT(*) FROM participation
                                             INNER JOIN creneau ON creneau.ID_CREN = participation.ID_CREN
                                             WHERE creneau.ID_EXP = experimentation.ID_EXP AND participation.STATUT_INSC = "Accepte"
                                               AND participation.PRESENCE_PAR = "Present") AS nbPresents,
                                           (SELECT COUNT(*) FROM participation
                                             INNER JOIN creneau ON creneau.ID_CREN = participation.ID_CREN
                                             WHERE creneau.ID_EXP = experimentation.ID_EXP AND participation.RETRIB_ENV = 1) AS nbRetributions,
                                           (SELECT COUNT(DISTINCT participation.ID_PAR) FROM participation
                                             INNER JOIN creneau ON creneau.ID_CREN = participation.ID_CREN
                                             WHERE creneau.ID_EXP = experimentation.ID_EXP AND participation.STATUT_INSC = "Accepte") AS nbParticipants,
                                           (SELECT COUNT(DISTINCT participation.ID_PAR) FROM participation
                                             INNER JOIN creneau ON creneau.ID_CREN = participation.ID_CREN
                                             INNER JOIN participant ON participant.ID_PAR = participation.ID_PAR
                                             INNER JOIN utilisateur ON utilisateur.ID_USER = participant.ID_USER
                                             WHERE creneau.ID_EXP = experimentation.ID_EXP AND participation.STATUT_INSC = "Accepte"
                                               AND utilisateur.CONSENT_USER = 1) AS nbConsentements,
                                           (SELECT COUNT(DISTINCT participation.ID_PAR) FROM participation
                                             INNER JOIN creneau ON creneau.ID_CREN = participation.ID_CREN
                                             INNER JOIN participant ON participant.ID_PAR = participation.ID_PAR
                                             WHERE creneau.ID_EXP = experimentation.ID_EXP AND participation.STATUT_INSC = "Accepte"
                                               AND participant.GEN_PAR = "Femme") AS nbFemmes,
                                           (SELECT COUNT(DISTINCT participation.ID_PAR) FROM participation
                                             INNER JOIN creneau ON creneau.ID_CREN = participation.ID_CREN
                                             INNER JOIN participant ON participant.ID_PAR = participation.ID_PAR
                                             WHERE creneau.ID_EXP = experimentation.ID_EXP AND participation.STATUT_INSC = "Accepte"
                                               AND participant.GEN_PAR = "Homme") AS nbHommes
                                    FROM laboratoire
                                    INNER JOIN equipe ON equipe.ID_LABO = laboratoire.ID_LABO
                                    INNER JOIN experimentation ON experimentation.ID_EQUIPE = equipe.ID_EQUIPE
                                    LEFT JOIN modele ON modele.ID_MODELE = experimentation.ID_MODELE
                                    WHERE laboratoire.ID_DIR = :id
                                ) AS x
                                ORDER BY x.DATE_DEB_EXP DESC');
        $stmt->execute(['id' => $id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getExperimentationsDisponiblesByUserID(int $id): array
    {
        $pdo = $this->getPDO();
        $stmt = $pdo->prepare('SELECT x.*,
                                    CASE
                                        WHEN x.nbDemandesEnAttente > 0 THEN "attente"
                                        WHEN x.nbInscriptionsAVenir > 0 THEN "inscrit"
                                        WHEN x.DATE_FIN_EXP < CURDATE() OR x.nbCreneauxAVenir = 0 THEN "cloturee"
                                        WHEN x.nbRestrictionsNonValidees > 0 THEN "noneligible"
                                        WHEN x.nbPlacesRestantes <= 0 THEN "complet"
                                        ELSE "ouverte"
                                    END AS ETAT,
                                    CASE
                                        WHEN x.nbDemandesEnAttente > 0 THEN "Demande en attente"
                                        WHEN x.nbInscriptionsAVenir > 0 THEN "Inscription confirmée"
                                        WHEN x.DATE_FIN_EXP < CURDATE() OR x.nbCreneauxAVenir = 0 THEN "Clôturée"
                                        WHEN x.nbRestrictionsNonValidees > 0 THEN "Non éligible"
                                        WHEN x.nbPlacesRestantes <= 0 THEN "Complet"
                                        ELSE "Ouverte aux inscriptions"
                                    END AS LIBELLE_ETAT,
                                    CASE
                                        WHEN x.nbDemandesEnAttente > 0 THEN "warn"
                                        WHEN x.nbInscriptionsAVenir > 0 THEN "info"
                                        WHEN x.DATE_FIN_EXP < CURDATE() OR x.nbCreneauxAVenir = 0 THEN ""
                                        WHEN x.nbRestrictionsNonValidees > 0 THEN "ko"
                                        WHEN x.nbPlacesRestantes <= 0 THEN ""
                                        ELSE "ok"
                                    END AS CLASSE_ETAT,
                                    IF(x.SALLE IS NULL, "En ligne", CONCAT("Présentiel - ", x.SALLE)) AS MODALITE
                                FROM (
                                    SELECT experimentation.ID_EXP, experimentation.TITRE_EXP, experimentation.DESC_EXP,
                                           experimentation.DATE_FIN_EXP, modele.NOM_MODELE,
                                           (SELECT GROUP_CONCAT(CONCAT(utilisateur.PRENOM_USER, " ", utilisateur.NOM_USER) SEPARATOR ", ")
                                              FROM gestion
                                              INNER JOIN utilisateur ON utilisateur.ID_USER = gestion.ID_USER
                                             WHERE gestion.ID_EXP = experimentation.ID_EXP AND utilisateur.ID_ROLE = 1) AS CHERCHEUR,
                                           (SELECT laboratoire.SIGLE_LABO FROM equipe
                                             INNER JOIN laboratoire ON laboratoire.ID_LABO = equipe.ID_LABO
                                             WHERE equipe.ID_EQUIPE = experimentation.ID_EQUIPE) AS SIGLE_LABO,
                                           (SELECT CONCAT(retribution.TYPE_RETRIB, " ", REPLACE(FORMAT(retribution.VAL_RETRIB, 2, "fr_FR"), ",00", ""), " €")
                                              FROM retribution
                                             WHERE retribution.ID_RETRIB = experimentation.ID_RETRIB) AS RETRIBUTION,
                                           (SELECT IF(MIN(creneau.DUREE_CREN) = MAX(creneau.DUREE_CREN),
                                                      CONCAT(MIN(creneau.DUREE_CREN), " min"),
                                                      CONCAT(MIN(creneau.DUREE_CREN), " à ", MAX(creneau.DUREE_CREN), " min"))
                                              FROM creneau
                                             WHERE creneau.ID_EXP = experimentation.ID_EXP) AS DUREE,
                                           (SELECT ressource_labo.NOM_RESS_LABO
                                              FROM creneau
                                              INNER JOIN reservation ON reservation.ID_CREN = creneau.ID_CREN
                                              INNER JOIN ressource_labo ON ressource_labo.ID_RESS_LABO = reservation.ID_RESS_LABO
                                             WHERE creneau.ID_EXP = experimentation.ID_EXP AND ressource_labo.TYPE_RESS_LABO = "Salle"
                                             ORDER BY creneau.DATE_CREN DESC
                                             LIMIT 1) AS SALLE,
                                           (SELECT GROUP_CONCAT(restriction.LIB_REST SEPARATOR ", ")
                                              FROM restriction
                                             WHERE restriction.ID_EXP = experimentation.ID_EXP) AS RESTRICTIONS,
                                           (SELECT GROUP_CONCAT(restriction.LIB_REST SEPARATOR ", ")
                                              FROM restriction
                                             WHERE restriction.ID_EXP = experimentation.ID_EXP
                                               AND restriction.ID_REST NOT IN (SELECT validation.ID_REST FROM validation
                                                                                WHERE validation.ID_PAR = participant.ID_PAR)) AS RESTRICTIONS_NON_VALIDEES,
                                           (SELECT COUNT(*) FROM restriction
                                             WHERE restriction.ID_EXP = experimentation.ID_EXP
                                               AND restriction.ID_REST NOT IN (SELECT validation.ID_REST FROM validation
                                                                                WHERE validation.ID_PAR = participant.ID_PAR)) AS nbRestrictionsNonValidees,
                                           (SELECT COUNT(*) FROM creneau
                                             WHERE creneau.ID_EXP = experimentation.ID_EXP
                                               AND TIMESTAMP(creneau.DATE_CREN, creneau.HEURE_CREN) >= NOW()) AS nbCreneauxAVenir,
                                           (SELECT COALESCE(SUM(creneau.NB_MAX_PAR - (SELECT COUNT(*) FROM participation
                                                                                       WHERE participation.ID_CREN = creneau.ID_CREN
                                                                                         AND participation.STATUT_INSC = "Accepte")), 0)
                                              FROM creneau
                                             WHERE creneau.ID_EXP = experimentation.ID_EXP
                                               AND TIMESTAMP(creneau.DATE_CREN, creneau.HEURE_CREN) >= NOW()) AS nbPlacesRestantes,
                                           (SELECT COUNT(*) FROM participation
                                             INNER JOIN creneau ON creneau.ID_CREN = participation.ID_CREN
                                             WHERE creneau.ID_EXP = experimentation.ID_EXP AND participation.ID_PAR = participant.ID_PAR
                                               AND participation.STATUT_INSC = "En attente"
                                               AND TIMESTAMP(creneau.DATE_CREN, creneau.HEURE_CREN) >= NOW()) AS nbDemandesEnAttente,
                                           (SELECT COUNT(*) FROM participation
                                             INNER JOIN creneau ON creneau.ID_CREN = participation.ID_CREN
                                             WHERE creneau.ID_EXP = experimentation.ID_EXP AND participation.ID_PAR = participant.ID_PAR
                                               AND participation.STATUT_INSC = "Accepte"
                                               AND TIMESTAMP(creneau.DATE_CREN, creneau.HEURE_CREN) >= NOW()) AS nbInscriptionsAVenir,
                                           (SELECT COUNT(*) FROM participation
                                             INNER JOIN creneau ON creneau.ID_CREN = participation.ID_CREN
                                             WHERE creneau.ID_EXP = experimentation.ID_EXP AND participation.ID_PAR = participant.ID_PAR
                                               AND participation.STATUT_INSC = "Accepte"
                                               AND TIMESTAMP(creneau.DATE_CREN, creneau.HEURE_CREN) < NOW()) AS nbParticipationsPassees
                                    FROM participant
                                    CROSS JOIN experimentation
                                    LEFT JOIN modele ON modele.ID_MODELE = experimentation.ID_MODELE
                                    WHERE participant.ID_USER = :id AND experimentation.ARCHIVE_EXP = 0
                                ) AS x
                                ORDER BY FIELD(ETAT, "attente", "inscrit", "ouverte", "complet", "noneligible", "cloturee"), x.TITRE_EXP');
        $stmt->execute(['id' => $id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}


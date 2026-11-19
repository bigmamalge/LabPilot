<?php

require_once __DIR__ . '/../../Model.php';

class ParticipationModel extends Model
{
    public function getAllParticipations(): array
    {
        $pdo = $this->getPDO();
        $stmt = $pdo->query('SELECT * FROM participation');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getParticipationsByIdPar(int $idPar): array
    {
        $pdo = $this->getPDO();
        $stmt = $pdo->prepare('SELECT * FROM participation WHERE ID_PAR = :idPar');
        $stmt->execute(['idPar' => $idPar]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getParticipationsByIdCren(int $idCren): array
    {
        $pdo = $this->getPDO();
        $stmt = $pdo->prepare('SELECT * FROM participation WHERE ID_CREN = :idCren');
        $stmt->execute(['idCren' => $idCren]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getInscriptionsEnAttenteByUserID(int $id): array
    {
        $pdo = $this->getPDO();
        $stmt = $pdo->prepare('SELECT participation.ID_PAR, participation.ID_CREN, utilisateur.PRENOM_USER, utilisateur.NOM_USER,
                                      experimentation.TITRE_EXP, creneau.DATE_CREN, creneau.HEURE_CREN,
                                      CONCAT(ELT(DAYOFWEEK(creneau.DATE_CREN), "Dim.", "Lun.", "Mar.", "Mer.", "Jeu.", "Ven.", "Sam."),
                                             " ", DATE_FORMAT(creneau.DATE_CREN, "%d/%m"),
                                             " ", DATE_FORMAT(creneau.HEURE_CREN, "%Hh%i")) AS JOUR_HEURE_CREN
                                FROM gestion
                                INNER JOIN experimentation ON experimentation.ID_EXP = gestion.ID_EXP
                                INNER JOIN creneau ON creneau.ID_EXP = experimentation.ID_EXP
                                INNER JOIN participation ON participation.ID_CREN = creneau.ID_CREN
                                INNER JOIN participant ON participant.ID_PAR = participation.ID_PAR
                                INNER JOIN utilisateur ON utilisateur.ID_USER = participant.ID_USER
                                WHERE gestion.ID_USER = :id AND participation.STATUT_INSC = "En attente"
                                ORDER BY creneau.DATE_CREN, creneau.HEURE_CREN');
        $stmt->execute(['id' => $id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getRetributionsEnvoyeesByUserID(int $id): array
    {
        $pdo = $this->getPDO();
        $stmt = $pdo->prepare('SELECT experimentation.ID_EXP, experimentation.TITRE_EXP, retribution.TYPE_RETRIB, COUNT(*) AS nbEnvoyees
                                FROM gestion
                                INNER JOIN experimentation ON experimentation.ID_EXP = gestion.ID_EXP
                                INNER JOIN creneau ON creneau.ID_EXP = experimentation.ID_EXP
                                INNER JOIN participation ON participation.ID_CREN = creneau.ID_CREN
                                LEFT JOIN retribution ON retribution.ID_RETRIB = experimentation.ID_RETRIB
                                WHERE gestion.ID_USER = :id AND participation.RETRIB_ENV = 1
                                GROUP BY experimentation.ID_EXP, experimentation.TITRE_EXP, retribution.TYPE_RETRIB
                                ORDER BY MAX(creneau.DATE_CREN) DESC');
        $stmt->execute(['id' => $id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getParticipantsByUserID(int $id): array
    {
        $pdo = $this->getPDO();
        $stmt = $pdo->prepare('SELECT participation.ID_PAR, participation.ID_CREN, participation.STATUT_INSC,
                                      participation.PRESENCE_PAR, participation.RETRIB_ENV,
                                      utilisateur.PRENOM_USER, utilisateur.NOM_USER, utilisateur.MAIL_USER, utilisateur.CONSENT_USER,
                                      UPPER(CONCAT(LEFT(utilisateur.PRENOM_USER, 1), LEFT(utilisateur.NOM_USER, 1))) AS INITIALES,
                                      participant.AGE_PAR, participant.GEN_PAR, participant.LANG_PAR,
                                      participant.LUNETTES_PAR, participant.CONTRAINTES_PAR,
                                      experimentation.ID_EXP, experimentation.TITRE_EXP,
                                      CONCAT(ELT(DAYOFWEEK(creneau.DATE_CREN), "Dim.", "Lun.", "Mar.", "Mer.", "Jeu.", "Ven.", "Sam."),
                                             " ", DATE_FORMAT(creneau.DATE_CREN, "%d/%m"),
                                             " ", DATE_FORMAT(creneau.HEURE_CREN, "%Hh%i")) AS JOUR_HEURE_CREN,
                                      (SELECT CONCAT(retribution.TYPE_RETRIB, " - ", REPLACE(FORMAT(retribution.VAL_RETRIB, 2, "fr_FR"), ",00", ""), " €")
                                         FROM retribution
                                        WHERE retribution.ID_RETRIB = experimentation.ID_RETRIB) AS RETRIBUTION,
                                      CASE
                                          WHEN participation.STATUT_INSC = "En attente" THEN "En attente"
                                          WHEN participation.STATUT_INSC = "Refuse" THEN "Refusée"
                                          WHEN participation.PRESENCE_PAR = "Present" THEN IF(participant.GEN_PAR = "Femme", "Présente", "Présent")
                                          WHEN participation.PRESENCE_PAR = "Absent" THEN IF(participant.GEN_PAR = "Femme", "Absente", "Absent")
                                          ELSE "Confirmée"
                                      END AS LIBELLE_STATUT,
                                      CASE
                                          WHEN participation.STATUT_INSC IN ("En attente", "Refuse") THEN "warn"
                                          WHEN participation.PRESENCE_PAR = "Present" THEN "ok"
                                          WHEN participation.PRESENCE_PAR = "Absent" THEN "warn"
                                          ELSE "violet"
                                      END AS CLASSE_STATUT,
                                      CASE
                                          WHEN participation.STATUT_INSC = "Accepte" AND participation.PRESENCE_PAR = "Present" THEN "ok"
                                          WHEN participation.STATUT_INSC = "Accepte" AND participation.PRESENCE_PAR = "Non renseigne" THEN "violet"
                                          ELSE ""
                                      END AS CLASSE_AVATAR,
                                      CASE
                                          WHEN participation.RETRIB_ENV = 1 THEN "Envoyée"
                                          WHEN participation.PRESENCE_PAR = "Present" AND experimentation.ID_RETRIB IS NOT NULL THEN "À envoyer"
                                      END AS LIBELLE_RETRIB,
                                      IF(participation.RETRIB_ENV = 1, "ok", "warn soft") AS CLASSE_RETRIB
                                FROM gestion
                                INNER JOIN experimentation ON experimentation.ID_EXP = gestion.ID_EXP
                                INNER JOIN creneau ON creneau.ID_EXP = experimentation.ID_EXP
                                INNER JOIN participation ON participation.ID_CREN = creneau.ID_CREN
                                INNER JOIN participant ON participant.ID_PAR = participation.ID_PAR
                                INNER JOIN utilisateur ON utilisateur.ID_USER = participant.ID_USER
                                WHERE gestion.ID_USER = :id
                                ORDER BY participation.STATUT_INSC = "En attente" DESC, creneau.DATE_CREN DESC, creneau.HEURE_CREN DESC');
        $stmt->execute(['id' => $id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getInscriptionsParSemaineByUserID(int $id): array
    {
        $pdo = $this->getPDO();
        $stmt = $pdo->prepare('SELECT CONCAT("S", WEEK(semaine.LUNDI, 3)) AS LIBELLE_SEMAINE,
                                      (SELECT COUNT(*)
                                         FROM gestion
                                         INNER JOIN creneau ON creneau.ID_EXP = gestion.ID_EXP
                                         INNER JOIN participation ON participation.ID_CREN = creneau.ID_CREN
                                        WHERE gestion.ID_USER = :id
                                          AND creneau.DATE_CREN <= semaine.LUNDI + INTERVAL 6 DAY) AS nbCumule
                                FROM (SELECT CURDATE() - INTERVAL WEEKDAY(CURDATE()) DAY - INTERVAL n.N WEEK AS LUNDI
                                        FROM (SELECT 5 AS N UNION ALL SELECT 4 UNION ALL SELECT 3
                                              UNION ALL SELECT 2 UNION ALL SELECT 1 UNION ALL SELECT 0) AS n) AS semaine
                                ORDER BY semaine.LUNDI');
        $stmt->execute(['id' => $id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getParticipationsParticipantByUserID(int $id): array
    {
        $pdo = $this->getPDO();
        $stmt = $pdo->prepare('SELECT p.*,
                                      CASE
                                          WHEN p.STATUT_INSC = "Refuse" THEN "annulees"
                                          WHEN p.A_VENIR = 1 THEN "avenir"
                                          WHEN p.STATUT_INSC = "Accepte" AND p.PRESENCE_PAR <> "Absent" THEN "terminees"
                                          ELSE "annulees"
                                      END AS STATUT,
                                      CASE
                                          WHEN p.STATUT_INSC = "Refuse" THEN "Refusée"
                                          WHEN p.A_VENIR = 1 AND p.STATUT_INSC = "En attente" THEN "En attente"
                                          WHEN p.A_VENIR = 1 THEN "Confirmée"
                                          WHEN p.STATUT_INSC = "Accepte" AND p.PRESENCE_PAR = "Absent" THEN "Absence"
                                          WHEN p.STATUT_INSC = "Accepte" THEN "Terminée"
                                          ELSE "Expirée"
                                      END AS LIBELLE_STATUT,
                                      CASE
                                          WHEN p.STATUT_INSC = "Refuse" THEN "ko"
                                          WHEN p.A_VENIR = 1 AND p.STATUT_INSC = "En attente" THEN "warn"
                                          WHEN p.A_VENIR = 1 THEN "info"
                                          WHEN p.STATUT_INSC = "Accepte" AND p.PRESENCE_PAR = "Absent" THEN "ko"
                                          WHEN p.STATUT_INSC = "Accepte" THEN "ok"
                                          ELSE "ko"
                                      END AS CLASSE_STATUT
                                FROM (
                                    SELECT participation.ID_CREN, participation.STATUT_INSC, participation.PRESENCE_PAR, participation.RETRIB_ENV,
                                           experimentation.ID_EXP, experimentation.TITRE_EXP,
                                           creneau.DATE_CREN, creneau.HEURE_CREN,
                                           TIMESTAMP(creneau.DATE_CREN, creneau.HEURE_CREN) >= NOW() AS A_VENIR,
                                           DATE_FORMAT(creneau.DATE_CREN, "%Y-%m") = DATE_FORMAT(CURDATE(), "%Y-%m") AS CE_MOIS,
                                           DATE_FORMAT(creneau.DATE_CREN, "%d") AS JOUR,
                                           ELT(MONTH(creneau.DATE_CREN), "janv.", "févr.", "mars", "avr.", "mai", "juin",
                                               "juil.", "août", "sept.", "oct.", "nov.", "déc.") AS MOIS,
                                           ELT(DAYOFWEEK(creneau.DATE_CREN), "Dimanche", "Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi") AS JOUR_SEMAINE,
                                           CONCAT(DATE_FORMAT(creneau.HEURE_CREN, "%Hh%i"), "-",
                                                  DATE_FORMAT(ADDTIME(creneau.HEURE_CREN, SEC_TO_TIME(creneau.DUREE_CREN * 60)), "%Hh%i")) AS HORAIRE,
                                           CONCAT(ELT(DAYOFWEEK(creneau.DATE_CREN), "Dim.", "Lun.", "Mar.", "Mer.", "Jeu.", "Ven.", "Sam."),
                                                  " ", DATE_FORMAT(creneau.DATE_CREN, "%d/%m"), " - ", DATE_FORMAT(creneau.HEURE_CREN, "%Hh%i")) AS CRENEAU_COURT,
                                           DATE_FORMAT(creneau.DATE_CREN, "%d/%m/%Y") AS DATE_CRENEAU,
                                           retribution.VAL_RETRIB,
                                           CONCAT(retribution.TYPE_RETRIB, " ", REPLACE(FORMAT(retribution.VAL_RETRIB, 2, "fr_FR"), ",00", ""), " €") AS RETRIBUTION,
                                           (SELECT ressource_labo.NOM_RESS_LABO
                                              FROM reservation
                                              INNER JOIN ressource_labo ON ressource_labo.ID_RESS_LABO = reservation.ID_RESS_LABO
                                             WHERE reservation.ID_CREN = creneau.ID_CREN AND ressource_labo.TYPE_RESS_LABO = "Salle"
                                             LIMIT 1) AS SALLE
                                    FROM participant
                                    INNER JOIN participation ON participation.ID_PAR = participant.ID_PAR
                                    INNER JOIN creneau ON creneau.ID_CREN = participation.ID_CREN
                                    INNER JOIN experimentation ON experimentation.ID_EXP = creneau.ID_EXP
                                    LEFT JOIN retribution ON retribution.ID_RETRIB = experimentation.ID_RETRIB
                                    WHERE participant.ID_USER = :id
                                ) AS p
                                ORDER BY p.A_VENIR DESC,
                                         IF(p.A_VENIR = 1, TIMESTAMP(p.DATE_CREN, p.HEURE_CREN), NULL) ASC,
                                         p.DATE_CREN DESC, p.HEURE_CREN DESC');
        $stmt->execute(['id' => $id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}


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
}


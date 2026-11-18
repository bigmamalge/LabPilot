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
        $stmt = $pdo->prepare('SELECT e.*,
                                    CONCAT("Du ", DATE_FORMAT(e.DATE_DEB_EXP, "%d/%m/%Y"), " au ", DATE_FORMAT(e.DATE_FIN_EXP, "%d/%m/%Y")) AS PERIODE,
                                    e.DATE_FIN_EXP < CURDATE() AS EST_TERMINEE,
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
                                    SELECT experimentation.ID_EXP, experimentation.TITRE_EXP, experimentation.DATE_DEB_EXP,
                                           experimentation.DATE_FIN_EXP, experimentation.ARCHIVE_EXP,
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
                                ORDER BY e.DATE_DEB_EXP DESC');
        $stmt->execute(['id' => $id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}


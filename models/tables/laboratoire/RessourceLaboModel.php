<?php

require_once __DIR__ . '/../../Model.php';

class RessourceLaboModel extends Model
{
    public function getAllRessourcesLabo(): array
    {
        $pdo = $this->getPDO();
        $stmt = $pdo->query('SELECT * FROM ressource_labo');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getRessourceLaboById(int $id): ?array
    {
        $pdo = $this->getPDO();
        $stmt = $pdo->prepare('SELECT * FROM ressource_labo WHERE ID_RESS_LABO = :id');
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC) ?: null;
    }

    public function getRessourcesLaboAvecReservationsByUserID(int $id): array
    {
        $pdo = $this->getPDO();
        $stmt = $pdo->prepare('SELECT ressource_labo.*,
                                      CASE ressource_labo.TYPE_RESS_LABO
                                          WHEN "Salle" THEN "ok"
                                          WHEN "Equipement" THEN "violet"
                                          ELSE ""
                                      END AS CLASSE_TYPE,
                                      (SELECT COUNT(*) FROM reservation
                                        INNER JOIN creneau ON creneau.ID_CREN = reservation.ID_CREN
                                        WHERE reservation.ID_RESS_LABO = ressource_labo.ID_RESS_LABO
                                          AND creneau.DATE_CREN = CURDATE()) AS nbReservationsAujourdhui,
                                      (SELECT COUNT(*) FROM reservation
                                        INNER JOIN creneau ON creneau.ID_CREN = reservation.ID_CREN
                                        WHERE reservation.ID_RESS_LABO = ressource_labo.ID_RESS_LABO
                                          AND TIMESTAMP(creneau.DATE_CREN, creneau.HEURE_CREN) >= NOW()) AS nbReservationsAVenir,
                                      (SELECT COUNT(*) FROM reservation
                                        INNER JOIN creneau ON creneau.ID_CREN = reservation.ID_CREN
                                        INNER JOIN gestion ON gestion.ID_EXP = creneau.ID_EXP
                                        WHERE reservation.ID_RESS_LABO = ressource_labo.ID_RESS_LABO
                                          AND gestion.ID_USER = :id
                                          AND TIMESTAMP(creneau.DATE_CREN, creneau.HEURE_CREN) >= NOW()) AS nbMesReservationsAVenir,
                                      (SELECT CONCAT(ELT(DAYOFWEEK(creneau.DATE_CREN), "Dim.", "Lun.", "Mar.", "Mer.", "Jeu.", "Ven.", "Sam."),
                                                     " ", DATE_FORMAT(creneau.DATE_CREN, "%d/%m"),
                                                     " ", DATE_FORMAT(creneau.HEURE_CREN, "%Hh%i"),
                                                     " - ", experimentation.TITRE_EXP)
                                         FROM reservation
                                         INNER JOIN creneau ON creneau.ID_CREN = reservation.ID_CREN
                                         INNER JOIN experimentation ON experimentation.ID_EXP = creneau.ID_EXP
                                        WHERE reservation.ID_RESS_LABO = ressource_labo.ID_RESS_LABO
                                          AND TIMESTAMP(creneau.DATE_CREN, creneau.HEURE_CREN) >= NOW()
                                        ORDER BY creneau.DATE_CREN, creneau.HEURE_CREN
                                        LIMIT 1) AS PROCHAINE_RESERVATION
                                FROM ressource_labo
                                ORDER BY FIELD(ressource_labo.TYPE_RESS_LABO, "Salle", "Equipement", "Materiel"), ressource_labo.NOM_RESS_LABO');
        $stmt->execute(['id' => $id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}


<?php

require_once __DIR__ . '/../../Model.php';

class CreneauModel extends Model
{
    public function getAllCreneaux(): array
    {
        $pdo = $this->getPDO();
        $stmt = $pdo->query('SELECT * FROM creneau');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getCreneauById(int $id): ?array
    {
        $pdo = $this->getPDO();
        $stmt = $pdo->prepare('SELECT * FROM creneau WHERE ID_CREN = :id');
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC) ?: null;
    }

    public function getProchainsCreneauxByUserID(int $id): array
    {
        $pdo = $this->getPDO();
        $stmt = $pdo->prepare('SELECT creneau.ID_CREN, creneau.DATE_CREN, creneau.HEURE_CREN, creneau.DUREE_CREN, creneau.NB_MAX_PAR,
                                      experimentation.TITRE_EXP,
                                      DATE_FORMAT(creneau.DATE_CREN, "%d") AS JOUR,
                                      ELT(MONTH(creneau.DATE_CREN), "janv.", "févr.", "mars", "avr.", "mai", "juin",
                                          "juil.", "août", "sept.", "oct.", "nov.", "déc.") AS MOIS,
                                      CONCAT(DATE_FORMAT(creneau.HEURE_CREN, "%Hh%i"), "-",
                                             DATE_FORMAT(ADDTIME(creneau.HEURE_CREN, SEC_TO_TIME(creneau.DUREE_CREN * 60)), "%Hh%i")) AS HORAIRE,
                                      CONCAT(DATE_FORMAT(creneau.DATE_CREN, "%d/%m"), " ", DATE_FORMAT(creneau.HEURE_CREN, "%Hh%i")) AS JOUR_HEURE_COURT,
                                      (SELECT COUNT(*) FROM participation
                                        WHERE participation.ID_CREN = creneau.ID_CREN AND participation.STATUT_INSC = "Accepte") AS nbInscrits,
                                      (SELECT ressource_labo.NOM_RESS_LABO
                                         FROM reservation
                                         INNER JOIN ressource_labo ON ressource_labo.ID_RESS_LABO = reservation.ID_RESS_LABO
                                        WHERE reservation.ID_CREN = creneau.ID_CREN AND ressource_labo.TYPE_RESS_LABO = "Salle"
                                        LIMIT 1) AS SALLE
                                FROM gestion
                                INNER JOIN experimentation ON experimentation.ID_EXP = gestion.ID_EXP
                                INNER JOIN creneau ON creneau.ID_EXP = experimentation.ID_EXP
                                WHERE gestion.ID_USER = :id AND TIMESTAMP(creneau.DATE_CREN, creneau.HEURE_CREN) >= NOW()
                                ORDER BY creneau.DATE_CREN, creneau.HEURE_CREN');
        $stmt->execute(['id' => $id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}


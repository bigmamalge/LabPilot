<?php

require_once __DIR__ . '/../../Model.php';

class ParticipantModel extends Model
{
    public function getAllParticipants(): array
    {
        $pdo = $this->getPDO();
        $stmt = $pdo->query('SELECT * FROM participant');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getParticipantById(int $id): ?array
    {
        $pdo = $this->getPDO();
        $stmt = $pdo->prepare('SELECT * FROM participant WHERE ID_PAR = :id');
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC) ?: null;
    }

    public function getRepartitionGenreByUserID(int $id): array
    {
        $pdo = $this->getPDO();
        $stmt = $pdo->prepare('SELECT participant.GEN_PAR, COUNT(DISTINCT participant.ID_PAR) AS nb
                                FROM gestion
                                INNER JOIN creneau ON creneau.ID_EXP = gestion.ID_EXP
                                INNER JOIN participation ON participation.ID_CREN = creneau.ID_CREN
                                INNER JOIN participant ON participant.ID_PAR = participation.ID_PAR
                                WHERE gestion.ID_USER = :id
                                GROUP BY participant.GEN_PAR');
        $stmt->execute(['id' => $id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getRepartitionAgeByUserID(int $id): array
    {
        $pdo = $this->getPDO();
        $stmt = $pdo->prepare('SELECT tranche.LIBELLE, COUNT(DISTINCT p.ID_PAR) AS nb
                                FROM (SELECT 1 AS ORDRE, "18-25 ans" AS LIBELLE, 0 AS AGE_MIN, 25 AS AGE_MAX
                                      UNION ALL SELECT 2, "26-35 ans", 26, 35
                                      UNION ALL SELECT 3, "36-45 ans", 36, 45
                                      UNION ALL SELECT 4, "46 ans et plus", 46, 255) AS tranche
                                LEFT JOIN (SELECT DISTINCT participant.ID_PAR, participant.AGE_PAR
                                             FROM gestion
                                             INNER JOIN creneau ON creneau.ID_EXP = gestion.ID_EXP
                                             INNER JOIN participation ON participation.ID_CREN = creneau.ID_CREN
                                             INNER JOIN participant ON participant.ID_PAR = participation.ID_PAR
                                            WHERE gestion.ID_USER = :id) AS p
                                       ON p.AGE_PAR BETWEEN tranche.AGE_MIN AND tranche.AGE_MAX
                                GROUP BY tranche.ORDRE, tranche.LIBELLE
                                ORDER BY tranche.ORDRE');
        $stmt->execute(['id' => $id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}


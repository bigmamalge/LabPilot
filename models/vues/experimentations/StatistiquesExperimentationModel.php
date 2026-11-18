<?php

require_once __DIR__ . '/../../Model.php';

class StatistiquesExperimentationModel extends Model
{
    public function getAllStatistiquesExperimentation(): array
    {
        $pdo = $this->getPDO();
        $stmt = $pdo->query('SELECT * FROM statistiquesexperimentation');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getStatistiquesExperimentationByIdExp(int $idExp): array
    {
        $pdo = $this->getPDO();
        $stmt = $pdo->prepare('SELECT * FROM statistiquesexperimentation WHERE ID_EXP = :idExp');
        $stmt->execute(['idExp' => $idExp]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getTauxParticipationMoyenByUserID(int $id): array
    {
        $pdo = $this->getPDO();
        $stmt = $pdo->prepare('SELECT AVG(statistiquesexperimentation.TAUX_PARTICIPATION) AS tauxMoyen,
                                      COUNT(statistiquesexperimentation.TAUX_PARTICIPATION) AS nbExpMesurees
                                FROM gestion
                                INNER JOIN statistiquesexperimentation ON statistiquesexperimentation.ID_EXP = gestion.ID_EXP
                                WHERE gestion.ID_USER = :id');
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}


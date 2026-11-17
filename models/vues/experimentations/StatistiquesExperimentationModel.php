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
}


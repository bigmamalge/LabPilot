<?php

require_once __DIR__ .'/../../Model.php';

class StatistiquesExperimentationModel extends Model
{
    public function getAllStatistiquesExperimentation(): array {
        $pdo = $this->getPDO();
        $stmt = $pdo->query('SELECT * FROM statistiquesexperimentation');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}


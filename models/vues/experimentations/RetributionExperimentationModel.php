<?php

require_once __DIR__ .'/../../Model.php';

class RetributionExperimentationModel extends Model
{
    public function getAllRetributionExperimentation(): array {
        $pdo = $this->getPDO();
        $stmt = $pdo->query('SELECT * FROM retributionexperimentation');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}


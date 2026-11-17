<?php

require_once __DIR__ .'/../../Model.php';

class ExperimentationsDisponiblesModel extends Model
{
    public function getAllExperimentationsDisponibles(): array {
        $pdo = $this->getPDO();
        $stmt = $pdo->query('SELECT * FROM experimentationsdisponibles');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}


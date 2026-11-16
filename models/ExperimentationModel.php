<?php

require_once __DIR__ .'/Model.php';

class ExperimentationModel extends Model
{
    public function getAllExperimentations(): array {
        $pdo = $this->getPDO();
        $stmt = $pdo->query('SELECT * FROM experimentation');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}


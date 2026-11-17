<?php

require_once __DIR__ .'/../../Model.php';

class ExperimentationsEquipeModel extends Model
{
    public function getAllExperimentationsEquipe(): array {
        $pdo = $this->getPDO();
        $stmt = $pdo->query('SELECT * FROM experimentationsequipe');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}


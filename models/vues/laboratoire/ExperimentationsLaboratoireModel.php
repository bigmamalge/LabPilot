<?php

require_once __DIR__ .'/../../Model.php';

class ExperimentationsLaboratoireModel extends Model
{
    public function getAllExperimentationsLaboratoire(): array {
        $pdo = $this->getPDO();
        $stmt = $pdo->query('SELECT * FROM experimentationslaboratoire');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}


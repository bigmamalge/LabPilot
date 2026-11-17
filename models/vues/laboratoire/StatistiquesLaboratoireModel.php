<?php

require_once __DIR__ .'/../../Model.php';

class StatistiquesLaboratoireModel extends Model
{
    public function getAllStatistiquesLaboratoire(): array {
        $pdo = $this->getPDO();
        $stmt = $pdo->query('SELECT * FROM statistiqueslaboratoire');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}


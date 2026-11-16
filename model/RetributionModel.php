<?php

require_once __DIR__ .'/Model.php';

class RetributionModel extends Model
{
    public function getAllRetributions(): array {
        $pdo = $this->getPDO();
        $stmt = $pdo->query('SELECT * FROM retribution');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}


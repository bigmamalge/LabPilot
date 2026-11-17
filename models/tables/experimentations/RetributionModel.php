<?php

require_once __DIR__ . '/../../Model.php';

class RetributionModel extends Model
{
    public function getAllRetributions(): array
    {
        $pdo = $this->getPDO();
        $stmt = $pdo->query('SELECT * FROM retribution');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getRetributionById(int $id): ?array
    {
        $pdo = $this->getPDO();
        $stmt = $pdo->prepare('SELECT * FROM retribution WHERE ID_RETRIB = :id');
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC) ?: null;
    }
}


<?php

require_once __DIR__ . '/../../Model.php';

class RestrictionModel extends Model
{
    public function getAllRestrictions(): array
    {
        $pdo = $this->getPDO();
        $stmt = $pdo->query('SELECT * FROM restriction');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getRestrictionById(int $id): ?array
    {
        $pdo = $this->getPDO();
        $stmt = $pdo->prepare('SELECT * FROM restriction WHERE ID_REST = :id');
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC) ?: null;
    }
}


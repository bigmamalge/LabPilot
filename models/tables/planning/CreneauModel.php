<?php

require_once __DIR__ . '/../../Model.php';

class CreneauModel extends Model
{
    public function getAllCreneaux(): array
    {
        $pdo = $this->getPDO();
        $stmt = $pdo->query('SELECT * FROM creneau');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getCreneauById(int $id): ?array
    {
        $pdo = $this->getPDO();
        $stmt = $pdo->prepare('SELECT * FROM creneau WHERE ID_CREN = :id');
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC) ?: null;
    }
}


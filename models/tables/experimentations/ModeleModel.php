<?php

require_once __DIR__ . '/../../Model.php';

class ModeleModel extends Model
{
    public function getAllModeles(): array
    {
        $pdo = $this->getPDO();
        $stmt = $pdo->query('SELECT * FROM modele');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getModeleById(int $id): ?array
    {
        $pdo = $this->getPDO();
        $stmt = $pdo->prepare('SELECT * FROM modele WHERE ID_MODELE = :id');
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC) ?: null;
    }
}


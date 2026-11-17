<?php

require_once __DIR__ . '/../../Model.php';

class RessourceModel extends Model
{
    public function getAllRessources(): array
    {
        $pdo = $this->getPDO();
        $stmt = $pdo->query('SELECT * FROM ressource');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getRessourceById(int $id): ?array
    {
        $pdo = $this->getPDO();
        $stmt = $pdo->prepare('SELECT * FROM ressource WHERE ID_RESS = :id');
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC) ?: null;
    }
}


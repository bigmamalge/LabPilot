<?php

require_once __DIR__ . '/../../Model.php';

class EquipeModel extends Model
{
    public function getAllEquipes(): array
    {
        $pdo = $this->getPDO();
        $stmt = $pdo->query('SELECT * FROM equipe');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getEquipeById(int $id): ?array
    {
        $pdo = $this->getPDO();
        $stmt = $pdo->prepare('SELECT * FROM equipe WHERE ID_EQUIPE = :id');
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC) ?: null;
    }
}


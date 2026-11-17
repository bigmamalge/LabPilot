<?php

require_once __DIR__ . '/../../Model.php';

class ParametreModel extends Model
{
    public function getAllParametres(): array
    {
        $pdo = $this->getPDO();
        $stmt = $pdo->query('SELECT * FROM parametre');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getParametreById(string $id): ?array
    {
        $pdo = $this->getPDO();
        $stmt = $pdo->prepare('SELECT * FROM parametre WHERE CLE_PARAM = :id');
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC) ?: null;
    }
}


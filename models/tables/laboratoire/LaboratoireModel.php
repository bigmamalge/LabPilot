<?php

require_once __DIR__ . '/../../Model.php';

class LaboratoireModel extends Model
{
    public function getAllLaboratoires(): array
    {
        $pdo = $this->getPDO();
        $stmt = $pdo->query('SELECT * FROM laboratoire');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getLaboratoireById(int $id): ?array
    {
        $pdo = $this->getPDO();
        $stmt = $pdo->prepare('SELECT * FROM laboratoire WHERE ID_LABO = :id');
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC) ?: null;
    }

    public function getLaboratoireByUserID(int $id): ?array
    {
        $pdo = $this->getPDO();
        $stmt = $pdo->prepare('SELECT * FROM laboratoire WHERE ID_DIR = :id LIMIT 1');
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC) ?: null;
    }
}


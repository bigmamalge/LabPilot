<?php

require_once __DIR__ . '/../../Model.php';

class RessourceLaboModel extends Model
{
    public function getAllRessourcesLabo(): array
    {
        $pdo = $this->getPDO();
        $stmt = $pdo->query('SELECT * FROM ressource_labo');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getRessourceLaboById(int $id): ?array
    {
        $pdo = $this->getPDO();
        $stmt = $pdo->prepare('SELECT * FROM ressource_labo WHERE ID_RESS_LABO = :id');
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC) ?: null;
    }
}


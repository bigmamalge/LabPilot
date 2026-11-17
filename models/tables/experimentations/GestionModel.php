<?php

require_once __DIR__ . '/../../Model.php';

class GestionModel extends Model
{
    public function getAllGestions(): array
    {
        $pdo = $this->getPDO();
        $stmt = $pdo->query('SELECT * FROM gestion');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getGestionsByIdUser(int $idUser): array
    {
        $pdo = $this->getPDO();
        $stmt = $pdo->prepare('SELECT * FROM gestion WHERE ID_USER = :idUser');
        $stmt->execute(['idUser' => $idUser]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getGestionsByIdExp(int $idExp): array
    {
        $pdo = $this->getPDO();
        $stmt = $pdo->prepare('SELECT * FROM gestion WHERE ID_EXP = :idExp');
        $stmt->execute(['idExp' => $idExp]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}


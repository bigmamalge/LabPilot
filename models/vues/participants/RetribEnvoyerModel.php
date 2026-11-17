<?php

require_once __DIR__ . '/../../Model.php';

class RetribEnvoyerModel extends Model
{
    public function getAllRetribEnvoyer(): array
    {
        $pdo = $this->getPDO();
        $stmt = $pdo->query('SELECT * FROM retribenvoyer');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getRetribEnvoyerByIdUser(int $idUser): array
    {
        $pdo = $this->getPDO();
        $stmt = $pdo->prepare('SELECT * FROM retribenvoyer WHERE ID_USER = :idUser');
        $stmt->execute(['idUser' => $idUser]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}


<?php

require_once __DIR__ . '/../../Model.php';

class ErreursConnexionModel extends Model
{
    public function getAllErreursConnexion(): array
    {
        $pdo = $this->getPDO();
        $stmt = $pdo->query('SELECT * FROM erreursconnexion');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getErreursConnexionByIdJourn(int $idJourn): array
    {
        $pdo = $this->getPDO();
        $stmt = $pdo->prepare('SELECT * FROM erreursconnexion WHERE ID_JOURN = :idJourn');
        $stmt->execute(['idJourn' => $idJourn]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}


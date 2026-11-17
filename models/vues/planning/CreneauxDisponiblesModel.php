<?php

require_once __DIR__ . '/../../Model.php';

class CreneauxDisponiblesModel extends Model
{
    public function getAllCreneauxDisponibles(): array
    {
        $pdo = $this->getPDO();
        $stmt = $pdo->query('SELECT * FROM creneauxdisponibles');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getCreneauxDisponiblesByIdExp(int $idExp): array
    {
        $pdo = $this->getPDO();
        $stmt = $pdo->prepare('SELECT * FROM creneauxdisponibles WHERE ID_EXP = :idExp');
        $stmt->execute(['idExp' => $idExp]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getCreneauxDisponiblesByIdCren(int $idCren): array
    {
        $pdo = $this->getPDO();
        $stmt = $pdo->prepare('SELECT * FROM creneauxdisponibles WHERE ID_CREN = :idCren');
        $stmt->execute(['idCren' => $idCren]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}


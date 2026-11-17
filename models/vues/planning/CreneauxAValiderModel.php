<?php

require_once __DIR__ . '/../../Model.php';

class CreneauxAValiderModel extends Model
{
    public function getAllCreneauxAValider(): array
    {
        $pdo = $this->getPDO();
        $stmt = $pdo->query('SELECT * FROM creneauxavalider');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getCreneauxAValiderByIdCren(int $idCren): array
    {
        $pdo = $this->getPDO();
        $stmt = $pdo->prepare('SELECT * FROM creneauxavalider WHERE ID_CREN = :idCren');
        $stmt->execute(['idCren' => $idCren]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getCreneauxAValiderByIdExp(int $idExp): array
    {
        $pdo = $this->getPDO();
        $stmt = $pdo->prepare('SELECT * FROM creneauxavalider WHERE ID_EXP = :idExp');
        $stmt->execute(['idExp' => $idExp]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}


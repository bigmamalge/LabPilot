<?php

require_once __DIR__ . '/../../Model.php';

class PresenceCreneauModel extends Model
{
    public function getAllPresenceCreneau(): array
    {
        $pdo = $this->getPDO();
        $stmt = $pdo->query('SELECT * FROM presencecreneau');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getPresenceCreneauByIdExp(int $idExp): array
    {
        $pdo = $this->getPDO();
        $stmt = $pdo->prepare('SELECT * FROM presencecreneau WHERE ID_EXP = :idExp');
        $stmt->execute(['idExp' => $idExp]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getPresenceCreneauByIdCren(int $idCren): array
    {
        $pdo = $this->getPDO();
        $stmt = $pdo->prepare('SELECT * FROM presencecreneau WHERE ID_CREN = :idCren');
        $stmt->execute(['idCren' => $idCren]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getPresenceCreneauByIdPar(int $idPar): array
    {
        $pdo = $this->getPDO();
        $stmt = $pdo->prepare('SELECT * FROM presencecreneau WHERE ID_PAR = :idPar');
        $stmt->execute(['idPar' => $idPar]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}


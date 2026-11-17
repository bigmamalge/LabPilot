<?php

require_once __DIR__ . '/../../Model.php';

class ParticipationModel extends Model
{
    public function getAllParticipations(): array
    {
        $pdo = $this->getPDO();
        $stmt = $pdo->query('SELECT * FROM participation');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getParticipationsByIdPar(int $idPar): array
    {
        $pdo = $this->getPDO();
        $stmt = $pdo->prepare('SELECT * FROM participation WHERE ID_PAR = :idPar');
        $stmt->execute(['idPar' => $idPar]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getParticipationsByIdCren(int $idCren): array
    {
        $pdo = $this->getPDO();
        $stmt = $pdo->prepare('SELECT * FROM participation WHERE ID_CREN = :idCren');
        $stmt->execute(['idCren' => $idCren]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}


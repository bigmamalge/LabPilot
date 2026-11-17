<?php

require_once __DIR__ . '/../../Model.php';

class NbParticipantExpeModel extends Model
{
    public function getAllNbParticipantExpe(): array
    {
        $pdo = $this->getPDO();
        $stmt = $pdo->query('SELECT * FROM nbparticipantexpe');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getNbParticipantExpeByIdExp(int $idExp): array
    {
        $pdo = $this->getPDO();
        $stmt = $pdo->prepare('SELECT * FROM nbparticipantexpe WHERE ID_EXP = :idExp');
        $stmt->execute(['idExp' => $idExp]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}


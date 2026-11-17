<?php

require_once __DIR__ . '/../../Model.php';

class ParticipantsExperimentationDistinctsModel extends Model
{
    public function getAllParticipantsExperimentationDistincts(): array
    {
        $pdo = $this->getPDO();
        $stmt = $pdo->query('SELECT * FROM participantsexperimentationdistincts');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getParticipantsExperimentationDistinctsByIdExp(int $idExp): array
    {
        $pdo = $this->getPDO();
        $stmt = $pdo->prepare('SELECT * FROM participantsexperimentationdistincts WHERE ID_EXP = :idExp');
        $stmt->execute(['idExp' => $idExp]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getParticipantsExperimentationDistinctsByIdPar(int $idPar): array
    {
        $pdo = $this->getPDO();
        $stmt = $pdo->prepare('SELECT * FROM participantsexperimentationdistincts WHERE ID_PAR = :idPar');
        $stmt->execute(['idPar' => $idPar]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}


<?php

require_once __DIR__ . '/../../Model.php';

class QuestionnairesParticipantModel extends Model
{
    public function getAllQuestionnairesParticipant(): array
    {
        $pdo = $this->getPDO();
        $stmt = $pdo->query('SELECT * FROM questionnairesparticipant');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getQuestionnairesParticipantByIdPar(int $idPar): array
    {
        $pdo = $this->getPDO();
        $stmt = $pdo->prepare('SELECT * FROM questionnairesparticipant WHERE ID_PAR = :idPar');
        $stmt->execute(['idPar' => $idPar]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getQuestionnairesParticipantByIdRess(int $idRess): array
    {
        $pdo = $this->getPDO();
        $stmt = $pdo->prepare('SELECT * FROM questionnairesparticipant WHERE ID_RESS = :idRess');
        $stmt->execute(['idRess' => $idRess]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getQuestionnairesParticipantByIdExp(int $idExp): array
    {
        $pdo = $this->getPDO();
        $stmt = $pdo->prepare('SELECT * FROM questionnairesparticipant WHERE ID_EXP = :idExp');
        $stmt->execute(['idExp' => $idExp]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}


<?php

require_once __DIR__ . '/../../Model.php';

class ParticipantExperienceModel extends Model
{
    public function getAllParticipantExperience(): array
    {
        $pdo = $this->getPDO();
        $stmt = $pdo->query('SELECT * FROM participantexperience');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getParticipantExperienceByIdExp(int $idExp): array
    {
        $pdo = $this->getPDO();
        $stmt = $pdo->prepare('SELECT * FROM participantexperience WHERE ID_EXP = :idExp');
        $stmt->execute(['idExp' => $idExp]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}


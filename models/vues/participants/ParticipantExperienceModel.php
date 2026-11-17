<?php

require_once __DIR__ .'/../../Model.php';

class ParticipantExperienceModel extends Model
{
    public function getAllParticipantExperience(): array {
        $pdo = $this->getPDO();
        $stmt = $pdo->query('SELECT * FROM participantexperience');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}


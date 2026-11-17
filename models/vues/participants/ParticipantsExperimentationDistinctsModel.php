<?php

require_once __DIR__ .'/../../Model.php';

class ParticipantsExperimentationDistinctsModel extends Model
{
    public function getAllParticipantsExperimentationDistincts(): array {
        $pdo = $this->getPDO();
        $stmt = $pdo->query('SELECT * FROM participantsexperimentationdistincts');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}


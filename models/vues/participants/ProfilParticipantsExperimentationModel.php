<?php

require_once __DIR__ .'/../../Model.php';

class ProfilParticipantsExperimentationModel extends Model
{
    public function getAllProfilParticipantsExperimentation(): array {
        $pdo = $this->getPDO();
        $stmt = $pdo->query('SELECT * FROM profilparticipantsexperimentation');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}


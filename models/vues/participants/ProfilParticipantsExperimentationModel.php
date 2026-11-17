<?php

require_once __DIR__ . '/../../Model.php';

class ProfilParticipantsExperimentationModel extends Model
{
    public function getAllProfilParticipantsExperimentation(): array
    {
        $pdo = $this->getPDO();
        $stmt = $pdo->query('SELECT * FROM profilparticipantsexperimentation');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getProfilParticipantsExperimentationByIdExp(int $idExp): array
    {
        $pdo = $this->getPDO();
        $stmt = $pdo->prepare('SELECT * FROM profilparticipantsexperimentation WHERE ID_EXP = :idExp');
        $stmt->execute(['idExp' => $idExp]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}


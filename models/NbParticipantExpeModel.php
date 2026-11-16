<?php

require_once __DIR__ .'/Model.php';

class NbParticipantExpeModel extends Model
{
    public function getAllNbParticipantExpe(): array {
        $pdo = $this->getPDO();
        $stmt = $pdo->query('SELECT * FROM nbparticipantexpe');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}


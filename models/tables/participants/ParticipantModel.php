<?php

require_once __DIR__ .'/../../Model.php';

class ParticipantModel extends Model
{
    public function getAllParticipants(): array {
        $pdo = $this->getPDO();
        $stmt = $pdo->query('SELECT * FROM participant');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}


<?php

require_once __DIR__ .'/../../Model.php';

class ParticipationModel extends Model
{
    public function getAllParticipations(): array {
        $pdo = $this->getPDO();
        $stmt = $pdo->query('SELECT * FROM participation');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}


<?php

require_once __DIR__ .'/../../Model.php';

class HistoriqueParticipationModel extends Model
{
    public function getAllHistoriqueParticipation(): array {
        $pdo = $this->getPDO();
        $stmt = $pdo->query('SELECT * FROM historiqueparticipation');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}


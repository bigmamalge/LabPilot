<?php

require_once __DIR__ .'/../../Model.php';

class IncidentModel extends Model
{
    public function getAllIncidents(): array {
        $pdo = $this->getPDO();
        $stmt = $pdo->query('SELECT * FROM incident');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}


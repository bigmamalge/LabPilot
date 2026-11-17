<?php

require_once __DIR__ .'/../../Model.php';

class PresenceCreneauModel extends Model
{
    public function getAllPresenceCreneau(): array {
        $pdo = $this->getPDO();
        $stmt = $pdo->query('SELECT * FROM presencecreneau');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}


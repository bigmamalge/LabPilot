<?php

require_once __DIR__ .'/Model.php';

class CreneauModel extends Model
{
    public function getAllCreneaux(): array {
        $pdo = $this->getPDO();
        $stmt = $pdo->query('SELECT * FROM creneau');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}


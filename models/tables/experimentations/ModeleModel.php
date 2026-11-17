<?php

require_once __DIR__ .'/../../Model.php';

class ModeleModel extends Model
{
    public function getAllModeles(): array {
        $pdo = $this->getPDO();
        $stmt = $pdo->query('SELECT * FROM modele');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}


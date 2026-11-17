<?php

require_once __DIR__ .'/../../Model.php';

class ParametreModel extends Model
{
    public function getAllParametres(): array {
        $pdo = $this->getPDO();
        $stmt = $pdo->query('SELECT * FROM parametre');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}


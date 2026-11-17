<?php

require_once __DIR__ .'/../../Model.php';

class RestrictionModel extends Model
{
    public function getAllRestrictions(): array {
        $pdo = $this->getPDO();
        $stmt = $pdo->query('SELECT * FROM restriction');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}


<?php

require_once __DIR__ .'/Model.php';

class GestionModel extends Model
{
    public function getAllGestions(): array {
        $pdo = $this->getPDO();
        $stmt = $pdo->query('SELECT * FROM gestion');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}


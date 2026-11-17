<?php

require_once __DIR__ .'/../../Model.php';

class RetribEnvoyerModel extends Model
{
    public function getAllRetribEnvoyer(): array {
        $pdo = $this->getPDO();
        $stmt = $pdo->query('SELECT * FROM retribenvoyer');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}


<?php

require_once __DIR__ .'/../../Model.php';

class ErreursConnexionModel extends Model
{
    public function getAllErreursConnexion(): array {
        $pdo = $this->getPDO();
        $stmt = $pdo->query('SELECT * FROM erreursconnexion');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}


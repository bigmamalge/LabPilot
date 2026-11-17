<?php

require_once __DIR__ .'/../../Model.php';

class NombreUtilisateursModel extends Model
{
    public function getAllNombreUtilisateurs(): array {
        $pdo = $this->getPDO();
        $stmt = $pdo->query('SELECT * FROM nombreutilisateurs');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}


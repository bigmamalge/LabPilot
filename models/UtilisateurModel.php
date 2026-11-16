<?php

require_once __DIR__ .'/Model.php';

class UtilisateurModel extends Model
{
    public function getAllUtilisateurs(): array {
        $pdo = $this->getPDO();
        $stmt = $pdo->query('SELECT * FROM utilisateur');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}


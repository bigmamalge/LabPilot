<?php

require_once __DIR__ .'/../../Model.php';

class RessourceLaboModel extends Model
{
    public function getAllRessourcesLabo(): array {
        $pdo = $this->getPDO();
        $stmt = $pdo->query('SELECT * FROM ressource_labo');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}


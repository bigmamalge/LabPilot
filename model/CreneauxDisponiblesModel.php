<?php

require_once __DIR__ .'/Model.php';

class CreneauxDisponiblesModel extends Model
{
    public function getAllCreneauxDisponibles(): array {
        $pdo = $this->getPDO();
        $stmt = $pdo->query('SELECT * FROM creneauxdisponibles');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}


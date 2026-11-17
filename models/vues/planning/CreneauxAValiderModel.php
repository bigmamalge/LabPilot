<?php

require_once __DIR__ .'/../../Model.php';

class CreneauxAValiderModel extends Model
{
    public function getAllCreneauxAValider(): array {
        $pdo = $this->getPDO();
        $stmt = $pdo->query('SELECT * FROM creneauxavalider');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}


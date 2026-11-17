<?php

require_once __DIR__ .'/../../Model.php';

class RessourceModel extends Model
{
    public function getAllRessources(): array {
        $pdo = $this->getPDO();
        $stmt = $pdo->query('SELECT * FROM ressource');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}


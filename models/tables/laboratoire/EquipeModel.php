<?php

require_once __DIR__ .'/../../Model.php';

class EquipeModel extends Model
{
    public function getAllEquipes(): array {
        $pdo = $this->getPDO();
        $stmt = $pdo->query('SELECT * FROM equipe');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}


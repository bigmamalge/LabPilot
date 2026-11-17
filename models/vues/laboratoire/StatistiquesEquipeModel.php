<?php

require_once __DIR__ .'/../../Model.php';

class StatistiquesEquipeModel extends Model
{
    public function getAllStatistiquesEquipe(): array {
        $pdo = $this->getPDO();
        $stmt = $pdo->query('SELECT * FROM statistiquesequipe');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}


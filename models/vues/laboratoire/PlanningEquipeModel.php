<?php

require_once __DIR__ .'/../../Model.php';

class PlanningEquipeModel extends Model
{
    public function getAllPlanningEquipe(): array {
        $pdo = $this->getPDO();
        $stmt = $pdo->query('SELECT * FROM planningequipe');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}


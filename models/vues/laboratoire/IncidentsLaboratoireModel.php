<?php

require_once __DIR__ .'/../../Model.php';

class IncidentsLaboratoireModel extends Model
{
    public function getAllIncidentsLaboratoire(): array {
        $pdo = $this->getPDO();
        $stmt = $pdo->query('SELECT * FROM incidentslaboratoire');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}


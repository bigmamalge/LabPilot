<?php

require_once __DIR__ .'/../../Model.php';

class LaboratoireModel extends Model
{
    public function getAllLaboratoires(): array {
        $pdo = $this->getPDO();
        $stmt = $pdo->query('SELECT * FROM laboratoire');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}


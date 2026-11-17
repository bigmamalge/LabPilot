<?php

require_once __DIR__ .'/../../Model.php';

class RessourcesLaboratoireModel extends Model
{
    public function getAllRessourcesLaboratoire(): array {
        $pdo = $this->getPDO();
        $stmt = $pdo->query('SELECT * FROM ressourceslaboratoire');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}


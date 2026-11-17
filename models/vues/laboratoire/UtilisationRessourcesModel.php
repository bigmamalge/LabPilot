<?php

require_once __DIR__ .'/../../Model.php';

class UtilisationRessourcesModel extends Model
{
    public function getAllUtilisationRessources(): array {
        $pdo = $this->getPDO();
        $stmt = $pdo->query('SELECT * FROM utilisationressources');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}


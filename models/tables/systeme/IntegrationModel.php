<?php

require_once __DIR__ .'/../../Model.php';

class IntegrationModel extends Model
{
    public function getAllIntegrations(): array {
        $pdo = $this->getPDO();
        $stmt = $pdo->query('SELECT * FROM integration');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}


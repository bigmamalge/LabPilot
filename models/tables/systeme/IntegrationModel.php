<?php

require_once __DIR__ . '/../../Model.php';

class IntegrationModel extends Model
{
    public function getAllIntegrations(): array
    {
        $pdo = $this->getPDO();
        $stmt = $pdo->query('SELECT * FROM integration');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getIntegrationById(int $id): ?array
    {
        $pdo = $this->getPDO();
        $stmt = $pdo->prepare('SELECT * FROM integration WHERE ID_INTEG = :id');
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC) ?: null;
    }
}


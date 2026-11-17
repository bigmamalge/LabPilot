<?php

require_once __DIR__ . '/../../Model.php';

class IncidentModel extends Model
{
    public function getAllIncidents(): array
    {
        $pdo = $this->getPDO();
        $stmt = $pdo->query('SELECT * FROM incident');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getIncidentById(int $id): ?array
    {
        $pdo = $this->getPDO();
        $stmt = $pdo->prepare('SELECT * FROM incident WHERE ID_INC = :id');
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC) ?: null;
    }
}


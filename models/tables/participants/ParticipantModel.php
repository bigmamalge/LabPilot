<?php

require_once __DIR__ . '/../../Model.php';

class ParticipantModel extends Model
{
    public function getAllParticipants(): array
    {
        $pdo = $this->getPDO();
        $stmt = $pdo->query('SELECT * FROM participant');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getParticipantById(int $id): ?array
    {
        $pdo = $this->getPDO();
        $stmt = $pdo->prepare('SELECT * FROM participant WHERE ID_PAR = :id');
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC) ?: null;
    }
}


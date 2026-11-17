<?php

require_once __DIR__ . '/../../Model.php';

class JournalModel extends Model
{
    public function getAllJournaux(): array
    {
        $pdo = $this->getPDO();
        $stmt = $pdo->query('SELECT * FROM journal');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getJournalById(int $id): ?array
    {
        $pdo = $this->getPDO();
        $stmt = $pdo->prepare('SELECT * FROM journal WHERE ID_JOURN = :id');
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC) ?: null;
    }
}


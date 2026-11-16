<?php

require_once __DIR__ .'/Model.php';

class JournalModel extends Model
{
    public function getAllJournaux(): array {
        $pdo = $this->getPDO();
        $stmt = $pdo->query('SELECT * FROM journal');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}


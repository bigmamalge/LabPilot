<?php

require_once __DIR__ .'/../../Model.php';

class SessionsUtilisateursModel extends Model
{
    public function getAllSessionsUtilisateurs(): array {
        $pdo = $this->getPDO();
        $stmt = $pdo->query('SELECT * FROM sessionsutilisateurs');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}


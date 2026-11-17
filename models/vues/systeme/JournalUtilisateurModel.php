<?php

require_once __DIR__ . '/../../Model.php';

class JournalUtilisateurModel extends Model
{
    public function getAllJournalUtilisateur(): array
    {
        $pdo = $this->getPDO();
        $stmt = $pdo->query('SELECT * FROM journalutilisateur');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getJournalUtilisateurByIdUser(int $idUser): array
    {
        $pdo = $this->getPDO();
        $stmt = $pdo->prepare('SELECT * FROM journalutilisateur WHERE ID_USER = :idUser');
        $stmt->execute(['idUser' => $idUser]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}


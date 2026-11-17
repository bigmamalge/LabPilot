<?php

require_once __DIR__ . '/../../Model.php';

class UtilisateurModel extends Model
{
    public function getAllUtilisateurs(): array
    {
        $pdo = $this->getPDO();
        $stmt = $pdo->query('SELECT * FROM utilisateur');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getUtilisateurById(int $id): ?array
    {
        $pdo = $this->getPDO();
        $stmt = $pdo->prepare('SELECT * FROM utilisateur WHERE ID_USER = :id');
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC) ?: null;
    }

    public function getUtilisateurByIdSso(string $idSso): ?array
    {
        $pdo = $this->getPDO();
        $stmt = $pdo->prepare('SELECT * FROM utilisateur WHERE IDENT_SSO = :idSso');
        $stmt->execute(['idSso' => $idSso]);
        return $stmt->fetch(PDO::FETCH_ASSOC) ?: null;
    }
}


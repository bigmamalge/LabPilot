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

    public function setThemeUtilisateur(int $id, string $theme): bool
    {
        $pdo = $this->getPDO();
        $stmt = $pdo->prepare('UPDATE utilisateur SET THEME_USER = :theme WHERE ID_USER = :id');
        return $stmt->execute(['theme' => $theme, 'id' => $id]);
    }

    public function setLangueUtilisateur(int $id, string $langue): bool
    {
        $pdo = $this->getPDO();
        $stmt = $pdo->prepare('UPDATE utilisateur SET LANG_USER = :langue WHERE ID_USER = :id');
        return $stmt->execute(['langue' => $langue, 'id' => $id]);
    }

    public function getUtilisateurByIdSso(string $idSso): ?array
    {
        $pdo = $this->getPDO();
        $stmt = $pdo->prepare('SELECT * FROM utilisateur WHERE IDENT_SSO = :idSso');
        $stmt->execute(['idSso' => $idSso]);
        return $stmt->fetch(PDO::FETCH_ASSOC) ?: null;
    }
}


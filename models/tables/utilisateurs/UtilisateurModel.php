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

    public function getUtilisateursAvecRole(): array
    {
        $pdo = $this->getPDO();
        $stmt = $pdo->query('SELECT utilisateur.ID_USER, utilisateur.NOM_USER, utilisateur.PRENOM_USER, utilisateur.MAIL_USER,
                                    utilisateur.IDENT_SSO, role.LIB_ROLE,
                                    (SELECT CONCAT(DATE_FORMAT(journal.DATE_ACT_JOURN, "%d/%m/%Y"), " ", DATE_FORMAT(journal.HEURE_ACT_JOURN, "%Hh%i"))
                                       FROM journal
                                      WHERE journal.ID_USER = utilisateur.ID_USER
                                      ORDER BY journal.DATE_ACT_JOURN DESC, journal.HEURE_ACT_JOURN DESC
                                      LIMIT 1) AS DERNIERE_ACTIVITE
                             FROM utilisateur
                             INNER JOIN role ON role.ID_ROLE = utilisateur.ID_ROLE
                             ORDER BY utilisateur.ID_ROLE, utilisateur.NOM_USER, utilisateur.PRENOM_USER');
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


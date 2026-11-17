<?php

require_once __DIR__ . '/../../Model.php';

class RoleUtilisateurModel extends Model
{
    public function getAllRoleUtilisateur(): array
    {
        $pdo = $this->getPDO();
        $stmt = $pdo->query('SELECT * FROM roleutilisateur');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getRoleUtilisateurByIdUser(int $idUser): array
    {
        $pdo = $this->getPDO();
        $stmt = $pdo->prepare('SELECT * FROM roleutilisateur WHERE ID_USER = :idUser');
        $stmt->execute(['idUser' => $idUser]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getRoleUtilisateurByIdRole(int $idRole): array
    {
        $pdo = $this->getPDO();
        $stmt = $pdo->prepare('SELECT * FROM roleutilisateur WHERE ID_ROLE = :idRole');
        $stmt->execute(['idRole' => $idRole]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}


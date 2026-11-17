<?php

require_once __DIR__ . '/../../Model.php';

class PermissionsRoleModel extends Model
{
    public function getAllPermissionsRole(): array
    {
        $pdo = $this->getPDO();
        $stmt = $pdo->query('SELECT * FROM permissionsrole');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getPermissionsRoleByIdRole(int $idRole): array
    {
        $pdo = $this->getPDO();
        $stmt = $pdo->prepare('SELECT * FROM permissionsrole WHERE ID_ROLE = :idRole');
        $stmt->execute(['idRole' => $idRole]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getPermissionsRoleByIdPerm(int $idPerm): array
    {
        $pdo = $this->getPDO();
        $stmt = $pdo->prepare('SELECT * FROM permissionsrole WHERE ID_PERM = :idPerm');
        $stmt->execute(['idPerm' => $idPerm]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}


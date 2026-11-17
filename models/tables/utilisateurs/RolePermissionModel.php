<?php

require_once __DIR__ . '/../../Model.php';

class RolePermissionModel extends Model
{
    public function getAllRolePermissions(): array
    {
        $pdo = $this->getPDO();
        $stmt = $pdo->query('SELECT * FROM role_permission');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getRolePermissionsByIdRole(int $idRole): array
    {
        $pdo = $this->getPDO();
        $stmt = $pdo->prepare('SELECT * FROM role_permission WHERE ID_ROLE = :idRole');
        $stmt->execute(['idRole' => $idRole]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getRolePermissionsByIdPerm(int $idPerm): array
    {
        $pdo = $this->getPDO();
        $stmt = $pdo->prepare('SELECT * FROM role_permission WHERE ID_PERM = :idPerm');
        $stmt->execute(['idPerm' => $idPerm]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}


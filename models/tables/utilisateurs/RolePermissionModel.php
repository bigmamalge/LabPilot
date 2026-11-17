<?php

require_once __DIR__ .'/../../Model.php';

class RolePermissionModel extends Model
{
    public function getAllRolePermissions(): array {
        $pdo = $this->getPDO();
        $stmt = $pdo->query('SELECT * FROM role_permission');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}


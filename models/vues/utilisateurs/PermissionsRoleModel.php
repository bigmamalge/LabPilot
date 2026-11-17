<?php

require_once __DIR__ .'/../../Model.php';

class PermissionsRoleModel extends Model
{
    public function getAllPermissionsRole(): array {
        $pdo = $this->getPDO();
        $stmt = $pdo->query('SELECT * FROM permissionsrole');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}


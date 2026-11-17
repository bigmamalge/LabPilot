<?php

require_once __DIR__ .'/../../Model.php';

class PermissionModel extends Model
{
    public function getAllPermissions(): array {
        $pdo = $this->getPDO();
        $stmt = $pdo->query('SELECT * FROM permission');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}


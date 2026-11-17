<?php

require_once __DIR__ .'/../../Model.php';

class RoleModel extends Model
{
    public function getAllRoles(): array {
        $pdo = $this->getPDO();
        $stmt = $pdo->query('SELECT * FROM role');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}


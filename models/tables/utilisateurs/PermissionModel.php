<?php

require_once __DIR__ . '/../../Model.php';

class PermissionModel extends Model
{
    public function getAllPermissions(): array
    {
        $pdo = $this->getPDO();
        $stmt = $pdo->query('SELECT * FROM permission');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getPermissionById(int $id): ?array
    {
        $pdo = $this->getPDO();
        $stmt = $pdo->prepare('SELECT * FROM permission WHERE ID_PERM = :id');
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC) ?: null;
    }
}


<?php

require_once __DIR__ . '/../../Model.php';

class RoleModel extends Model
{
    public function getAllRoles(): array
    {
        $pdo = $this->getPDO();
        $stmt = $pdo->query('SELECT * FROM role');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getRoleById(int $id): ?array
    {
        $pdo = $this->getPDO();
        $stmt = $pdo->prepare('SELECT * FROM role WHERE ID_ROLE = :id');
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC) ?: null;
    }
}


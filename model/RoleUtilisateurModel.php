<?php

require_once __DIR__ .'/Model.php';

class RoleUtilisateurModel extends Model
{
    public function getAllRoleUtilisateur(): array {
        $pdo = $this->getPDO();
        $stmt = $pdo->query('SELECT * FROM roleutilisateur');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}


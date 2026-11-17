<?php

require_once __DIR__ .'/../../Model.php';

class NotificationsUtilisateurModel extends Model
{
    public function getAllNotificationsUtilisateur(): array {
        $pdo = $this->getPDO();
        $stmt = $pdo->query('SELECT * FROM notificationsutilisateur');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}


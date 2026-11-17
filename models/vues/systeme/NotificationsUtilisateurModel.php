<?php

require_once __DIR__ . '/../../Model.php';

class NotificationsUtilisateurModel extends Model
{
    public function getAllNotificationsUtilisateur(): array
    {
        $pdo = $this->getPDO();
        $stmt = $pdo->query('SELECT * FROM notificationsutilisateur');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getNotificationsUtilisateurByIdNotif(int $idNotif): array
    {
        $pdo = $this->getPDO();
        $stmt = $pdo->prepare('SELECT * FROM notificationsutilisateur WHERE ID_NOTIF = :idNotif');
        $stmt->execute(['idNotif' => $idNotif]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getNotificationsUtilisateurByIdUser(int $idUser): array
    {
        $pdo = $this->getPDO();
        $stmt = $pdo->prepare('SELECT * FROM notificationsutilisateur WHERE ID_USER = :idUser');
        $stmt->execute(['idUser' => $idUser]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}


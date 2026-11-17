<?php

require_once __DIR__ . '/../../Model.php';

class NotificationModel extends Model
{
    public function getAllNotifications(): array
    {
        $pdo = $this->getPDO();
        $stmt = $pdo->query('SELECT * FROM notification');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getNotificationById(int $id): ?array
    {
        $pdo = $this->getPDO();
        $stmt = $pdo->prepare('SELECT * FROM notification WHERE ID_NOTIF = :id');
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC) ?: null;
    }
}


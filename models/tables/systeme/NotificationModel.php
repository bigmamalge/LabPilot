<?php

require_once __DIR__ .'/../../Model.php';

class NotificationModel extends Model
{
    public function getAllNotifications(): array {
        $pdo = $this->getPDO();
        $stmt = $pdo->query('SELECT * FROM notification');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}


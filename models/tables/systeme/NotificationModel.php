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

    public function getHistoriqueEnvoisByUserID(int $id): array
    {
        $pdo = $this->getPDO();
        $stmt = $pdo->prepare('SELECT notification.DATE_NOTIF, notification.HEURE_NOTIF, notification.TYPE_NOTIF, notification.OBJET_NOTIF,
                                      experimentation.TITRE_EXP, COUNT(*) AS nbDestinataires,
                                      DATE_FORMAT(notification.DATE_NOTIF, "%d") AS JOUR,
                                      ELT(MONTH(notification.DATE_NOTIF), "janv.", "févr.", "mars", "avr.", "mai", "juin",
                                          "juil.", "août", "sept.", "oct.", "nov.", "déc.") AS MOIS
                                FROM gestion
                                INNER JOIN experimentation ON experimentation.ID_EXP = gestion.ID_EXP
                                INNER JOIN notification ON notification.ID_EXP = experimentation.ID_EXP
                                WHERE gestion.ID_USER = :id
                                GROUP BY notification.DATE_NOTIF, notification.HEURE_NOTIF, notification.TYPE_NOTIF,
                                         notification.OBJET_NOTIF, experimentation.ID_EXP, experimentation.TITRE_EXP
                                ORDER BY notification.DATE_NOTIF DESC, notification.HEURE_NOTIF DESC');
        $stmt->execute(['id' => $id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}


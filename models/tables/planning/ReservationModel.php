<?php

require_once __DIR__ .'/../../Model.php';

class ReservationModel extends Model
{
    public function getAllReservations(): array {
        $pdo = $this->getPDO();
        $stmt = $pdo->query('SELECT * FROM reservation');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}


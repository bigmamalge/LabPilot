<?php

require_once __DIR__ . '/../../Model.php';

class ReservationModel extends Model
{
    public function getAllReservations(): array
    {
        $pdo = $this->getPDO();
        $stmt = $pdo->query('SELECT * FROM reservation');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getReservationsByIdCren(int $idCren): array
    {
        $pdo = $this->getPDO();
        $stmt = $pdo->prepare('SELECT * FROM reservation WHERE ID_CREN = :idCren');
        $stmt->execute(['idCren' => $idCren]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getReservationsByIdRessLabo(int $idRessLabo): array
    {
        $pdo = $this->getPDO();
        $stmt = $pdo->prepare('SELECT * FROM reservation WHERE ID_RESS_LABO = :idRessLabo');
        $stmt->execute(['idRessLabo' => $idRessLabo]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}


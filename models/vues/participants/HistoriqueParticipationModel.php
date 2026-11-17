<?php

require_once __DIR__ . '/../../Model.php';

class HistoriqueParticipationModel extends Model
{
    public function getAllHistoriqueParticipation(): array
    {
        $pdo = $this->getPDO();
        $stmt = $pdo->query('SELECT * FROM historiqueparticipation');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getHistoriqueParticipationByIdPar(int $idPar): array
    {
        $pdo = $this->getPDO();
        $stmt = $pdo->prepare('SELECT * FROM historiqueparticipation WHERE ID_PAR = :idPar');
        $stmt->execute(['idPar' => $idPar]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getHistoriqueParticipationByIdUser(int $idUser): array
    {
        $pdo = $this->getPDO();
        $stmt = $pdo->prepare('SELECT * FROM historiqueparticipation WHERE ID_USER = :idUser');
        $stmt->execute(['idUser' => $idUser]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getHistoriqueParticipationByIdExp(int $idExp): array
    {
        $pdo = $this->getPDO();
        $stmt = $pdo->prepare('SELECT * FROM historiqueparticipation WHERE ID_EXP = :idExp');
        $stmt->execute(['idExp' => $idExp]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}


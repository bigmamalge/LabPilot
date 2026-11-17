<?php

require_once __DIR__ . '/../../Model.php';

class IncidentsLaboratoireModel extends Model
{
    public function getAllIncidentsLaboratoire(): array
    {
        $pdo = $this->getPDO();
        $stmt = $pdo->query('SELECT * FROM incidentslaboratoire');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getIncidentsLaboratoireByIdLabo(int $idLabo): array
    {
        $pdo = $this->getPDO();
        $stmt = $pdo->prepare('SELECT * FROM incidentslaboratoire WHERE ID_LABO = :idLabo');
        $stmt->execute(['idLabo' => $idLabo]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getIncidentsLaboratoireByIdInc(int $idInc): array
    {
        $pdo = $this->getPDO();
        $stmt = $pdo->prepare('SELECT * FROM incidentslaboratoire WHERE ID_INC = :idInc');
        $stmt->execute(['idInc' => $idInc]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getIncidentsLaboratoireByIdExp(int $idExp): array
    {
        $pdo = $this->getPDO();
        $stmt = $pdo->prepare('SELECT * FROM incidentslaboratoire WHERE ID_EXP = :idExp');
        $stmt->execute(['idExp' => $idExp]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}


<?php

require_once __DIR__ . '/../../Model.php';

class StatistiquesLaboratoireModel extends Model
{
    public function getAllStatistiquesLaboratoire(): array
    {
        $pdo = $this->getPDO();
        $stmt = $pdo->query('SELECT * FROM statistiqueslaboratoire');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getStatistiquesLaboratoireByIdLabo(int $idLabo): array
    {
        $pdo = $this->getPDO();
        $stmt = $pdo->prepare('SELECT * FROM statistiqueslaboratoire WHERE ID_LABO = :idLabo');
        $stmt->execute(['idLabo' => $idLabo]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getStatistiquesLaboratoireByIdDir(int $idDir): array
    {
        $pdo = $this->getPDO();
        $stmt = $pdo->prepare('SELECT * FROM statistiqueslaboratoire WHERE ID_DIR = :idDir');
        $stmt->execute(['idDir' => $idDir]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}


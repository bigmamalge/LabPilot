<?php

require_once __DIR__ . '/../../Model.php';

class RessourcesLaboratoireModel extends Model
{
    public function getAllRessourcesLaboratoire(): array
    {
        $pdo = $this->getPDO();
        $stmt = $pdo->query('SELECT * FROM ressourceslaboratoire');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getRessourcesLaboratoireByIdRessLabo(int $idRessLabo): array
    {
        $pdo = $this->getPDO();
        $stmt = $pdo->prepare('SELECT * FROM ressourceslaboratoire WHERE ID_RESS_LABO = :idRessLabo');
        $stmt->execute(['idRessLabo' => $idRessLabo]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getRessourcesLaboratoireByIdLabo(int $idLabo): array
    {
        $pdo = $this->getPDO();
        $stmt = $pdo->prepare('SELECT * FROM ressourceslaboratoire WHERE ID_LABO = :idLabo');
        $stmt->execute(['idLabo' => $idLabo]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}


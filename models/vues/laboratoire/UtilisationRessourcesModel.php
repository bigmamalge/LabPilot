<?php

require_once __DIR__ . '/../../Model.php';

class UtilisationRessourcesModel extends Model
{
    public function getAllUtilisationRessources(): array
    {
        $pdo = $this->getPDO();
        $stmt = $pdo->query('SELECT * FROM utilisationressources');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getUtilisationRessourcesByIdRessLabo(int $idRessLabo): array
    {
        $pdo = $this->getPDO();
        $stmt = $pdo->prepare('SELECT * FROM utilisationressources WHERE ID_RESS_LABO = :idRessLabo');
        $stmt->execute(['idRessLabo' => $idRessLabo]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}


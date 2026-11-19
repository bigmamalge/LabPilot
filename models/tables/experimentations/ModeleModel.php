<?php

require_once __DIR__ . '/../../Model.php';

class ModeleModel extends Model
{
    public function getAllModeles(): array
    {
        $pdo = $this->getPDO();
        $stmt = $pdo->query('SELECT * FROM modele');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getModeleById(int $id): ?array
    {
        $pdo = $this->getPDO();
        $stmt = $pdo->prepare('SELECT * FROM modele WHERE ID_MODELE = :id');
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC) ?: null;
    }

    public function getModelesAvecUtilisation(): array
    {
        $pdo = $this->getPDO();
        $stmt = $pdo->query('SELECT modele.ID_MODELE, modele.NOM_MODELE, modele.DESC_MODELE,
                                    COUNT(experimentation.ID_EXP) AS nbUtilisations
                             FROM modele
                             LEFT JOIN experimentation ON experimentation.ID_MODELE = modele.ID_MODELE
                             GROUP BY modele.ID_MODELE, modele.NOM_MODELE, modele.DESC_MODELE
                             ORDER BY nbUtilisations DESC, modele.NOM_MODELE');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getModelesByUserID(int $id): array
    {
        $pdo = $this->getPDO();
        $stmt = $pdo->prepare('SELECT modele.ID_MODELE, modele.NOM_MODELE, modele.DESC_MODELE,
                                      COUNT(experimentation.ID_EXP) AS nbUtilisations
                                FROM gestion
                                INNER JOIN experimentation ON experimentation.ID_EXP = gestion.ID_EXP
                                INNER JOIN modele ON modele.ID_MODELE = experimentation.ID_MODELE
                                WHERE gestion.ID_USER = :id
                                GROUP BY modele.ID_MODELE, modele.NOM_MODELE, modele.DESC_MODELE
                                ORDER BY nbUtilisations DESC, modele.NOM_MODELE');
        $stmt->execute(['id' => $id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}


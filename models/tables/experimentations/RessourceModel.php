<?php

require_once __DIR__ . '/../../Model.php';

class RessourceModel extends Model
{
    public function getAllRessources(): array
    {
        $pdo = $this->getPDO();
        $stmt = $pdo->query('SELECT * FROM ressource');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getRessourceById(int $id): ?array
    {
        $pdo = $this->getPDO();
        $stmt = $pdo->prepare('SELECT * FROM ressource WHERE ID_RESS = :id');
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC) ?: null;
    }

    public function getRessourcesByUserID(int $id): array
    {
        $pdo = $this->getPDO();
        $stmt = $pdo->prepare('SELECT ressource.ID_RESS, ressource.NOM_RESS, ressource.TYPE_RESS, ressource.ID_EXP, experimentation.TITRE_EXP,
                                      CASE ressource.TYPE_RESS
                                          WHEN "Fiche de consentement" THEN "ok"
                                          WHEN "Document administratif" THEN ""
                                          ELSE "violet"
                                      END AS CLASSE_TYPE
                                FROM gestion
                                INNER JOIN experimentation ON experimentation.ID_EXP = gestion.ID_EXP
                                INNER JOIN ressource ON ressource.ID_EXP = experimentation.ID_EXP
                                WHERE gestion.ID_USER = :id
                                ORDER BY experimentation.TITRE_EXP, ressource.NOM_RESS');
        $stmt->execute(['id' => $id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getTypesRessources(): array
    {
        $pdo = $this->getPDO();
        $stmt = $pdo->query('SELECT DISTINCT TYPE_RESS FROM ressource ORDER BY TYPE_RESS');
        return $stmt->fetchAll(PDO::FETCH_COLUMN);
    }
}


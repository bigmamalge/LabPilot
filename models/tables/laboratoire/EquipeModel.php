<?php

require_once __DIR__ . '/../../Model.php';

class EquipeModel extends Model
{
    public function getAllEquipes(): array
    {
        $pdo = $this->getPDO();
        $stmt = $pdo->query('SELECT * FROM equipe');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getEquipeById(int $id): ?array
    {
        $pdo = $this->getPDO();
        $stmt = $pdo->prepare('SELECT * FROM equipe WHERE ID_EQUIPE = :id');
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC) ?: null;
    }

    public function getEquipeByUserID(int $id): ?array
    {
        $pdo = $this->getPDO();
        $stmt = $pdo->prepare('SELECT equipe.ID_EQUIPE, equipe.NOM_EQUIPE, laboratoire.ID_LABO, laboratoire.NOM_LABO, laboratoire.SIGLE_LABO
                                FROM gestion
                                INNER JOIN experimentation ON experimentation.ID_EXP = gestion.ID_EXP
                                INNER JOIN equipe ON equipe.ID_EQUIPE = experimentation.ID_EQUIPE
                                INNER JOIN laboratoire ON laboratoire.ID_LABO = equipe.ID_LABO
                                WHERE gestion.ID_USER = :id
                                GROUP BY equipe.ID_EQUIPE, equipe.NOM_EQUIPE, laboratoire.ID_LABO, laboratoire.NOM_LABO, laboratoire.SIGLE_LABO
                                ORDER BY COUNT(*) DESC
                                LIMIT 1');
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC) ?: null;
    }

    public function getEquipeResponsableByUserID(int $id): ?array
    {
        $pdo = $this->getPDO();
        $stmt = $pdo->prepare('SELECT equipe.ID_EQUIPE, equipe.NOM_EQUIPE, laboratoire.ID_LABO, laboratoire.NOM_LABO, laboratoire.SIGLE_LABO
                                FROM equipe
                                INNER JOIN laboratoire ON laboratoire.ID_LABO = equipe.ID_LABO
                                WHERE equipe.ID_RESP = :id
                                LIMIT 1');
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC) ?: null;
    }

    public function getStatistiquesEquipesByUserID(int $id): array
    {
        $pdo = $this->getPDO();
        $stmt = $pdo->prepare('SELECT s.*,
                                      IF(s.nbInscrits > 0, ROUND(s.nbPresents * 100 / s.nbInscrits), NULL) AS TAUX
                                FROM (
                                    SELECT equipe.ID_EQUIPE, equipe.NOM_EQUIPE,
                                           (SELECT COUNT(*) FROM experimentation
                                             WHERE experimentation.ID_EQUIPE = equipe.ID_EQUIPE) AS nbExperimentations,
                                           (SELECT COUNT(*) FROM experimentation
                                             INNER JOIN creneau ON creneau.ID_EXP = experimentation.ID_EXP
                                             INNER JOIN participation ON participation.ID_CREN = creneau.ID_CREN
                                             WHERE experimentation.ID_EQUIPE = equipe.ID_EQUIPE AND participation.STATUT_INSC = "Accepte") AS nbInscrits,
                                           (SELECT COUNT(*) FROM experimentation
                                             INNER JOIN creneau ON creneau.ID_EXP = experimentation.ID_EXP
                                             INNER JOIN participation ON participation.ID_CREN = creneau.ID_CREN
                                             WHERE experimentation.ID_EQUIPE = equipe.ID_EQUIPE AND participation.STATUT_INSC = "Accepte"
                                               AND participation.PRESENCE_PAR = "Present") AS nbPresents
                                    FROM laboratoire
                                    INNER JOIN equipe ON equipe.ID_LABO = laboratoire.ID_LABO
                                    WHERE laboratoire.ID_DIR = :id
                                ) AS s
                                ORDER BY s.NOM_EQUIPE');
        $stmt->execute(['id' => $id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}


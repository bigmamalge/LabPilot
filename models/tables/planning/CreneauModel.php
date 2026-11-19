<?php

require_once __DIR__ . '/../../Model.php';

class CreneauModel extends Model
{
    public function getAllCreneaux(): array
    {
        $pdo = $this->getPDO();
        $stmt = $pdo->query('SELECT * FROM creneau');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getCreneauById(int $id): ?array
    {
        $pdo = $this->getPDO();
        $stmt = $pdo->prepare('SELECT * FROM creneau WHERE ID_CREN = :id');
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC) ?: null;
    }

    public function getProchainsCreneauxByUserID(int $id): array
    {
        $pdo = $this->getPDO();
        $stmt = $pdo->prepare('SELECT creneau.ID_CREN, creneau.DATE_CREN, creneau.HEURE_CREN, creneau.DUREE_CREN, creneau.NB_MAX_PAR,
                                      experimentation.TITRE_EXP,
                                      DATE_FORMAT(creneau.DATE_CREN, "%d") AS JOUR,
                                      ELT(MONTH(creneau.DATE_CREN), "janv.", "févr.", "mars", "avr.", "mai", "juin",
                                          "juil.", "août", "sept.", "oct.", "nov.", "déc.") AS MOIS,
                                      CONCAT(DATE_FORMAT(creneau.HEURE_CREN, "%Hh%i"), "-",
                                             DATE_FORMAT(ADDTIME(creneau.HEURE_CREN, SEC_TO_TIME(creneau.DUREE_CREN * 60)), "%Hh%i")) AS HORAIRE,
                                      CONCAT(DATE_FORMAT(creneau.DATE_CREN, "%d/%m"), " ", DATE_FORMAT(creneau.HEURE_CREN, "%Hh%i")) AS JOUR_HEURE_COURT,
                                      (SELECT COUNT(*) FROM participation
                                        WHERE participation.ID_CREN = creneau.ID_CREN AND participation.STATUT_INSC = "Accepte") AS nbInscrits,
                                      (SELECT ressource_labo.NOM_RESS_LABO
                                         FROM reservation
                                         INNER JOIN ressource_labo ON ressource_labo.ID_RESS_LABO = reservation.ID_RESS_LABO
                                        WHERE reservation.ID_CREN = creneau.ID_CREN AND ressource_labo.TYPE_RESS_LABO = "Salle"
                                        LIMIT 1) AS SALLE
                                FROM gestion
                                INNER JOIN experimentation ON experimentation.ID_EXP = gestion.ID_EXP
                                INNER JOIN creneau ON creneau.ID_EXP = experimentation.ID_EXP
                                WHERE gestion.ID_USER = :id AND TIMESTAMP(creneau.DATE_CREN, creneau.HEURE_CREN) >= NOW()
                                ORDER BY creneau.DATE_CREN, creneau.HEURE_CREN');
        $stmt->execute(['id' => $id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getTitreSemaine(int $decalage): string
    {
        $pdo = $this->getPDO();
        $stmt = $pdo->prepare('SELECT CONCAT("Semaine du ", DAY(s.LUNDI),
                                             IF(MONTH(s.LUNDI) <> MONTH(s.VENDREDI),
                                                CONCAT(" ", ELT(MONTH(s.LUNDI), "janv.", "févr.", "mars", "avr.", "mai", "juin",
                                                                "juil.", "août", "sept.", "oct.", "nov.", "déc.")), ""),
                                             " au ", DAY(s.VENDREDI), " ",
                                             ELT(MONTH(s.VENDREDI), "janv.", "févr.", "mars", "avr.", "mai", "juin",
                                                 "juil.", "août", "sept.", "oct.", "nov.", "déc."),
                                             " ", YEAR(s.VENDREDI)) AS TITRE
                                FROM (SELECT CURDATE() - INTERVAL WEEKDAY(CURDATE()) DAY + INTERVAL (:decalage * 7) DAY AS LUNDI,
                                             CURDATE() - INTERVAL WEEKDAY(CURDATE()) DAY + INTERVAL (:decalage2 * 7 + 4) DAY AS VENDREDI) AS s');
        $stmt->execute(['decalage' => $decalage, 'decalage2' => $decalage]);
        return $stmt->fetchColumn();
    }

    public function getJoursSemaine(int $decalage): array
    {
        $pdo = $this->getPDO();
        $stmt = $pdo->prepare('SELECT j.JOUR AS DATE_JOUR,
                                      ELT(DAYOFWEEK(j.JOUR), "DIM", "LUN", "MAR", "MER", "JEU", "VEN", "SAM") AS JOUR_COURT,
                                      DAY(j.JOUR) AS NUM_JOUR,
                                      j.JOUR = CURDATE() AS EST_AUJOURDHUI
                                FROM (SELECT CURDATE() - INTERVAL WEEKDAY(CURDATE()) DAY + INTERVAL (:decalage * 7 + n.N) DAY AS JOUR
                                        FROM (SELECT 0 AS N UNION ALL SELECT 1 UNION ALL SELECT 2 UNION ALL SELECT 3 UNION ALL SELECT 4) AS n) AS j
                                ORDER BY j.JOUR');
        $stmt->execute(['decalage' => $decalage]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getCreneauxSemaineByUserID(int $id, int $decalage): array
    {
        $pdo = $this->getPDO();
        $stmt = $pdo->prepare('SELECT c.*,
                                      CASE
                                          WHEN c.STATUT_CREN = "Propose" THEN "warn"
                                          WHEN c.nbInscrits >= c.NB_MAX_PAR THEN "ok"
                                          ELSE ""
                                      END AS CLASSE
                                FROM (
                                    SELECT creneau.ID_CREN, creneau.DATE_CREN, creneau.STATUT_CREN, creneau.NB_MAX_PAR,
                                           experimentation.TITRE_EXP,
                                           CONCAT(DATE_FORMAT(creneau.HEURE_CREN, "%Hh%i"), "-",
                                                  DATE_FORMAT(ADDTIME(creneau.HEURE_CREN, SEC_TO_TIME(creneau.DUREE_CREN * 60)), "%Hh%i")) AS HORAIRE,
                                           GREATEST(0, ROUND((TIME_TO_SEC(creneau.HEURE_CREN) / 60 - 480) * 52 / 60)) AS POSITION_HAUT,
                                           (SELECT COUNT(*) FROM participation
                                             WHERE participation.ID_CREN = creneau.ID_CREN AND participation.STATUT_INSC = "Accepte") AS nbInscrits,
                                           (SELECT ressource_labo.NOM_RESS_LABO
                                              FROM reservation
                                              INNER JOIN ressource_labo ON ressource_labo.ID_RESS_LABO = reservation.ID_RESS_LABO
                                             WHERE reservation.ID_CREN = creneau.ID_CREN AND ressource_labo.TYPE_RESS_LABO = "Salle"
                                             LIMIT 1) AS SALLE
                                    FROM gestion
                                    INNER JOIN experimentation ON experimentation.ID_EXP = gestion.ID_EXP
                                    INNER JOIN creneau ON creneau.ID_EXP = experimentation.ID_EXP
                                    WHERE gestion.ID_USER = :id
                                      AND creneau.DATE_CREN BETWEEN CURDATE() - INTERVAL WEEKDAY(CURDATE()) DAY + INTERVAL (:decalage * 7) DAY
                                                                AND CURDATE() - INTERVAL WEEKDAY(CURDATE()) DAY + INTERVAL (:decalage2 * 7 + 4) DAY
                                ) AS c
                                ORDER BY c.DATE_CREN, c.POSITION_HAUT');
        $stmt->execute(['id' => $id, 'decalage' => $decalage, 'decalage2' => $decalage]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getProchaineJourneeByUserID(int $id): array
    {
        $pdo = $this->getPDO();
        $stmt = $pdo->prepare('SELECT j.*,
                                      IF(j.NB_MAX_PAR > 0, ROUND(j.nbInscrits * 100 / j.NB_MAX_PAR), 0) AS POURCENT,
                                      j.nbInscrits >= j.NB_MAX_PAR AS COMPLET,
                                      j.NB_MAX_PAR - j.nbInscrits AS PLACES_RESTANTES
                                FROM (
                                    SELECT creneau.ID_CREN, creneau.NB_MAX_PAR, experimentation.TITRE_EXP,
                                           CONCAT(ELT(DAYOFWEEK(creneau.DATE_CREN), "Dimanche", "Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi"),
                                                  " ", DAY(creneau.DATE_CREN), " ",
                                                  ELT(MONTH(creneau.DATE_CREN), "janvier", "février", "mars", "avril", "mai", "juin",
                                                      "juillet", "août", "septembre", "octobre", "novembre", "décembre")) AS LIBELLE_JOUR,
                                           DATE_FORMAT(creneau.HEURE_CREN, "%kh%i") AS HEURE,
                                           creneau.HEURE_CREN,
                                           (SELECT COUNT(*) FROM participation
                                             WHERE participation.ID_CREN = creneau.ID_CREN AND participation.STATUT_INSC = "Accepte") AS nbInscrits,
                                           (SELECT ressource_labo.NOM_RESS_LABO
                                              FROM reservation
                                              INNER JOIN ressource_labo ON ressource_labo.ID_RESS_LABO = reservation.ID_RESS_LABO
                                             WHERE reservation.ID_CREN = creneau.ID_CREN AND ressource_labo.TYPE_RESS_LABO = "Salle"
                                             LIMIT 1) AS SALLE
                                    FROM gestion
                                    INNER JOIN experimentation ON experimentation.ID_EXP = gestion.ID_EXP
                                    INNER JOIN creneau ON creneau.ID_EXP = experimentation.ID_EXP
                                    WHERE gestion.ID_USER = :id
                                      AND creneau.DATE_CREN = (SELECT MIN(c2.DATE_CREN)
                                                                 FROM creneau AS c2
                                                                 INNER JOIN gestion AS g2 ON g2.ID_EXP = c2.ID_EXP
                                                                WHERE g2.ID_USER = :id2 AND c2.DATE_CREN >= CURDATE())
                                ) AS j
                                ORDER BY j.HEURE_CREN');
        $stmt->execute(['id' => $id, 'id2' => $id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getCreneauxSemaineEquipeByUserID(int $id, int $decalage): array
    {
        $pdo = $this->getPDO();
        $stmt = $pdo->prepare('SELECT c.*,
                                      CASE
                                          WHEN c.STATUT_CREN = "Propose" THEN "red"
                                          WHEN c.nbInscrits >= c.NB_MAX_PAR THEN "green"
                                          ELSE ""
                                      END AS CLASSE
                                FROM (
                                    SELECT creneau.ID_CREN, creneau.DATE_CREN, creneau.HEURE_CREN, creneau.STATUT_CREN, creneau.NB_MAX_PAR,
                                           experimentation.TITRE_EXP, equipe.NOM_EQUIPE,
                                           CONCAT(DATE_FORMAT(creneau.HEURE_CREN, "%kh%i"), "-",
                                                  DATE_FORMAT(ADDTIME(creneau.HEURE_CREN, SEC_TO_TIME(creneau.DUREE_CREN * 60)), "%kh%i")) AS HORAIRE,
                                           (SELECT COUNT(*) FROM participation
                                             WHERE participation.ID_CREN = creneau.ID_CREN AND participation.STATUT_INSC = "Accepte") AS nbInscrits,
                                           (SELECT ressource_labo.NOM_RESS_LABO
                                              FROM reservation
                                              INNER JOIN ressource_labo ON ressource_labo.ID_RESS_LABO = reservation.ID_RESS_LABO
                                             WHERE reservation.ID_CREN = creneau.ID_CREN AND ressource_labo.TYPE_RESS_LABO = "Salle"
                                             LIMIT 1) AS SALLE
                                    FROM equipe
                                    INNER JOIN experimentation ON experimentation.ID_EQUIPE = equipe.ID_EQUIPE
                                    INNER JOIN creneau ON creneau.ID_EXP = experimentation.ID_EXP
                                    WHERE equipe.ID_RESP = :id
                                      AND creneau.DATE_CREN BETWEEN CURDATE() - INTERVAL WEEKDAY(CURDATE()) DAY + INTERVAL (:decalage * 7) DAY
                                                                AND CURDATE() - INTERVAL WEEKDAY(CURDATE()) DAY + INTERVAL (:decalage2 * 7 + 4) DAY
                                ) AS c
                                ORDER BY c.DATE_CREN, c.HEURE_CREN');
        $stmt->execute(['id' => $id, 'decalage' => $decalage, 'decalage2' => $decalage]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getCreneauxSemaineLaboratoireByUserID(int $id, int $decalage, int $idEquipe): array
    {
        $pdo = $this->getPDO();
        $stmt = $pdo->prepare('SELECT c.*,
                                      CASE
                                          WHEN c.STATUT_CREN = "Propose" THEN "red"
                                          WHEN c.nbInscrits >= c.NB_MAX_PAR THEN "green"
                                          ELSE ""
                                      END AS CLASSE
                                FROM (
                                    SELECT creneau.ID_CREN, creneau.DATE_CREN, creneau.HEURE_CREN, creneau.STATUT_CREN, creneau.NB_MAX_PAR,
                                           experimentation.TITRE_EXP, equipe.NOM_EQUIPE,
                                           CONCAT(DATE_FORMAT(creneau.HEURE_CREN, "%kh%i"), "-",
                                                  DATE_FORMAT(ADDTIME(creneau.HEURE_CREN, SEC_TO_TIME(creneau.DUREE_CREN * 60)), "%kh%i")) AS HORAIRE,
                                           (SELECT COUNT(*) FROM participation
                                             WHERE participation.ID_CREN = creneau.ID_CREN AND participation.STATUT_INSC = "Accepte") AS nbInscrits,
                                           (SELECT ressource_labo.NOM_RESS_LABO
                                              FROM reservation
                                              INNER JOIN ressource_labo ON ressource_labo.ID_RESS_LABO = reservation.ID_RESS_LABO
                                             WHERE reservation.ID_CREN = creneau.ID_CREN AND ressource_labo.TYPE_RESS_LABO = "Salle"
                                             LIMIT 1) AS SALLE
                                    FROM laboratoire
                                    INNER JOIN equipe ON equipe.ID_LABO = laboratoire.ID_LABO
                                    INNER JOIN experimentation ON experimentation.ID_EQUIPE = equipe.ID_EQUIPE
                                    INNER JOIN creneau ON creneau.ID_EXP = experimentation.ID_EXP
                                    WHERE laboratoire.ID_DIR = :id
                                      AND (:idEquipe = 0 OR equipe.ID_EQUIPE = :idEquipe2)
                                      AND creneau.DATE_CREN BETWEEN CURDATE() - INTERVAL WEEKDAY(CURDATE()) DAY + INTERVAL (:decalage * 7) DAY
                                                                AND CURDATE() - INTERVAL WEEKDAY(CURDATE()) DAY + INTERVAL (:decalage2 * 7 + 4) DAY
                                ) AS c
                                ORDER BY c.DATE_CREN, c.HEURE_CREN');
        $stmt->execute(['id' => $id, 'idEquipe' => $idEquipe, 'idEquipe2' => $idEquipe, 'decalage' => $decalage, 'decalage2' => $decalage]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getProchainsCreneauxEquipeByUserID(int $id): array
    {
        $pdo = $this->getPDO();
        $stmt = $pdo->prepare('SELECT creneau.ID_CREN, creneau.NB_MAX_PAR, experimentation.TITRE_EXP,
                                      DATE_FORMAT(creneau.DATE_CREN, "%d") AS JOUR,
                                      ELT(MONTH(creneau.DATE_CREN), "janv.", "févr.", "mars", "avr.", "mai", "juin",
                                          "juil.", "août", "sept.", "oct.", "nov.", "déc.") AS MOIS,
                                      CONCAT(DATE_FORMAT(creneau.HEURE_CREN, "%Hh%i"), "-",
                                             DATE_FORMAT(ADDTIME(creneau.HEURE_CREN, SEC_TO_TIME(creneau.DUREE_CREN * 60)), "%Hh%i")) AS HORAIRE,
                                      (SELECT COUNT(*) FROM participation
                                        WHERE participation.ID_CREN = creneau.ID_CREN AND participation.STATUT_INSC = "Accepte") AS nbInscrits,
                                      (SELECT ressource_labo.NOM_RESS_LABO
                                         FROM reservation
                                         INNER JOIN ressource_labo ON ressource_labo.ID_RESS_LABO = reservation.ID_RESS_LABO
                                        WHERE reservation.ID_CREN = creneau.ID_CREN AND ressource_labo.TYPE_RESS_LABO = "Salle"
                                        LIMIT 1) AS SALLE
                                FROM equipe
                                INNER JOIN experimentation ON experimentation.ID_EQUIPE = equipe.ID_EQUIPE
                                INNER JOIN creneau ON creneau.ID_EXP = experimentation.ID_EXP
                                WHERE equipe.ID_RESP = :id AND TIMESTAMP(creneau.DATE_CREN, creneau.HEURE_CREN) >= NOW()
                                ORDER BY creneau.DATE_CREN, creneau.HEURE_CREN');
        $stmt->execute(['id' => $id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getCreneauxAValiderEquipeByUserID(int $id): array
    {
        $pdo = $this->getPDO();
        $stmt = $pdo->prepare('SELECT creneau.ID_CREN, experimentation.TITRE_EXP, equipe.NOM_EQUIPE,
                                      DATE_FORMAT(creneau.DATE_CREN, "%d/%m") AS DATE_COURTE,
                                      DATE_FORMAT(creneau.HEURE_CREN, "%Hh%i") AS HEURE
                                FROM equipe
                                INNER JOIN experimentation ON experimentation.ID_EQUIPE = equipe.ID_EQUIPE
                                INNER JOIN creneau ON creneau.ID_EXP = experimentation.ID_EXP
                                WHERE equipe.ID_RESP = :id AND creneau.STATUT_CREN = "Propose"
                                ORDER BY creneau.DATE_CREN, creneau.HEURE_CREN');
        $stmt->execute(['id' => $id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getCreneauxAValiderLaboratoireByUserID(int $id): array
    {
        $pdo = $this->getPDO();
        $stmt = $pdo->prepare('SELECT creneau.ID_CREN, experimentation.TITRE_EXP, equipe.NOM_EQUIPE,
                                      DATE_FORMAT(creneau.DATE_CREN, "%d/%m") AS DATE_COURTE,
                                      DATE_FORMAT(creneau.HEURE_CREN, "%Hh%i") AS HEURE
                                FROM laboratoire
                                INNER JOIN equipe ON equipe.ID_LABO = laboratoire.ID_LABO
                                INNER JOIN experimentation ON experimentation.ID_EQUIPE = equipe.ID_EQUIPE
                                INNER JOIN creneau ON creneau.ID_EXP = experimentation.ID_EXP
                                WHERE laboratoire.ID_DIR = :id AND creneau.STATUT_CREN = "Propose"
                                ORDER BY creneau.DATE_CREN, creneau.HEURE_CREN');
        $stmt->execute(['id' => $id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}


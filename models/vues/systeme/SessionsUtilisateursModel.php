<?php

require_once __DIR__ . '/../../Model.php';

class SessionsUtilisateursModel extends Model
{
    public function getAllSessionsUtilisateurs(): array
    {
        $pdo = $this->getPDO();
        $stmt = $pdo->query('SELECT * FROM sessionsutilisateurs');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getSessionsUtilisateursByIdUser(int $idUser): array
    {
        $pdo = $this->getPDO();
        $stmt = $pdo->prepare('SELECT * FROM sessionsutilisateurs WHERE ID_USER = :idUser');
        $stmt->execute(['idUser' => $idUser]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getDernieresSessionsByIdUser(int $idUser): array
    {
        $pdo = $this->getPDO();
        $stmt = $pdo->prepare('SELECT IP_ACT, DUREE_MINUTES,
                                      CONCAT(ELT(DAYOFWEEK(DATE_ACT_JOURN), "Dim.", "Lun.", "Mar.", "Mer.", "Jeu.", "Ven.", "Sam."),
                                             " ", DATE_FORMAT(DATE_ACT_JOURN, "%d/%m/%Y"),
                                             " de ", DATE_FORMAT(HEURE_ACT_JOURN, "%Hh%i"),
                                             " à ", DATE_FORMAT(HEURE_FIN_JOURN, "%Hh%i")) AS PERIODE_SESSION
                                FROM sessionsutilisateurs
                                WHERE ID_USER = :idUser
                                ORDER BY DATE_ACT_JOURN DESC, HEURE_ACT_JOURN DESC
                                LIMIT 3');
        $stmt->execute(['idUser' => $idUser]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}


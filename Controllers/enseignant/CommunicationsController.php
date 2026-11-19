<?php

require_once __DIR__ . '/../../models/tables/utilisateurs/UtilisateurModel.php';
require_once __DIR__ . '/../../models/vues/utilisateurs/RoleUtilisateurModel.php';
require_once __DIR__ . '/../../models/tables/experimentations/ExperimentationModel.php';
require_once __DIR__ . '/../../models/vues/experimentations/StatistiquesExperimentationModel.php';
require_once __DIR__ . '/../../models/tables/systeme/NotificationModel.php';

$userModel = new UtilisateurModel();

$user = $userModel->getUtilisateurById($_SESSION['id']);

$roleUserModel = new RoleUtilisateurModel();

$roleUser = $roleUserModel->getRoleUtilisateurByIdUser($_SESSION['id']);

$experimentationModel = new ExperimentationModel();

$experimentations = $experimentationModel->getExperimentationByUserID($_SESSION['id']);

$statistiquesModel = new StatistiquesExperimentationModel();

$statistiques = $statistiquesModel->getStatistiquesByUserID($_SESSION['id']);

$notificationModel = new NotificationModel();

$historique = array_slice($notificationModel->getHistoriqueEnvoisByUserID($_SESSION['id']), 0, 5);


$prenom = $user["PRENOM_USER"];
$nom = $user["NOM_USER"];
$nom_complet = $prenom . " " . $nom;
$initiales = $prenom[0] . $nom[0];
$poste = $roleUser[0]['LIB_ROLE'];
$fonction = $poste . " (LIUM)";
$espace = "espace " . $poste;

$nbInscrits = 0;
$nbEnAttente = 0;
if (count($experimentations) > 0) {
    foreach ($statistiques as $stat) {
        if ($stat['ID_EXP'] == $experimentations[0]['ID_EXP']) {
            $nbInscrits = $stat['NB_ACCEPTES'];
            $nbEnAttente = $stat['NB_EN_ATTENTE'];
        }
    }
}


require_once __DIR__ . '/../../Views/enseignant/communications.php';

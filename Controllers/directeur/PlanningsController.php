<?php

require_once __DIR__ . '/../../models/tables/utilisateurs/UtilisateurModel.php';
require_once __DIR__ . '/../../models/vues/utilisateurs/RoleUtilisateurModel.php';
require_once __DIR__ . '/../../models/tables/laboratoire/LaboratoireModel.php';
require_once __DIR__ . '/../../models/tables/laboratoire/EquipeModel.php';
require_once __DIR__ . '/../../models/tables/planning/CreneauModel.php';

$decalageSemaine = isset($_GET['Semaine']) ? (int) $_GET['Semaine'] : 0;
$idEquipe = isset($_GET['Equipe']) ? (int) $_GET['Equipe'] : 0;

$userModel = new UtilisateurModel();

$user = $userModel->getUtilisateurById($_SESSION['id']);

$roleUserModel = new RoleUtilisateurModel();

$roleUser = $roleUserModel->getRoleUtilisateurByIdUser($_SESSION['id']);

$laboratoireModel = new LaboratoireModel();

$laboratoire = $laboratoireModel->getLaboratoireByUserID($_SESSION['id']);

$equipeModel = new EquipeModel();

$equipes = $equipeModel->getStatistiquesEquipesByUserID($_SESSION['id']);

$creneauModel = new CreneauModel();

$titreSemaine = $creneauModel->getTitreSemaine($decalageSemaine);
$joursSemaine = $creneauModel->getJoursSemaine($decalageSemaine);
$creneauxSemaine = $creneauModel->getCreneauxSemaineLaboratoireByUserID($_SESSION['id'], $decalageSemaine, $idEquipe);


$prenom = $user["PRENOM_USER"];
$nom = $user["NOM_USER"];
$nom_complet = $prenom . " " . $nom;
$initiales = $prenom[0] . $nom[0];
$poste = $roleUser[0]['LIB_ROLE'];
$fonction = $poste;
$espace = "espace " . $poste;
$sigleLabo = $laboratoire['SIGLE_LABO'] ?? '';

foreach ($joursSemaine as $i => $jour) {
    $joursSemaine[$i]['creneaux'] = array_filter($creneauxSemaine, fn($creneau) => $creneau['DATE_CREN'] === $jour['DATE_JOUR']);
}


require_once __DIR__ . '/../../Views/directeur/plannings.php';

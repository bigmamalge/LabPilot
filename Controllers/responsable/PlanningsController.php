<?php

require_once __DIR__ . '/../../models/tables/utilisateurs/UtilisateurModel.php';
require_once __DIR__ . '/../../models/vues/utilisateurs/RoleUtilisateurModel.php';
require_once __DIR__ . '/../../models/tables/planning/CreneauModel.php';

$decalageSemaine = isset($_GET['Semaine']) ? (int) $_GET['Semaine'] : 0;

$userModel = new UtilisateurModel();

$user = $userModel->getUtilisateurById($_SESSION['id']);

$roleUserModel = new RoleUtilisateurModel();

$roleUser = $roleUserModel->getRoleUtilisateurByIdUser($_SESSION['id']);

$creneauModel = new CreneauModel();

$titreSemaine = $creneauModel->getTitreSemaine($decalageSemaine);
$joursSemaine = $creneauModel->getJoursSemaine($decalageSemaine);
$creneauxSemaine = $creneauModel->getCreneauxSemaineEquipeByUserID($_SESSION['id'], $decalageSemaine);
$prochainsCreneaux = array_slice($creneauModel->getProchainsCreneauxEquipeByUserID($_SESSION['id']), 0, 3);


$prenom = $user["PRENOM_USER"];
$nom = $user["NOM_USER"];
$nom_complet = $prenom . " " . $nom;
$initiales = $prenom[0] . $nom[0];
$poste = $roleUser[0]['LIB_ROLE'];
$fonction = $poste;
$espace = "espace " . $poste;

foreach ($joursSemaine as $i => $jour) {
    $joursSemaine[$i]['creneaux'] = array_filter($creneauxSemaine, fn($creneau) => $creneau['DATE_CREN'] === $jour['DATE_JOUR']);
}

foreach ($prochainsCreneaux as $i => $creneau) {
    $prochainsCreneaux[$i]['lieu'] = $creneau['SALLE'] ?? 'salle non définie';
    $prochainsCreneaux[$i]['inscrits'] = $creneau['nbInscrits'] . '/' . $creneau['NB_MAX_PAR'] . ' inscrit' . ($creneau['nbInscrits'] > 1 ? 's' : '');
}


require_once __DIR__ . '/../../Views/responsable/plannings.php';

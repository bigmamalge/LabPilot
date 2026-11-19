<?php

require_once __DIR__ . '/../../models/tables/utilisateurs/UtilisateurModel.php';
require_once __DIR__ . '/../../models/vues/utilisateurs/RoleUtilisateurModel.php';
require_once __DIR__ . '/../../models/tables/experimentations/ExperimentationModel.php';
require_once __DIR__ . '/../../models/tables/experimentations/RessourceModel.php';

$userModel = new UtilisateurModel();

$user = $userModel->getUtilisateurById($_SESSION['id']);

$roleUserModel = new RoleUtilisateurModel();

$roleUser = $roleUserModel->getRoleUtilisateurByIdUser($_SESSION['id']);

$experimentationModel = new ExperimentationModel();

$experimentations = $experimentationModel->getExperimentationByUserID($_SESSION['id']);

$ressourceModel = new RessourceModel();

$ressources = $ressourceModel->getRessourcesByUserID($_SESSION['id']);


$prenom = $user["PRENOM_USER"];
$nom = $user["NOM_USER"];
$nom_complet = $prenom . " " . $nom;
$initiales = $prenom[0] . $nom[0];
$poste = $roleUser[0]['LIB_ROLE'];
$fonction = $poste;

foreach ($experimentations as $i => $exp) {
    if ($exp['nbRessources'] == 0) {
        $experimentations[$i]['libelleRessources'] = 'Aucune';
    } else {
        $experimentations[$i]['libelleRessources'] = $exp['nbRessources'] . ' document' . ($exp['nbRessources'] > 1 ? 's' : '');
    }
}

$experimentationDetail = $experimentations[0] ?? null;
if (isset($_GET['Exp'])) {
    foreach ($experimentations as $exp) {
        if ($exp['ID_EXP'] == (int) $_GET['Exp']) {
            $experimentationDetail = $exp;
        }
    }
}

$ressourcesDetail = [];
if ($experimentationDetail !== null) {
    $ressourcesDetail = array_filter($ressources, fn($ressource) => $ressource['ID_EXP'] == $experimentationDetail['ID_EXP']);
}


require_once __DIR__ . '/../../Views/gestionnaire/Experimentations.php';

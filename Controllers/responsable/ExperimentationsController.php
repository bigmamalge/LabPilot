<?php

require_once __DIR__ . '/../../models/tables/utilisateurs/UtilisateurModel.php';
require_once __DIR__ . '/../../models/vues/utilisateurs/RoleUtilisateurModel.php';
require_once __DIR__ . '/../../models/tables/experimentations/ExperimentationModel.php';

$userModel = new UtilisateurModel();

$user = $userModel->getUtilisateurById($_SESSION['id']);

$roleUserModel = new RoleUtilisateurModel();

$roleUser = $roleUserModel->getRoleUtilisateurByIdUser($_SESSION['id']);

$experimentationModel = new ExperimentationModel();

$experimentations = $experimentationModel->getExperimentationsEquipeByUserID($_SESSION['id']);


$prenom = $user["PRENOM_USER"];
$nom = $user["NOM_USER"];
$nom_complet = $prenom . " " . $nom;
$initiales = $prenom[0] . $nom[0];
$poste = $roleUser[0]['LIB_ROLE'];
$fonction = $poste;
$espace = "espace " . $poste;

foreach ($experimentations as $i => $exp) {
    $experimentations[$i]['chercheur'] = $exp['CHERCHEUR'] ?? 'Non attribué';
}

$types = array_unique(array_filter(array_column($experimentations, 'NOM_MODELE')));
$chercheurs = array_unique(array_column($experimentations, 'chercheur'));

$experimentationDetail = $experimentations[0] ?? null;
if (isset($_GET['Exp'])) {
    foreach ($experimentations as $exp) {
        if ($exp['ID_EXP'] == (int) $_GET['Exp']) {
            $experimentationDetail = $exp;
        }
    }
}

if ($experimentationDetail !== null) {
    if ($experimentationDetail['nbParticipants'] > 0) {
        $profils = $experimentationDetail['POURCENT_FEMMES'] . ' % femmes, ' . $experimentationDetail['POURCENT_HOMMES'] . ' % hommes';
    } else {
        $profils = 'Aucun participant';
    }
    $conforme = $experimentationDetail['nbConsentements'] == $experimentationDetail['nbParticipants'];
}


require_once __DIR__ . '/../../Views/responsable/experimentations.php';

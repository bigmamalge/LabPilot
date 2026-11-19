<?php

require_once __DIR__ . '/../../models/tables/utilisateurs/UtilisateurModel.php';
require_once __DIR__ . '/../../models/vues/utilisateurs/RoleUtilisateurModel.php';
require_once __DIR__ . '/../../models/tables/laboratoire/LaboratoireModel.php';
require_once __DIR__ . '/../../models/tables/experimentations/ExperimentationModel.php';

$userModel = new UtilisateurModel();

$user = $userModel->getUtilisateurById($_SESSION['id']);

$roleUserModel = new RoleUtilisateurModel();

$roleUser = $roleUserModel->getRoleUtilisateurByIdUser($_SESSION['id']);

$laboratoireModel = new LaboratoireModel();

$laboratoire = $laboratoireModel->getLaboratoireByUserID($_SESSION['id']);

$experimentationModel = new ExperimentationModel();

$experimentations = $experimentationModel->getExperimentationsLaboratoireByUserID($_SESSION['id']);


$prenom = $user["PRENOM_USER"];
$nom = $user["NOM_USER"];
$nom_complet = $prenom . " " . $nom;
$initiales = $prenom[0] . $nom[0];
$poste = $roleUser[0]['LIB_ROLE'];
$fonction = $poste;
$espace = "espace " . $poste;
$sigleLabo = $laboratoire['SIGLE_LABO'] ?? '';

foreach ($experimentations as $i => $exp) {
    $experimentations[$i]['chercheur'] = $exp['CHERCHEUR'] ?? 'Non attribué';
}

$types = array_unique(array_filter(array_column($experimentations, 'NOM_MODELE')));
$chercheurs = array_unique(array_column($experimentations, 'chercheur'));
$etats = array_unique(array_column($experimentations, 'LIBELLE_STATUT'));

$experimentationDetail = $experimentations[0] ?? null;
if (isset($_GET['Exp'])) {
    foreach ($experimentations as $exp) {
        if ($exp['ID_EXP'] == (int) $_GET['Exp']) {
            $experimentationDetail = $exp;
        }
    }
}

if ($experimentationDetail !== null) {
    $conforme = $experimentationDetail['nbConsentements'] == $experimentationDetail['nbParticipants'];
    $anonymisation = $experimentationDetail['ARCHIVE_EXP'] == 1 ? 'Effectuée' : 'Prévue à l\'archivage';
}


require_once __DIR__ . '/../../Views/directeur/experimentations.php';

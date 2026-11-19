<?php

require_once __DIR__ . '/../../models/tables/utilisateurs/UtilisateurModel.php';
require_once __DIR__ . '/../../models/vues/utilisateurs/RoleUtilisateurModel.php';
require_once __DIR__ . '/../../models/tables/systeme/ParametreModel.php';
require_once __DIR__ . '/../../models/tables/laboratoire/LaboratoireModel.php';
require_once __DIR__ . '/../../models/tables/experimentations/RetributionModel.php';
require_once __DIR__ . '/../../models/tables/systeme/IntegrationModel.php';

$userModel = new UtilisateurModel();

$user = $userModel->getUtilisateurById($_SESSION['id']);

$roleUserModel = new RoleUtilisateurModel();

$roleUser = $roleUserModel->getRoleUtilisateurByIdUser($_SESSION['id']);

$parametreModel = new ParametreModel();

$parametres = $parametreModel->getAllParametres();

$laboratoireModel = new LaboratoireModel();

$laboratoires = $laboratoireModel->getAllLaboratoires();

$retributionModel = new RetributionModel();

$retributions = $retributionModel->getAllRetributions();

$integrationModel = new IntegrationModel();

$integrations = $integrationModel->getAllIntegrations();


$prenom = $user["PRENOM_USER"];
$nom = $user["NOM_USER"];
$nom_complet = $prenom . " " . $nom;
$initiales = $prenom[0] . $nom[0];
$poste = $roleUser[0]['LIB_ROLE'];
$fonction = $poste;
$espace = "espace " . $poste;

$valeursParametres = array_column($parametres, 'VAL_PARAM', 'CLE_PARAM');
$nomApplication = $valeursParametres['NOM_APPLICATION'] ?? 'LabPilot';
$themeDefaut = $valeursParametres['THEME_DEFAUT'] ?? 'Clair';
$langueDefaut = $valeursParametres['LANGUE_DEFAUT'] ?? 'FR';
$validationInscription = ($valeursParametres['VALIDATION_INSCRIPTION_DEFAUT'] ?? '1') === '1';


require_once __DIR__ . '/../../Views/administrateur/parametrage.php';

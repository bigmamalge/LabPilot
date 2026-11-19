<?php

require_once __DIR__ . '/../../models/tables/utilisateurs/UtilisateurModel.php';
require_once __DIR__ . '/../../models/vues/utilisateurs/RoleUtilisateurModel.php';
require_once __DIR__ . '/../../models/tables/laboratoire/EquipeModel.php';
require_once __DIR__ . '/../../models/tables/laboratoire/LaboratoireModel.php';
require_once __DIR__ . '/../../models/tables/experimentations/ModeleModel.php';
require_once __DIR__ . '/../../models/tables/systeme/IntegrationModel.php';
require_once __DIR__ . '/../../models/tables/systeme/ParametreModel.php';
require_once __DIR__ . '/../../models/vues/systeme/SessionsUtilisateursModel.php';

$userModel = new UtilisateurModel();

$user = $userModel->getUtilisateurById($_SESSION['id']);

$roleUserModel = new RoleUtilisateurModel();

$roleUser = $roleUserModel->getRoleUtilisateurByIdUser($_SESSION['id']);

$equipeModel = new EquipeModel();

$equipes = $equipeModel->getAllEquipes();
$equipeUtilisateur = $equipeModel->getEquipeByUserID($_SESSION['id']);

$laboratoireModel = new LaboratoireModel();

$laboratoires = $laboratoireModel->getAllLaboratoires();

$modeleModel = new ModeleModel();

$mesModeles = $modeleModel->getModelesByUserID($_SESSION['id']);

$integrationModel = new IntegrationModel();

$integrations = $integrationModel->getAllIntegrations();

$parametreModel = new ParametreModel();

$dureeSession = $parametreModel->getParametreById('DUREE_SESSION_MINUTES');
$dureeConservation = $parametreModel->getParametreById('DUREE_CONSERVATION_MOIS');

$sessionsModel = new SessionsUtilisateursModel();

$sessions = $sessionsModel->getDernieresSessionsByIdUser($_SESSION['id']);


$prenom = $user["PRENOM_USER"];
$nom = $user["NOM_USER"];
$nom_complet = $prenom . " " . $nom;
$initiales = $prenom[0] . $nom[0];
$poste = $roleUser[0]['LIB_ROLE'];
$fonction = $poste . " (LIUM)";
$espace = "espace " . $poste;
$email = $user["MAIL_USER"];

$langueUtilisateur = $user["LANG_USER"];
$themeSombre = $user["THEME_USER"] === 'Sombre';
$consentement = (bool) $user["CONSENT_USER"];

$idLaboUtilisateur = $equipeUtilisateur['ID_LABO'] ?? null;
$idEquipeUtilisateur = $equipeUtilisateur['ID_EQUIPE'] ?? null;

$minutesDeconnexion = $dureeSession !== null ? (int) $dureeSession['VAL_PARAM'] : 30;
$moisConservation = $dureeConservation !== null ? (int) $dureeConservation['VAL_PARAM'] : 24;


require_once __DIR__ . '/../../Views/enseignant/parametres.php';

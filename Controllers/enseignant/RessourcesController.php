<?php

require_once __DIR__ . '/../../models/tables/utilisateurs/UtilisateurModel.php';
require_once __DIR__ . '/../../models/vues/utilisateurs/RoleUtilisateurModel.php';
require_once __DIR__ . '/../../models/tables/experimentations/ExperimentationModel.php';
require_once __DIR__ . '/../../models/tables/experimentations/RessourceModel.php';
require_once __DIR__ . '/../../models/tables/laboratoire/RessourceLaboModel.php';

$onglet = ($_GET['Onglet'] ?? '') === 'salles' ? 'salles' : 'documents';

$userModel = new UtilisateurModel();

$user = $userModel->getUtilisateurById($_SESSION['id']);

$roleUserModel = new RoleUtilisateurModel();

$roleUser = $roleUserModel->getRoleUtilisateurByIdUser($_SESSION['id']);

$experimentationModel = new ExperimentationModel();

$experimentations = $experimentationModel->getExperimentationByUserID($_SESSION['id']);

$ressourceModel = new RessourceModel();

$documents = $ressourceModel->getRessourcesByUserID($_SESSION['id']);
$typesDocuments = $ressourceModel->getTypesRessources();

$ressourceLaboModel = new RessourceLaboModel();

$ressourcesLabo = $ressourceLaboModel->getRessourcesLaboAvecReservationsByUserID($_SESSION['id']);


$prenom = $user["PRENOM_USER"];
$nom = $user["NOM_USER"];
$nom_complet = $prenom . " " . $nom;
$initiales = $prenom[0] . $nom[0];
$poste = $roleUser[0]['LIB_ROLE'];
$fonction = $poste . " (LIUM)";
$espace = "espace " . $poste;

$nbExperimentationsAvecDocuments = count(array_unique(array_column($documents, 'ID_EXP')));

$salles = array_filter($ressourcesLabo, fn($ressource) => $ressource['TYPE_RESS_LABO'] === 'Salle');
$equipements = array_filter($ressourcesLabo, fn($ressource) => $ressource['TYPE_RESS_LABO'] !== 'Salle');

$nbSallesDisponibles = count(array_filter($salles, fn($salle) => $salle['ETAT_RESS_LABO'] === 'Disponible'));
$nbSallesLibresAujourdhui = count(array_filter($salles, fn($salle) => $salle['nbReservationsAujourdhui'] == 0));
$nbEquipementsReserves = count(array_filter($equipements, fn($equipement) => $equipement['nbReservationsAVenir'] > 0));
$nbMesReservations = array_sum(array_column($ressourcesLabo, 'nbMesReservationsAVenir'));


require_once __DIR__ . '/../../Views/enseignant/ressources.php';

<?php

require_once __DIR__ . '/../../models/tables/utilisateurs/UtilisateurModel.php';
require_once __DIR__ . '/../../models/vues/utilisateurs/RoleUtilisateurModel.php';
require_once __DIR__ . '/../../models/tables/laboratoire/LaboratoireModel.php';
require_once __DIR__ . '/../../models/tables/laboratoire/RessourceLaboModel.php';

$userModel = new UtilisateurModel();

$user = $userModel->getUtilisateurById($_SESSION['id']);

$roleUserModel = new RoleUtilisateurModel();

$roleUser = $roleUserModel->getRoleUtilisateurByIdUser($_SESSION['id']);

$laboratoireModel = new LaboratoireModel();

$laboratoire = $laboratoireModel->getLaboratoireByUserID($_SESSION['id']);

$ressourceLaboModel = new RessourceLaboModel();

$ressources = $ressourceLaboModel->getRessourcesLaboratoireByUserID($_SESSION['id']);


$prenom = $user["PRENOM_USER"];
$nom = $user["NOM_USER"];
$nom_complet = $prenom . " " . $nom;
$initiales = $prenom[0] . $nom[0];
$poste = $roleUser[0]['LIB_ROLE'];
$fonction = $poste;
$espace = "espace " . $poste;
$sigleLabo = $laboratoire['SIGLE_LABO'] ?? '';

$salles = array_filter($ressources, fn($ressource) => $ressource['TYPE_RESS_LABO'] === 'Salle');
$equipements = array_filter($ressources, fn($ressource) => $ressource['TYPE_RESS_LABO'] !== 'Salle');

$nbSallesDisponibles = count(array_filter($salles, fn($salle) => $salle['CLASSE_ETAT'] === 'ok'));
$nbEquipementsReserves = count(array_filter($equipements, fn($equipement) => $equipement['nbReservationsAVenir'] > 0));
$tauxUtilisationMoyen = count($ressources) > 0 ? round(array_sum(array_column($ressources, 'TAUX')) / count($ressources)) : 0;

$icones = [
    'Salle' => '<path d="M20 10c0 6-8 12-8 12S4 16 4 10a8 8 0 0 1 16 0z"/><circle cx="12" cy="10" r="3"/>',
    'Equipement' => '<rect x="2" y="3" width="20" height="14" rx="2"/><path d="M8 21h8M12 17v4"/>',
    'Materiel' => '<path d="M2 12s3.5-7 10-7 10 7 10 7-3.5 7-10 7S2 12 2 12z"/><circle cx="12" cy="12" r="3"/>',
];

foreach ($ressources as $i => $ressource) {
    $ressources[$i]['icone'] = $icones[$ressource['TYPE_RESS_LABO']] ?? $icones['Materiel'];
    $ressources[$i]['detail'] = $ressource['TYPE_RESS_LABO'] . ' · ' . $ressource['nbReservationsAVenir'] . ' réservation' . ($ressource['nbReservationsAVenir'] > 1 ? 's' : '') . ' à venir';
    if ($ressource['TAUX'] >= 70) {
        $ressources[$i]['couleur'] = 'var(--primary)';
    } elseif ($ressource['TAUX'] >= 30) {
        $ressources[$i]['couleur'] = '#6d3fd1';
    } else {
        $ressources[$i]['couleur'] = 'var(--succes-text)';
    }
}


require_once __DIR__ . '/../../Views/directeur/ressources.php';

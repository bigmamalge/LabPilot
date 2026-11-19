<?php

require_once __DIR__ . '/../../models/tables/utilisateurs/UtilisateurModel.php';
require_once __DIR__ . '/../../models/vues/utilisateurs/RoleUtilisateurModel.php';
require_once __DIR__ . '/../../models/vues/utilisateurs/NombreUtilisateursModel.php';
require_once __DIR__ . '/../../models/tables/utilisateurs/RoleModel.php';
require_once __DIR__ . '/../../models/tables/systeme/JournalModel.php';
require_once __DIR__ . '/../../models/tables/experimentations/ModeleModel.php';

$userModel = new UtilisateurModel();

$user = $userModel->getUtilisateurById($_SESSION['id']);

$roleUserModel = new RoleUtilisateurModel();

$roleUser = $roleUserModel->getRoleUtilisateurByIdUser($_SESSION['id']);

$nombreUtilisateursModel = new NombreUtilisateursModel();

$nombreUtilisateurs = $nombreUtilisateursModel->getAllNombreUtilisateurs();

$roleModel = new RoleModel();

$roles = $roleModel->getAllRoles();

$journalModel = new JournalModel();

$journaux = $journalModel->getJournauxDetailles();

$modeleModel = new ModeleModel();

$modeles = $modeleModel->getModelesAvecUtilisation();


$prenom = $user["PRENOM_USER"];
$nom = $user["NOM_USER"];
$nom_complet = $prenom . " " . $nom;
$initiales = $prenom[0] . $nom[0];
$poste = $roleUser[0]['LIB_ROLE'];
$fonction = $poste;
$espace = "espace " . $poste;

$nbUtilisateurs = $nombreUtilisateurs[0]['NB_TOTAL_UTILISATEURS'] ?? 0;
$nbRoles = count($roles) . ' rôle' . (count($roles) > 1 ? 's' : '');

$erreurs = array_values(array_filter($journaux, fn($journal) => $journal['ERREUR_JOURN'] == 1));
$nbErreurs = count($erreurs);
$derniereActivite = $journaux[0]['DATE_JOURNAL'] ?? 'Aucune';
$nbModeles = count($modeles);

$journauxRecents = array_slice($journaux, 0, 4);

$notifications = [];
foreach (array_slice($erreurs, 0, 2) as $erreur) {
    $notifications[] = [
        'classe' => 'warn',
        'icone' => '<svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="#d4451b" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M10.3 3.9 1.8 18a2 2 0 0 0 1.7 3h17a2 2 0 0 0 1.7-3L13.7 3.9a2 2 0 0 0-3.4 0z"/><path d="M12 9v4M12 17h.01"/></svg>',
        'titre' => 'Échec de connexion',
        'texte' => $erreur['DESC_ACT'] . ' depuis ' . $erreur['IP_ACT'] . ' (' . $erreur['DATE_HEURE'] . ')',
    ];
}
foreach (array_slice(array_filter($journaux, fn($journal) => $journal['ERREUR_JOURN'] == 0), 0, 1) as $journal) {
    $notifications[] = [
        'classe' => 'ok',
        'icone' => '<svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="#1a8a44" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>',
        'titre' => 'Dernière activité',
        'texte' => $journal['ACTEUR'] . ' : ' . $journal['DESC_ACT'] . ' (' . $journal['DATE_HEURE'] . ')',
    ];
}


require_once __DIR__ . '/../../Views/administrateur/TableauDeBord.php';

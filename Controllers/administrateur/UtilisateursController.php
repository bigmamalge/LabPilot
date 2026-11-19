<?php

require_once __DIR__ . '/../../models/tables/utilisateurs/UtilisateurModel.php';
require_once __DIR__ . '/../../models/vues/utilisateurs/RoleUtilisateurModel.php';
require_once __DIR__ . '/../../models/tables/utilisateurs/RoleModel.php';
require_once __DIR__ . '/../../models/vues/utilisateurs/PermissionsRoleModel.php';
require_once __DIR__ . '/../../models/tables/laboratoire/EquipeModel.php';

$userModel = new UtilisateurModel();

$user = $userModel->getUtilisateurById($_SESSION['id']);
$utilisateurs = $userModel->getUtilisateursAvecRole();

$roleUserModel = new RoleUtilisateurModel();

$roleUser = $roleUserModel->getRoleUtilisateurByIdUser($_SESSION['id']);

$roleModel = new RoleModel();

$roles = $roleModel->getAllRoles();

$permissionsRoleModel = new PermissionsRoleModel();

$permissionsRoles = $permissionsRoleModel->getAllPermissionsRole();

$equipeModel = new EquipeModel();

$equipes = $equipeModel->getAllEquipes();


$prenom = $user["PRENOM_USER"];
$nom = $user["NOM_USER"];
$nom_complet = $prenom . " " . $nom;
$initiales = $prenom[0] . $nom[0];
$poste = $roleUser[0]['LIB_ROLE'];
$fonction = $poste;
$espace = "espace " . $poste;

$nbComptes = count($utilisateurs) . ' compte' . (count($utilisateurs) > 1 ? 's' : '');
$exempleEquipe = count($equipes) > 0 ? 'Ex. ' . $equipes[0]['NOM_EQUIPE'] : 'Ex. Nom de l\'équipe';

foreach ($utilisateurs as $i => $utilisateur) {
    $utilisateurs[$i]['nomComplet'] = $utilisateur['PRENOM_USER'] . ' ' . $utilisateur['NOM_USER'];
    $utilisateurs[$i]['initiales'] = mb_strtoupper(mb_substr($utilisateur['PRENOM_USER'], 0, 1) . mb_substr($utilisateur['NOM_USER'], 0, 1));
    $utilisateurs[$i]['actif'] = $utilisateur['IDENT_SSO'] !== null;
    if ($utilisateur['ID_USER'] == $_SESSION['id']) {
        $utilisateurs[$i]['activite'] = 'En ligne';
    } else {
        $utilisateurs[$i]['activite'] = $utilisateur['DERNIERE_ACTIVITE'] ?? 'Jamais';
    }
}

foreach ($roles as $i => $role) {
    $nbPermissions = count(array_filter($permissionsRoles, fn($permission) => $permission['ID_ROLE'] == $role['ID_ROLE']));
    $roles[$i]['permissions'] = $nbPermissions . ' permission' . ($nbPermissions > 1 ? 's' : '');
}


require_once __DIR__ . '/../../Views/administrateur/utilisateurs.php';

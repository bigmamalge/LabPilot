<?php
require_once __DIR__ . '/../models/tables/utilisateurs/UtilisateurModel.php';

if (isset($_POST["identifiantsso"]) && isset($_POST["password"])) {

    $UtilisateurModel = new UtilisateurModel();

    $utilisateur = $UtilisateurModel->getUtilisateurByIdSso($_POST["identifiantsso"]);

    if ($utilisateur && password_verify($_POST["password"], $utilisateur["MDP_USER"])) {
        $_SESSION["id"] = $utilisateur["ID_USER"];


        echo "Connexion réussie !";
        $roleID = $utilisateur["ID_ROLE"];
        header("Location: index.php?Role=" . $roleID . "&Page=1");

    } else {
        echo "Identifiant ou mot de passe incorrect.";
    }

}
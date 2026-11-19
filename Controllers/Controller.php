<?php
require_once __DIR__ . '/../models/tables/utilisateurs/UtilisateurModel.php';

if (isset($_GET["Controlleur"]) && $_GET["Controlleur"] === "theme") {
    if (isset($_SESSION["id"]) && isset($_POST["theme"]) && in_array($_POST["theme"], ["Clair", "Sombre"], true)) {
        (new UtilisateurModel())->setThemeUtilisateur((int) $_SESSION["id"], $_POST["theme"]);
        http_response_code(204);
    } else {
        http_response_code(400);
    }
    exit;
}

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
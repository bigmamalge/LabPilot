<?php

require_once __DIR__ . '/../models/tables/utilisateurs/UtilisateurModel.php';

$themeModel = new UtilisateurModel();

// Enregistrement du thème choisi (index.php?Controlleur=theme), puis retour à la page d'origine
if (isset($_GET["Controlleur"]) && $_GET["Controlleur"] === "theme") {
    if (isset($_SESSION["id"]) && isset($_POST["theme"]) && in_array($_POST["theme"], ["Clair", "Sombre"], true)) {
        $themeModel->setThemeUtilisateur((int) $_SESSION["id"], $_POST["theme"]);
    }

    // Uniquement une URL interne de l'application
    $retour = $_POST["retour"] ?? "";
    if (!preg_match('/^index\.php\?[A-Za-z0-9=&_%.-]*$/', $retour)) {
        $retour = "index.php";
    }
    header("Location: " . $retour);
    exit;
}

// Thème de l'utilisateur connecté, utilisé par toutes les vues
$themeUser = $themeModel->getUtilisateurById((int) $_SESSION["id"]);
$themeSombreGlobal = $themeUser !== null && $themeUser["THEME_USER"] === "Sombre";
$themeRetour = "index.php?" . ($_SERVER["QUERY_STRING"] ?? "");

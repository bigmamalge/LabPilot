<?php

require_once __DIR__ . '/../models/tables/utilisateurs/UtilisateurModel.php';

$themeModel = new UtilisateurModel();

if (isset($_GET["Controlleur"]) && $_GET["Controlleur"] === "theme") {
    if (isset($_POST["theme"]) && in_array($_POST["theme"], ["Clair", "Sombre"], true)) {
        $themeModel->setThemeUtilisateur($_SESSION["id"], $_POST["theme"]);
    }
    if (isset($_POST["langue"]) && in_array($_POST["langue"], ["FR", "EN"], true)) {
        $themeModel->setLangueUtilisateur($_SESSION["id"], $_POST["langue"]);
    }

    $retour = $_POST["retour"] ?? "";
    if (!preg_match('/^index\.php\?[A-Za-z0-9=&_%.-]*$/', $retour)) {
        $retour = "index.php";
    }
    header("Location: " . $retour);
    exit;
}

$themeUser = $themeModel->getUtilisateurById($_SESSION["id"]);

$theme = $themeUser["THEME_USER"] ?? "Clair";
$themeInverse = $theme === "Sombre" ? "Clair" : "Sombre";
$langue = $themeUser["LANG_USER"] ?? "FR";
$libelleLangue = $langue === "EN" ? "EN - English" : "FR - Français";
$themeRetour = "index.php?" . ($_SERVER["QUERY_STRING"] ?? "");

<?php
  $espace = "Espace Administrateur";
  $prenom = "Anna";
  $nom = "Lise";
  $nom_complet = $prenom . " " . $nom;
  $initiales = "AL";
  $fonction = "Administrateur";
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Paramétrage de l'application - LabPilot</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;900&amp;display=swap" rel="stylesheet">
  <link rel="stylesheet" href="styles.css">
  <link rel="stylesheet" href="pages.css">
  <link rel="stylesheet" href="administrateur.css">
</head>
<body>
  <input type="checkbox" id="theme-toggle" class="theme-check" aria-label="Mode sombre">
  <div class="layout">
    <aside class="sidebar">
      <a class="logo" href="index.php"><img src="../Public/assets/Common/Logo.png" alt="LabPilot"></a>
      <div class="role"><?php echo $espace; ?></div>
      <nav aria-label="Navigation principale">
        <a href="index.php"><img src="../Public/assets/Common/IconeTableauDeBord.svg" alt="" width="20" height="20"> Tableau de bord</a>
        <a href="utilisateurs.php"><img src="../Public/assets/Common/IconeParticipants.svg" alt="" width="20" height="20"> Gestion des utilisateurs</a>
        <a href="parametrage.php" aria-current="page"><img src="../Public/assets/Common/IconeParametres.svg" alt="" width="20" height="20"> Paramétrage de l'application</a>
        <a href="securite.php"><img src="../Public/assets/Administrateur/IconeSecurite.svg" alt="" width="20" height="20"> Sécurité et maintenance</a>
        <a href="modeles.php"><img src="../Public/assets/Common/IconeRessources.svg" alt="" width="20" height="20"> Gestion des modèles</a>
      </nav>
      <div class="spacer"></div>
      <hr>
      <div class="help">Rappel : <b>aucune valeur est en dur</b> toute la configuration passe par cette page.</div>
    </aside>

    <div class="main">
      <header class="topbar">
        <label class="search">
          <img src="../Public/assets/Common/RechercheIco.svg" alt="">
          <input type="search" placeholder="Rechercher une expérimentation..." aria-label="Rechercher">
        </label>
        <div class="grow"></div>
        <label class="icon-btn" for="theme-toggle" aria-label="Basculer le thème jour/nuit"><img src="../Public/assets/Common/Trace.svg" alt=""></label>
        <button class="lang" type="button">FR - Français <img src="../Public/assets/Common/FlecheBas.svg" alt=""></button>
        <button class="icon-btn bell" type="button" aria-label="Notifications"><img src="../Public/assets/Common/Notifications.svg" alt=""></button>
        <div class="profile">
          <span class="avatar"><?php echo $initiales; ?></span>
          <span class="who"><b><?php echo $nom_complet; ?></b><span><?php echo $fonction; ?></span></span>
        </div>
      </header>

      <main class="content">
        <div class="page-head a-head">
          <div>
            <p class="eyebrow"><?php echo $espace; ?></p>
            <h1>Paramétrage de l'application</h1>
            <p class="lead">Configuration générale, règles d'inscription, rétributions et intégrations externes.</p>
          </div>
          <div class="actions"></div>
        </div>

        <div class="a-set">
          <nav class="card set-nav" aria-label="Paramètres"><a href="#" aria-current="true"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#d4451b" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="12" r="4"/><path d="M12 2v2M12 20v2M4.9 4.9l1.4 1.4M17.7 17.7l1.4 1.4M2 12h2M20 12h2M4.9 19.1l1.4-1.4M17.7 6.3l1.4-1.4"/></svg>Général</a><a href="#"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#52577a" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>Base de données</a><a href="#"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#52577a" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="12" r="10"/><path d="m8 12 3 3 5-6"/></svg>Inscriptions &amp; rétributions</a><a href="#"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#52577a" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6M15 3h6v6M10 14 21 3"/></svg>Intégrations externes</a><a href="#"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#52577a" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M21 12.8A9 9 0 1 1 11.2 3a7 7 0 0 0 9.8 9.8z"/></svg>Apparence</a></nav>
          <section class="card pad">
            <h2 class="big sm">Général</h2>
            <form class="form small tinted" onsubmit="return false">
              <label>Nom de l'application<span class="input"><input value="Lab Pilot"></span></label>
              <label>URL de l'application<span class="input"><input value="https://labpilot.univ-lemans.fr"></span></label>
              <label>Nom du laboratoire<span class="input"><input value="LIUM — Laboratoire d'Informatique de l'Université du Mans"></span></label>
              <div class="save-row"><button class="btn-lg primary fit" type="submit">Enregistrer</button></div>
            </form>
          </section>
        </div>
        <div class="footer"><?php echo $espace; ?> - Le Mans Université</div>
      </main>
    </div>
  </div>
</body>
</html>

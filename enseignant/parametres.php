<?php
  $espace = "Espace enseignant-chercheur";
  $prenom = "John";
  $nom = "Doeuf";
  $nom_complet = $prenom . " " . $nom;
  $initiales = "JD";
  $fonction = "Enseignant-chercheur (LIUM)";
  $email = "john.doeuf@univ-lemans.fr";
  $poste = "Enseignant-chercheur";
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Paramètres - LabPilot</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;900&amp;display=swap" rel="stylesheet">
  <link rel="stylesheet" href="styles.css">
  <link rel="stylesheet" href="pages.css">
</head>
<body>
  <input type="checkbox" id="theme-toggle" class="theme-check" aria-label="Mode sombre">
  <div class="layout">
    <aside class="sidebar">
      <a class="logo" href="index.php"><img src="../Public/assets/Common/Logo.png" alt="LabPilot"></a>
      <div class="role"><?php echo $espace; ?></div>
      <nav aria-label="Navigation principale">
        <a href="index.php"><img src="../Public/assets/Common/IconeTableauDeBord.svg" alt="" width="20" height="20"> Tableau de bord</a>
        <a href="experimentations.php"><img src="../Public/assets/Common/IconeExperimentations.svg" alt="" width="20" height="20"> Mes expérimentations</a>
        <a href="planning.php"><img src="../Public/assets/Common/IconePlanning.svg" alt="" width="20" height="20"> Planning</a>
        <a href="participants.php"><img src="../Public/assets/Common/IconeParticipants.svg" alt="" width="20" height="20"> Participants</a>
        <a href="ressources.php"><img src="../Public/assets/Common/IconeRessources.svg" alt="" width="20" height="20"> Ressources &amp; documents</a>
        <a href="statistiques.php"><img src="../Public/assets/Common/IconeStatistiques.svg" alt="" width="20" height="20"> Statistiques</a>
        <a href="communications.php"><img src="../Public/assets/Common/IconeCommunications.svg" alt="" width="20" height="20"> Communications</a>
        <a href="parametres.php" aria-current="page"><img src="../Public/assets/Common/IconeParametres.svg" alt="" width="20" height="20"> Paramètres</a>
      </nav>
      <div class="spacer"></div>
      <hr>
      <div class="help">Conformité RGPD : <b>vérifiez vos réglages</b> de consentement, anonymisation et archivage des données.</div>
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
        <div class="page-head">
          <div>
            <p class="eyebrow"><?php echo $espace; ?></p>
            <h1>Paramètres</h1>
            <p class="lead">Gérez votre profil, vos préférences d'affichage, vos notifications et la confidentialité de vos données.</p>
          </div>
          <div class="actions"></div>
        </div>

        <div class="set-cols">
          <nav class="card set-nav" aria-label="Paramètres"><a href="#" aria-current="true"><img src="../Public/assets/Common/par_Trace1.svg" alt="">Profil</a><a href="#"><img src="../Public/assets/Common/par_Trace2.svg" alt="">Préférences</a><a href="#"><img src="../Public/assets/Common/par_Trace3.svg" alt="">Notifications</a><a href="#"><img src="../Public/assets/Common/par_Trace4.svg" alt="">Sécurité</a><a href="#"><img src="../Public/assets/Common/par_Trace5.svg" alt="">Mes modèles</a><a href="#"><img src="../Public/assets/Common/par_Trace6.svg" alt="">Intégrations</a><a href="#"><img src="../Public/assets/Common/par_Trace7.svg" alt="">Confidentialité &amp; RGPD</a></nav>
          <section class="card pad lg set-form">
            <h2 class="big sm">Profil</h2>
            <div class="photo"><span class="avatar xl"><?php echo $initiales; ?></span><div><button class="btn-lg sm" type="button">Changer la photo</button><small>JPG ou PNG, 2 Mo maximum.</small></div></div>
            <form class="form small" onsubmit="return false">
              <div class="two">
                <label>Nom complet<span class="input"><input value="<?php echo $nom_complet; ?>"></span></label>
                <label>Fonction<span class="input muted"><input value="<?php echo $poste; ?>"></span></label>
              </div>
              <label>Adresse e-mail<span class="input muted"><input value="<?php echo $email; ?>" readonly></span></label>
              <p class="hint tight">Gérée par l'authentification unique (SSO) de l'université - non modifiable ici.</p>
              <div class="two">
                <label>Laboratoire<span class="select"><select><option>LIUM - Laborat...</option></select></span></label>
                <label>Équipe de recherche<span class="select"><select><option>IEIAH - Environ...</option></select></span></label>
              </div>
              <label>Téléphone (optionnel)<span class="input"><input value="02 43 00 00 00"></span></label>
              <label>Présentation courte<span class="input area"><textarea rows="3" placeholder="Quelques mots sur vos travaux de recherche..."></textarea></span></label>
              <div class="save-row"><button class="btn-lg primary" type="submit">Enregistrer les modifications</button><a href="#">Annuler</a></div>
            </form>
          </section>
        </div>
        <div class="footer"><?php echo $espace; ?> - Le Mans Université</div>
      </main>
    </div>
  </div>
</body>
</html>

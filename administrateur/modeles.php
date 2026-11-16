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
  <title>Gestion des modèles - LabPilot</title>
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
        <a href="parametrage.php"><img src="../Public/assets/Common/IconeParametres.svg" alt="" width="20" height="20"> Paramétrage de l'application</a>
        <a href="securite.php"><img src="../Public/assets/Administrateur/IconeSecurite.svg" alt="" width="20" height="20"> Sécurité et maintenance</a>
        <a href="modeles.php" aria-current="page"><img src="../Public/assets/Common/IconeRessources.svg" alt="" width="20" height="20"> Gestion des modèles</a>
      </nav>
      <div class="spacer"></div>
      <hr>
      <div class="help">Un modèle obsolète ? <b>Mettez-le à jour</b> plutôt que d'en créer un nouveau en doublon.</div>
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
            <h1>Gestion des modèles</h1>
            <p class="lead">État technique et organisationnel de l'application Lab Pilot.</p>
          </div>
          <div class="actions"></div>
        </div>

        <div class="cols a-mod">
          <section class="card pad">
            <h2 class="big sm">Modèles globaux</h2>
            <p class="sub sm">2 modèles disponibles pour l'ensemble des équipes</p>
            <table class="data plain r-table">
              <thead><tr><th>Modèle</th><th>Créé par</th><th>Utilisé</th><th>Dernière modification</th><th></th></tr></thead>
              <tbody>
              <tr><td class="nm"><b>Protocole mémoire visuelle standard</b></td><td class="soft">John Doeuf</td><td class="soft">4 fois</td><td class="soft">03/01/2026</td>
                <td><div class="row-actions"><button class="rnd" type="button" aria-label="Modifier"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#52577a" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M17 3a2.8 2.8 0 0 1 4 4L7.5 20.5 2 22l1.5-5.5z"/></svg></button><button class="rnd" type="button" aria-label="Dupliquer"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#52577a" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="9" y="9" width="13" height="13" rx="2"/><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"/></svg></button><button class="rnd" type="button" aria-label="Supprimer"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#d13a3a" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M3 6h18M19 6l-1 14a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2L5 6M10 11v6M14 11v6M9 6V4a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v2"/></svg></button></div></td></tr>
              <tr><td class="nm"><b>Entretien qualitatif type</b></td><td class="soft">John Doeuf</td><td class="soft">1 fois</td><td class="soft">28/08/2026</td>
                <td><div class="row-actions"><button class="rnd" type="button" aria-label="Modifier"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#52577a" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M17 3a2.8 2.8 0 0 1 4 4L7.5 20.5 2 22l1.5-5.5z"/></svg></button><button class="rnd" type="button" aria-label="Dupliquer"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#52577a" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="9" y="9" width="13" height="13" rx="2"/><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"/></svg></button><button class="rnd" type="button" aria-label="Supprimer"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#d13a3a" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M3 6h18M19 6l-1 14a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2L5 6M10 11v6M14 11v6M9 6V4a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v2"/></svg></button></div></td></tr>
              </tbody>
            </table>
          </section>
          <section class="card pad fit">
            <h2 class="big sm">Créer un modèle global</h2>
            <form class="form small tinted" onsubmit="return false">
              <label>Titre du modèle<span class="input"><input placeholder="Ex. Questionnaire post-test type"></span></label>
              <label>Description<span class="input area"><textarea rows="3" placeholder="Contenu et usage prévu du modèle…"></textarea></span></label>
              <button class="btn-lg primary" type="submit">Créer le modèle</button>
            </form>
          </section>
        </div>
        <div class="footer"><?php echo $espace; ?> - Le Mans Université</div>
      </main>
    </div>
  </div>
</body>
</html>

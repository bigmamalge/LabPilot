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
  <title>Tableau de bord - LabPilot</title>
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
        <a href="index.php" aria-current="page"><img src="../Public/assets/Common/IconeTableauDeBord.svg" alt="" width="20" height="20"> Tableau de bord</a>
        <a href="utilisateurs.php"><img src="../Public/assets/Common/IconeParticipants.svg" alt="" width="20" height="20"> Gestion des utilisateurs</a>
        <a href="parametrage.php"><img src="../Public/assets/Common/IconeParametres.svg" alt="" width="20" height="20"> Paramétrage de l'application</a>
        <a href="securite.php"><img src="../Public/assets/Administrateur/IconeSecurite.svg" alt="" width="20" height="20"> Sécurité et maintenance</a>
        <a href="modeles.php"><img src="../Public/assets/Common/IconeRessources.svg" alt="" width="20" height="20"> Gestion des modèles</a>
      </nav>
      <div class="spacer"></div>
      <hr>
      <div class="help">Un incident technique ? <b>Consultez les journaux</b> d'activité pour identifier la cause.</div>
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
            <h1>Bonjour, <?php echo $prenom; ?></h1>
            <p class="lead">État technique et organisationnel de l'application Lab Pilot.</p>
          </div>
          <div class="actions"></div>
        </div>

        <section class="stats" aria-label="Indicateurs">
          <article class="card stat">
            <div class="top"><span class="ico "><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#3d6d89" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87M16 3.13a4 4 0 0 1 0 7.75"/></svg></span><span class="delta neutral">6 rôles</span></div>
            <div class="value">8</div><div class="label">Comptes utilisateurs actifs</div>
          </article>
          <article class="card stat">
            <div class="top"><span class="ico warn"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#d4451b" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M10.3 3.9 1.8 18a2 2 0 0 0 1.7 3h17a2 2 0 0 0 1.7-3L13.7 3.9a2 2 0 0 0-3.4 0z"/><path d="M12 9v4M12 17h.01"/></svg></span><span class="delta todo">À traiter</span></div>
            <div class="value">1</div><div class="label">Incident technique signalé</div>
          </article>
          <article class="card stat">
            <div class="top"><span class="ico ok-bg"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#1a8a44" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg></span><span class="delta neutral">Automatique</span></div>
            <div class="value">Ce matin</div><div class="label">Dernière sauvegarde BDD</div>
          </article>
          <article class="card stat">
            <div class="top"><span class="ico violet-bg"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#6d3fd1" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><path d="M14 2v6h6M8 13h8M8 17h5"/></svg></span><span class="delta neutral">Partagés</span></div>
            <div class="value">2</div><div class="label">Modèles globaux disponibles</div>
          </article>
        </section>

        <div class="cols a-dash">
          <section class="card pad">
            <div class="exp-top"><h2 class="big sm">Journaux d'activité récents</h2><a class="link-r" href="securite.php">Tout voir</a></div>
            <table class="data plain r-table">
              <thead><tr><th>Acteur</th><th>Adresse IP</th><th>Date de connexion</th><th>Erreurs</th></tr></thead>
              <tbody>
              <tr><td class="nm"><b>John Doeuf</b></td><td class="soft">10.12.4.21</td><td class="soft">28/09/2026 08h12</td><td>—</td></tr>
              <tr><td class="nm"><b>Lucas Tessier</b></td><td class="soft">92.145.3.88</td><td class="soft">28/09/2026 07h55</td><td>—</td></tr>
              <tr><td class="nm"><b>Inconnu</b></td><td class="soft">45.9.201.14</td><td class="soft">27/09/2026 23h41</td><td><span class="pill sm ko">Échec (×5)</span></td></tr>
              </tbody>
            </table>
          </section>
          <section class="card pad">
            <h2 class="big sm">Notifications</h2>
            <div class="r-notifs">
              <div class="r-notif"><span class="circ warn"><svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="#d4451b" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M10.3 3.9 1.8 18a2 2 0 0 0 1.7 3h17a2 2 0 0 0 1.7-3L13.7 3.9a2 2 0 0 0-3.4 0z"/><path d="M12 9v4M12 17h.01"/></svg></span><div><b>Incident technique</b><span>Plusieurs échecs d'authentification depuis la même adresse IP</span></div></div>
              <div class="r-notif"><span class="circ ok"><svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="#1a8a44" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg></span><div><b>Sauvegarde effectuée</b><span>Sauvegarde automatique de la base de données réussie</span></div></div>
            </div>
          </section>
        </div>
        <div class="footer"><?php echo $espace; ?> - Le Mans Université</div>
      </main>
    </div>
  </div>
</body>
</html>

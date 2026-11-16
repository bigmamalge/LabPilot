<?php
  $espace = "Espace directeur de laboratoire";
  $prenom = "Sacha";
  $nom = "Touille";
  $nom_complet = $prenom . " " . $nom;
  $initiales = "ST";
  $fonction = "Directeur de laboratoire";
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Ressources globales - LabPilot</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;900&amp;display=swap" rel="stylesheet">
  <link rel="stylesheet" href="styles.css">
  <link rel="stylesheet" href="pages.css">
  <link rel="stylesheet" href="directeur.css">
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
        <a href="plannings.php"><img src="../Public/assets/Common/IconePlanning.svg" alt="" width="20" height="20"> Planning global</a>
        <a href="ressources.php" aria-current="page"><img src="../Public/assets/Common/IconeRessources.svg" alt="" width="20" height="20"> Ressources globales</a>
        <a href="statistiques.php"><img src="../Public/assets/Common/IconeStatistiques.svg" alt="" width="20" height="20"> Statistiques consolidées</a>
      </nav>
      <div class="spacer"></div>
      <hr>
      <div class="help">Salles ou matériel saturés ? <b>Suivez l'utilisation</b> des ressources partagées par l'ensemble des équipes.</div>
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
        <div class="page-head d-head">
          <div>
            <p class="eyebrow"><?php echo $espace; ?></p>
            <h1>Ressources globales</h1>
            <p class="lead">Suivi de l'utilisation des salles, équipements et matériels du laboratoire, toutes équipes confondues.</p>
          </div>
          <div class="actions"></div>
        </div>

        <section class="stats" aria-label="Indicateurs">
          <article class="card stat">
            <div class="top"><span class="ico sm "><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#3d6d89" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M20 10c0 6-8 12-8 12S4 16 4 10a8 8 0 0 1 16 0z"/><circle cx="12" cy="10" r="3"/></svg></span><span class="delta neutral">3 disponibles</span></div>
            <div class="value">5</div><div class="label">Salles du laboratoire</div>
          </article>
          <article class="card stat">
            <div class="top"><span class="ico sm violet-bg"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#6d3fd1" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="2" y="3" width="20" height="14" rx="2"/><path d="M8 21h8M12 17v4"/></svg></span><span class="delta neutral">4 réservés</span></div>
            <div class="value">9</div><div class="label">Équipements &amp; matériels</div>
          </article>
          <article class="card stat">
            <div class="top"><span class="ico sm warn2"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#c1560f" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M18 20V10M12 20V4M6 20v-6"/></svg></span><span class="delta neutral">Ce mois-ci</span></div>
            <div class="value">62%</div><div class="label">Taux d'utilisation moyen</div>
          </article>
        </section>

        <section class="card pad lg">
          <h2 class="big sm">Ressources du laboratoire</h2>
          <p class="sub sm">Taux d'utilisation sur le mois en cours</p>
          <div class="d-res-grid">
              <article class="d-res">
                <div class="exp-top"><span class="vbox"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#6d3fd1" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M20 10c0 6-8 12-8 12S4 16 4 10a8 8 0 0 1 16 0z"/><circle cx="12" cy="10" r="3"/></svg></span><span class="pill sm ko">Occupée</span></div>
                <h3>Salle B204</h3>
                <p class="line"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#52577a" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87M16 3.13a4 4 0 0 1 0 7.75"/></svg>Capacité 8 personnes · IEIAH</p>
                <div class="wide-bar"><span class="bar"><i style="width:74%;background:var(--primary)"></i></span><b>74%</b></div>
              </article>
              <article class="d-res">
                <div class="exp-top"><span class="vbox"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#6d3fd1" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M20 10c0 6-8 12-8 12S4 16 4 10a8 8 0 0 1 16 0z"/><circle cx="12" cy="10" r="3"/></svg></span><span class="pill sm ok">Disponible</span></div>
                <h3>Salle A102</h3>
                <p class="line"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#52577a" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87M16 3.13a4 4 0 0 1 0 7.75"/></svg>Capacité 6 personnes · LST</p>
                <div class="wide-bar"><span class="bar"><i style="width:38%;background:#6d3fd1"></i></span><b>38%</b></div>
              </article>
              <article class="d-res">
                <div class="exp-top"><span class="vbox"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#6d3fd1" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="2" y="3" width="20" height="14" rx="2"/><path d="M8 21h8M12 17v4"/></svg></span><span class="pill sm warn">Réservée demain</span></div>
                <h3>Salle Visioconférence</h3>
                <p class="line"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#52577a" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87M16 3.13a4 4 0 0 1 0 7.75"/></svg>Capacité illimitée (distanciel)</p>
                <div class="wide-bar"><span class="bar"><i style="width:55%;background:var(--primary)"></i></span><b>55%</b></div>
              </article>
              <article class="d-res">
                <div class="exp-top"><span class="vbox"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#6d3fd1" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M2 12s3.5-7 10-7 10 7 10 7-3.5 7-10 7S2 12 2 12z"/><circle cx="12" cy="12" r="3"/></svg></span><span class="pill sm ko">Réservé</span></div>
                <h3>Casque eye-tracking Tobii Pro</h3>
                <p class="line"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#52577a" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M22 19a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5l2 3h9a2 2 0 0 1 2 2z"/></svg>1 unité · IEIAH</p>
                <div class="wide-bar"><span class="bar"><i style="width:81%;background:var(--primary)"></i></span><b>81%</b></div>
              </article>
              <article class="d-res">
                <div class="exp-top"><span class="vbox"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#6d3fd1" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="2" y="3" width="20" height="14" rx="2"/><path d="M8 21h8M12 17v4"/></svg></span><span class="pill sm ok">Disponible</span></div>
                <h3>Enregistreur audio Zoom H4n</h3>
                <p class="line"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#52577a" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M22 19a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5l2 3h9a2 2 0 0 1 2 2z"/></svg>2 unités partagées</p>
                <div class="wide-bar"><span class="bar"><i style="width:22%;background:var(--succes-text)"></i></span><b>22%</b></div>
              </article>
              <article class="d-res">
                <div class="exp-top"><span class="vbox"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#6d3fd1" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="2" y="3" width="20" height="14" rx="2"/><path d="M8 21h8M12 17v4"/></svg></span><span class="pill sm ok">Disponible</span></div>
                <h3>Tablette graphique Wacom</h3>
                <p class="line"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#52577a" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M22 19a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5l2 3h9a2 2 0 0 1 2 2z"/></svg>3 unités · IEIAH</p>
                <div class="wide-bar"><span class="bar"><i style="width:15%;background:var(--succes-text)"></i></span><b>15%</b></div>
              </article>
          </div>
        </section>
        <div class="footer"><?php echo $espace; ?></div>
      </main>
    </div>
  </div>
</body>
</html>

<?php
  $espace = "Espace responsable de l'équipe de recherche";
  $prenom = "Lara";
  $nom = "Clette";
  $nom_complet = $prenom . " " . $nom;
  $initiales = "LC";
  $fonction = "Responsable de l'équipe de recherche";
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Plannings de l'équipe - LabPilot</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;900&amp;display=swap" rel="stylesheet">
  <link rel="stylesheet" href="styles.css">
  <link rel="stylesheet" href="pages.css">
  <link rel="stylesheet" href="responsable.css">
</head>
<body>
  <input type="checkbox" id="theme-toggle" class="theme-check" aria-label="Mode sombre">
  <div class="layout">
    <aside class="sidebar">
      <a class="logo" href="index.php"><img src="../Public/assets/Common/Logo.png" alt="LabPilot"></a>
      <div class="role"><?php echo $espace; ?></div>
      <nav aria-label="Navigation principale">
        <a href="index.php"><img src="../Public/assets/Common/IconeTableauDeBord.svg" alt="" width="20" height="20"> Tableau de bord</a>
        <a href="experimentations.php"><img src="../Public/assets/Common/IconeExperimentations.svg" alt="" width="20" height="20"> Expérimentations de l'équipe</a>
        <a href="plannings.php" aria-current="page"><img src="../Public/assets/Common/IconePlanning.svg" alt="" width="20" height="20"> Plannings de l'équipe</a>
        <a href="statistiques.php"><img src="../Public/assets/Common/IconeStatistiques.svg" alt="" width="20" height="20"> Statistiques et rapports</a>
      </nav>
      <div class="spacer"></div>
      <hr>
      <div class="help">Besoin d'un bilan ? <b>Consultez les statistiques</b> et générez un rapport d'activité pour votre équipe.</div>
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
            <h1>Plannings de l'équipe</h1>
            <p class="lead">Consultez les créneaux programmés pour les expérimentations de votre équipe.</p>
          </div>
          <div class="actions"></div>
        </div>

        <div class="cols r-plan">
          <section class="card pad">
            <div class="r-bar">
              <button class="circle" type="button" aria-label="Semaine précédente"><img class="flip" src="../Public/assets/Common/plan_ChevronRight.svg" alt=""></button>
              <button class="circle" type="button" aria-label="Semaine suivante"><img src="../Public/assets/Common/plan_ChevronRight.svg" alt=""></button>
              <b>Semaine du 22 au 26 sept. 2026</b>
              <div class="r-seg" role="tablist"><button role="tab" aria-selected="true" type="button">Semaine</button><button role="tab" aria-selected="false" type="button">Mois</button></div>
            </div>
            <div class="r-week">
              <div class="r-day"><div class="r-dh"><small>LUN</small><b>22</b></div><div class="r-db"><div class="r-ev "><b>10h00-11h30</b><b>Mémoire visuelle - A</b><span>Salle B284 · 6/8</span></div></div></div>
              <div class="r-day"><div class="r-dh"><small>MAR</small><b>23</b></div><div class="r-db"><div class="r-ev red"><b>14h00-15h05</b><b>Entretien Lot 2</b><span>Visio · 1/1</span></div></div></div>
              <div class="r-day"><div class="r-dh now"><small>MER</small><b>24</b></div><div class="r-db"><div class="r-ev "><b>9h30-11h00</b><b>Test IHM</b><span>Salle B102 · 5/8</span></div><div class="r-ev orange"><b>11h00-12h00</b><b>Questionnaire post-test</b><span>Salle A102 · 4/8</span></div></div></div>
              <div class="r-day"><div class="r-dh"><small>JEU</small><b>25</b></div><div class="r-db"></div></div>
              <div class="r-day"><div class="r-dh"><small>VEN</small><b>26</b></div><div class="r-db"><div class="r-ev "><b>13h00-14h30</b><b>Mémoire visuelle - C</b><span>Salle B284 · 1/8</span></div></div></div>
            </div>
            <ul class="r-legend"><li><i style="background:#3d6d89"></i>Confirmé</li><li><i style="background:#d13a3a"></i>Créneau à valider</li><li><i style="background:var(--succes-text)"></i>Complet</li></ul>
          </section>
          <section class="card pad fit">
            <h2 class="big sm">Prochains créneaux</h2>
            <div class="r-slots">
              <div class="r-slot"><div class="dchip-r"><b>23</b><small>sept.</small></div><div><b>Étude mémoire visuelle - Session A</b><span>14h00-15h30 en Salle B204 (6/8 inscrits)</span></div></div>
              <div class="r-slot"><div class="dchip-r"><b>24</b><small>sept.</small></div><div><b>Entretien qualitatif - Lot 2</b><span>09h30-10h00 en Visioconférence (1/1 inscrit)</span></div></div>
              <div class="r-slot"><div class="dchip-r"><b>25</b><small>sept.</small></div><div><b>Questionnaire post-test</b><span>11h00-12h00 en Salle A102 (4/8 inscrits)</span></div></div>
            </div>
          </section>
        </div>
        <div class="footer"><?php echo $espace; ?> - Le Mans Université</div>
      </main>
    </div>
  </div>
</body>
</html>

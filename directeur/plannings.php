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
  <title>Plannings globaux - LabPilot</title>
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
        <a href="plannings.php" aria-current="page"><img src="../Public/assets/Common/IconePlanning.svg" alt="" width="20" height="20"> Planning global</a>
        <a href="ressources.php"><img src="../Public/assets/Common/IconeRessources.svg" alt="" width="20" height="20"> Ressources globales</a>
        <a href="statistiques.php"><img src="../Public/assets/Common/IconeStatistiques.svg" alt="" width="20" height="20"> Statistiques consolidées</a>
      </nav>
      <div class="spacer"></div>
      <hr>
      <div class="help">Besoin d'un bilan ? <b>Consultez les statistiques</b> consolidées du laboratoire.</div>
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
            <h1>Plannings globaux</h1>
            <p class="lead">Créneaux programmés pour l'ensemble des expérimentations du laboratoire, toutes équipes confondues.</p>
          </div>
          <div class="actions"></div>
        </div>

        <section class="card r-filters d-nav">
          <button class="circle" type="button" aria-label="Semaine précédente"><img class="flip" src="../Public/assets/Common/plan_ChevronRight.svg" alt=""></button>
          <button class="circle" type="button" aria-label="Semaine suivante"><img src="../Public/assets/Common/plan_ChevronRight.svg" alt=""></button>
          <b>Semaine du 22 au 26 sept. 2026</b>
          <div class="r-seg" role="tablist"><button role="tab" aria-selected="true" type="button">Semaine</button><button role="tab" aria-selected="false" type="button">Mois</button></div>
          <label class="select f"><select aria-label="Équipe"><option>Toutes les équipes</option></select></label>
        </section>

        <section class="card pad d-cal">
          <div class="r-week">
              <div class="r-day"><div class="r-dh"><small>LUN</small><b>22</b></div><div class="r-db"><div class="r-ev "><b>10h00-11h30</b><b>Mémoire visuelle - A</b><span>IEIAH · Salle B284</span></div></div></div>
              <div class="r-day"><div class="r-dh"><small>MAR</small><b>23</b></div><div class="r-db"><div class="r-ev red"><b>14h00-15h05</b><b>Entretien Lot 2</b><span>IEIAH · Visio</span></div></div></div>
              <div class="r-day"><div class="r-dh now"><small>MER</small><b>24</b></div><div class="r-db"><div class="r-ev "><b>9h30-11h00</b><b>Test IHM</b><span>IEIAH · Salle B102</span></div><div class="r-ev green"><b>14h00-16h00</b><b>Sommeil et cognition</b><span>LST · Salle A102</span></div></div></div>
              <div class="r-day"><div class="r-dh"><small>JEU</small><b>25</b></div><div class="r-db"><div class="r-ev orange"><b>11h00-12h00</b><b>Questionnaire post-test</b><span>IEIAH · Salle A102</span></div></div></div>
              <div class="r-day"><div class="r-dh"><small>VEN</small><b>26</b></div><div class="r-db"><div class="r-ev "><b>13h00-14h30</b><b>Mémoire visuelle - C</b><span>IEIAH · Salle B284</span></div></div></div>
          </div>
          <ul class="r-legend"><li><i style="background:#3d6d89"></i>Confirmé</li><li><i style="background:#d13a3a"></i>Créneau à valider</li><li><i style="background:var(--succes-text)"></i>Complet</li></ul>
        </section>
        <div class="footer"><?php echo $espace; ?></div>
      </main>
    </div>
  </div>
</body>
</html>

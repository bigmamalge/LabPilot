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
  <title>Expérimentations de l'équipe - LabPilot</title>
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
        <a href="experimentations.php" aria-current="page"><img src="../Public/assets/Common/IconeExperimentations.svg" alt="" width="20" height="20"> Expérimentations de l'équipe</a>
        <a href="plannings.php"><img src="../Public/assets/Common/IconePlanning.svg" alt="" width="20" height="20"> Plannings de l'équipe</a>
        <a href="statistiques.php"><img src="../Public/assets/Common/IconeStatistiques.svg" alt="" width="20" height="20"> Statistiques et rapports</a>
      </nav>
      <div class="spacer"></div>
      <hr>
      <div class="help">Vue en lecture seule : <b>en savoir plus</b> seul l'enseignant-chercheur responsable peut modifier une expérimentation.</div>
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
            <h1>Expérimentations de l'équipe</h1>
            <p class="lead">État d'avancement, participants et conformité RGPD des études menées par votre équipe.</p>
          </div>
          <div class="actions"></div>
        </div>

        <section class="card r-filters">
          <label class="select f"><select aria-label="Type"><option>Tous les types</option></select></label>
          <label class="select f"><select aria-label="Date"><option>Toutes les dates</option></select></label>
          <label class="select f"><select aria-label="Responsable"><option>Tous les responsables</option></select></label>
        </section>

        <div class="cols r-exp">
          <div class="r-list">
            <article class="card pad r-card">
              <div class="exp-top"><h3>Étude mémoire visuelle</h3><span class="pill sm run">En cours</span></div>
              <p class="desc">Impact de la charge cognitive sur la reconnaissance d'images chez l'adulte jeune.</p>
              <div class="meta2"><div><span>Chercheur</span><b>John Doeuf</b></div><div><span>Période</span><b>03/01/2026 - 15/11/2026</b></div><div><span>Participants</span><b>18/24</b></div></div>
              <div class="wide-bar"><span class="bar red"><i style="width:75%"></i></span><b>75 % rempli</b></div>
              <a class="fiche-btn" href="#">Voir la vue supervision</a>
            </article>
            <article class="card pad r-card">
              <div class="exp-top"><h3>Entretien qualitatif - Lot 2</h3><span class="pill sm run">En cours</span></div>
              <p class="desc">Entretiens semi-directifs sur les usages numériques des seniors.</p>
              <div class="meta2"><div><span>Chercheur</span><b>John Doeuf</b></div><div><span>Période</span><b>28/08/2026 - 30/01/2027</b></div><div><span>Participants</span><b>8/15</b></div></div>
              <div class="wide-bar"><span class="bar red"><i style="width:53%"></i></span><b>53 % rempli</b></div>
              <a class="fiche-btn" href="#">Voir la vue supervision</a>
            </article>
            <article class="card pad r-card">
              <div class="exp-top"><h3>Test utilisateur - nouvelle IHM</h3><span class="pill sm ">Brouillon</span></div>
              <p class="desc">Évaluation ergonomique d'un prototype d'interface avant mise en production.</p>
              <div class="meta2"><div><span>Chercheur</span><b>John Doeuf</b></div><div><span>Période</span><b>Non planifiée</b></div><div><span>Participants</span><b>0/12</b></div></div>
              <div class="wide-bar"><span class="bar red"><i style="width:20%"></i></span><b>Paramétrage à 20 %</b></div>
              <a class="fiche-btn" href="#">Voir la vue supervision</a>
            </article>
            <article class="card pad r-card">
              <div class="exp-top"><h3>Questionnaire post-test</h3><span class="pill sm warn">Créneaux à valider</span></div>
              <p class="desc">Recueil des impressions à chaud suite aux sessions de test utilisateur.</p>
              <div class="meta2"><div><span>Chercheur</span><b>John Doeuf</b></div><div><span>Période</span><b>15/09/2026 - 10/10/2026</b></div><div><span>Participants</span><b>15/20</b></div></div>
              <div class="wide-bar"><span class="bar red"><i style="width:35%"></i></span><b>35 % rempli</b></div>
              <a class="fiche-btn" href="#">Voir la vue supervision</a>
            </article>
          </div>
          <section class="card pad fit">
            <div class="exp-top"><h2 class="big sm">Étude mémoire visuelle</h2><span class="pill sm run">En cours</span></div>
            <p class="sub sm">Vue supervision</p>
            <div class="kv r-kv"><div><span>Chercheur</span><b>John Doeuf</b></div><div><span>Avancement</span><b>75 %</b></div><div><span>Participants</span><b>18 inscrits sur 24</b></div><div><span>Profils</span><b>54 % femmes, 42 % hommes</b></div><div><span>Conformité RGPD</span><span class="pill sm ok">Conforme</span></div></div>
          </section>
        </div>
        <div class="footer"><?php echo $espace; ?> - Le Mans Université</div>
      </main>
    </div>
  </div>
</body>
</html>

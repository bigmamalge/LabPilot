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
  <title>Tableau de bord - LabPilot</title>
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
        <a href="index.php" aria-current="page"><img src="../Public/assets/Common/IconeTableauDeBord.svg" alt="" width="20" height="20"> Tableau de bord</a>
        <a href="experimentations.php"><img src="../Public/assets/Common/IconeExperimentations.svg" alt="" width="20" height="20"> Expérimentations de l'équipe</a>
        <a href="plannings.php"><img src="../Public/assets/Common/IconePlanning.svg" alt="" width="20" height="20"> Plannings de l'équipe</a>
        <a href="statistiques.php"><img src="../Public/assets/Common/IconeStatistiques.svg" alt="" width="20" height="20"> Statistiques et rapports</a>
      </nav>
      <div class="spacer"></div>
      <hr>
      <div class="help">Besoin de détails sur une étude ? <b>Consultez la vue supervision</b> depuis la liste des expérimentations de l'équipe.</div>
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
            <h1>Bonjour, <?php echo $prenom; ?></h1>
            <p class="lead">Vue d'ensemble des expérimentations et de l'activité de votre équipe (IEIAH — LIUM).</p>
          </div>
          <div class="actions"></div>
        </div>

        <section class="stats" aria-label="Indicateurs">
          <article class="card stat">
            <div class="top"><span class="ico sm "><img src="../Public/assets/Common/part_Doc.svg" alt=""></span><span class="delta neutral">4 en cours</span></div>
            <div class="value">6</div><div class="label">Expérimentations de l'équipe</div>
          </article>
          <article class="card stat">
            <div class="top"><span class="ico sm "><img src="../Public/assets/Common/stat_BiPeople.svg" alt=""></span><span class="delta neutral">Tous profils</span></div>
            <div class="value">57</div><div class="label">Participants impliqués</div>
          </article>
          <article class="card stat">
            <div class="top"><span class="ico sm ok-bg"><img src="../Public/assets/Common/Statistiques2.svg" alt=""></span><span class="delta up">+4% vs. dernier mois</span></div>
            <div class="value">78%</div><div class="label">Taux de participation moyen</div>
          </article>
          <article class="card stat">
            <div class="top"><span class="ico sm warn"><img src="../Public/assets/Common/stat_Trace1.svg" alt=""></span><span class="delta todo">À suivre</span></div>
            <div class="value">1</div><div class="label">Incident signalé</div>
          </article>
        </section>

        <div class="cols r-dash">
          <section class="card pad">
            <div class="exp-top"><h2 class="big sm">Expérimentations de l'équipe</h2><a class="link-r" href="experimentations.php">Tout voir</a></div>
            <p class="sub sm">État d'avancement des études menées par l'équipe IEIAH</p>
            <table class="data plain r-table">
              <thead><tr><th>Expérimentation</th><th>Chercheur</th><th>Statut</th><th>Avancement</th></tr></thead>
              <tbody>
              <tr><td class="nm"><b>Étude mémoire visuelle</b></td><td class="soft">John Doeuf</td><td><span class="pill sm run">En cours</span></td>
                <td><span class="rate"><span class="bar red"><i style="width:75%"></i></span><b>75%</b></span></td></tr>
              <tr><td class="nm"><b>Entretien qualitatif - Lot 2</b></td><td class="soft">John Doeuf</td><td><span class="pill sm run">En cours</span></td>
                <td><span class="rate"><span class="bar red"><i style="width:53%"></i></span><b>53%</b></span></td></tr>
              <tr><td class="nm"><b>Test utilisateur - nouvelle IHM</b></td><td class="soft">John Doeuf</td><td><span class="pill sm ">Brouillon</span></td>
                <td><span class="rate"><span class="bar red"><i style="width:20%"></i></span><b>20%</b></span></td></tr>
              <tr><td class="nm"><b>Questionnaire post-test</b></td><td class="soft">John Doeuf</td><td><span class="pill sm warn">Créneaux à valider</span></td>
                <td><span class="rate"><span class="bar red"><i style="width:35%"></i></span><b>35%</b></span></td></tr>
              </tbody>
            </table>
          </section>
          <section class="card pad fit">
            <h2 class="big sm">Notifications</h2>
            <div class="r-notifs">
              <div class="r-notif"><span class="circ warn"><img src="../Public/assets/Common/IconeAlerte.svg" alt=""></span><div><b>Incident signalé</b><span>Étude mémoire visuelle — participant absent au créneau du 21/09</span></div></div>
              <div class="r-notif"><span class="circ"><img src="../Public/assets/Common/Statistiques3.svg" alt=""></span><div><b>Changement de planning</b><span>Entretien qualitatif - Lot 2 — créneau du 28/09 déplacé au 30/09</span></div></div>
            </div>
          </section>
        </div>
        <div class="footer"><?php echo $espace; ?> - Le Mans Université</div>
      </main>
    </div>
  </div>
</body>
</html>

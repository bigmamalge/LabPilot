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
  <title>Tableau de bord - LabPilot</title>
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
        <a href="index.php" aria-current="page"><img src="../Public/assets/Common/IconeTableauDeBord.svg" alt="" width="20" height="20"> Tableau de bord</a>
        <a href="experimentations.php"><img src="../Public/assets/Common/IconeExperimentations.svg" alt="" width="20" height="20"> Mes expérimentations</a>
        <a href="plannings.php"><img src="../Public/assets/Common/IconePlanning.svg" alt="" width="20" height="20"> Planning global</a>
        <a href="ressources.php"><img src="../Public/assets/Common/IconeRessources.svg" alt="" width="20" height="20"> Ressources globales</a>
        <a href="statistiques.php"><img src="../Public/assets/Common/IconeStatistiques.svg" alt="" width="20" height="20"> Statistiques consolidées</a>
      </nav>
      <div class="spacer"></div>
      <hr>
      <div class="help">Vue globale du laboratoire : <b>consultez toutes les études</b> menées par l'ensemble des équipes du LIUM.</div>
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
            <h1>Bonjour, <?php echo $prenom; ?></h1>
            <p class="lead">Vue d'ensemble des expérimentations, des ressources et de la conformité du laboratoire LIUM.</p>
          </div>
          <div class="actions"></div>
        </div>

        <section class="stats" aria-label="Indicateurs">
          <article class="card stat">
            <div class="top"><span class="ico sm "><img src="../Public/assets/Common/part_Doc.svg" alt=""></span><span class="delta neutral">3 en cours</span></div>
            <div class="value">6</div><div class="label">Expérimentations du laboratoire</div>
          </article>
          <article class="card stat">
            <div class="top"><span class="ico sm "><img src="../Public/assets/Common/stat_BiPeople.svg" alt=""></span><span class="delta neutral">2 équipes</span></div>
            <div class="value">79</div><div class="label">Participants impliqués</div>
          </article>
          <article class="card stat">
            <div class="top"><span class="ico sm ok-bg"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#1a8a44" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg></span><span class="delta up">À jour</span></div>
            <div class="value">Conforme</div><div class="label">Conformité RGPD &amp; éthique</div>
          </article>
          <article class="card stat">
            <div class="top"><span class="ico sm warn"><img src="../Public/assets/Common/stat_Trace1.svg" alt=""></span><span class="delta todo">À suivre</span></div>
            <div class="value">2</div><div class="label">Incidents signalés</div>
          </article>
        </section>

        <div class="cols d-dash">
          <section class="card pad">
            <div class="exp-top"><h2 class="big sm">Expérimentations du laboratoire</h2><a class="link-r" href="experimentations.php">Tout voir</a></div>
            <p class="sub sm">Toutes équipes confondues</p>
            <table class="data plain r-table">
              <thead><tr><th>Expérimentation</th><th>Responsable</th><th>Équipe</th><th>Statut</th><th>Avancement</th></tr></thead>
              <tbody>
              <tr><td class="nm"><b>Étude mémoire visuelle</b></td><td class="soft">John Doeuf</td><td class="soft">IEIAH</td><td><span class="pill sm run">En cours</span></td>
                <td><span class="rate"><span class="bar red"><i style="width:75%"></i></span><b>75%</b></span></td></tr>
              <tr><td class="nm"><b>Entretien qualitatif - Lot 2</b></td><td class="soft">John Doeuf</td><td class="soft">IEIAH</td><td><span class="pill sm run">En cours</span></td>
                <td><span class="rate"><span class="bar red"><i style="width:53%"></i></span><b>53%</b></span></td></tr>
              <tr><td class="nm"><b>Étude sommeil et cognition</b></td><td class="soft">Claire Vasseur</td><td class="soft">LST</td><td><span class="pill sm run">En cours</span></td>
                <td><span class="rate"><span class="bar red"><i style="width:44%"></i></span><b>44%</b></span></td></tr>
              <tr><td class="nm"><b>Questionnaire post-test</b></td><td class="soft">John Doeuf</td><td class="soft">IEIAH</td><td><span class="pill sm warn">Créneaux à valider</span></td>
                <td><span class="rate"><span class="bar red"><i style="width:35%"></i></span><b>35%</b></span></td></tr>
              </tbody>
            </table>
          </section>
          <section class="card pad fit">
            <h2 class="big sm">Notifications</h2>
            <div class="r-notifs">
              <div class="r-notif"><span class="circ warn"><img src="../Public/assets/Common/IconeAlerte.svg" alt=""></span><div><b>Incident — équipe IEIAH</b><span>Étude mémoire visuelle — participant absent au créneau du 21/09</span></div></div>
              <div class="r-notif"><span class="circ warn"><img src="../Public/assets/Common/IconeAlerte.svg" alt=""></span><div><b>Incident — équipe LST</b><span>Étude sommeil et cognition — annulation d'une session le 18/09</span></div></div>
              <div class="r-notif"><span class="circ"><img src="../Public/assets/Common/Statistiques3.svg" alt=""></span><div><b>Changement de planning</b><span>Entretien qualitatif - Lot 2 — créneau du 28/09 déplacé au 30/09</span></div></div>
            </div>
          </section>
        </div>
        <div class="footer"><?php echo $espace; ?></div>
      </main>
    </div>
  </div>
</body>
</html>

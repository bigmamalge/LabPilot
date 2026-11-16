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
  <title>Statistiques et rapports - LabPilot</title>
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
        <a href="plannings.php"><img src="../Public/assets/Common/IconePlanning.svg" alt="" width="20" height="20"> Plannings de l'équipe</a>
        <a href="statistiques.php" aria-current="page"><img src="../Public/assets/Common/IconeStatistiques.svg" alt="" width="20" height="20"> Statistiques et rapports</a>
      </nav>
      <div class="spacer"></div>
      <hr>
      <div class="help">Besoin d'exporter ? <b>Générez le rapport</b> d'activité de l'équipe au format PDF ou CSV.</div>
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
            <h1>Statistiques et rapports</h1>
            <p class="lead">Statistiques globales de l'équipe et génération de rapports d'activité.</p>
          </div>
          <div class="actions"><a class="btn primary" href="#"><img src="../Public/assets/Common/res_Download.svg" alt="" style="filter:brightness(0) invert(1)">Générer le rapport d'activité</a></div>
        </div>

        <section class="stats" aria-label="Indicateurs">
          <article class="card stat">
            <div class="top"><span class="ico sm "><img src="../Public/assets/Common/stat_BiPeople.svg" alt=""></span><span class="delta neutral">6 expérimentations</span></div>
            <div class="value">57</div><div class="label">Participants impliqués</div>
          </article>
          <article class="card stat">
            <div class="top"><span class="ico sm ok-bg"><img src="../Public/assets/Common/stat_Groupe.svg" alt=""></span><span class="delta up">+4% vs. dernier mois</span></div>
            <div class="value">78%</div><div class="label">Taux de participation moyen</div>
          </article>
          <article class="card stat">
            <div class="top"><span class="ico sm violet-bg"><svg width="20" height="20" viewBox="0 0 22 22" fill="none" stroke="#6d3fd1" stroke-width="1.8" stroke-linecap="round" aria-hidden="true"><path d="M11 2v18M15 6H9a2.5 2.5 0 0 0 0 5h4a2.5 2.5 0 0 1 0 5H6"/></svg></span><span class="delta neutral">Coupons &amp; crédits</span></div>
            <div class="value">18</div><div class="label">Rétributions distribuées</div>
          </article>
        </section>

        <div class="cols two-eq r-stat">
          <section class="card pad">
            <h2 class="big sm">Inscriptions par expérimentation</h2>
            <div class="hbars">
              <div class="hbar"><span>Étude mémoire visuelle</span><div class="track"><i style="width:100%;background:var(--primary)"></i></div><b>24</b></div>
              <div class="hbar"><span>Questionnaire post-test</span><div class="track"><i style="width:83%;background:var(--primary)"></i></div><b>20</b></div>
              <div class="hbar"><span>Entretien qualitatif - Lot 2</span><div class="track"><i style="width:62%;background:var(--primary)"></i></div><b>15</b></div>
              <div class="hbar"><span>Test utilisateur - nouvelle IHM</span><div class="track"><i style="width:50%;background:var(--primary)"></i></div><b>12</b></div>
            </div>
          </section>
          <section class="card pad">
            <h2 class="big sm">Répartition par genre</h2>
            <p class="sub sm">Profils des participants de l'équipe</p>
            <div class="donut-row">
              <div class="donut r"><svg viewBox="0 0 144 144" width="152" height="152" role="img" aria-label="Répartition par genre" style="transform:rotate(-96deg)">
                <circle r="60" cx="72" cy="72" fill="none" stroke="#d4451b" stroke-width="17" stroke-dasharray="203.58 376.99" stroke-dashoffset="-0.00"/><circle r="60" cx="72" cy="72" fill="none" stroke="#757575" stroke-width="17" stroke-dasharray="15.08 376.99" stroke-dashoffset="-203.58"/><circle r="60" cx="72" cy="72" fill="none" stroke="#3d6d89" stroke-width="17" stroke-dasharray="158.34 376.99" stroke-dashoffset="-218.65"/></svg><div class="center"><b>57</b><span>participants</span></div></div>
              <ul class="dl r">
                <li><i style="background:#d4451b"></i>Femmes<b>54%</b></li>
                <li><i style="background:#3d6d89"></i>Hommes<b>42%</b></li>
                <li><i style="background:#757575"></i>Autre / NC<b>4%</b></li>
              </ul>
            </div>
          </section>
        </div>

        <section class="card pad">
          <h2 class="big sm">Taux de participation par expérimentation</h2>
          <table class="data plain r-table">
            <thead><tr><th>Expérimentation</th><th>Inscrits</th><th>Présents</th><th>Taux de participation</th></tr></thead>
            <tbody>
              <tr><td class="nm"><b>Étude mémoire visuelle</b></td><td>24</td><td>18</td>
                <td><span class="rate"><span class="bar"><i style="width:75%;background:var(--primary)"></i></span><b>75%</b></span></td></tr>
              <tr><td class="nm"><b>Entretien qualitatif - Lot 2</b></td><td>15</td><td>6</td>
                <td><span class="rate"><span class="bar"><i style="width:40%;background:#6d3fd1"></i></span><b>40%</b></span></td></tr>
              <tr><td class="nm"><b>Test utilisateur - nouvelle IHM</b></td><td>12</td><td>11</td>
                <td><span class="rate"><span class="bar"><i style="width:92%;background:var(--succes-text)"></i></span><b>92%</b></span></td></tr>
              <tr><td class="nm"><b>Questionnaire post-test</b></td><td>20</td><td>15</td>
                <td><span class="rate"><span class="bar"><i style="width:75%;background:var(--primary)"></i></span><b>75%</b></span></td></tr>
            </tbody>
          </table>
          <p class="note">Formats d'export disponibles : PDF, CSV.</p>
        </section>
        <div class="footer"><?php echo $espace; ?> - Le Mans Université</div>
      </main>
    </div>
  </div>
</body>
</html>

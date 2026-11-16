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
  <title>Statistiques consolidées - LabPilot</title>
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
        <a href="ressources.php"><img src="../Public/assets/Common/IconeRessources.svg" alt="" width="20" height="20"> Ressources globales</a>
        <a href="statistiques.php" aria-current="page"><img src="../Public/assets/Common/IconeStatistiques.svg" alt="" width="20" height="20"> Statistiques consolidées</a>
      </nav>
      <div class="spacer"></div>
      <hr>
      <div class="help">Besoin d'un rapport ? <b>Générez-le</b> pour le compte-rendu d'activité du laboratoire.</div>
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
            <h1>Statistiques consolidées</h1>
            <p class="lead">Statistiques et rapports d'activité de l'ensemble du laboratoire.</p>
          </div>
          <div class="actions"><a class="btn primary" href="#"><img src="../Public/assets/Common/res_Download.svg" alt="" style="filter:brightness(0) invert(1)">Générer le rapport du laboratoire</a></div>
        </div>

        <section class="stats" aria-label="Indicateurs">
          <article class="card stat">
            <div class="top"><span class="ico sm "><img src="../Public/assets/Common/stat_BiPeople.svg" alt=""></span><span class="delta neutral">2 équipes</span></div>
            <div class="value">79</div><div class="label">Participants impliqués</div>
          </article>
          <article class="card stat">
            <div class="top"><span class="ico sm ok-bg"><img src="../Public/assets/Common/stat_Groupe.svg" alt=""></span><span class="delta up">+3% vs. dernier mois</span></div>
            <div class="value">74%</div><div class="label">Taux de participation moyen</div>
          </article>
          <article class="card stat">
            <div class="top"><span class="ico sm violet-bg"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#6d3fd1" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M12 1v22M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/></svg></span><span class="delta neutral">Coupons &amp; crédits</span></div>
            <div class="value">76</div><div class="label">Rétributions distribuées</div>
          </article>
        </section>

        <div class="cols d-stat">
          <section class="card pad">
            <h2 class="big sm">Expérimentations par équipe</h2>
            <p class="sub sm">Part du total des expérimentations du laboratoire (6)</p>
            <div class="hbars teams">
              <div class="hbar"><span>IEIAH</span><div class="track"><i style="width:67%;background:var(--primary)"></i></div><b>4</b></div>
              <div class="hbar"><span>LST</span><div class="track"><i style="width:33%;background:var(--primary)"></i></div><b>2</b></div>
            </div>
          </section>
          <section class="card pad fit">
            <h2 class="big sm">Répartition par genre</h2>
            <p class="sub sm">Profils des participants du laboratoire</p>
            <div class="donut-row">
              <div class="donut r big"><svg viewBox="0 0 144 144" width="164" height="164" role="img" aria-label="Répartition par genre" style="transform:rotate(-90deg)">
                <circle r="60" cx="72" cy="72" fill="none" stroke="#d4451b" stroke-width="17" stroke-dasharray="199.81 376.99" stroke-dashoffset="-0.00"/><circle r="60" cx="72" cy="72" fill="none" stroke="#757575" stroke-width="17" stroke-dasharray="11.31 376.99" stroke-dashoffset="-199.81"/><circle r="60" cx="72" cy="72" fill="none" stroke="#3d6d89" stroke-width="17" stroke-dasharray="165.88 376.99" stroke-dashoffset="-211.12"/></svg><div class="center"><b>79</b><span>participants</span></div></div>
              <ul class="dl r">
                <li><i style="background:#d4451b"></i>Femmes<b>53%</b></li>
                <li><i style="background:#3d6d89"></i>Hommes<b>44%</b></li>
                <li><i style="background:#757575"></i>Autre / NC<b>3%</b></li>
              </ul>
            </div>
          </section>
        </div>

        <section class="card pad">
          <h2 class="big sm">Taux de participation par équipe</h2>
          <table class="data plain r-table">
            <thead><tr><th>Équipe</th><th>Expérimentations</th><th>Inscrits</th><th>Présents</th><th>Taux de participation</th></tr></thead>
            <tbody>
              <tr><td class="nm"><b>IEIAH</b></td><td>4</td><td>71</td><td>50</td><td><span class="rate"><span class="bar"><i style="width:70%;background:var(--primary)"></i></span><b>70%</b></span></td></tr>
              <tr><td class="nm"><b>LST</b></td><td>2</td><td>32</td><td>26</td><td><span class="rate"><span class="bar"><i style="width:81%;background:var(--succes-text)"></i></span><b>81%</b></span></td></tr>
            </tbody>
          </table>
          <p class="note">Formats d'export disponibles : PDF, CSV.</p>
        </section>
        <div class="footer"><?php echo $espace; ?></div>
      </main>
    </div>
  </div>
</body>
</html>

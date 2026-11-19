<!DOCTYPE html>
<html lang="<?php echo strtolower($langue); ?>" data-theme="<?php echo $theme; ?>">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Statistiques consolidées - LabPilot</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;900&amp;display=swap" rel="stylesheet">
  <link rel="stylesheet" href="Public/css/style.css?v=<?php echo filemtime(__DIR__ . "/../../Public/css/style.css"); ?>">
  <link rel="stylesheet" href="Public/css/page.css?v=<?php echo filemtime(__DIR__ . "/../../Public/css/page.css"); ?>">
  <link rel="stylesheet" href="Public/css/directeur.css?v=<?php echo filemtime(__DIR__ . "/../../Public/css/directeur.css"); ?>">
</head>
<body>
  <div class="layout">
    <?php $ThisPage = 5;
    require_once __DIR__ . '/SideBar.php'; ?>

    <div class="main">
      <?php require_once __DIR__ . '/topbar.php'; ?>

      <main class="content">
        <div class="page-head d-head">
          <div>
            <p class="eyebrow"><?php echo $espace; ?></p>
            <h1>Statistiques consolidées</h1>
            <p class="lead">Statistiques et rapports d'activité de l'ensemble du laboratoire.</p>
          </div>
          <div class="actions"><a class="btn primary" href="#"><img src="Public/assets/Common/res_Download.svg" alt="" style="filter:brightness(0) invert(1)">Générer le rapport du laboratoire</a></div>
        </div>

        <section class="stats" aria-label="Indicateurs">
          <article class="card stat">
            <div class="top"><span class="ico sm "><img src="Public/assets/Common/stat_BiPeople.svg" alt=""></span><span class="delta neutral"><?php echo $nbEquipes; ?></span></div>
            <div class="value"><?php echo $totalParticipants; ?></div><div class="label">Participants impliqués</div>
          </article>
          <article class="card stat">
            <div class="top"><span class="ico sm ok-bg"><img src="Public/assets/Common/stat_Groupe.svg" alt=""></span><span class="delta up"><?php echo $detailTaux; ?></span></div>
            <div class="value"><?php echo $tauxParticipationMoyen; ?></div><div class="label">Taux de participation moyen</div>
          </article>
          <article class="card stat">
            <div class="top"><span class="ico sm violet-bg"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#6d3fd1" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M12 1v22M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/></svg></span><span class="delta neutral">Coupons &amp; crédits</span></div>
            <div class="value"><?php echo $nbRetributions; ?></div><div class="label">Rétributions distribuées</div>
          </article>
        </section>

        <div class="cols d-stat">
          <section class="card pad">
            <h2 class="big sm">Expérimentations par équipe</h2>
            <p class="sub sm">Part du total des expérimentations du laboratoire (<?php echo $nbExperimentations; ?>)</p>
            <div class="hbars teams">
              <?php
              foreach ($equipes as $equipe) {
                echo '<div class="hbar"><span>' . htmlspecialchars($equipe['NOM_EQUIPE']) . '</span><div class="track"><i style="width:' . $equipe['largeur'] . '%;background:var(--primary)"></i></div><b>' . $equipe['nbExperimentations'] . '</b></div>';
              }
              ?>
            </div>
          </section>
          <section class="card pad fit">
            <h2 class="big sm">Répartition par genre</h2>
            <p class="sub sm">Profils des participants du laboratoire</p>
            <div class="donut-row">
              <div class="donut r big"><svg viewBox="0 0 144 144" width="164" height="164" role="img" aria-label="Répartition par genre" style="transform:rotate(-90deg)">
                <?php
                foreach ($segmentsDonut as $segment) {
                  echo '<circle r="60" cx="72" cy="72" fill="none" stroke="' . $segment['couleur'] . '" stroke-width="17" stroke-dasharray="' . $segment['longueur'] . ' 376.99" stroke-dashoffset="-' . $segment['decalage'] . '"/>';
                }
                ?>
              </svg></div>
              <ul class="dl r">
                <?php
                foreach ($legendeGenre as $genre) {
                  echo '<li><i style="background:' . $genre['couleur'] . '"></i>' . $genre['libelle'] . '<b>' . $genre['pourcent'] . '%</b></li>';
                }
                ?>
              </ul>
            </div>
          </section>
        </div>

        <section class="card pad">
          <h2 class="big sm">Taux de participation par équipe</h2>
          <table class="data plain r-table">
            <thead><tr><th>Équipe</th><th>Expérimentations</th><th>Inscrits</th><th>Présents</th><th>Taux de participation</th></tr></thead>
            <tbody>
              <?php
              foreach ($equipes as $equipe) {
                echo '<tr><td class="nm"><b>' . htmlspecialchars($equipe['NOM_EQUIPE']) . '</b></td><td>' . $equipe['nbExperimentations'] . '</td><td>' . $equipe['nbInscrits'] . '</td><td>' . $equipe['nbPresents'] . '</td><td><span class="rate"><span class="bar"><i style="width:' . ($equipe['TAUX'] ?? 0) . '%;background:' . $equipe['couleur'] . '"></i></span><b>' . ($equipe['TAUX'] !== null ? $equipe['TAUX'] . '%' : '–') . '</b></span></td></tr>';
              }
              ?>
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

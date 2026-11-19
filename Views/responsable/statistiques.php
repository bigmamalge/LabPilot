<!DOCTYPE html>
<html lang="<?php echo strtolower($langue); ?>" data-theme="<?php echo $theme; ?>">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Statistiques et rapports - LabPilot</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;900&amp;display=swap" rel="stylesheet">
  <link rel="stylesheet" href="Public/css/style.css?v=<?php echo filemtime(__DIR__ . "/../../Public/css/style.css"); ?>">
  <link rel="stylesheet" href="Public/css/page.css?v=<?php echo filemtime(__DIR__ . "/../../Public/css/page.css"); ?>">
  <link rel="stylesheet" href="Public/css/responsable.css?v=<?php echo filemtime(__DIR__ . "/../../Public/css/responsable.css"); ?>">
</head>
<body>
  <div class="layout">
    <?php $ThisPage = 4;
    require_once __DIR__ . '/SideBar.php'; ?>

    <div class="main">
      <?php require_once __DIR__ . '/topbar.php'; ?>

      <main class="content">
        <div class="page-head">
          <div>
            <p class="eyebrow"><?php echo $espace; ?></p>
            <h1>Statistiques et rapports</h1>
            <p class="lead">Statistiques globales de l'équipe et génération de rapports d'activité.</p>
          </div>
          <div class="actions"><a class="btn primary" href="#"><img src="Public/assets/Common/res_Download.svg" alt="" style="filter:brightness(0) invert(1)">Générer le rapport d'activité</a></div>
        </div>

        <section class="stats" aria-label="Indicateurs">
          <article class="card stat">
            <div class="top"><span class="ico sm "><img src="Public/assets/Common/stat_BiPeople.svg" alt=""></span><span class="delta neutral"><?php echo $nbExperimentations; ?></span></div>
            <div class="value"><?php echo $totalParticipants; ?></div><div class="label">Participants impliqués</div>
          </article>
          <article class="card stat">
            <div class="top"><span class="ico sm ok-bg"><img src="Public/assets/Common/stat_Groupe.svg" alt=""></span><span class="delta up"><?php echo $detailTaux; ?></span></div>
            <div class="value"><?php echo $tauxParticipationMoyen; ?></div><div class="label">Taux de participation moyen</div>
          </article>
          <article class="card stat">
            <div class="top"><span class="ico sm violet-bg"><svg width="20" height="20" viewBox="0 0 22 22" fill="none" stroke="#6d3fd1" stroke-width="1.8" stroke-linecap="round" aria-hidden="true"><path d="M11 2v18M15 6H9a2.5 2.5 0 0 0 0 5h4a2.5 2.5 0 0 1 0 5H6"/></svg></span><span class="delta neutral">Coupons &amp; crédits</span></div>
            <div class="value"><?php echo $nbRetributions; ?></div><div class="label">Rétributions distribuées</div>
          </article>
        </section>

        <div class="cols two-eq r-stat">
          <section class="card pad">
            <h2 class="big sm">Inscriptions par expérimentation</h2>
            <div class="hbars">
              <?php
              foreach ($inscriptions as $exp) {
                echo '<div class="hbar"><span>' . htmlspecialchars($exp['TITRE_EXP']) . '</span><div class="track"><i style="width:' . $exp['largeur'] . '%;background:var(--primary)"></i></div><b>' . $exp['nbInscrits'] . '</b></div>';
              }
              ?>
            </div>
          </section>
          <section class="card pad">
            <h2 class="big sm">Répartition par genre</h2>
            <p class="sub sm">Profils des participants de l'équipe</p>
            <div class="donut-row">
              <div class="donut r"><svg viewBox="0 0 144 144" width="152" height="152" role="img" aria-label="Répartition par genre" style="transform:rotate(-96deg)">
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
          <h2 class="big sm">Taux de participation par expérimentation</h2>
          <table class="data plain r-table">
            <thead><tr><th>Expérimentation</th><th>Inscrits</th><th>Présents</th><th>Taux de participation</th></tr></thead>
            <tbody>
              <?php
              foreach ($experimentations as $exp) {
                echo '<tr><td class="nm"><b>' . htmlspecialchars($exp['TITRE_EXP']) . '</b></td><td>' . $exp['nbpart'] . '</td><td>' . $exp['nbPresents'] . '</td>
                <td><span class="rate"><span class="bar"><i style="width:' . ($exp['TAUX'] ?? 0) . '%;background:' . $exp['couleur'] . '"></i></span><b>' . ($exp['TAUX'] !== null ? $exp['TAUX'] . '%' : '–') . '</b></span></td></tr>';
              }
              ?>
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

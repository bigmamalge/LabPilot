<!DOCTYPE html>
<html lang="<?php echo strtolower($langue); ?>" data-theme="<?php echo $theme; ?>">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Statistiques - LabPilot</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;900&amp;display=swap" rel="stylesheet">
  <link rel="stylesheet" href="Public/css/style.css?v=<?php echo filemtime(__DIR__ . "/../../Public/css/style.css"); ?>">
  <link rel="stylesheet" href="Public/css/page.css?v=<?php echo filemtime(__DIR__ . "/../../Public/css/page.css"); ?>">
</head>
<body>
  <div class="layout">
    <?php $ThisPage = 6;
    require_once __DIR__ . '/SideBar.php'; ?>

    <div class="main">
      <?php require_once __DIR__ . '/topbar.php'; ?>

      <main class="content">
        <div class="page-head">
          <div>
            <p class="eyebrow"><?php echo $espace; ?></p>
            <h1>Statistiques</h1>
            <p class="lead">Analysez les inscriptions, la participation et les profils de vos participants pour piloter vos expérimentations.</p>
          </div>
          <div class="actions"><a class="btn primary" href="#"><img src="Public/assets/Common/stat_Group.svg" alt="" style="filter:brightness(0) invert(1)">Exporter le rapport (PDF)</a></div>
        </div>

        <div class="filters tight">
          <label class="select flat sm"><select aria-label="Période"><option>Ce semestre</option></select></label>
          <label class="select flat sm"><select aria-label="Expérimentation"><option>Toutes les expérimentations</option><?php
            foreach ($experimentations as $exp) {
              echo '<option>' . htmlspecialchars($exp['TITRE_EXP']) . '</option>';
            }
            ?></select></label>
        </div>

        <section class="stats" aria-label="Indicateurs">
          <article class="card stat">
            <div class="top"><span class="ico sm"><img src="Public/assets/Common/stat_BiPeople.svg" alt=""></span><span class="delta neutral"><?php echo $indicateurs['nbInscriptions']; ?> inscription<?php echo $indicateurs['nbInscriptions'] > 1 ? 's' : ''; ?></span></div>
            <div class="value"><?php echo $indicateurs['nbParticipants']; ?></div><div class="label">Participants inscrits</div>
          </article>
          <article class="card stat">
            <div class="top"><span class="ico sm"><img src="Public/assets/Common/stat_Groupe.svg" alt=""></span><span class="delta neutral"><?php echo $detailTaux; ?></span></div>
            <div class="value"><?php echo $tauxParticipationMoyen; ?></div><div class="label">Taux de participation moyen</div>
          </article>
          <article class="card stat">
            <div class="top"><span class="ico sm"><img src="Public/assets/Common/stat_Trace1.svg" alt=""></span><span class="delta todo"><?php echo $indicateurs['nbAbsents']; ?> absence<?php echo $indicateurs['nbAbsents'] > 1 ? 's' : ''; ?></span></div>
            <div class="value"><?php echo $tauxAbsence; ?></div><div class="label">Taux d'absence</div>
          </article>
          <article class="card stat">
            <div class="top"><span class="ico sm"><svg width="22" height="22" viewBox="0 0 22 22" fill="none" stroke="#6d3fd1" stroke-width="1.8" stroke-linecap="round" aria-hidden="true"><path d="M11 2v18M15 6H9a2.5 2.5 0 0 0 0 5h4a2.5 2.5 0 0 1 0 5H6"/></svg></span><span class="delta neutral"><?php echo $indicateurs['nbRetributionsAEnvoyer']; ?> à envoyer</span></div>
            <div class="value"><?php echo $indicateurs['nbRetributionsEnvoyees']; ?></div><div class="label">Rétributions distribuées</div>
          </article>
        </section>

        <div class="cols stat-cols">
          <section class="card pad">
            <h2 class="big sm">Évolution des inscriptions</h2>
            <p class="sub gap">Inscriptions cumulées sur les 6 dernières semaines, selon la date du créneau</p>
            <svg viewBox="0 0 746 250" width="100%" role="img" aria-label="Inscriptions cumulées sur 6 semaines">
              <g class="chart-grid" stroke-width="1"><line x1="0" y1="77" x2="746" y2="77"/><line x1="0" y1="138" x2="746" y2="138"/><line x1="0" y1="201" x2="746" y2="201"/></g>
              <polyline points="<?php echo $polyline; ?>" fill="none" stroke="#d4451b" stroke-width="2.5" stroke-linejoin="round"/>
              <?php
              foreach ($pointsCourbe as $point) {
                echo '<circle class="chart-dot" cx="' . $point['x'] . '" cy="' . $point['y'] . '" r="4.5" stroke="#d4451b" stroke-width="2"><title>' . $point['valeur'] . ' inscriptions</title></circle>';
                echo '<text x="' . $point['x'] . '" y="236" text-anchor="middle" class="chart-lab" font-size="11" font-weight="600">' . $point['libelle'] . '</text>';
              }
              ?>
            </svg>
          </section>
          <section class="card pad fit">
            <h2 class="big sm">Répartition par genre</h2>
            <p class="sub">Profils des participants inscrits</p>
            <div class="donut-row">
              <div class="donut"><svg viewBox="0 0 144 144" width="146" height="146" role="img" aria-label="Répartition par genre" style="transform:rotate(-140deg)">
                <?php
                foreach ($segmentsDonut as $segment) {
                  echo '<circle r="60" cx="72" cy="72" fill="none" stroke="' . $segment['couleur'] . '" stroke-width="17" stroke-dasharray="' . $segment['longueur'] . ' 376.99" stroke-dashoffset="-' . $segment['decalage'] . '"/>';
                }
                ?></svg><div class="center"><b><?php echo $totalParticipants; ?></b><span>participants</span></div></div>
              <ul class="dl">
                <?php
                foreach ($legendeGenre as $genre) {
                  echo '<li><i style="background:' . $genre['couleur'] . '"></i>' . $genre['libelle'] . '<b>' . $genre['pourcent'] . '%</b></li>';
                }
                ?>
              </ul>
            </div>
          </section>
        </div>

        <div class="cols two-eq">
          <section class="card pad">
            <h2 class="big sm">Inscriptions par expérimentation</h2>
            <div class="hbars">
              <?php
              if (count($inscriptionsParExperimentation) === 0) {
                echo '<p class="sub">Aucune inscription pour le moment.</p>';
              }
              foreach ($inscriptionsParExperimentation as $stat) {
                echo '<div class="hbar"><span>' . htmlspecialchars($stat['TITRE_EXP']) . '</span><div class="track"><i style="width:' . $stat['largeur'] . '%;background:#c2580f"></i></div><b>' . $stat['NB_INSCRITS'] . '</b></div>';
              }
              ?>
            </div>
          </section>
          <section class="card pad fit">
            <h2 class="big sm">Répartition par tranche d'âge</h2>
            <div class="hbars">
              <?php
              foreach ($ages as $age) {
                echo '<div class="hbar age"><span>' . $age['LIBELLE'] . '</span><div class="track"><i style="width:' . $age['largeur'] . '%;background:var(--text)"></i></div><b>' . $age['pourcent'] . '%</b></div>';
              }
              ?>
            </div>
          </section>
        </div>

        <section class="card pad">
          <div class="exp-top"><h2 class="big sm">Taux de participation par expérimentation</h2><a class="link-b" href="index.php?Role=1&Page=4">Voir les participants</a></div>
          <table class="data plain">
            <thead><tr><th>Expérimentation</th><th>Inscrits</th><th>Présents</th><th>Taux de participation</th><th>Absences</th></tr></thead>
            <tbody>
              <?php
              if (count($statistiques) === 0) {
                echo '<tr><td colspan="5">Aucune expérimentation pour le moment.</td></tr>';
              }
              foreach ($statistiques as $stat) {
                $taux = $stat['TAUX'] !== null ? $stat['TAUX'] . '%' : '–';
                echo '<tr><td><b>' . htmlspecialchars($stat['TITRE_EXP']) . '</b></td><td>' . $stat['NB_INSCRITS'] . '</td><td>' . $stat['NB_PRESENTS'] . '</td>
                <td><span class="rate"><span class="bar"><i style="width:' . ($stat['TAUX'] ?? 0) . '%;background:' . $stat['COULEUR'] . '"></i></span><b>' . $taux . '</b></span></td><td>' . $stat['NB_ABSENTS'] . '</td></tr>';
              }
              ?>
            </tbody>
          </table>
        </section>
        <div class="footer"><?php echo $espace; ?> - Le Mans Université</div>
      </main>
    </div>
  </div>
</body>
</html>

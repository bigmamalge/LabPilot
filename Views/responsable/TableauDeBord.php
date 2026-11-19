<!DOCTYPE html>
<html lang="<?php echo strtolower($langue); ?>" data-theme="<?php echo $theme; ?>">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Tableau de bord - LabPilot</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;900&amp;display=swap" rel="stylesheet">
  <link rel="stylesheet" href="Public/css/style.css?v=<?php echo filemtime(__DIR__ . "/../../Public/css/style.css"); ?>">
  <link rel="stylesheet" href="Public/css/page.css?v=<?php echo filemtime(__DIR__ . "/../../Public/css/page.css"); ?>">
  <link rel="stylesheet" href="Public/css/responsable.css?v=<?php echo filemtime(__DIR__ . "/../../Public/css/responsable.css"); ?>">
</head>
<body>
  <div class="layout">
    <?php $ThisPage = 1;
    require_once __DIR__ . '/SideBar.php'; ?>

    <div class="main">
      <?php require_once __DIR__ . '/topbar.php'; ?>

      <main class="content">
        <div class="page-head">
          <div>
            <p class="eyebrow"><?php echo $espace; ?></p>
            <h1>Bonjour, <?php echo $prenom; ?></h1>
            <p class="lead">Vue d'ensemble des expérimentations et de l'activité de votre équipe (<?php echo htmlspecialchars($nomEquipe); ?>).</p>
          </div>
          <div class="actions"></div>
        </div>

        <section class="stats" aria-label="Indicateurs">
          <article class="card stat">
            <div class="top"><span class="ico sm "><img src="Public/assets/Common/part_Doc.svg" alt=""></span><span class="delta neutral"><?php echo $nbEnCours; ?> en cours</span></div>
            <div class="value"><?php echo $nbExperimentations; ?></div><div class="label">Expérimentations de l'équipe</div>
          </article>
          <article class="card stat">
            <div class="top"><span class="ico sm "><img src="Public/assets/Common/stat_BiPeople.svg" alt=""></span><span class="delta neutral">Tous profils</span></div>
            <div class="value"><?php echo $nbParticipants; ?></div><div class="label">Participants impliqués</div>
          </article>
          <article class="card stat">
            <div class="top"><span class="ico sm ok-bg"><img src="Public/assets/Common/Statistiques2.svg" alt=""></span><span class="delta up"><?php echo $detailTaux; ?></span></div>
            <div class="value"><?php echo $tauxParticipationMoyen; ?></div><div class="label">Taux de participation moyen</div>
          </article>
          <article class="card stat">
            <div class="top"><span class="ico sm warn"><img src="Public/assets/Common/stat_Trace1.svg" alt=""></span><?php echo $nbIncidentsOuverts > 0 ? '<span class="delta todo">À suivre</span>' : '<span class="delta neutral">Rien à signaler</span>'; ?></div>
            <div class="value"><?php echo $nbIncidentsOuverts; ?></div><div class="label">Incident<?php echo $nbIncidentsOuverts > 1 ? 's' : ''; ?> en cours</div>
          </article>
        </section>

        <div class="cols r-dash">
          <section class="card pad">
            <div class="exp-top"><h2 class="big sm">Expérimentations de l'équipe</h2><a class="link-r" href="index.php?Role=4&Page=2">Tout voir</a></div>
            <p class="sub sm">État d'avancement des études menées par l'équipe <?php echo htmlspecialchars($equipe['NOM_EQUIPE'] ?? ''); ?></p>
            <table class="data plain r-table">
              <thead><tr><th>Expérimentation</th><th>Chercheur</th><th>Statut</th><th>Avancement</th></tr></thead>
              <tbody>
              <?php
              if (count($experimentationsAffichees) === 0) {
                echo '<tr><td class="soft" colspan="4">Aucune expérimentation pour votre équipe.</td></tr>';
              }
              foreach ($experimentationsAffichees as $exp) {
                echo '<tr><td class="nm"><b>' . htmlspecialchars($exp['TITRE_EXP']) . '</b></td><td class="soft">' . htmlspecialchars($exp['chercheur']) . '</td><td><span class="pill sm ' . $exp['CLASSE_STATUT'] . '">' . $exp['LIBELLE_STATUT'] . '</span></td>
                <td><span class="rate"><span class="bar red"><i style="width:' . $exp['POURCENT'] . '%"></i></span><b>' . $exp['POURCENT'] . '%</b></span></td></tr>';
              }
              ?>
              </tbody>
            </table>
          </section>
          <section class="card pad fit">
            <h2 class="big sm">Notifications</h2>
            <div class="r-notifs">
              <?php
              if (count($notifications) === 0) {
                echo '<div class="r-notif"><div><span>Aucune notification pour le moment.</span></div></div>';
              }
              foreach ($notifications as $notification) {
                echo '<div class="r-notif"><span class="circ ' . $notification['classe'] . '"><img src="Public/assets/Common/' . $notification['icone'] . '" alt=""></span><div><b>' . $notification['titre'] . '</b><span>' . htmlspecialchars($notification['texte']) . '</span></div></div>';
              }
              ?>
            </div>
          </section>
        </div>
        <div class="footer"><?php echo $espace; ?> - Le Mans Université</div>
      </main>
    </div>
  </div>
</body>
</html>

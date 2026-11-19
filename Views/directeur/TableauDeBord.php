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
  <link rel="stylesheet" href="Public/css/directeur.css?v=<?php echo filemtime(__DIR__ . "/../../Public/css/directeur.css"); ?>">
</head>
<body>
  <div class="layout">
    <?php $ThisPage = 1;
    require_once __DIR__ . '/SideBar.php'; ?>

    <div class="main">
      <?php require_once __DIR__ . '/topbar.php'; ?>

      <main class="content">
        <div class="page-head d-head">
          <div>
            <p class="eyebrow"><?php echo $espace; ?></p>
            <h1>Bonjour, <?php echo $prenom; ?></h1>
            <p class="lead">Vue d'ensemble des expérimentations, des ressources et de la conformité du laboratoire <?php echo htmlspecialchars($sigleLabo); ?>.</p>
          </div>
          <div class="actions"></div>
        </div>

        <section class="stats" aria-label="Indicateurs">
          <article class="card stat">
            <div class="top"><span class="ico sm "><img src="Public/assets/Common/part_Doc.svg" alt=""></span><span class="delta neutral"><?php echo $nbEnCours; ?> en cours</span></div>
            <div class="value"><?php echo $nbExperimentations; ?></div><div class="label">Expérimentations du laboratoire</div>
          </article>
          <article class="card stat">
            <div class="top"><span class="ico sm "><img src="Public/assets/Common/stat_BiPeople.svg" alt=""></span><span class="delta neutral"><?php echo $nbEquipes; ?></span></div>
            <div class="value"><?php echo $nbParticipants; ?></div><div class="label">Participants impliqués</div>
          </article>
          <article class="card stat">
            <div class="top"><span class="ico sm ok-bg"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#1a8a44" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg></span><?php echo $nbConsentementsManquants === 0 ? '<span class="delta up">À jour</span>' : '<span class="delta todo">' . $nbConsentementsManquants . ' consentement' . ($nbConsentementsManquants > 1 ? 's' : '') . ' manquant' . ($nbConsentementsManquants > 1 ? 's' : '') . '</span>'; ?></div>
            <div class="value"><?php echo $conformite; ?></div><div class="label">Conformité RGPD &amp; éthique</div>
          </article>
          <article class="card stat">
            <div class="top"><span class="ico sm warn"><img src="Public/assets/Common/stat_Trace1.svg" alt=""></span><?php echo $nbIncidentsOuverts > 0 ? '<span class="delta todo">À suivre</span>' : '<span class="delta neutral">Rien à signaler</span>'; ?></div>
            <div class="value"><?php echo $nbIncidentsOuverts; ?></div><div class="label">Incident<?php echo $nbIncidentsOuverts > 1 ? 's' : ''; ?> en cours</div>
          </article>
        </section>

        <div class="cols d-dash">
          <section class="card pad">
            <div class="exp-top"><h2 class="big sm">Expérimentations du laboratoire</h2><a class="link-r" href="index.php?Role=5&Page=2">Tout voir</a></div>
            <p class="sub sm">Toutes équipes confondues</p>
            <table class="data plain r-table">
              <thead><tr><th>Expérimentation</th><th>Responsable</th><th>Équipe</th><th>Statut</th><th>Avancement</th></tr></thead>
              <tbody>
              <?php
              if (count($experimentationsAffichees) === 0) {
                echo '<tr><td class="soft" colspan="5">Aucune expérimentation dans le laboratoire.</td></tr>';
              }
              foreach ($experimentationsAffichees as $exp) {
                echo '<tr><td class="nm"><b>' . htmlspecialchars($exp['TITRE_EXP']) . '</b></td><td class="soft">' . htmlspecialchars($exp['chercheur']) . '</td><td class="soft">' . htmlspecialchars($exp['NOM_EQUIPE']) . '</td><td><span class="pill sm ' . $exp['CLASSE_STATUT'] . '">' . $exp['LIBELLE_STATUT'] . '</span></td>
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
                echo '<div class="r-notif"><span class="circ ' . $notification['classe'] . '"><img src="Public/assets/Common/' . $notification['icone'] . '" alt=""></span><div><b>' . htmlspecialchars($notification['titre']) . '</b><span>' . htmlspecialchars($notification['texte']) . '</span></div></div>';
              }
              ?>
            </div>
          </section>
        </div>
        <div class="footer"><?php echo $espace; ?></div>
      </main>
    </div>
  </div>
</body>
</html>

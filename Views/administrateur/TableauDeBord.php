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
  <link rel="stylesheet" href="Public/css/administrateur.css?v=<?php echo filemtime(__DIR__ . "/../../Public/css/administrateur.css"); ?>">
</head>
<body>
  <div class="layout">
    <?php $ThisPage = 1;
    require_once __DIR__ . '/SideBar.php'; ?>

    <div class="main">
      <?php require_once __DIR__ . '/topbar.php'; ?>

      <main class="content">
        <div class="page-head a-head">
          <div>
            <p class="eyebrow"><?php echo $espace; ?></p>
            <h1>Bonjour, <?php echo $prenom; ?></h1>
            <p class="lead">État technique et organisationnel de l'application Lab Pilot.</p>
          </div>
          <div class="actions"></div>
        </div>

        <section class="stats" aria-label="Indicateurs">
          <article class="card stat">
            <div class="top"><span class="ico "><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#3d6d89" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87M16 3.13a4 4 0 0 1 0 7.75"/></svg></span><span class="delta neutral"><?php echo $nbRoles; ?></span></div>
            <div class="value"><?php echo $nbUtilisateurs; ?></div><div class="label">Comptes utilisateurs</div>
          </article>
          <article class="card stat">
            <div class="top"><span class="ico warn"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#d4451b" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M10.3 3.9 1.8 18a2 2 0 0 0 1.7 3h17a2 2 0 0 0 1.7-3L13.7 3.9a2 2 0 0 0-3.4 0z"/><path d="M12 9v4M12 17h.01"/></svg></span><?php echo $nbErreurs > 0 ? '<span class="delta todo">À traiter</span>' : '<span class="delta neutral">Aucun</span>'; ?></div>
            <div class="value"><?php echo $nbErreurs; ?></div><div class="label">Échec<?php echo $nbErreurs > 1 ? 's' : ''; ?> de connexion</div>
          </article>
          <article class="card stat">
            <div class="top"><span class="ico ok-bg"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#1a8a44" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg></span><span class="delta neutral">Journal</span></div>
            <div class="value"><?php echo $derniereActivite; ?></div><div class="label">Dernière activité enregistrée</div>
          </article>
          <article class="card stat">
            <div class="top"><span class="ico violet-bg"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#6d3fd1" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><path d="M14 2v6h6M8 13h8M8 17h5"/></svg></span><span class="delta neutral">Partagés</span></div>
            <div class="value"><?php echo $nbModeles; ?></div><div class="label">Modèles globaux disponibles</div>
          </article>
        </section>

        <div class="cols a-dash">
          <section class="card pad">
            <div class="exp-top"><h2 class="big sm">Journaux d'activité récents</h2><a class="link-r" href="index.php?Role=6&Page=4">Tout voir</a></div>
            <table class="data plain r-table">
              <thead><tr><th>Acteur</th><th>Adresse IP</th><th>Date de connexion</th><th>Erreurs</th></tr></thead>
              <tbody>
              <?php
              if (count($journauxRecents) === 0) {
                echo '<tr><td class="soft" colspan="4">Aucune activité enregistrée.</td></tr>';
              }
              foreach ($journauxRecents as $journal) {
                echo '<tr><td class="nm"><b>' . htmlspecialchars($journal['ACTEUR']) . '</b></td><td class="soft">' . htmlspecialchars($journal['IP_ACT']) . '</td><td class="soft">' . $journal['DATE_HEURE'] . '</td><td>' . ($journal['ERREUR_JOURN'] ? '<span class="pill sm ko">Échec</span>' : '—') . '</td></tr>';
              }
              ?>
              </tbody>
            </table>
          </section>
          <section class="card pad">
            <h2 class="big sm">Notifications</h2>
            <div class="r-notifs">
              <?php
              if (count($notifications) === 0) {
                echo '<div class="r-notif"><div><span>Aucune notification pour le moment.</span></div></div>';
              }
              foreach ($notifications as $notification) {
                echo '<div class="r-notif"><span class="circ ' . $notification['classe'] . '">' . $notification['icone'] . '</span><div><b>' . $notification['titre'] . '</b><span>' . htmlspecialchars($notification['texte']) . '</span></div></div>';
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

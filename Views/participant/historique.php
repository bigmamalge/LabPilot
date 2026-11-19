<!DOCTYPE html>
<html lang="<?php echo strtolower($langue); ?>" data-theme="<?php echo $theme; ?>">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Mon historique - LabPilot</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800;900&amp;display=swap" rel="stylesheet">
  <link rel="stylesheet" href="Public/css/style.css?v=<?php echo filemtime(__DIR__ . "/../../Public/css/style.css"); ?>">
  <link rel="stylesheet" href="Public/css/page.css?v=<?php echo filemtime(__DIR__ . "/../../Public/css/page.css"); ?>">
  <link rel="stylesheet" href="Public/css/participant.css?v=<?php echo filemtime(__DIR__ . "/../../Public/css/participant.css"); ?>">
</head>
<body>
  <div class="layout">
    <?php $ThisPage = 4;
    require_once __DIR__ . '/SideBar.php'; ?>

    <div class="main">
      <?php require_once __DIR__ . '/topbar.php'; ?>

      <main class="content">

        <section class="stats hist-stats" aria-label="Indicateurs">
          <article class="card stat">
            <div class="top"><span class="ico "><img src="Public/assets/Participant/phist_Horloge.svg" alt=""></span><span class="delta neutral">Depuis votre inscription</span></div>
            <div class="value"><?php echo $nbParticipations; ?></div><div class="label">Participation<?php echo $nbParticipations > 1 ? 's' : ''; ?> totale<?php echo $nbParticipations > 1 ? 's' : ''; ?></div>
          </article>
          <article class="card stat">
            <div class="top"><span class="ico warn2"><img src="Public/assets/Participant/phist_Document.svg" alt=""></span><?php echo $nbQuestionnaires > 0 ? '<span class="delta todo">À faire</span>' : '<span class="delta neutral">À jour</span>'; ?></div>
            <div class="value"><?php echo $nbQuestionnaires; ?></div><div class="label">Questionnaire<?php echo $nbQuestionnaires > 1 ? 's' : ''; ?> à remplir</div>
          </article>
          <article class="card stat">
            <div class="top"><span class="ico violet-bg"><img src="Public/assets/Participant/phist_Euro.svg" alt=""></span><span class="delta neutral"><?php echo $nbRetributions; ?></span></div>
            <div class="value"><?php echo $montantRetributions + 0; ?> €</div><div class="label">Rétributions reçues</div>
          </article>
          <article class="card stat">
            <div class="top"><span class="ico ok-bg"><img src="Public/assets/Participant/phist_Telecharger.svg" alt=""></span><span class="delta neutral">Format PDF</span></div>
            <div class="value"><?php echo $nbAttestations; ?></div><div class="label">Attestation<?php echo $nbAttestations > 1 ? 's' : ''; ?> disponible<?php echo $nbAttestations > 1 ? 's' : ''; ?></div>
          </article>
        </section>

        <section class="card pad">
          <h2 class="big sm">Mes participations</h2>
          <div class="tabs hist-tabs" role="tablist" data-filters="#hist-table">
            <button role="tab" aria-selected="true" data-filter="all">Toutes</button>
            <button role="tab" aria-selected="false" data-filter="avenir">À venir</button>
            <button role="tab" aria-selected="false" data-filter="terminees">Terminées</button>
            <button role="tab" aria-selected="false" data-filter="annulees">Annulées</button>
          </div>
          <table class="data plain hist" id="hist-table">
            <thead><tr><th>Expérimentation</th><th>Statut</th><th>Créneau</th><th>Rétribution</th><th></th></tr></thead>
            <tbody>
              <?php
              if (count($participations) === 0) {
                echo '<tr><td class="soft" colspan="5">Aucune participation pour le moment.</td></tr>';
              }
              foreach ($participations as $participation) {
                echo '<tr data-status="' . $participation['STATUT'] . '"><td><b>' . htmlspecialchars($participation['TITRE_EXP']) . '</b></td><td><span class="tag ' . $participation['CLASSE_STATUT'] . ' sm">' . $participation['LIBELLE_STATUT'] . '</span></td><td class="soft">' . $participation['creneau'] . '</td><td>' . $participation['retribution'] . '</td><td>' . $participation['action'] . '</td></tr>';
              }
              ?>
            </tbody>
          </table>
        </section>
        <div class="footer"><?php echo $espace; ?> · Le Mans Université</div>
      </main>
    </div>
  </div>
</body>
</html>

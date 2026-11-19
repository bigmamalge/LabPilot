<!DOCTYPE html>
<html lang="<?php echo strtolower($langue); ?>" data-theme="<?php echo $theme; ?>">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Expérimentations du laboratoire - LabPilot</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;900&amp;display=swap" rel="stylesheet">
  <link rel="stylesheet" href="Public/css/style.css?v=<?php echo filemtime(__DIR__ . "/../../Public/css/style.css"); ?>">
  <link rel="stylesheet" href="Public/css/page.css?v=<?php echo filemtime(__DIR__ . "/../../Public/css/page.css"); ?>">
  <link rel="stylesheet" href="Public/css/directeur.css?v=<?php echo filemtime(__DIR__ . "/../../Public/css/directeur.css"); ?>">
</head>
<body>
  <div class="layout">
    <?php $ThisPage = 2;
    require_once __DIR__ . '/SideBar.php'; ?>

    <div class="main">
      <?php require_once __DIR__ . '/topbar.php'; ?>

      <main class="content">
        <div class="page-head d-head">
          <div>
            <p class="eyebrow"><?php echo $espace; ?></p>
            <h1>Expérimentations du laboratoire</h1>
            <p class="lead">Toutes les expérimentations menées dans le laboratoire, tous responsables et toutes équipes confondus.</p>
          </div>
          <div class="actions"></div>
        </div>

        <section class="card r-filters">
          <label class="select f"><select aria-label="Type"><option>Tous les types</option><?php
            foreach ($types as $type) {
              echo '<option>' . htmlspecialchars($type) . '</option>';
            }
            ?></select></label>
          <label class="select f"><select aria-label="Responsable"><option>Tous les responsables</option><?php
            foreach ($chercheurs as $chercheur) {
              echo '<option>' . htmlspecialchars($chercheur) . '</option>';
            }
            ?></select></label>
          <label class="select f"><select aria-label="Date"><option>Toutes les dates</option></select></label>
          <label class="select f"><select aria-label="État"><option>Tous les états</option><?php
            foreach ($etats as $etat) {
              echo '<option>' . $etat . '</option>';
            }
            ?></select></label>
        </section>

        <div class="cols d-exp">
          <div class="r-list">
            <?php
            if (count($experimentations) === 0) {
              echo '<article class="card pad r-card"><p class="desc">Aucune expérimentation dans le laboratoire.</p></article>';
            }
            foreach ($experimentations as $exp) {
              echo '<article class="card pad r-card">
              <div class="exp-top"><h3>' . htmlspecialchars($exp['TITRE_EXP']) . '</h3><span class="pill sm ' . $exp['CLASSE_STATUT'] . '">' . $exp['LIBELLE_STATUT'] . '</span></div>
              <p class="desc">' . htmlspecialchars($exp['DESC_EXP'] ?? '') . '</p>
              <div class="meta2"><div><span>Responsable</span><b>' . htmlspecialchars($exp['chercheur'] . ' · ' . $exp['NOM_EQUIPE']) . '</b></div><div><span>Période</span><b>' . $exp['PERIODE'] . '</b></div><div><span>Participants</span><b>' . $exp['nbpart'] . '/' . $exp['nbMaxPar'] . '</b></div></div>
              <a class="fiche-btn wide" href="index.php?Role=5&Page=2&Exp=' . $exp['ID_EXP'] . '">Contrôle de conformité</a>
            </article>';
            }
            ?>
          </div>
          <section class="card pad fit">
            <?php if ($experimentationDetail !== null) { ?>
            <h2 class="big sm"><?php echo htmlspecialchars($experimentationDetail['TITRE_EXP']); ?></h2>
            <p class="sub sm">Contrôle de conformité (RGPD / éthique)</p>
            <div class="kv r-kv"><div><span>Consentement requis</span><b>Oui</b></div><div><span>Consentements recueillis</span><b><?php echo $experimentationDetail['nbConsentements'] . ' / ' . $experimentationDetail['nbParticipants']; ?></b></div><div><span>Anonymisation à l'archivage</span><b><?php echo $anonymisation; ?></b></div><div><span>Statut RGPD</span><?php echo $conforme ? '<span class="pill sm ok">Conforme</span>' : '<span class="pill sm ko">À vérifier</span>'; ?></div></div>
            <?php } else { ?>
            <h2 class="big sm">Contrôle de conformité</h2>
            <p class="sub sm">Aucune expérimentation sélectionnée.</p>
            <?php } ?>
          </section>
        </div>
        <div class="footer"><?php echo $espace; ?></div>
      </main>
    </div>
  </div>
</body>
</html>

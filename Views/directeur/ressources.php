<!DOCTYPE html>
<html lang="<?php echo strtolower($langue); ?>" data-theme="<?php echo $theme; ?>">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Ressources globales - LabPilot</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;900&amp;display=swap" rel="stylesheet">
  <link rel="stylesheet" href="Public/css/style.css?v=<?php echo filemtime(__DIR__ . "/../../Public/css/style.css"); ?>">
  <link rel="stylesheet" href="Public/css/page.css?v=<?php echo filemtime(__DIR__ . "/../../Public/css/page.css"); ?>">
  <link rel="stylesheet" href="Public/css/directeur.css?v=<?php echo filemtime(__DIR__ . "/../../Public/css/directeur.css"); ?>">
</head>
<body>
  <div class="layout">
    <?php $ThisPage = 4;
    require_once __DIR__ . '/SideBar.php'; ?>

    <div class="main">
      <?php require_once __DIR__ . '/topbar.php'; ?>

      <main class="content">
        <div class="page-head d-head">
          <div>
            <p class="eyebrow"><?php echo $espace; ?></p>
            <h1>Ressources globales</h1>
            <p class="lead">Suivi de l'utilisation des salles, équipements et matériels du laboratoire, toutes équipes confondues.</p>
          </div>
          <div class="actions"></div>
        </div>

        <section class="stats" aria-label="Indicateurs">
          <article class="card stat">
            <div class="top"><span class="ico sm "><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#3d6d89" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M20 10c0 6-8 12-8 12S4 16 4 10a8 8 0 0 1 16 0z"/><circle cx="12" cy="10" r="3"/></svg></span><span class="delta neutral"><?php echo $nbSallesDisponibles; ?> disponible<?php echo $nbSallesDisponibles > 1 ? 's' : ''; ?></span></div>
            <div class="value"><?php echo count($salles); ?></div><div class="label">Salles du laboratoire</div>
          </article>
          <article class="card stat">
            <div class="top"><span class="ico sm violet-bg"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#6d3fd1" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="2" y="3" width="20" height="14" rx="2"/><path d="M8 21h8M12 17v4"/></svg></span><span class="delta neutral"><?php echo $nbEquipementsReserves; ?> réservé<?php echo $nbEquipementsReserves > 1 ? 's' : ''; ?></span></div>
            <div class="value"><?php echo count($equipements); ?></div><div class="label">Équipements &amp; matériels</div>
          </article>
          <article class="card stat">
            <div class="top"><span class="ico sm warn2"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#c1560f" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M18 20V10M12 20V4M6 20v-6"/></svg></span><span class="delta neutral">Ce mois-ci</span></div>
            <div class="value"><?php echo $tauxUtilisationMoyen; ?>%</div><div class="label">Taux d'utilisation moyen</div>
          </article>
        </section>

        <section class="card pad lg">
          <h2 class="big sm">Ressources du laboratoire</h2>
          <p class="sub sm">Part des créneaux du mois en cours qui utilisent chaque ressource</p>
          <div class="d-res-grid">
            <?php
            if (count($ressources) === 0) {
              echo '<p class="sub sm">Aucune ressource enregistrée pour le laboratoire.</p>';
            }
            foreach ($ressources as $ressource) {
              echo '<article class="d-res">
                <div class="exp-top"><span class="vbox"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#6d3fd1" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">' . $ressource['icone'] . '</svg></span><span class="pill sm ' . $ressource['CLASSE_ETAT'] . '">' . $ressource['LIBELLE_ETAT'] . '</span></div>
                <h3>' . htmlspecialchars($ressource['NOM_RESS_LABO']) . '</h3>
                <p class="line"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#52577a" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M22 19a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5l2 3h9a2 2 0 0 1 2 2z"/></svg>' . $ressource['detail'] . '</p>
                <div class="wide-bar"><span class="bar"><i style="width:' . $ressource['TAUX'] . '%;background:' . $ressource['couleur'] . '"></i></span><b>' . $ressource['TAUX'] . '%</b></div>
              </article>';
            }
            ?>
          </div>
        </section>
        <div class="footer"><?php echo $espace; ?></div>
      </main>
    </div>
  </div>
</body>
</html>

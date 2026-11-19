<!DOCTYPE html>
<html lang="<?php echo strtolower($langue); ?>" data-theme="<?php echo $theme; ?>">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Expérimentations disponibles - LabPilot</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800;900&amp;display=swap" rel="stylesheet">
  <link rel="stylesheet" href="Public/css/style.css?v=<?php echo filemtime(__DIR__ . "/../../Public/css/style.css"); ?>">
  <link rel="stylesheet" href="Public/css/page.css?v=<?php echo filemtime(__DIR__ . "/../../Public/css/page.css"); ?>">
  <link rel="stylesheet" href="Public/css/participant.css?v=<?php echo filemtime(__DIR__ . "/../../Public/css/participant.css"); ?>">
</head>
<body>
  <div class="layout">
    <?php $ThisPage = 3;
    require_once __DIR__ . '/SideBar.php'; ?>

    <div class="main">
      <?php require_once __DIR__ . '/topbar.php'; ?>

      <main class="content">
        <div class="page-head">
          <div>
            <p class="eyebrow"><?php echo $espace; ?></p>
            <h1>Expérimentations disponibles</h1>
            <p class="lead">Découvrez les études ouvertes aux inscriptions et vérifiez votre éligibilité avant de vous inscrire.</p>
          </div>
          <div class="actions"></div>
        </div>

        <section class="card pad xp-filters">
          <label class="search wide flat2"><img src="Public/assets/Participant/pexp_Svg.svg" alt=""><input type="search" placeholder="Rechercher une expérimentation..." aria-label="Rechercher"></label>
          <label class="select f"><select aria-label="Type"><option>Tous les types</option><?php
            foreach ($types as $type) {
              echo '<option>' . htmlspecialchars($type) . '</option>';
            }
            ?></select></label>
          <label class="select f"><select aria-label="Modalité"><option>Toutes les modalités</option><option>Présentiel</option><option>En ligne</option></select></label>
          <label class="select f"><select aria-label="Responsable"><option>Tous les responsables</option><?php
            foreach ($chercheurs as $chercheur) {
              echo '<option>' . htmlspecialchars($chercheur) . '</option>';
            }
            ?></select></label>
        </section>

        <div class="xp-list">
          <?php
          if (count($experimentations) === 0) {
            echo '<article class="card pad xp"><p class="desc">Aucune expérimentation disponible pour le moment.</p></article>';
          }
          foreach ($experimentations as $exp) {
            echo '<article class="card pad xp">
            <div class="exp-top"><h3>' . htmlspecialchars($exp['TITRE_EXP']) . '</h3><span class="tag ' . $exp['CLASSE_ETAT'] . ' sm">' . $exp['LIBELLE_ETAT'] . '</span></div>
            <p class="desc">' . htmlspecialchars($exp['DESC_EXP'] ?? '') . '</p>
            <div class="meta2"><div><span>Responsable</span><b>' . htmlspecialchars($exp['responsable']) . '</b></div><div><span>Modalité</span><b>' . htmlspecialchars($exp['MODALITE']) . '</b></div><div><span>Durée</span><b>' . ($exp['DUREE'] ?? 'Non définie') . '</b></div><div><span>Rétribution</span><b>' . ($exp['RETRIBUTION'] ?? 'Aucune') . '</b></div></div>
            <p class="elig ' . $exp['eligibilite'][0] . '"><img src="Public/assets/Participant/' . $exp['eligibilite'][1] . '" alt="">' . htmlspecialchars($exp['eligibilite'][2]) . '</p>
            <a class="fiche-btn ' . $exp['bouton'][0] . '" href="' . $exp['bouton'][2] . '">' . $exp['bouton'][1] . '</a>
          </article>';
          }
          ?>
        </div>
        <div class="footer"><?php echo $espace; ?> · Le Mans Université</div>
      </main>
    </div>
  </div>
</body>
</html>

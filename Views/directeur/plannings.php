<!DOCTYPE html>
<html lang="<?php echo strtolower($langue); ?>" data-theme="<?php echo $theme; ?>">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Planning global - LabPilot</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;900&amp;display=swap" rel="stylesheet">
  <link rel="stylesheet" href="Public/css/style.css?v=<?php echo filemtime(__DIR__ . "/../../Public/css/style.css"); ?>">
  <link rel="stylesheet" href="Public/css/page.css?v=<?php echo filemtime(__DIR__ . "/../../Public/css/page.css"); ?>">
  <link rel="stylesheet" href="Public/css/directeur.css?v=<?php echo filemtime(__DIR__ . "/../../Public/css/directeur.css"); ?>">
</head>
<body>
  <div class="layout">
    <?php $ThisPage = 3;
    require_once __DIR__ . '/SideBar.php'; ?>

    <div class="main">
      <?php require_once __DIR__ . '/topbar.php'; ?>

      <main class="content">
        <div class="page-head d-head">
          <div>
            <p class="eyebrow"><?php echo $espace; ?></p>
            <h1>Plannings globaux</h1>
            <p class="lead">Créneaux programmés pour l'ensemble des expérimentations du laboratoire, toutes équipes confondues.</p>
          </div>
          <div class="actions"></div>
        </div>

        <section class="card r-filters d-nav">
          <a class="circle" href="index.php?Role=5&Page=3&Equipe=<?php echo $idEquipe; ?>&Semaine=<?php echo $decalageSemaine - 1; ?>" aria-label="Semaine précédente"><img class="flip" src="Public/assets/Common/plan_ChevronRight.svg" alt=""></a>
          <a class="circle" href="index.php?Role=5&Page=3&Equipe=<?php echo $idEquipe; ?>&Semaine=<?php echo $decalageSemaine + 1; ?>" aria-label="Semaine suivante"><img src="Public/assets/Common/plan_ChevronRight.svg" alt=""></a>
          <b><?php echo $titreSemaine; ?></b>
          <div class="r-seg" role="tablist"><button role="tab" aria-selected="true" type="button">Semaine</button><button role="tab" aria-selected="false" type="button">Mois</button></div>
          <label class="select f"><select aria-label="Équipe"><option value="0">Toutes les équipes</option><?php
            foreach ($equipes as $equipe) {
              echo '<option value="' . $equipe['ID_EQUIPE'] . '"' . ($equipe['ID_EQUIPE'] == $idEquipe ? ' selected' : '') . '>' . htmlspecialchars($equipe['NOM_EQUIPE']) . '</option>';
            }
            ?></select></label>
        </section>

        <section class="card pad d-cal">
          <div class="r-week">
            <?php
            foreach ($joursSemaine as $jour) {
              echo '<div class="r-day"><div class="r-dh' . ($jour['EST_AUJOURDHUI'] ? ' now' : '') . '"><small>' . $jour['JOUR_COURT'] . '</small><b>' . $jour['NUM_JOUR'] . '</b></div><div class="r-db">';
              foreach ($jour['creneaux'] as $creneau) {
                echo '<div class="r-ev ' . $creneau['CLASSE'] . '"><b>' . $creneau['HORAIRE'] . '</b><b>' . htmlspecialchars($creneau['TITRE_EXP']) . '</b><span>' . htmlspecialchars($creneau['NOM_EQUIPE'] . ' · ' . ($creneau['SALLE'] ?? 'Salle non définie')) . '</span></div>';
              }
              echo '</div></div>';
            }
            ?>
          </div>
          <ul class="r-legend"><li><i style="background:#3d6d89"></i>Confirmé</li><li><i style="background:#d13a3a"></i>Créneau à valider</li><li><i style="background:var(--succes-text)"></i>Complet</li></ul>
        </section>
        <div class="footer"><?php echo $espace; ?></div>
      </main>
    </div>
  </div>
</body>
</html>

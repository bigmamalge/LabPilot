<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Mon planning - LabPilot</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;900&amp;display=swap" rel="stylesheet">
  <link rel="stylesheet" href="Public/css/style.css?v=<?php echo filemtime(__DIR__ . "/../../Public/css/style.css"); ?>">
  <link rel="stylesheet" href="Public/css/page.css?v=<?php echo filemtime(__DIR__ . "/../../Public/css/page.css"); ?>">
</head>
<body>
  <?php require_once __DIR__ . '/themeToggle.php'; ?>
  <div class="layout">
    <?php $ThisPage = 3;
    require_once __DIR__ . '/SideBar.php'; ?>

    <div class="main">
      <?php require_once __DIR__ . '/topbar.php'; ?>

      <main class="content">
        <div class="page-head">
          <div>
            <p class="eyebrow"><?php echo $espace; ?></p>
            <h1>Mon planning</h1>
            <p class="lead">Gérez vos créneaux, validez les demandes et suivez le remplissage de vos sessions.</p>
          </div>
          <div class="actions"><a class="btn primary" href="#"><img src="Public/assets/Common/plan_IconeAjouter.svg" alt="">Nouveau créneau</a></div>
        </div>

        <div class="cols plan-cols">
          <section class="card pad">
            <div class="cal-bar">
              <a class="circle" href="index.php?Role=1&Page=3&Semaine=<?php echo $decalageSemaine - 1; ?>" aria-label="Semaine précédente"><img src="Public/assets/Common/plan_ChevronRight.svg" alt="" style="transform:rotate(180deg)"></a>
              <h2><?php echo $titreSemaine; ?></h2>
              <a class="circle" href="index.php?Role=1&Page=3&Semaine=<?php echo $decalageSemaine + 1; ?>" aria-label="Semaine suivante"><img src="Public/assets/Common/plan_ChevronRight.svg" alt=""></a>
              <span class="grow"></span>
              <div class="seg" role="tablist"><button role="tab" aria-selected="true" type="button">Semaine</button><button role="tab" aria-selected="false" type="button">Mois</button></div>
              <label class="select sm"><select aria-label="Filtrer"><option>Toutes les expérimentations</option><?php
                foreach ($experimentations as $exp) {
                  echo '<option>' . htmlspecialchars($exp['TITRE_EXP']) . '</option>';
                }
                ?></select></label>
            </div>
            <ul class="legend"><li><i style="background:var(--text)"></i>Confirmé</li><li><i style="background:var(--primary)"></i>Créneau à valider</li><li><i style="background:var(--succes-text)"></i>Complet</li></ul>
            <div class="week">
              <?php
              foreach ($joursSemaine as $jour) {
                $numero = $jour['EST_AUJOURDHUI'] ? '<span class="today">' . $jour['NUM_JOUR'] . '</span>' : '<b>' . $jour['NUM_JOUR'] . '</b>';
                $evenements = '';
                foreach ($jour['creneaux'] as $creneau) {
                  $evenements .= '<div class="ev ' . $creneau['CLASSE'] . '" style="top:' . $creneau['POSITION_HAUT'] . 'px"><b>' . htmlspecialchars($creneau['TITRE_EXP']) . '</b><span>' . $creneau['HORAIRE'] . ' - ' . htmlspecialchars($creneau['SALLE'] ?? 'Salle non définie') . '</span><span>' . $creneau['nbInscrits'] . '/' . $creneau['NB_MAX_PAR'] . '</span></div>';
                }
                echo '<div class="day"><div class="dh"><small>' . $jour['JOUR_COURT'] . '</small>' . $numero . '</div><div class="db">' . $evenements . '</div></div>';
              }
              ?>
            </div>
          </section>

          <div class="stack">
            <section class="card pad">
              <div class="exp-top"><h2 class="big sm"><?php echo $titreJournee; ?></h2><span class="pill sm"><?php echo $nbCreneauxJournee; ?></span></div>
              <?php
              foreach ($prochaineJournee as $creneau) {
                $couleur = $creneau['COMPLET'] ? 'var(--succes-text)' : 'var(--text)';
                echo '<article class="slot-card' . ($creneau['COMPLET'] ? ' hot' : '') . '">
                <div class="st"><b class="hour' . ($creneau['COMPLET'] ? ' ok' : '') . '">' . $creneau['HEURE'] . '</b><div><b>' . htmlspecialchars($creneau['TITRE_EXP']) . '</b><span>' . htmlspecialchars($creneau['SALLE'] ?? 'Salle non définie') . ' - ' . $creneau['nbInscrits'] . '/' . $creneau['NB_MAX_PAR'] . ' inscrits</span></div></div>
                <div class="progress sm"><span class="bar"><i style="width:' . $creneau['POURCENT'] . '%;background:' . $couleur . '"></i></span><b' . ($creneau['COMPLET'] ? ' class="ok"' : '') . '>' . $creneau['libellePlaces'] . '</b></div>
              </article>';
              }
              ?>
              <?php if (count($prochaineJournee) > 0) { ?>
              <div class="btn-row"><button class="btn-lg ok-t" type="button">Valider le créneau</button><button class="btn-lg danger-t" type="button">Refuser le créneau</button></div>
              <?php } ?>
            </section>

            <section class="card pad">
              <h2 class="big sm">Nouveau créneau</h2>
              <form class="form" onsubmit="return false">
                <label>Expérimentation<span class="select"><select><?php
                  foreach ($experimentations as $exp) {
                    echo '<option>' . htmlspecialchars($exp['TITRE_EXP']) . '</option>';
                  }
                  ?></select></span></label>
                <div class="two">
                  <label>Date<span class="input icon"><input placeholder="jj/mm/aaaa"><img src="Public/assets/Common/plan_Groupe.svg" alt=""></span></label>
                  <label>Heure de début<span class="input icon"><input placeholder="hh : mm"><img src="Public/assets/Common/plan_Clock.svg" alt=""></span></label>
                </div>
                <div class="two">
                  <label>Durée<span class="select"><select><option>1 h 00</option><option>1 h 30</option></select></span></label>
                  <label>Capacité<span class="input"><input placeholder="8"></span></label>
                </div>
                <label>Salle / lieu<span class="select"><select><?php
                  foreach ($salles as $salle) {
                    echo '<option>' . htmlspecialchars($salle['NOM_RESS_LABO']) . '</option>';
                  }
                  ?></select></span></label>
                <p class="hint">Ressource associée à l'expérimentation</p>
                <button class="btn-lg primary" type="submit">Ajouter le créneau au planning</button>
              </form>
            </section>
          </div>
        </div>
        <div class="footer"><?php echo $espace; ?> - Le Mans Université</div>
      </main>
    </div>
  </div>
</body>
</html>

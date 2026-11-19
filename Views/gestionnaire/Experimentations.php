<!DOCTYPE html>
<html lang="<?php echo strtolower($langue); ?>" data-theme="<?php echo $theme; ?>">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Mes expérimentations - LabPilot</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;900&amp;display=swap"
    rel="stylesheet">
  <link rel="stylesheet" href="Public/css/style.css?v=<?php echo filemtime(__DIR__ . "/../../Public/css/style.css"); ?>">
  <link rel="stylesheet" href="Public/css/page.css?v=<?php echo filemtime(__DIR__ . "/../../Public/css/page.css"); ?>">
  <link rel="stylesheet" href="Public/css/gestionnaire.css?v=<?php echo filemtime(__DIR__ . "/../../Public/css/gestionnaire.css"); ?>">
</head>

<body>
  <div class="layout">

    <?php $ThisPage = 2;
    require_once __DIR__ . '/SideBar.php'; ?>

    <div class="main">
      <?php require_once __DIR__ . '/topbar.php'; ?>

      <main class="content">
        <div class="page-head">
          <div>
            <p class="eyebrow">espace <?php echo $poste; ?></p>
            <h1>Mes expérimentations</h1>
            <p class="lead">Créez, paramétrez et suivez l'ensemble de vos études : restrictions de participation,
              associées et rétributions.</p>
          </div>
          <div class="actions"></div>
        </div>

        <div class="cols exp-cols">
          <section class="card pad">
            <h2 class="big">Toutes mes expérimentations</h2>
            <p class="sub"><?php echo count($experimentations); ?> expérimentation<?php echo count($experimentations) > 1 ? 's' : ''; ?></p>
            <div class="tabs flat" role="tablist" data-filters="#exp-list">
              <button role="tab" aria-selected="true" data-filter="all">Toutes</button>
              <button role="tab" aria-selected="false" data-filter="run">En-cours</button>
              <button role="tab" aria-selected="false" data-filter="draft">Brouillons</button>
              <button role="tab" aria-selected="false" data-filter="done">Terminées</button>
              <button role="tab" aria-selected="false" data-filter="archived">Archivées</button>
            </div>
            <div class="exp-list" id="exp-list">
              <?php
              if (count($experimentations) === 0) {
                echo '<p class="sub">Aucune expérimentation pour le moment.</p>';
              }
              foreach ($experimentations as $exp) {
                if ($exp['STATUT'] === 'draft') {
                  $progression = '<div class="progress"><span class="bar sm"><i style="width:0%"></i></span>Aucun créneau planifié</div>';
                  $boutons = '<a class="mini solid" href="#">Terminer le paramétrage</a><a
                      class="mini plain danger" href="#">Supprimer</a>';
                } else {
                  $progression = '<div class="progress"><span class="bar sm"><i style="width:' . $exp['POURCENT'] . '%"></i></span>' . $exp['POURCENT'] . ' % rempli</div>';
                  $boutons = '<a class="mini" href="index.php?Role=2&Page=2&Exp=' . $exp['ID_EXP'] . '">Voir le détail</a><a class="mini"
                      href="index.php?Role=2&Page=3">Planning</a><a class="mini plain" href="#">Modifier</a>';
                }
                echo '<article class="exp-card" data-status="' . $exp['STATUT'] . '">
                <div class="exp-top">
                  <h3>' . htmlspecialchars($exp['TITRE_EXP']) . '</h3><span class="pill ' . $exp['CLASSE_STATUT'] . ' sm">' . $exp['LIBELLE_STATUT'] . '</span>
                </div>
                <p class="desc">' . htmlspecialchars($exp['DESC_EXP'] ?? '') . '</p>
                <div class="meta">
                  <div><span>Période</span><b>' . $exp['PERIODE'] . '</b></div>
                  <div><span>Participants</span><b>' . $exp['nbpart'] . '/' . $exp['nbMaxPar'] . '</b></div>
                  <div><span>Rétribution</span><b>' . htmlspecialchars($exp['RETRIBUTION'] ?? 'Aucune') . '</b></div>
                  <div><span>Ressources</span><b>' . $exp['libelleRessources'] . '</b></div>
                </div>
                <div class="exp-foot">
                  ' . $progression . '
                  <div class="foot-btns">' . $boutons . '</div>
                </div>
              </article>';
              }
              ?>
            </div>
          </section>

          <div class="stack">
            <section class="card pad">
              <?php if ($experimentationDetail === null) { ?>
              <h2 class="big sm">Aucune expérimentation</h2>
              <p class="sub accent">Créez votre première expérimentation pour voir ses paramètres ici.</p>
              <?php } else { ?>
              <div class="exp-top">
                <div>
                  <h2 class="big sm"><?php echo htmlspecialchars($experimentationDetail['TITRE_EXP']); ?></h2>
                  <p class="sub accent">Paramètres de l'expérimentation</p>
                </div><span class="pill <?php echo $experimentationDetail['CLASSE_STATUT']; ?> sm"><?php echo $experimentationDetail['LIBELLE_STATUT']; ?></span>
              </div>
              <div class="kv">
                <div><span>Dates</span><b><?php echo $experimentationDetail['PERIODE']; ?></b></div>
                <div><span>Durée par session</span><b><?php echo $experimentationDetail['DUREE_SESSIONS'] ?? 'Non planifiée'; ?></b></div>
                <div><span>Nombre de créneaux</span><b><?php echo $experimentationDetail['nbCreneaux']; ?></b></div>
                <div><span>Rétribution</span><b><?php echo htmlspecialchars($experimentationDetail['RETRIBUTION'] ?? 'Aucune'); ?></b></div>
                <div><span>Restrictions</span><b><?php echo htmlspecialchars($experimentationDetail['RESTRICTIONS'] ?? 'Aucune'); ?></b></div>
                <div><span>Validation des inscriptions</span><b><?php echo $experimentationDetail['VALID_INSC_EXP'] ? 'Oui' : 'Non'; ?></b></div>
              </div>
              <h3 class="h-sm">Ressources associées</h3>
              <div class="files">
                <?php
                if (count($ressourcesDetail) === 0) {
                  echo '<p class="sub">Aucune ressource associée.</p>';
                }
                foreach ($ressourcesDetail as $ressource) {
                  echo '<div class="file"><img src="Public/assets/Common/exp_RessourcesDocuments1.svg" alt="">
                  <div><b>' . htmlspecialchars($ressource['NOM_RESS']) . '</b><span>' . htmlspecialchars($ressource['TYPE_RESS']) . '</span></div>
                </div>';
                }
                ?>
              </div>
              <div class="btn-row"><a class="btn-lg dark" href="#">Modifier</a></div>
              <?php } ?>
            </section>
          </div>
        </div>
        <div class="footer">espace <?php echo $poste; ?> - Le Mans Université</div>
      </main>
    </div>
  </div>
</body>

</html>
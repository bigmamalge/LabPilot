<!DOCTYPE html>
<html lang="<?php echo strtolower($langue); ?>" data-theme="<?php echo $theme; ?>">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Tableau de bord - LabPilot</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;900&amp;display=swap"
    rel="stylesheet">
  <link rel="stylesheet" href="Public/css/style.css?v=<?php echo filemtime(__DIR__ . "/../../Public/css/style.css"); ?>">
  <link rel="stylesheet" href="Public/css/page.css?v=<?php echo filemtime(__DIR__ . "/../../Public/css/page.css"); ?>">
</head>

<body>
  <div class="layout">

    <?php $ThisPage = 1;
    require_once __DIR__ . '/SideBar.php'; ?>

    <div class="main">
      <header class="topbar">
        <label class="search">
          <img src="Public/assets/Common/RechercheIco.svg" alt="">
          <input type="search" placeholder="Rechercher une expérimentation..." aria-label="Rechercher">
        </label>
        <div class="grow"></div>
        <?php require __DIR__ . "/../commun/themeBouton.php"; ?>
        <button class="lang" type="button"><?php echo $libelleLangue; ?> <img src="Public/assets/Common/FlecheBas.svg" alt=""></button>
        <button class="icon-btn bell" type="button" aria-label="Notifications"><img
            src="Public/assets/Common/Notifications.svg" alt=""></button>
        <div class="profile">
          <span class="avatar"><?php echo $initiales; ?></span>
          <span class="who"><b><?php echo $nom_complet; ?></b><span><?php echo $poste; ?> (LIUM)</span></span>
        </div>
      </header>

      <main class="content">
        <div class="page-head">
          <div>
            <p class="eyebrow">espace <?php echo $poste; ?></p>
            <h1>Bonjour, <?php echo $prenom; ?></h1>
            <p class="lead">Voici l'état de vos expérimentations et ce qui demande votre attention aujourd'hui.</p>
          </div>
          <div class="actions">
            <a class="btn" href="index.php?Role=1&Page=5"><img src="Public/assets/Common/RessourcesDocuments2.svg" alt="">Depuis
              un modèle</a>
            <a class="btn primary" href="index.php?Role=1&Page=2"><img src="Public/assets/Common/IconeAjouter.svg"
                alt="">Créer une expérimentation</a>
          </div>
        </div>

        <section class="stats" aria-label="Indicateurs">
          <article class="card stat">
            <div class="top"><span class="ico"><img src="Public/assets/Common/CercleIcone.svg" alt=""><img class="check"
                  src="Public/assets/Common/IconeValidation.svg" alt=""></span><span class="delta up">+<?php echo $nbNouvellesCeMois; ?> ce
                mois-ci</span></div>
            <div class="value"><?php echo $nbExperimentationsActives; ?></div>
            <div class="label">Expérimentations actives</div>
          </article>
          <article class="card stat">
            <div class="top"><span class="ico warn"><img src="Public/assets/Common/IconeInscriptions.svg"
                  alt=""></span><span class="delta todo"><?php echo $nbInscriptionsEnAttente > 0 ? 'À traiter' : 'Rien à traiter'; ?></span></div>
            <div class="value"><?php echo $nbInscriptionsEnAttente; ?></div>
            <div class="label">Inscriptions en attente</div>
          </article>
          <article class="card stat">
            <div class="top"><span class="ico"><img src="Public/assets/Common/Statistiques2.svg" alt=""></span><span
                class="delta neutral"><?php echo $detailTaux; ?></span></div>
            <div class="value"><?php echo $tauxParticipationMoyen; ?></div>
            <div class="label">Taux de participation moyen</div>
          </article>
          <article class="card stat">
            <div class="top"><span class="ico"><img src="Public/assets/Common/Statistiques3.svg" alt=""></span><span
                class="delta neutral"><?php echo htmlspecialchars($salleProchaineSession); ?></span></div>
            <div class="value"><?php echo $prochaineSession; ?></div>
            <div class="label">Prochaine session</div>
          </article>
        </section>

        <div class="cols">
          <section class="card">
            <div class="panel-head">
              <div>
                <h2>Mes expérimentations</h2>
                <p><?php echo count($experimentations); ?> expérimentation<?php echo count($experimentations) > 1 ? 's' : ''; ?> · <?php echo $nbExperimentationsActives; ?> en cours</p>
              </div>
            </div>
            <div class="tabs" role="tablist" data-filters="#exp-table">
              <button role="tab" aria-selected="true" data-filter="all">Toutes</button>
              <button role="tab" aria-selected="false" data-filter="run">En cours</button>
              <button role="tab" aria-selected="false" data-filter="draft">Brouillons</button>
              <button role="tab" aria-selected="false" data-filter="done">Terminées</button>
              <button role="tab" aria-selected="false" data-filter="archived">Archivées</button>
            </div>
            <table class="data" id="exp-table">
              <thead>
                <tr>
                  <th>Expérimentation</th>
                  <th>Statut</th>
                  <th>Participants</th>
                  <th>Prochain créneau</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <?php
                if (count($experimentations) === 0) {
                  echo '<tr><td colspan="5">Aucune expérimentation pour le moment.</td></tr>';
                }
                foreach ($experimentations as $exp) {
                  $boutonPlanning = $exp['STATUT'] === 'draft' ? '' : '<button class="ghost" type="button"><img
                          src="Public/assets/Common/BoutonActionLigne1.svg" alt="Voir le planning"></button>';
                  echo '<tr data-status="' . $exp['STATUT'] . '">
                  <td class="name"><b>' . htmlspecialchars($exp['TITRE_EXP']) . '</b><small>' . $exp['PERIODE'] . '</small></td>
                  <td><span class="pill ' . $exp['CLASSE_STATUT'] . '">' . $exp['LIBELLE_STATUT'] . '</span></td>
                  <td>
                    <div class="progress"><span class="bar"><i style="width:' . $exp['POURCENT'] . '%"></i></span>' . $exp['nbpart'] . '/' . $exp['nbMaxPar'] . '</div>
                  </td>
                  <td>' . htmlspecialchars($exp['PROCHAIN_CRENEAU']) . '</td>
                  <td>
                    <div class="row-actions">' . $boutonPlanning . '<button
                        class="ghost" type="button"><img src="Public/assets/Common/BoutonActionInscription1.svg"
                          alt="Modifier"></button></div>
                  </td>
                </tr>';
                }
                ?>

              </tbody>
            </table>
          </section>

          <div class="stack">
            <section class="card">
              <div class="panel-head">
                <h2>Inscriptions à valider</h2><a href="index.php?Role=1&Page=4">Tout voir</a>
              </div>
              <?php
              if (count($inscriptionsAffichees) === 0) {
                echo '<div class="request"><div class="info"><span>Aucune inscription en attente.</span></div></div>';
              }
              foreach ($inscriptionsAffichees as $inscription) {
                $nomInscrit = htmlspecialchars($inscription['nomComplet']);
                echo '<div class="request">
                <span class="avatar">' . htmlspecialchars($inscription['initiales']) . '</span>
                <div class="info"><b>' . $nomInscrit . '</b><span>' . htmlspecialchars($inscription['TITRE_EXP']) . ' (créneau ' . $inscription['JOUR_HEURE_CREN'] . ')</span></div>
                <div class="btns">
                  <button class="ghost" type="button" aria-label="Accepter ' . $nomInscrit . '"><img
                      src="Public/assets/Common/Groupe.svg" alt=""></button>
                  <button class="ghost" type="button" aria-label="Refuser ' . $nomInscrit . '"><img
                      src="Public/assets/Common/Groupe1.svg" alt=""></button>
                </div>
              </div>';
              }
              ?>
            </section>
            <section class="card">
              <div class="panel-head">
                <h2>Prochains créneaux</h2><a href="index.php?Role=1&Page=3">Planning</a>
              </div>
              <div class="slots">
                <?php
                if (count($creneauxAffiches) === 0) {
                  echo '<div class="slot"><div><span>Aucun créneau à venir.</span></div></div>';
                }
                foreach ($creneauxAffiches as $creneau) {
                  echo '<div class="slot">
                  <div class="date">' . $creneau['JOUR'] . '<small>' . $creneau['MOIS'] . '</small></div>
                  <div><b>' . htmlspecialchars($creneau['TITRE_EXP']) . '</b><span>' . $creneau['HORAIRE'] . ' en ' . htmlspecialchars($creneau['lieu']) . ' (' . $creneau['inscrits'] . ')</span>
                  </div>
                </div>';
                }
                ?>
              </div>
            </section>
          </div>
        </div>

        <section class="card">
          <div class="panel-head">
            <h2>Activité récente</h2><a class="link-2" href="index.php?Role=1&Page=7">Incidents, annulations et
              rétributions</a>
          </div>
          <div class="feed">
            <?php
            if (count($activites) === 0) {
              echo '<div class="feed-item"><div><span>Aucune activité récente.</span></div></div>';
            }
            foreach ($activites as $activite) {
              echo '<div class="feed-item"><span class="badge ' . $activite['classeBadge'] . '"><img src="Public/assets/Common/' . $activite['icone'] . '" alt=""></span>
              <div><b>' . htmlspecialchars($activite['titre']) . '</b><span>' . htmlspecialchars($activite['texte']) . '</span></div>
            </div>';
            }
            ?>
          </div>
        </section>
        <div class="footer">espace <?php echo $poste; ?> - Le Mans Université</div>
      </main>
    </div>
  </div>
</body>

</html>
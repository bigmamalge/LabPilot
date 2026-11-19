<!DOCTYPE html>
<html lang="<?php echo strtolower($langue); ?>" data-theme="<?php echo $theme; ?>">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sécurité et maintenance - LabPilot</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;900&amp;display=swap" rel="stylesheet">
  <link rel="stylesheet" href="Public/css/style.css?v=<?php echo filemtime(__DIR__ . "/../../Public/css/style.css"); ?>">
  <link rel="stylesheet" href="Public/css/page.css?v=<?php echo filemtime(__DIR__ . "/../../Public/css/page.css"); ?>">
  <link rel="stylesheet" href="Public/css/administrateur.css?v=<?php echo filemtime(__DIR__ . "/../../Public/css/administrateur.css"); ?>">
</head>
<body>
  <div class="layout">
    <?php $ThisPage = 4;
    require_once __DIR__ . '/SideBar.php'; ?>

    <div class="main">
      <?php require_once __DIR__ . '/topbar.php'; ?>

      <main class="content">
        <div class="page-head a-head">
          <div>
            <p class="eyebrow"><?php echo $espace; ?></p>
            <h1>Sécurité et maintenance</h1>
            <p class="lead">État technique et organisationnel de l'application Lab Pilot.</p>
          </div>
          <div class="actions"></div>
        </div>

        <section class="card pad">
          <h2 class="big sm">Journaux d'activité</h2>
          <p class="sub sm">Traçabilité de toutes les connexions à l'application (acteur, adresse IP, horaires, erreurs).</p>
          <table class="data plain r-table">
            <thead><tr><th>Acteur</th><th>Adresse IP</th><th>Date de connexion</th><th>Début de session</th><th>Fin de session</th><th>Erreurs</th></tr></thead>
            <tbody>
              <?php
              if (count($journaux) === 0) {
                echo '<tr><td class="soft" colspan="6">Aucune activité enregistrée.</td></tr>';
              }
              foreach ($journaux as $journal) {
                echo '<tr><td class="nm"><b>' . htmlspecialchars($journal['ACTEUR']) . '</b></td><td class="soft">' . htmlspecialchars($journal['IP_ACT']) . '</td><td class="soft">' . $journal['DATE_JOURNAL'] . '</td><td class="soft">' . $journal['DEBUT'] . '</td><td class="soft">' . ($journal['FIN'] ?? '—') . '</td><td>' . ($journal['ERREUR_JOURN'] ? '<span class="pill sm ko">' . htmlspecialchars($journal['DESC_ACT']) . '</span>' : '—') . '</td></tr>';
              }
              ?>
            </tbody>
          </table>
        </section>

        <div class="cols a-sec">
          <div class="stack">
            <section class="card pad">
              <h2 class="big sm">Sécurité des connexions</h2>
              <div class="kv r-kv"><div><span>Échecs avant blocage</span><b><?php echo $echecsMax; ?> tentatives</b></div><div><span>Déconnexion automatique</span><b>Après <?php echo $minutesDeconnexion; ?> minutes d'inactivité</b></div><div><span>Échecs enregistrés</span><b><?php echo $nbErreurs; ?></b></div></div>            </section>
            <section class="card pad">
              <h2 class="big sm">Maintenance</h2>
              <div class="kv r-kv"><div><span>Version de l'application</span><b>Lab Pilot 1.0</b></div><div><span>Dernière activité enregistrée</span><b><?php echo $derniereActivite; ?></b></div><div><span>Statut des services</span><span class="pill sm ok">Opérationnel</span></div></div>
            </section>
          </div>
          <section class="card pad fit">
            <h2 class="big sm">Conformité RGPD</h2>
            <form class="form small" onsubmit="return false">
              <div class="switch-row"><div><b>Anonymisation automatique à l'archivage</b><span>Appliquée à l'échelle de l'application, pour toutes les expérimentations</span></div><label class="switch"><input type="checkbox" checked aria-label="Anonymisation automatique"><i></i></label></div>
              <div class="switch-row"><div><b>Consentement éthique obligatoire</b><span>Requis pour toute inscription à une expérimentation</span></div><label class="switch"><input type="checkbox" checked aria-label="Consentement éthique obligatoire"><i></i></label></div>
              <label>Durée de conservation des données après archivage<span class="select"><select><?php
                foreach ([12 => '1 an', 24 => '2 ans', 60 => '5 ans'] as $mois => $libelle) {
                  echo '<option' . ($mois === $moisConservation ? ' selected' : '') . '>' . $libelle . '</option>';
                }
                ?></select></span></label>
              <div class="save-row"><button class="btn-lg primary fit" type="submit">Enregistrer</button></div>
            </form>
          </section>
        </div>
        <div class="footer"><?php echo $espace; ?> - Le Mans Université</div>
      </main>
    </div>
  </div>
</body>
</html>

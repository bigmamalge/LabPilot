<!DOCTYPE html>
<html lang="<?php echo strtolower($langue); ?>" data-theme="<?php echo $theme; ?>">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Gestion des modèles - LabPilot</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;900&amp;display=swap" rel="stylesheet">
  <link rel="stylesheet" href="Public/css/style.css?v=<?php echo filemtime(__DIR__ . "/../../Public/css/style.css"); ?>">
  <link rel="stylesheet" href="Public/css/page.css?v=<?php echo filemtime(__DIR__ . "/../../Public/css/page.css"); ?>">
  <link rel="stylesheet" href="Public/css/administrateur.css?v=<?php echo filemtime(__DIR__ . "/../../Public/css/administrateur.css"); ?>">
</head>
<body>
  <div class="layout">
    <?php $ThisPage = 5;
    require_once __DIR__ . '/SideBar.php'; ?>

    <div class="main">
      <?php require_once __DIR__ . '/topbar.php'; ?>

      <main class="content">
        <div class="page-head a-head">
          <div>
            <p class="eyebrow"><?php echo $espace; ?></p>
            <h1>Gestion des modèles</h1>
            <p class="lead">Modèles d'expérimentation partagés par l'ensemble des équipes.</p>
          </div>
          <div class="actions"></div>
        </div>

        <div class="cols a-mod">
          <section class="card pad">
            <h2 class="big sm">Modèles globaux</h2>
            <p class="sub sm"><?php echo $nbModeles; ?> pour l'ensemble des équipes</p>
            <table class="data plain r-table">
              <thead><tr><th>Modèle</th><th>Description</th><th>Utilisé</th><th>Dernière utilisation</th><th></th></tr></thead>
              <tbody>
              <?php
              if (count($modeles) === 0) {
                echo '<tr><td class="soft" colspan="5">Aucun modèle enregistré.</td></tr>';
              }
              foreach ($modeles as $modele) {
                echo '<tr><td class="nm"><b>' . htmlspecialchars($modele['NOM_MODELE']) . '</b></td><td class="soft">' . htmlspecialchars($modele['DESC_MODELE'] ?? '') . '</td><td class="soft">' . $modele['nbUtilisations'] . ' fois</td><td class="soft">' . ($modele['DERNIERE_UTILISATION'] ?? 'Jamais') . '</td>
                <td><div class="row-actions"><button class="rnd" type="button" aria-label="Modifier"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#52577a" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M17 3a2.8 2.8 0 0 1 4 4L7.5 20.5 2 22l1.5-5.5z"/></svg></button><button class="rnd" type="button" aria-label="Dupliquer"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#52577a" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="9" y="9" width="13" height="13" rx="2"/><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"/></svg></button><button class="rnd" type="button" aria-label="Supprimer"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#d13a3a" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M3 6h18M19 6l-1 14a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2L5 6M10 11v6M14 11v6M9 6V4a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v2"/></svg></button></div></td></tr>';
              }
              ?>
              </tbody>
            </table>
          </section>
          <section class="card pad fit">
            <h2 class="big sm">Créer un modèle global</h2>
            <form class="form small tinted" onsubmit="return false">
              <label>Titre du modèle<span class="input"><input placeholder="Ex. Questionnaire post-test type"></span></label>
              <label>Description<span class="input area"><textarea rows="3" placeholder="Contenu et usage prévu du modèle…"></textarea></span></label>
              <button class="btn-lg primary" type="submit">Créer le modèle</button>
            </form>
          </section>
        </div>
        <div class="footer"><?php echo $espace; ?> - Le Mans Université</div>
      </main>
    </div>
  </div>
</body>
</html>

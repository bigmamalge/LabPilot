<?php
  $baseUrl = "index.php?Role=6&amp;Page=3";
  $sections = [
    'general'       => ['label' => 'Général',                       'icone' => '<circle cx="12" cy="12" r="4"/><path d="M12 2v2M12 20v2M4.9 4.9l1.4 1.4M17.7 17.7l1.4 1.4M2 12h2M20 12h2M4.9 19.1l1.4-1.4M17.7 6.3l1.4-1.4"/>', 'fichier' => 'general.php'],
    'donnees'       => ['label' => 'Base de données',               'icone' => '<path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>', 'fichier' => 'donnees.php'],
    'inscriptions'  => ['label' => 'Inscriptions &amp; rétributions', 'icone' => '<circle cx="12" cy="12" r="10"/><path d="m8 12 3 3 5-6"/>', 'fichier' => 'inscriptions.php'],
    'integrations'  => ['label' => 'Intégrations externes',         'icone' => '<path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6M15 3h6v6M10 14 21 3"/>', 'fichier' => 'integrations.php'],
    'apparence'     => ['label' => 'Apparence',                     'icone' => '<path d="M21 12.8A9 9 0 1 1 11.2 3a7 7 0 0 0 9.8 9.8z"/>', 'fichier' => 'apparence.php'],
  ];
  $section = $_GET['Section'] ?? 'general';
  if (!isset($sections[$section])) { $section = 'general'; }
?>
<!DOCTYPE html>
<html lang="<?php echo strtolower($langue); ?>" data-theme="<?php echo $theme; ?>">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Paramétrage de l'application - LabPilot</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;900&amp;display=swap" rel="stylesheet">
  <link rel="stylesheet" href="Public/css/style.css?v=<?php echo filemtime(__DIR__ . "/../../Public/css/style.css"); ?>">
  <link rel="stylesheet" href="Public/css/page.css?v=<?php echo filemtime(__DIR__ . "/../../Public/css/page.css"); ?>">
  <link rel="stylesheet" href="Public/css/administrateur.css?v=<?php echo filemtime(__DIR__ . "/../../Public/css/administrateur.css"); ?>">
</head>
<body>
  <div class="layout">
    <?php $ThisPage = 3;
    require_once __DIR__ . '/SideBar.php'; ?>

    <div class="main">
      <?php require_once __DIR__ . '/topbar.php'; ?>

      <main class="content">
        <div class="page-head a-head">
          <div>
            <p class="eyebrow"><?php echo $espace; ?></p>
            <h1>Paramétrage de l'application</h1>
            <p class="lead">Configuration générale, règles d'inscription, rétributions et intégrations externes.</p>
          </div>
          <div class="actions"></div>
        </div>

        <div class="a-set">
          <nav class="card set-nav" aria-label="Paramètres">
            <?php foreach ($sections as $cle => $s): ?>
              <a href="<?php echo $baseUrl; ?>&amp;Section=<?php echo $cle; ?>"<?php echo $cle === $section ? ' aria-current="true"' : ''; ?>><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="<?php echo $cle === $section ? '#d4451b' : '#52577a'; ?>" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><?php echo $s['icone']; ?></svg><?php echo $s['label']; ?></a>
            <?php endforeach; ?>
          </nav>
          <section class="card pad">
            <?php require __DIR__ . '/parametrage/' . $sections[$section]['fichier']; ?>
          </section>
        </div>
        <div class="footer"><?php echo $espace; ?> - Le Mans Université</div>
      </main>
    </div>
  </div>
</body>
</html>

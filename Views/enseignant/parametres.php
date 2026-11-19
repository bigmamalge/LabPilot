<?php
  $baseUrl = "index.php?Role=1&amp;Page=8";
  $sections = [
    'profil'          => ['label' => 'Profil',                  'icone' => 'par_Trace1.svg', 'fichier' => 'profil.php'],
    'preferences'     => ['label' => 'Préférences',             'icone' => 'par_Trace2.svg', 'fichier' => 'preferences.php'],
    'notifications'   => ['label' => 'Notifications',           'icone' => 'par_Trace3.svg', 'fichier' => 'notifications.php'],
    'securite'        => ['label' => 'Sécurité',                'icone' => 'par_Trace4.svg', 'fichier' => 'securite.php'],
    'modeles'         => ['label' => 'Mes modèles',             'icone' => 'par_Trace5.svg', 'fichier' => 'modeles.php'],
    'integrations'    => ['label' => 'Intégrations',            'icone' => 'par_Trace6.svg', 'fichier' => 'integrations.php'],
    'confidentialite' => ['label' => 'Confidentialité &amp; RGPD',  'icone' => 'par_Trace7.svg', 'fichier' => 'confidentialite.php'],
  ];
  $section = $_GET['Section'] ?? 'profil';
  if (!isset($sections[$section])) { $section = 'profil'; }
?>
<!DOCTYPE html>
<html lang="<?php echo strtolower($langue); ?>" data-theme="<?php echo $theme; ?>">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Paramètres - LabPilot</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;900&amp;display=swap" rel="stylesheet">
  <link rel="stylesheet" href="Public/css/style.css?v=<?php echo filemtime(__DIR__ . "/../../Public/css/style.css"); ?>">
  <link rel="stylesheet" href="Public/css/page.css?v=<?php echo filemtime(__DIR__ . "/../../Public/css/page.css"); ?>">
</head>
<body>
  <div class="layout">
    <?php $ThisPage = 8;
    require_once __DIR__ . '/SideBar.php'; ?>

    <div class="main">
      <?php require_once __DIR__ . '/topbar.php'; ?>

      <main class="content">
        <div class="page-head">
          <div>
            <p class="eyebrow"><?php echo $espace; ?></p>
            <h1>Paramètres</h1>
            <p class="lead">Gérez votre profil, vos préférences d'affichage, vos notifications et la confidentialité de vos données.</p>
          </div>
          <div class="actions"></div>
        </div>

        <div class="set-cols">
          <nav class="card set-nav" aria-label="Paramètres">
            <?php foreach ($sections as $cle => $s): ?>
              <a href="<?php echo $baseUrl; ?>&amp;Section=<?php echo $cle; ?>"<?php echo $cle === $section ? ' aria-current="true"' : ''; ?>><img src="Public/assets/Common/<?php echo $s['icone']; ?>" alt=""><?php echo $s['label']; ?></a>
            <?php endforeach; ?>
          </nav>
          <section class="card pad lg set-form">
            <?php require __DIR__ . '/parametres/' . $sections[$section]['fichier']; ?>
          </section>
        </div>
        <div class="footer"><?php echo $espace; ?> - Le Mans Université</div>
      </main>
    </div>
  </div>
</body>
</html>

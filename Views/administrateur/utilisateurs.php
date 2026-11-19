<!DOCTYPE html>
<html lang="<?php echo strtolower($langue); ?>" data-theme="<?php echo $theme; ?>">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Gestion des utilisateurs - LabPilot</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;900&amp;display=swap" rel="stylesheet">
  <link rel="stylesheet" href="Public/css/style.css?v=<?php echo filemtime(__DIR__ . "/../../Public/css/style.css"); ?>">
  <link rel="stylesheet" href="Public/css/page.css?v=<?php echo filemtime(__DIR__ . "/../../Public/css/page.css"); ?>">
  <link rel="stylesheet" href="Public/css/administrateur.css?v=<?php echo filemtime(__DIR__ . "/../../Public/css/administrateur.css"); ?>">
</head>
<body>
  <div class="layout">
    <?php $ThisPage = 2;
    require_once __DIR__ . '/SideBar.php'; ?>

    <div class="main">
      <?php require_once __DIR__ . '/topbar.php'; ?>

      <main class="content">
        <div class="page-head a-head">
          <div>
            <p class="eyebrow"><?php echo $espace; ?></p>
            <h1>Gestion des utilisateurs</h1>
            <p class="lead">Créez, modifiez et supprimez les comptes, et gérez les rôles et permissions des utilisateurs.</p>
          </div>
          <div class="actions"></div>
        </div>

        <section class="card pad">
          <h2 class="big sm">Comptes utilisateurs</h2>
          <p class="sub sm"><?php echo $nbComptes; ?></p>
          <table class="data plain r-table users">
            <thead><tr><th>Utilisateur</th><th>Rôle</th><th>Statut</th><th>Dernière activité</th><th></th></tr></thead>
            <tbody>
              <?php
              foreach ($utilisateurs as $utilisateur) {
                if ($utilisateur['ID_USER'] == $_SESSION['id']) {
                  $actions = '<span class="you">Vous</span>';
                } else {
                  $actions = '<button class="rnd" type="button" aria-label="Modifier ' . htmlspecialchars($utilisateur['nomComplet']) . '"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#52577a" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M17 3a2.8 2.8 0 0 1 4 4L7.5 20.5 2 22l1.5-5.5z"/></svg></button><button class="rnd" type="button" aria-label="Supprimer ' . htmlspecialchars($utilisateur['nomComplet']) . '"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#d13a3a" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M3 6h18M19 6l-1 14a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2L5 6M10 11v6M14 11v6M9 6V4a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v2"/></svg></button>';
                }
                echo '<tr><td><span class="who2"><span class="av">' . $utilisateur['initiales'] . '</span><span class="who-t"><b>' . htmlspecialchars($utilisateur['nomComplet']) . '</b><small>' . htmlspecialchars($utilisateur['MAIL_USER']) . '</small></span></span></td>
                <td><span class="tag sm">' . htmlspecialchars($utilisateur['LIB_ROLE']) . '</span></td><td>' . ($utilisateur['actif'] ? '<span class="pill sm ok">Actif</span>' : '<span class="pill sm ko">Sans accès SSO</span>') . '</td><td class="soft">' . $utilisateur['activite'] . '</td><td><div class="row-actions">' . $actions . '</div></td></tr>';
              }
              ?>
            </tbody>
          </table>
        </section>

        <div class="cols a-users">
          <section class="card pad">
            <h2 class="big sm">Créer un compte</h2>
            <form class="form small tinted" onsubmit="return false">
              <label>Nom complet<span class="input"><input placeholder="Ex. Nadia Khelif"></span></label>
              <label>Adresse e-mail<span class="input"><input placeholder="prenom.nom@univ-lemans.fr"></span></label>
              <label>Rôle<span class="select"><select><?php
                foreach ($roles as $role) {
                  echo '<option>' . htmlspecialchars($role['LIB_ROLE']) . '</option>';
                }
                ?></select></span></label>
              <label>Laboratoire / Équipe<span class="input"><input placeholder="<?php echo htmlspecialchars($exempleEquipe); ?>"></span></label>
              <button class="btn-lg primary" type="submit">Créer le compte</button>
            </form>
          </section>
          <section class="card pad fit">
            <h2 class="big sm">Rôles et permissions</h2>
            <div class="perms">
              <?php
              foreach ($roles as $role) {
                echo '<div class="perm"><span>' . htmlspecialchars($role['LIB_ROLE']) . '</span><b>' . $role['permissions'] . '</b><button class="rnd" type="button" aria-label="Modifier ' . htmlspecialchars($role['LIB_ROLE']) . '"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#52577a" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M17 3a2.8 2.8 0 0 1 4 4L7.5 20.5 2 22l1.5-5.5z"/></svg></button></div>';
              }
              ?>
            </div>
          </section>
        </div>
        <div class="footer"><?php echo $espace; ?> - Le Mans Université</div>
      </main>
    </div>
  </div>
</body>
</html>

<?php
// Thème de l'utilisateur (enregistré en base) appliqué à toutes les pages.
require_once __DIR__ . '/../../models/tables/utilisateurs/UtilisateurModel.php';
$themeUser = (new UtilisateurModel())->getUtilisateurById((int) $_SESSION['id']);
$themeSombreGlobal = $themeUser !== null && $themeUser['THEME_USER'] === 'Sombre';
?>
<input type="checkbox" id="theme-toggle" class="theme-check" aria-label="Mode sombre"<?php echo $themeSombreGlobal ? ' checked' : ''; ?>>
<script>
  (function () {
    var toggle = document.getElementById('theme-toggle');
    toggle.addEventListener('change', function () {
      var pref = document.getElementById('pref-theme');
      if (pref) { pref.checked = toggle.checked; }
      fetch('index.php?Controlleur=theme', {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: 'theme=' + (toggle.checked ? 'Sombre' : 'Clair')
      });
    });
  })();
</script>

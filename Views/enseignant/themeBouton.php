<form method="post" action="index.php?Controlleur=theme" class="theme-form">
  <input type="hidden" name="theme" value="<?php echo $themeSombreGlobal ? 'Clair' : 'Sombre'; ?>">
  <input type="hidden" name="retour" value="<?php echo htmlspecialchars($themeRetour); ?>">
  <button type="submit" class="icon-btn theme-btn" aria-label="<?php echo $themeSombreGlobal ? 'Passer en thème clair' : 'Passer en thème sombre'; ?>">
    <?php if ($themeSombreGlobal): ?>
      <img src="Public/assets/Common/Soleil.svg" alt="">
    <?php else: ?>
      <img src="Public/assets/Common/Trace.svg" alt="">
    <?php endif; ?>
  </button>
</form>

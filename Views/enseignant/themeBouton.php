<form method="post" action="index.php?Controlleur=theme" class="theme-form">
  <input type="hidden" name="theme" value="<?php echo $themeInverse; ?>">
  <input type="hidden" name="retour" value="<?php echo htmlspecialchars($themeRetour); ?>">
  <button type="submit" class="icon-btn theme-btn" aria-label="Passer en thème <?php echo strtolower($themeInverse); ?>">
    <img src="Public/assets/Common/<?php echo $theme === 'Sombre' ? 'Soleil.svg' : 'Trace.svg'; ?>" alt="">
  </button>
</form>

<h2 class="big sm">Apparence</h2>
<form class="form small tinted" onsubmit="return false">
  <label>Thème par défaut des nouveaux comptes<span class="select"><select><option<?php echo $themeDefaut === 'Clair' ? ' selected' : ''; ?>>Clair</option><option<?php echo $themeDefaut === 'Sombre' ? ' selected' : ''; ?>>Sombre</option></select></span></label>
  <label>Langue par défaut des nouveaux comptes<span class="select"><select><option<?php echo $langueDefaut === 'FR' ? ' selected' : ''; ?>>Français</option><option<?php echo $langueDefaut === 'EN' ? ' selected' : ''; ?>>English</option></select></span></label>
  <div class="save-row"><button class="btn-lg primary fit" type="submit">Enregistrer</button></div>
</form>

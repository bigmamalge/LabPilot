<h2 class="big sm">Base de données</h2>
<p class="sub sm">Paramètres enregistrés dans la base de l'application.</p>
<div class="set-list">
  <?php
  if (count($parametres) === 0) {
    echo '<p class="sub sm">Aucun paramètre enregistré.</p>';
  }
  foreach ($parametres as $parametre) {
    echo '<div class="set-row"><div><b>' . htmlspecialchars($parametre['DESC_PARAM'] ?? $parametre['CLE_PARAM']) . '</b><span>' . htmlspecialchars($parametre['CLE_PARAM']) . '</span></div><span class="chip">' . htmlspecialchars($parametre['VAL_PARAM']) . '</span></div>';
  }
  ?>
</div>

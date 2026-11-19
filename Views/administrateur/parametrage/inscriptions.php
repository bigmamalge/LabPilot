<h2 class="big sm">Inscriptions &amp; rétributions</h2>
<form class="form small" onsubmit="return false">
  <div class="set-row"><div><b>Validation des inscriptions</b><span>Les inscriptions doivent être validées par le responsable de l'expérimentation.</span></div><label class="switch"><input type="checkbox"<?php echo $validationInscription ? ' checked' : ''; ?>><i></i></label></div>
  <h3 class="set-h3">Types de rétribution</h3>
  <div class="set-list">
    <?php
    foreach ($retributions as $retribution) {
      echo '<div class="set-row"><div><b>' . htmlspecialchars($retribution['TYPE_RETRIB']) . '</b><span>' . htmlspecialchars($retribution['DESC_RETRIB'] ?? '') . '</span></div><span class="chip">' . str_replace(',00', '', number_format($retribution['VAL_RETRIB'], 2, ',', ' ')) . ' €</span></div>';
    }
    ?>
  </div>
  <div class="save-row"><button class="btn-lg primary fit" type="submit">Enregistrer</button></div>
</form>

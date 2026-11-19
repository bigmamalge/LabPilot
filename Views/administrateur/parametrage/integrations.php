<h2 class="big sm">Intégrations externes</h2>
<p class="sub sm">Services externes connectés à LabPilot.</p>
<div class="set-list">
  <?php
  if (count($integrations) === 0) {
    echo '<p class="sub sm">Aucune intégration disponible.</p>';
  }
  foreach ($integrations as $integration) {
    $etat = $integration['ACTIF_INTEG'] ? '<span class="pill sm ok">Active</span>' : '<span class="pill sm ko">Inactive</span>';
    echo '<div class="set-row"><div><b>' . htmlspecialchars($integration['NOM_INTEG']) . '</b><span>' . htmlspecialchars($integration['URL_INTEG'] ?? '') . '</span></div>' . $etat . '</div>';
  }
  ?>
</div>

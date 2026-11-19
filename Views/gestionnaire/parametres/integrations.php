<h2 class="big sm">Intégrations</h2>
<p class="hint tight">Connectez LabPilot à vos outils habituels.</p>
<div class="set-list">
  <?php
  if (count($integrations) === 0) {
    echo '<p class="hint tight">Aucune intégration disponible.</p>';
  }
  foreach ($integrations as $integration) {
    $etat = $integration['ACTIF_INTEG'] ? '<span class="chip">Connecté</span>' : '<button class="btn-lg sm" type="button">Connecter</button>';
    echo '<div class="set-row"><div><b>' . htmlspecialchars($integration['NOM_INTEG']) . '</b><span>' . htmlspecialchars($integration['URL_INTEG'] ?? '') . '</span></div>' . $etat . '</div>';
  }
  ?>
</div>

<h2 class="big sm">Mes modèles</h2>
<p class="hint tight">Modèles de protocole utilisés par vos expérimentations.</p>
<div class="set-list">
  <?php
  if (count($mesModeles) === 0) {
    echo '<p class="hint tight">Aucun modèle utilisé pour le moment.</p>';
  }
  foreach ($mesModeles as $modele) {
    echo '<div class="set-row"><div><b>' . htmlspecialchars($modele['NOM_MODELE']) . '</b><span>' . htmlspecialchars($modele['DESC_MODELE'] ?? '') . '</span></div><span class="chip">' . $modele['nbUtilisations'] . ' expérimentation' . ($modele['nbUtilisations'] > 1 ? 's' : '') . '</span></div>';
  }
  ?>
</div>
<div class="save-row"><button class="btn-lg primary" type="button">Nouveau modèle</button></div>

<h2 class="big sm">Confidentialité &amp; RGPD</h2>
<form class="form small" onsubmit="return false">
  <div class="set-row"><div><b>Consentement au traitement des données</b><span>Accord donné pour l'utilisation de vos données dans LabPilot.</span></div><label class="switch"><input type="checkbox"<?php echo $consentement ? ' checked' : ''; ?>><i></i></label></div>
  <div class="set-row"><div><b>Anonymiser les données exportées</b><span>Retire les informations d'identification des exports.</span></div><label class="switch"><input type="checkbox"<?php echo $anonyme ? ' checked' : ''; ?>><i></i></label></div>
  <div class="set-row"><div><b>Afficher mon profil aux collègues</b><span>Visible des autres enseignants-chercheurs du laboratoire.</span></div><label class="switch"><input type="checkbox" checked><i></i></label></div>
  <label>Durée de conservation des données participants<span class="select"><select><?php
    foreach ([12 => '1 an', 24 => '2 ans', 36 => '3 ans', 60 => '5 ans'] as $mois => $libelle) {
      echo '<option' . ($mois === $moisConservation ? ' selected' : '') . '>' . $libelle . '</option>';
    }
    ?></select></span></label>
  <h3 class="set-h3">Mes données</h3>
  <div class="set-row"><div><b>Télécharger mes données</b><span>Archive de vos données personnelles.</span></div><button class="btn-lg sm" type="button">Télécharger</button></div>
  <div class="set-row"><div><b>Demande de suppression</b><span>Contactez le délégué à la protection des données.</span></div><button class="btn-lg sm" type="button">Contacter</button></div>
  <div class="save-row"><button class="btn-lg primary" type="submit">Enregistrer les modifications</button><a href="<?php echo $baseUrl; ?>&amp;Section=confidentialite">Annuler</a></div>
</form>

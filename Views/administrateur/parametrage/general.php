<h2 class="big sm">Général</h2>
<form class="form small tinted" onsubmit="return false">
  <label>Nom de l'application<span class="input"><input value="<?php echo htmlspecialchars($nomApplication); ?>"></span></label>
  <label>URL de l'application<span class="input"><input placeholder="https://labpilot.univ-lemans.fr"></span></label>
  <label>Nom du laboratoire<span class="select"><select><?php
    foreach ($laboratoires as $laboratoire) {
      echo '<option>' . htmlspecialchars($laboratoire['SIGLE_LABO'] . ' — ' . $laboratoire['NOM_LABO']) . '</option>';
    }
    ?></select></span></label>
  <div class="save-row"><button class="btn-lg primary fit" type="submit">Enregistrer</button></div>
</form>

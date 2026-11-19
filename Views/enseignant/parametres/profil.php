<h2 class="big sm">Profil</h2>
<div class="photo"><span class="avatar xl"><?php echo $initiales; ?></span><div><button class="btn-lg sm" type="button">Changer la photo</button><small>JPG ou PNG, 2 Mo maximum.</small></div></div>
<form class="form small" onsubmit="return false">
  <div class="two">
    <label>Nom complet<span class="input"><input value="<?php echo htmlspecialchars($nom_complet); ?>"></span></label>
    <label>Fonction<span class="input muted"><input value="<?php echo htmlspecialchars($poste); ?>"></span></label>
  </div>
  <label>Adresse e-mail<span class="input muted"><input value="<?php echo htmlspecialchars($email ?? ''); ?>" readonly></span></label>
  <p class="hint tight">Gérée par l'authentification unique (SSO) de l'université - non modifiable ici.</p>
  <div class="two">
    <label>Laboratoire<span class="select"><select><?php
      foreach ($laboratoires as $laboratoire) {
        $selection = $laboratoire['ID_LABO'] == $idLaboUtilisateur ? ' selected' : '';
        echo '<option' . $selection . '>' . htmlspecialchars($laboratoire['SIGLE_LABO'] . ' - ' . $laboratoire['NOM_LABO']) . '</option>';
      }
      ?></select></span></label>
    <label>Équipe de recherche<span class="select"><select><?php
      foreach ($equipes as $equipe) {
        $selection = $equipe['ID_EQUIPE'] == $idEquipeUtilisateur ? ' selected' : '';
        echo '<option' . $selection . '>' . htmlspecialchars($equipe['NOM_EQUIPE']) . '</option>';
      }
      ?></select></span></label>
  </div>
  <label>Téléphone (optionnel)<span class="input"><input placeholder="02 43 00 00 00"></span></label>
  <label>Présentation courte<span class="input area"><textarea rows="3" placeholder="Quelques mots sur vos travaux de recherche..."></textarea></span></label>
  <div class="save-row"><button class="btn-lg primary" type="submit">Enregistrer les modifications</button><a href="<?php echo $baseUrl; ?>&amp;Section=profil">Annuler</a></div>
</form>

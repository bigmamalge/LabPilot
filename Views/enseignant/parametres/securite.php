<h2 class="big sm">Sécurité</h2>
<form class="form small" onsubmit="return false">
  <p class="hint tight">La connexion est gérée par l'authentification unique (SSO) de l'université. Le mot de passe se modifie depuis votre compte universitaire.</p>
  <div class="set-row"><div><b>Authentification à deux facteurs</b><span>Protection supplémentaire à chaque connexion.</span></div><label class="switch"><input type="checkbox"><i></i></label></div>
  <div class="set-row"><div><b>Alerte de connexion inhabituelle</b><span>Être prévenu par e-mail d'une connexion depuis un nouvel appareil.</span></div><label class="switch"><input type="checkbox" checked><i></i></label></div>
  <label>Déconnexion automatique après inactivité<span class="select"><select><option>15 minutes</option><option selected>30 minutes</option><option>1 heure</option></select></span></label>
  <h3 class="set-h3">Sessions actives</h3>
  <div class="set-row"><div><b>Cet appareil</b><span>Navigateur actuel</span></div><span class="chip">Actif</span></div>
  <div class="save-row"><button class="btn-lg primary" type="submit">Enregistrer les modifications</button><a href="<?php echo $baseUrl; ?>&amp;Section=securite">Annuler</a></div>
</form>

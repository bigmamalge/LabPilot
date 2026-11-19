<h2 class="big sm">Préférences</h2>
<form class="form small" method="post" action="index.php?Controlleur=theme">
  <input type="hidden" name="retour" value="index.php?Role=2&amp;Page=7&amp;Section=preferences">
  <div class="two">
    <label>Langue<span class="select"><select name="langue"><option value="FR"<?php echo $langue === 'FR' ? ' selected' : ''; ?>>Français</option><option value="EN"<?php echo $langue === 'EN' ? ' selected' : ''; ?>>English</option></select></span></label>
    <label>Fuseau horaire<span class="select"><select><option>Europe/Paris (UTC+1)</option></select></span></label>
  </div>
  <div class="two">
    <label>Format de date<span class="select"><select><option>JJ/MM/AAAA</option><option>AAAA-MM-JJ</option></select></span></label>
    <label>Première page affichée<span class="select"><select><option>Tableau de bord</option><option>Mes expérimentations</option><option>Planning</option></select></span></label>
  </div>
  <div class="set-row"><div><b>Mode sombre</b><span>Utiliser le thème sombre par défaut.</span></div><label class="switch"><input type="hidden" name="theme" value="Clair"><input type="checkbox" name="theme" value="Sombre"<?php echo $theme === 'Sombre' ? ' checked' : ''; ?>><i></i></label></div>
  <div class="set-row"><div><b>Affichage compact</b><span>Réduire l'espacement dans les listes et tableaux.</span></div><label class="switch"><input type="checkbox"><i></i></label></div>
  <div class="save-row"><button class="btn-lg primary" type="submit">Enregistrer les modifications</button><a href="<?php echo $baseUrl; ?>&amp;Section=preferences">Annuler</a></div>
</form>

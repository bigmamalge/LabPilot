<h2 class="big sm">Notifications</h2>
<form class="form small" onsubmit="return false">
  <div class="set-row"><div><b>Nouvelle inscription</b><span>Un participant s'inscrit à une séance.</span></div><label class="switch"><input type="checkbox" checked><i></i></label></div>
  <div class="set-row"><div><b>Annulation de participation</b><span>Un participant annule sa venue.</span></div><label class="switch"><input type="checkbox" checked><i></i></label></div>
  <div class="set-row"><div><b>Rappel de séance</b><span>Rappel 24 h avant chaque séance planifiée.</span></div><label class="switch"><input type="checkbox" checked><i></i></label></div>
  <div class="set-row"><div><b>Validation d'une expérimentation</b><span>Décision du comité d'éthique ou de l'administration.</span></div><label class="switch"><input type="checkbox"><i></i></label></div>
  <div class="set-row"><div><b>Récapitulatif hebdomadaire</b><span>Synthèse de l'activité envoyée chaque lundi.</span></div><label class="switch"><input type="checkbox"><i></i></label></div>
  <fieldset class="set-fs"><legend>Canaux de réception</legend>
    <div class="opts"><label class="opt"><input type="checkbox" checked>E-mail</label><label class="opt"><input type="checkbox" checked>Dans l'application</label></div>
  </fieldset>
  <div class="save-row"><button class="btn-lg primary" type="submit">Enregistrer les modifications</button><a href="<?php echo $baseUrl; ?>&amp;Section=notifications">Annuler</a></div>
</form>

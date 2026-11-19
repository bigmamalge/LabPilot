<!DOCTYPE html>
<html lang="<?php echo strtolower($langue); ?>" data-theme="<?php echo $theme; ?>">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Mon profil - LabPilot</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800;900&amp;display=swap" rel="stylesheet">
  <link rel="stylesheet" href="Public/css/style.css?v=<?php echo filemtime(__DIR__ . "/../../Public/css/style.css"); ?>">
  <link rel="stylesheet" href="Public/css/page.css?v=<?php echo filemtime(__DIR__ . "/../../Public/css/page.css"); ?>">
  <link rel="stylesheet" href="Public/css/participant.css?v=<?php echo filemtime(__DIR__ . "/../../Public/css/participant.css"); ?>">
</head>
<body>
  <div class="layout">
    <?php $ThisPage = 2;
    require_once __DIR__ . '/SideBar.php'; ?>

    <div class="main">
      <?php require_once __DIR__ . '/topbar.php'; ?>

      <main class="content">
        <div class="page-head">
          <div>
            <p class="eyebrow"><?php echo $espace; ?></p>
            <h1>Mon profil</h1>
            <p class="lead">Ces informations permettent aux chercheurs de vérifier votre éligibilité aux expérimentations. Elles restent confidentielles et ne sont jamais partagées sans votre consentement.</p>
          </div>
          <div class="actions"></div>
        </div>

        <div class="cols prof-cols">
          <section class="card pad">
            <h2 class="big sm">Informations personnelles</h2>
            <div class="photo"><span class="avatar xl soft"><?php echo $initiales; ?></span><div><button class="btn-lg sm" type="button">Changer la photo</button><small>JPG ou PNG, 2 Mo maximum.</small></div></div>
            <form class="form small tinted" onsubmit="return false">
              <div class="two">
                <label>Nom complet<span class="input"><input value="<?php echo htmlspecialchars($nom_complet); ?>"></span></label>
                <label>Adresse e-mail<span class="input"><input value="<?php echo htmlspecialchars($email); ?>"></span></label>
              </div>
              <div class="two">
                <label>Âge<span class="input"><input value="<?php echo $age !== null ? $age . ' ans' : ''; ?>" placeholder="Non renseigné"></span></label>
                <label>Genre<span class="select"><select><?php
                  foreach ($genres as $valeur => $libelle) {
                    echo '<option' . ($genre === $valeur ? ' selected' : '') . '>' . $libelle . '</option>';
                  }
                  ?></select></span></label>
              </div>
              <p class="hint tight">Utilisé pour vérifier les critères d'âge des études.</p>
              <fieldset class="langs"><legend>Langues parlées</legend>
                <?php
                foreach ($langues as $valeur => $libelle) {
                  echo '<label class="chk"><input type="checkbox"' . ($langueParlee === $valeur ? ' checked' : '') . '> ' . $libelle . '</label>';
                }
                ?>
              </fieldset>
              <div class="two">
                <label>Port de lunettes / lentilles<span class="select"><select><option<?php echo !$lunettes ? ' selected' : ''; ?>>Non</option><option<?php echo $lunettes ? ' selected' : ''; ?>>Oui</option></select></span></label>
                <label>Main dominante<span class="select"><select><option>Droite</option><option>Gauche</option></select></span></label>
              </div>
              <label>Contraintes ou spécificités particulières<span class="input area"><textarea rows="3" placeholder="Ex. allergies, mobilité réduite, trouble auditif…"><?php echo htmlspecialchars($contraintes); ?></textarea></span></label>
              <p class="hint tight">Facultatif - permet aux chercheurs d'adapter le déroulement de leurs sessions.</p>
              <div class="save-row"><button class="btn-lg primary" type="submit">Enregistrer les modifications</button><button class="btn-lg outline" type="reset">Annuler</button></div>
            </form>
          </section>
          <div class="stack">
            <section class="card pad">
              <div class="exp-top"><h2 class="big sm">Consentement éthique</h2><?php echo $consentement ? '<span class="tag ok sm">Donné</span>' : '<span class="tag ko sm">Non donné</span>'; ?></div>
              <p class="txt"><?php echo $consentement ? 'Consentement enregistré' : 'Aucun consentement enregistré'; ?> - condition requise pour vous inscrire aux expérimentations.</p>
              <div class="btn-row tight"><button class="btn-lg sm" type="button">Voir le formulaire</button><button class="btn-lg sm outline danger-u" type="button"><?php echo $consentement ? 'Retirer mon consentement' : 'Donner mon consentement'; ?></button></div>
            </section>
            <section class="card pad">
              <h2 class="big sm">Confidentialité &amp; RGPD</h2>
              <p class="txt sm">Conformément au RGPD, vos données sont anonymisées à l'issue de chaque étude et ne sont jamais transmises sans votre accord.</p>
              <button class="btn-lg wide" type="button"><span class="ic"><img src="Public/assets/Participant/pprof_Export.svg" alt="">Exporter mes données</span></button>
              <button class="btn-lg wide outline danger-u" type="button">Supprimer mon compte</button>
            </section>
          </div>
        </div>
        <div class="footer"><?php echo $espace; ?> · Le Mans Université</div>
      </main>
    </div>
  </div>
</body>
</html>

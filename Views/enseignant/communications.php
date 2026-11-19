<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Communications - LabPilot</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;900&amp;display=swap" rel="stylesheet">
  <link rel="stylesheet" href="Public/css/style.css?v=<?php echo filemtime(__DIR__ . "/../../Public/css/style.css"); ?>">
  <link rel="stylesheet" href="Public/css/page.css?v=<?php echo filemtime(__DIR__ . "/../../Public/css/page.css"); ?>">
</head>
<body>
  <?php require_once __DIR__ . '/themeToggle.php'; ?>
  <div class="layout">
    <?php $ThisPage = 7;
    require_once __DIR__ . '/SideBar.php'; ?>

    <div class="main">
      <?php require_once __DIR__ . '/topbar.php'; ?>

      <main class="content">
        <div class="page-head">
          <div>
            <p class="eyebrow"><?php echo $espace; ?></p>
            <h1>Communications</h1>
            <p class="lead">Envoyez des messages, notifications ou informations aux participants inscrits à vos expérimentations.</p>
          </div>
          <div class="actions"></div>
        </div>

        <div class="cols com-cols">
          <section class="card pad lg">
            <h2 class="big sm">Nouvelle communication</h2>
            <p class="sub rule">Envoi à sens unique - les participants reçoivent l'information, sans espace de réponse dans l'application.</p>
            <form class="form comm" onsubmit="return false">
              <label>Expérimentation concernée<span class="select"><select><?php
                foreach ($experimentations as $exp) {
                  echo '<option>' . htmlspecialchars($exp['TITRE_EXP']) . '</option>';
                }
                ?></select></span></label>
              <fieldset>
                <legend>Destinataires</legend>
                <label class="opt"><input type="radio" name="dest" checked> Tous les participants inscrits <em><?php echo $nbInscrits; ?></em></label>
                <label class="opt"><input type="radio" name="dest"> Participants en attente de validation <em class="warn"><?php echo $nbEnAttente; ?></em></label>
                <label class="opt"><input type="radio" name="dest"> Sélection manuelle</label>
              </fieldset>
              <fieldset>
                <legend>Canal d'envoi</legend>
                <div class="opts">
                  <label class="opt"><input type="checkbox" checked> Notification dans l'application</label>
                  <label class="opt"><input type="checkbox" checked> E-mail</label>
                </div>
              </fieldset>
              <label>Objet<span class="input"><input placeholder="Ex. : Rappel de votre créneau du 24 septembre"></span></label>
              <label>Message<span class="input area"><textarea rows="4" placeholder="Rédigez votre message aux participants..."></textarea></span></label>
              <div class="send-row">
                <p>Ce message sera envoyé à <b><?php echo $nbInscrits; ?> participant<?php echo $nbInscrits > 1 ? 's' : ''; ?>.</b></p>
                <button class="btn-lg" type="button">Enregistrer en brouillon</button>
                <button class="btn-lg primary send" type="submit"><img src="Public/assets/Enseignant/com_SendIcon.svg" alt="">Envoyer</button>
              </div>
            </form>
          </section>

          <div class="stack">
            <section class="card pad lg"><h2 class="big sm">Modèles rapides</h2><div class="quicks"><button class="quick" type="button">Rappel de créneau</button><button class="quick" type="button">Confirmation d'inscription</button><button class="quick" type="button">Annulation de session</button></div></section>
            <section class="card pad lg">
              <div class="exp-top hist"><h2 class="big sm">Historique des envois</h2><span class="info-t">Communications déjà envoyées</span></div>
              <div class="hist">
              <?php
              if (count($historique) === 0) {
                echo '<p class="sub">Aucune communication envoyée.</p>';
              }
              foreach ($historique as $envoi) {
                echo '<div class="h-item"><div class="dchip"><b>' . $envoi['JOUR'] . '</b><small>' . $envoi['MOIS'] . '</small></div><div><b>' . htmlspecialchars($envoi['OBJET_NOTIF'] . ' - ' . $envoi['TITRE_EXP']) . '</b><span>Envoyé à ' . $envoi['nbDestinataires'] . ' participant' . ($envoi['nbDestinataires'] > 1 ? 's' : '') . ' · Notification</span></div></div>';
              }
              ?>
              </div>
            </section>
          </div>
        </div>
        <div class="footer"><?php echo $espace; ?> - Le Mans Université</div>
      </main>
    </div>
  </div>
</body>
</html>

<?php
  $espace = "Espace enseignant-chercheur";
  $prenom = "John";
  $nom = "Doeuf";
  $nom_complet = $prenom . " " . $nom;
  $initiales = "JD";
  $fonction = "Enseignant-chercheur (LIUM)";
  $email = "john.doeuf@univ-lemans.fr";
  $poste = "Enseignant-chercheur";
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Communications - LabPilot</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;900&amp;display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../../Public/css/style.css">
  <link rel="stylesheet" href="../../Public/css/page.css">
</head>
<body>
  <input type="checkbox" id="theme-toggle" class="theme-check" aria-label="Mode sombre">
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
              <label>Expérimentation concernée<span class="select"><select><option>Étude mémoire visuelle</option></select></span></label>
              <fieldset>
                <legend>Destinataires</legend>
                <label class="opt"><input type="radio" name="dest" checked> Tous les participants inscrits <em>18</em></label>
                <label class="opt"><input type="radio" name="dest"> Participants en attente de validation <em class="warn">9</em></label>
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
                <p>Ce message sera envoyé à <b>18 participants.</b></p>
                <button class="btn-lg" type="button">Enregistrer en brouillon</button>
                <button class="btn-lg primary send" type="submit"><img src="../../Public/assets/Enseignant/com_SendIcon.svg" alt="">Envoyer</button>
              </div>
            </form>
          </section>

          <div class="stack">
            <section class="card pad lg"><h2 class="big sm">Modèles rapides</h2><div class="quicks"><button class="quick" type="button">Rappel de créneau</button><button class="quick" type="button">Confirmation d'inscription</button><button class="quick" type="button">Annulation de session</button></div></section>
            <section class="card pad lg">
              <div class="exp-top hist"><h2 class="big sm">Historique des envois</h2><span class="info-t">Communications déjà envoyées</span></div>
              <div class="hist">
              <div class="h-item"><div class="dchip"><b>21</b><small>sept.</small></div><div><b>Rappel de créneau - Étude mémoire visuelle</b><span>Envoyé à 8 participants · Notification + e-mail</span></div></div>
              <div class="h-item"><div class="dchip"><b>18</b><small>sept.</small></div><div><b>Confirmation d'inscription - Questionnaire post-test</b><span>Envoyé à 11 participants · Notification</span></div></div>
              <div class="h-item"><div class="dchip"><b>12</b><small>sept.</small></div><div><b>Annulation de session - Perception sonore</b><span>Envoyé à 6 participants · Notification + e-mail</span></div></div>
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

<?php
  $espace = "Espace participant";
  $prenom = "Sarah";
  $nom = "Dubois";
  $nom_complet = $prenom . " " . $nom;
  $initiales = "SD";
  $fonction = "Participante";
  $email = "Sarah.dubois.etu@univ-lemans.fr";
  $naissance = "04/12/2002";
  $age = "24";
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Mon profil - LabPilot</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800;900&amp;display=swap" rel="stylesheet">
  <link rel="stylesheet" href="styles.css">
  <link rel="stylesheet" href="pages.css">
  <link rel="stylesheet" href="participant.css">
</head>
<body>
  <input type="checkbox" id="theme-toggle" class="theme-check" aria-label="Mode sombre">
  <div class="layout">
    <aside class="sidebar">
      <a class="logo" href="index.php"><img src="../Public/assets/Common/Logo.png" alt="LabPilot"></a>
      <div class="role"><?php echo $espace; ?></div>
      <nav aria-label="Navigation principale">
        <a href="index.php"><img src="../Public/assets/Common/IconeTableauDeBord.svg" alt=""> Tableau de bord</a>
        <a href="profil.php" aria-current="page"><img src="../Public/assets/Participant/pexp_Participants2.svg" alt=""> Mon profil</a>
        <a href="experimentations.php"><img src="../Public/assets/Common/IconeExperimentations.svg" alt=""> Expérimentations disponibles</a>
        <a href="historique.php"><img src="../Public/assets/Participant/pexp_KpiInscriptionsAttente1.svg" alt=""> Mon historique</a>
        <a href="#"><img src="../Public/assets/Participant/pexp_Trace3.svg" alt=""> Mes notifications</a>
      </nav>
      <div class="spacer"></div>
      <hr>
      <div class="help">Vos données sont protégées : <b>en savoir</b> plus sur la conformité RGPD et l'anonymisation de vos données.</div>
    </aside>

    <div class="main">
      <header class="topbar">
        <label class="search">
          <img src="../Public/assets/Common/RechercheIco.svg" alt="">
          <input type="search" placeholder="Rechercher une expérimentation, un participant..." aria-label="Rechercher">
        </label>
        <div class="grow"></div>
        <label class="icon-btn" for="theme-toggle" aria-label="Basculer le thème jour/nuit"><img src="../Public/assets/Common/Trace.svg" alt=""></label>
        <button class="lang" type="button">FR - Français <img src="../Public/assets/Common/FlecheBas.svg" alt=""></button>
        <button class="icon-btn bell" type="button" aria-label="Notifications"><img src="../Public/assets/Common/Notifications.svg" alt=""></button>
        <div class="profile">
          <span class="avatar"><?php echo $initiales; ?></span>
          <span class="who"><b><?php echo $nom_complet; ?></b><span><?php echo $fonction; ?></span></span>
        </div>
      </header>

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
                <label>Nom complet<span class="input"><input value="<?php echo $nom_complet; ?>"></span></label>
                <label>Adresse e-mail<span class="input"><input value="<?php echo $email; ?>"></span></label>
              </div>
              <div class="two">
                <label>Date de naissance<span class="input icon"><input value="<?php echo $naissance; ?>"><img src="../Public/assets/Participant/pprof_Calendrier.svg" alt=""></span></label>
                <label>Genre<span class="select"><select><option>Femme</option><option>Homme</option><option>Autre / NC</option></select></span></label>
              </div>
              <p class="hint tight"><?php echo $age; ?> ans — utilisée pour vérifier les critères d'âge des études.</p>
              <fieldset class="langs"><legend>Langues parlées</legend>
                <label class="chk"><input type="checkbox" checked> Français</label>
                <label class="chk"><input type="checkbox" checked> Anglais</label>
                <label class="chk"><input type="checkbox"> Espagnol</label>
                <label class="chk"><input type="checkbox"> Arabe</label>
              </fieldset>
              <div class="two">
                <label>Port de lunettes / lentilles<span class="select"><select><option>Non</option><option>Oui</option></select></span></label>
                <label>Main dominante<span class="select"><select><option>Droite</option><option>Gauche</option></select></span></label>
              </div>
              <label>Contraintes ou spécificités particulières<span class="input area"><textarea rows="3" placeholder="Ex. allergies, mobilité réduite, trouble auditif…"></textarea></span></label>
              <p class="hint tight">Facultatif - permet aux chercheurs d'adapter le déroulement de leurs sessions.</p>
              <div class="save-row"><button class="btn-lg primary" type="submit">Enregistrer les modifications</button><button class="btn-lg outline" type="button">Annuler</button></div>
            </form>
          </section>

          <div class="stack">
            <section class="card pad">
              <div class="exp-top"><h2 class="big sm">Consentement éthique</h2><span class="tag ok sm">Donné</span></div>
              <p class="txt">Signé le 15/09/2026 - condition requise pour vous inscrire aux expérimentations.</p>
              <div class="btn-row tight"><button class="btn-lg sm" type="button">Voir le formulaire</button><button class="btn-lg sm outline danger-u" type="button">Retirer mon consentement</button></div>
            </section>
            <section class="card pad">
              <h2 class="big sm">Confidentialité &amp; RGPD</h2>
              <p class="txt sm">Conformément au RGPD, vos données sont anonymisées à l'issue de chaque étude et ne sont jamais transmises sans votre accord.</p>
              <button class="btn-lg wide" type="button"><span class="ic"><img src="../Public/assets/Participant/pprof_Export.svg" alt="">Exporter mes données</span></button>
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

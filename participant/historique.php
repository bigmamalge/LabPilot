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
  <title>Mon historique - LabPilot</title>
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
        <a href="profil.php"><img src="../Public/assets/Participant/pexp_Participants2.svg" alt=""> Mon profil</a>
        <a href="experimentations.php"><img src="../Public/assets/Common/IconeExperimentations.svg" alt=""> Expérimentations disponibles</a>
        <a href="historique.php" aria-current="page"><img src="../Public/assets/Participant/pexp_KpiInscriptionsAttente1.svg" alt=""> Mon historique</a>
        <a href="#"><img src="../Public/assets/Participant/pexp_Trace3.svg" alt=""> Mes notifications</a>
      </nav>
      <div class="spacer"></div>
      <hr>
      <div class="help">Un questionnaire vous attend ? <b>Remplissez-le</b> rapidement pour finaliser votre participation.</div>
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

        <section class="stats hist-stats" aria-label="Indicateurs">
          <article class="card stat">
            <div class="top"><span class="ico "><img src="../Public/assets/Participant/phist_Horloge.svg" alt=""></span><span class="delta neutral">Depuis votre inscription</span></div>
            <div class="value">5</div><div class="label">Participations totales</div>
          </article>
          <article class="card stat">
            <div class="top"><span class="ico warn2"><img src="../Public/assets/Participant/phist_Document.svg" alt=""></span><span class="delta todo">À faire</span></div>
            <div class="value">1</div><div class="label">Questionnaire à remplir</div>
          </article>
          <article class="card stat">
            <div class="top"><span class="ico violet-bg"><img src="../Public/assets/Participant/phist_Euro.svg" alt=""></span><span class="delta neutral">2 coupons, 1 crédit</span></div>
            <div class="value">22 €</div><div class="label">Rétributions reçues</div>
          </article>
          <article class="card stat">
            <div class="top"><span class="ico ok-bg"><img src="../Public/assets/Participant/phist_Telecharger.svg" alt=""></span><span class="delta neutral">Format PDF</span></div>
            <div class="value">1</div><div class="label">Attestation disponible</div>
          </article>
        </section>

        <section class="card pad">
          <h2 class="big sm">Mes participations</h2>
          <div class="tabs hist-tabs" role="tablist" data-filters="#hist-table">
            <button role="tab" aria-selected="true" data-filter="all">Toutes</button>
            <button role="tab" aria-selected="false" data-filter="avenir">À venir</button>
            <button role="tab" aria-selected="false" data-filter="terminees">Terminées</button>
            <button role="tab" aria-selected="false" data-filter="annulees">Annulées</button>
          </div>
          <table class="data plain hist" id="hist-table">
            <thead><tr><th>Expérimentation</th><th>Statut</th><th>Créneau</th><th>Rétribution</th><th></th></tr></thead>
            <tbody>
              <tr data-status="avenir"><td><b>Étude mémoire visuelle</b></td><td><span class="tag warn sm">En attente</span></td><td class="soft">Ven. 26/09 - 14h00</td><td class="soft">-</td><td><a class="fiche-btn" href="#">Voir la fiche</a></td></tr>
              <tr data-status="avenir"><td><b>Entretien qualitatif - Lot 2</b></td><td><span class="tag info sm">Confirmée</span></td><td class="soft">Mer. 30/09 - 14h00</td><td class="soft">Aucune</td><td><a class="fiche-btn" href="#">Voir la fiche</a></td></tr>
              <tr data-status="terminees"><td><b>Perception sonore - Pilote</b></td><td><span class="tag ok sm">Terminée</span></td><td class="soft">10/08/2026</td><td><span class="tag ok sm">Coupon 10 € reçu</span></td><td><a class="fiche-btn primary" href="#">Remplir le questionnaire</a></td></tr>
              <tr data-status="terminees"><td><b>Enquête ergonomie mobile</b></td><td><span class="tag ok sm">Terminée</span></td><td class="soft">02/07/2026</td><td><span class="tag ok sm">Crédits recherche reçus</span></td><td><button class="rnd" type="button" aria-label="Télécharger l'attestation"><img src="../Public/assets/Participant/phist_Attestation.svg" alt=""></button></td></tr>
              <tr data-status="annulees"><td><b>Test lecture rapide</b></td><td><span class="tag ko sm">Annulée</span></td><td class="soft">-</td><td class="soft">-</td><td class="soft">Étude interrompue par le chercheur</td></tr>
            </tbody>
          </table>
        </section>
        <div class="footer"><?php echo $espace; ?> · Le Mans Université</div>
      </main>
    </div>
  </div>
</body>
</html>

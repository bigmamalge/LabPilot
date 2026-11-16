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
  <title>Tableau de bord - LabPilot</title>
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
        <a href="index.php" aria-current="page"><img src="../Public/assets/Common/IconeTableauDeBord.svg" alt=""> Tableau de bord</a>
        <a href="profil.php"><img src="../Public/assets/Participant/pexp_Participants2.svg" alt=""> Mon profil</a>
        <a href="experimentations.php"><img src="../Public/assets/Common/IconeExperimentations.svg" alt=""> Expérimentations disponibles</a>
        <a href="historique.php"><img src="../Public/assets/Participant/pexp_KpiInscriptionsAttente1.svg" alt=""> Mon historique</a>
        <a href="#"><img src="../Public/assets/Participant/pexp_Trace3.svg" alt=""> Mes notifications</a>
      </nav>
      <div class="spacer"></div>
      <hr>
      <div class="help">Profil incomplet ? <b>Complétez-le</b> pour être éligible à davantage d'expérimentations.</div>
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
            <h1>Bonjour, <?php echo $prenom; ?></h1>
            <p class="lead">Voici l'état de vos inscriptions et ce qui vous attend prochainement.</p>
          </div>
          <div class="actions"><a class="btn primary" href="experimentations.php"><img src="../Public/assets/Participant/pdash_RechercheIco1.svg" alt="">Découvrir les expérimentations</a></div>
        </div>

        <section class="card banner">
          <span class="info-dot"><img src="../Public/assets/Participant/pdash_Ellipse1.svg" alt=""><i>i</i></span>
          <div class="grow"><b>Votre profil est incomplet</b><span>Ajoutez vos langues parlées et vos éventuelles contraintes pour être éligible à plus d'expérimentations.</span></div>
          <a class="mini" href="profil.php">Compléter mon profil</a>
        </section>

        <section class="stats" aria-label="Indicateurs">
          <article class="card stat">
            <div class="top"><span class="ico "><img src="../Public/assets/Participant/pdash_Groupe2.svg" alt=""></span><span class="delta neutral">Prochaine : demain</span></div>
            <div class="value">2</div><div class="label">Participations à venir</div>
          </article>
          <article class="card stat">
            <div class="top"><span class="ico warn"><img src="../Public/assets/Participant/pdash_KpiInscriptionsAttente1.svg" alt=""></span><span class="delta todo">À suivre</span></div>
            <div class="value">1</div><div class="label">Créneau en attente de validation</div>
          </article>
          <article class="card stat">
            <div class="top"><span class="ico "><img src="../Public/assets/Participant/pdash_Groupe.svg" alt=""><img class="check" src="../Public/assets/Participant/pdash_Valider1.svg" alt=""></span><span class="delta up">+1 ce mois-ci</span></div>
            <div class="value">3</div><div class="label">Participations terminées</div>
          </article>
          <article class="card stat">
            <div class="top"><span class="ico violet-bg"><img src="../Public/assets/Participant/pdash_Groupe5.svg" alt=""></span><span class="delta neutral">2 coupons</span></div>
            <div class="value">20 €</div><div class="label">Rétributions reçues</div>
          </article>
        </section>

        <div class="cols pdash-cols">
          <div class="stack">
            <section class="card pad">
              <div class="exp-top"><h2 class="big sm">Mes prochaines participations</h2><a class="link-o" href="historique.php">Voir tout</a></div>
              <div class="parts">
              <div class="part"><div class="dchip warn"><b>26</b><small>sept.</small></div><div class="grow"><b>Étude mémoire visuelle - Session A</b><span>Vendredi 14h00-15h30 (Salle B204 en présentiel)</span></div><span class="tag warn big">En attente</span></div>
              <div class="part"><div class="dchip warn"><b>30</b><small>sept.</small></div><div class="grow"><b>Entretien qualitatif - Lot 2</b><span>Mercredi 14h00-14h15 (Visioconférence)</span></div><span class="tag info big">Confirmé</span></div>
              </div>
            </section>
            <section class="card pad">
              <div class="exp-top"><h2 class="big sm">Expérimentations qui pourraient vous intéresser</h2><a class="link-o" href="experimentations.php">Tout voir</a></div>
              <div class="ideas">
              <article class="idea">
                <div class="idea-top"><img src="../Public/assets/Participant/pdash_Groupe1.svg" alt=""><span class="tag ok sm">Ouverte</span></div>
                <h3>Test utilisateur - nouvelle IHM</h3>
                <p class="line"><img src="../Public/assets/Participant/pdash_KpiInscriptionsAttente2.svg" alt="">30 min en Présentiel (Salle B102)</p>
                <p class="line sm"><img src="../Public/assets/Participant/pdash_Trace2.svg" alt="">Crédits recherche</p>
                <a class="fiche" href="experimentations.php">Voir la fiche</a>
              </article>
              <article class="idea">
                <div class="idea-top"><img src="../Public/assets/Participant/pdash_Groupe1.svg" alt=""><span class="tag ok sm">Ouverte</span></div>
                <h3>Entretien qualitatif - Lot 2</h3>
                <p class="line"><img src="../Public/assets/Participant/pdash_KpiInscriptionsAttente2.svg" alt="">45 min (Visioconférence)</p>
                <p class="line sm"><img src="../Public/assets/Participant/pdash_Trace2.svg" alt="">Aucune rétribution</p>
                <a class="fiche" href="experimentations.php">Voir la fiche</a>
              </article>
              </div>
            </section>
          </div>
          <section class="card pad fit">
            <div class="exp-top"><h2 class="big sm">Notifications récentes</h2><a class="link-o" href="#">Tout voir</a></div>
            <div class="notifs">
            <div class="notif"><span class="nbox"><img src="../Public/assets/Participant/pdash_Groupe.svg" alt=""><img class="check" src="../Public/assets/Participant/pdash_Valider1.svg" alt=""></span><div><b>Inscription confirmée</b><span>Étude mémoire visuelle - Session A (il y a 2h)</span></div></div>
            <div class="notif"><span class="nbox warn"><img src="../Public/assets/Participant/pdash_Groupe4.svg" alt=""></span><div><b>Créneau modifié</b><span>Entretien qualitatif - Lot 2, nouveau créneau proposé (hier)</span></div></div>
            <div class="notif"><img class="nbig" src="../Public/assets/Participant/pdash_Groupe3.svg" alt=""><div><b>Retribution envoyée</b><span>Coupon 10€ pour Perception sonore - Pilote (il y a 3 jours)</span></div></div>
            </div>
          </section>
        </div>
        <div class="footer"><?php echo $espace; ?> · Le Mans Université</div>
      </main>
    </div>
  </div>
</body>
</html>

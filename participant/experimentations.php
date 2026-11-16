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
  <title>Expérimentations disponibles - LabPilot</title>
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
        <a href="experimentations.php" aria-current="page"><img src="../Public/assets/Common/IconeExperimentations.svg" alt=""> Expérimentations disponibles</a>
        <a href="historique.php"><img src="../Public/assets/Participant/pexp_KpiInscriptionsAttente1.svg" alt=""> Mon historique</a>
        <a href="#"><img src="../Public/assets/Participant/pexp_Trace3.svg" alt=""> Mes notifications</a>
      </nav>
      <div class="spacer"></div>
      <hr>
      <div class="help">Vous ne trouvez pas votre bonheur ? <b>Filtrez</b> par type, durée ou modalité pour affiner votre recherche.</div>
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
            <h1>Expérimentations disponibles</h1>
            <p class="lead">Découvrez les études ouvertes aux inscriptions et vérifiez votre éligibilité avant de vous inscrire.</p>
          </div>
          <div class="actions"></div>
        </div>

        <section class="card pad xp-filters">
          <label class="search wide flat2"><img src="../Public/assets/Participant/pexp_Svg.svg" alt=""><input type="search" placeholder="Rechercher une expérimentation..." aria-label="Rechercher"></label>
          <label class="select f"><select aria-label="Type"><option>Tous les types</option></select></label>
          <label class="select f"><select aria-label="Modalité"><option>Toutes les modalités</option></select></label>
          <label class="select f"><select aria-label="Responsable"><option>Tous les responsables</option></select></label>
        </section>

        <div class="xp-list">
          <article class="card pad xp">
            <div class="exp-top"><h3>Étude mémoire visuelle</h3><span class="tag warn sm">Demande en attente</span></div>
            <p class="desc">Impact de la charge cognitive sur la reconnaissance d'images chez l'adulte jeune.</p>
            <div class="meta2"><div><span>Responsable</span><b>John Doeuf (LIUM)</b></div><div><span>Modalité</span><b>Présentiel - Salle B204</b></div><div><span>Durée</span><b>1 h 30</b></div><div><span>Rétribution</span><b>Coupon 10 €</b></div></div>
            <p class="elig ok"><img src="../Public/assets/Participant/pexp_Svg2.svg" alt="">Vous êtes éligible (18-35 ans, vision normale)</p>
            <a class="fiche-btn " href="#">Voir ma demande</a>
          </article>
          <article class="card pad xp">
            <div class="exp-top"><h3>Entretien qualitatif - Lot 2</h3><span class="tag ok sm">Ouverte aux inscriptions</span></div>
            <p class="desc">Entretiens semi-directifs sur les usages numériques des seniors.</p>
            <div class="meta2"><div><span>Responsable</span><b>John Doeuf (LIUM)</b></div><div><span>Modalité</span><b>Distanciel - Visioconférence</b></div><div><span>Durée</span><b>45 min</b></div><div><span>Rétribution</span><b>Aucune</b></div></div>
            <p class="elig ok"><img src="../Public/assets/Participant/pexp_Svg2.svg" alt="">Vous êtes éligible (adultes, français courant)</p>
            <a class="fiche-btn primary" href="#">Voir la fiche et m'inscrire</a>
          </article>
          <article class="card pad xp">
            <div class="exp-top"><h3>Test utilisateur - nouvelle IHM</h3><span class="tag ok sm">Ouverte aux inscriptions</span></div>
            <p class="desc">Évaluation ergonomique d'un prototype d'interface avant mise en production.</p>
            <div class="meta2"><div><span>Responsable</span><b>John Doeuf (LIUM)</b></div><div><span>Modalité</span><b>Présentiel - Salle B102</b></div><div><span>Durée</span><b>30 min</b></div><div><span>Rétribution</span><b>Crédits recherche</b></div></div>
            <p class="elig ok"><img src="../Public/assets/Participant/pexp_Svg2.svg" alt="">Vous êtes éligible</p>
            <a class="fiche-btn primary" href="#">Voir la fiche et m'inscrire</a>
          </article>
          <article class="card pad xp">
            <div class="exp-top"><h3>Questionnaire post-test</h3><span class="tag sm">Complet</span></div>
            <p class="desc">Recueil des impressions à chaud suite aux sessions de test utilisateur.</p>
            <div class="meta2"><div><span>Responsable</span><b>John Doeuf (LIUM)</b></div><div><span>Modalité</span><b>En ligne</b></div><div><span>Durée</span><b>15 min</b></div><div><span>Rétribution</span><b>Aucune</b></div></div>
            <p class="elig ok"><img src="../Public/assets/Participant/pexp_Svg2.svg" alt="">Vous êtes éligible</p>
            <a class="fiche-btn off" href="#">Complet — inscriptions closes</a>
          </article>
          <article class="card pad xp">
            <div class="exp-top"><h3>Étude sommeil et cognition</h3><span class="tag ko sm">Non éligible</span></div>
            <p class="desc">Effets de la qualité du sommeil sur les performances cognitives chez l'adulte.</p>
            <div class="meta2"><div><span>Responsable</span><b>Claire Vasseur (LIUM)</b></div><div><span>Modalité</span><b>Présentiel - Salle A102</b></div><div><span>Durée</span><b>2 h 00</b></div><div><span>Rétribution</span><b>Coupon 15 €</b></div></div>
            <p class="elig ko"><img src="../Public/assets/Participant/pexp_Svg3.svg" alt="">Réservée aux 50-70 ans — vous ne remplissez pas ce critère</p>
            <a class="fiche-btn off" href="#">Non éligible (âge)</a>
          </article>
          <article class="card pad xp">
            <div class="exp-top"><h3>Perception sonore - Pilote</h3><span class="tag sm">Clôturée</span></div>
            <p class="desc">Étude pilote sur la perception de signaux sonores en environnement bruité.</p>
            <div class="meta2"><div><span>Responsable</span><b>Claire Vasseur (LIUM)</b></div><div><span>Modalité</span><b>Présentiel - Salle A102</b></div><div><span>Durée</span><b>40 min</b></div><div><span>Rétribution</span><b>Coupon 10 €</b></div></div>
            <p class="elig ok"><img src="../Public/assets/Participant/pexp_Svg2.svg" alt="">Vous avez déjà participé à cette étude</p>
            <a class="fiche-btn " href="#">Voir dans mon historique</a>
          </article>
        </div>
        <div class="footer"><?php echo $espace; ?> · Le Mans Université</div>
      </main>
    </div>
  </div>
</body>
</html>

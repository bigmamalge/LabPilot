<!DOCTYPE html>
<html lang="<?php echo strtolower($langue); ?>" data-theme="<?php echo $theme; ?>">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Tableau de bord - LabPilot</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800;900&amp;display=swap" rel="stylesheet">
  <link rel="stylesheet" href="Public/css/style.css?v=<?php echo filemtime(__DIR__ . "/../../Public/css/style.css"); ?>">
  <link rel="stylesheet" href="Public/css/page.css?v=<?php echo filemtime(__DIR__ . "/../../Public/css/page.css"); ?>">
  <link rel="stylesheet" href="Public/css/participant.css?v=<?php echo filemtime(__DIR__ . "/../../Public/css/participant.css"); ?>">
</head>
<body>
  <div class="layout">
    <?php $ThisPage = 1;
    require_once __DIR__ . '/SideBar.php'; ?>

    <div class="main">
      <?php require_once __DIR__ . '/topbar.php'; ?>

      <main class="content">
        <div class="page-head">
          <div>
            <p class="eyebrow"><?php echo $espace; ?></p>
            <h1>Bonjour, <?php echo $prenom; ?></h1>
            <p class="lead">Voici l'état de vos inscriptions et ce qui vous attend prochainement.</p>
          </div>
          <div class="actions"><a class="btn primary" href="index.php?Role=3&Page=3"><img src="Public/assets/Participant/pdash_RechercheIco1.svg" alt="">Découvrir les expérimentations</a></div>
        </div>

        <?php if ($profilIncomplet) { ?>
        <section class="card banner">
          <span class="info-dot"><img src="Public/assets/Participant/pdash_Ellipse1.svg" alt=""><i>i</i></span>
          <div class="grow"><b>Votre profil est incomplet</b><span>Ajoutez vos langues parlées et vos éventuelles contraintes pour être éligible à plus d'expérimentations.</span></div>
          <a class="mini" href="index.php?Role=3&Page=2">Compléter mon profil</a>
        </section>
        <?php } ?>

        <section class="stats" aria-label="Indicateurs">
          <article class="card stat">
            <div class="top"><span class="ico "><img src="Public/assets/Participant/pdash_Groupe2.svg" alt=""></span><span class="delta neutral"><?php echo $prochaine; ?></span></div>
            <div class="value"><?php echo $nbAVenir; ?></div><div class="label">Participation<?php echo $nbAVenir > 1 ? 's' : ''; ?> à venir</div>
          </article>
          <article class="card stat">
            <div class="top"><span class="ico warn"><img src="Public/assets/Participant/pdash_KpiInscriptionsAttente1.svg" alt=""></span><?php echo $nbEnAttente > 0 ? '<span class="delta todo">À suivre</span>' : '<span class="delta neutral">Aucune demande</span>'; ?></div>
            <div class="value"><?php echo $nbEnAttente; ?></div><div class="label">Créneau<?php echo $nbEnAttente > 1 ? 'x' : ''; ?> en attente de validation</div>
          </article>
          <article class="card stat">
            <div class="top"><span class="ico "><img src="Public/assets/Participant/pdash_Groupe.svg" alt=""><img class="check" src="Public/assets/Participant/pdash_Valider1.svg" alt=""></span><span class="delta up">+<?php echo $nbTermineesCeMois; ?> ce mois-ci</span></div>
            <div class="value"><?php echo $nbTerminees; ?></div><div class="label">Participation<?php echo $nbTerminees > 1 ? 's' : ''; ?> terminée<?php echo $nbTerminees > 1 ? 's' : ''; ?></div>
          </article>
          <article class="card stat">
            <div class="top"><span class="ico violet-bg"><img src="Public/assets/Participant/pdash_Groupe5.svg" alt=""></span><span class="delta neutral"><?php echo $nbRetributions; ?></span></div>
            <div class="value"><?php echo $montantRetributions + 0; ?> €</div><div class="label">Rétributions reçues</div>
          </article>
        </section>

        <div class="cols pdash-cols">
          <div class="stack">
            <section class="card pad">
              <div class="exp-top"><h2 class="big sm">Mes prochaines participations</h2><a class="link-o" href="index.php?Role=3&Page=4">Voir tout</a></div>
              <div class="parts">
              <?php
              if (count($prochainesParticipations) === 0) {
                echo '<div class="part"><div class="grow"><span>Aucune participation prévue pour le moment.</span></div></div>';
              }
              foreach ($prochainesParticipations as $participation) {
                echo '<div class="part"><div class="dchip warn"><b>' . $participation['JOUR'] . '</b><small>' . $participation['MOIS'] . '</small></div><div class="grow"><b>' . htmlspecialchars($participation['TITRE_EXP']) . '</b><span>' . $participation['JOUR_SEMAINE'] . ' ' . $participation['HORAIRE'] . ' (' . htmlspecialchars($participation['lieu']) . ')</span></div><span class="tag ' . $participation['classe'] . ' big">' . $participation['libelle'] . '</span></div>';
              }
              ?>
              </div>
            </section>
            <section class="card pad">
              <div class="exp-top"><h2 class="big sm">Expérimentations qui pourraient vous intéresser</h2><a class="link-o" href="index.php?Role=3&Page=3">Tout voir</a></div>
              <div class="ideas">
              <?php
              if (count($suggestions) === 0) {
                echo '<p class="line">Aucune expérimentation ouverte pour votre profil en ce moment.</p>';
              }
              foreach ($suggestions as $exp) {
                echo '<article class="idea">
                <div class="idea-top"><img src="Public/assets/Participant/pdash_Groupe1.svg" alt=""><span class="tag ok sm">Ouverte</span></div>
                <h3>' . htmlspecialchars($exp['TITRE_EXP']) . '</h3>
                <p class="line"><img src="Public/assets/Participant/pdash_KpiInscriptionsAttente2.svg" alt="">' . ($exp['DUREE'] ?? 'Durée non définie') . ' (' . htmlspecialchars($exp['MODALITE']) . ')</p>
                <p class="line sm"><img src="Public/assets/Participant/pdash_Trace2.svg" alt="">' . ($exp['RETRIBUTION'] ?? 'Aucune rétribution') . '</p>
                <a class="fiche" href="index.php?Role=3&Page=3">Voir la fiche</a>
              </article>';
              }
              ?>
              </div>
            </section>
          </div>
          <section class="card pad fit" id="notifications">
            <div class="exp-top"><h2 class="big sm">Notifications récentes</h2></div>
            <div class="notifs">
            <?php
            if (count($notifications) === 0) {
              echo '<div class="notif"><div><span>Aucune notification pour le moment.</span></div></div>';
            }
            foreach ($notifications as $notification) {
              echo '<div class="notif">' . $notification['icone'] . '<div><b>' . htmlspecialchars($notification['OBJET_NOTIF']) . '</b><span>' . htmlspecialchars($notification['texte']) . '</span></div></div>';
            }
            ?>
            </div>
          </section>
        </div>
        <div class="footer"><?php echo $espace; ?> · Le Mans Université</div>
      </main>
    </div>
  </div>
</body>
</html>

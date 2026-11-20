<!DOCTYPE html>
<html lang="<?php echo strtolower($langue); ?>" data-theme="<?php echo $theme; ?>">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Participants - LabPilot</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;900&amp;display=swap" rel="stylesheet">
  <link rel="stylesheet" href="Public/css/style.css?v=<?php echo filemtime(__DIR__ . "/../../Public/css/style.css"); ?>">
  <link rel="stylesheet" href="Public/css/page.css?v=<?php echo filemtime(__DIR__ . "/../../Public/css/page.css"); ?>">
</head>
<body>
  <div class="layout">
    <?php $ThisPage = 4;
    require_once __DIR__ . '/SideBar.php'; ?>

    <div class="main">
      <?php require_once __DIR__ . '/topbar.php'; ?>

      <main class="content">
        <div class="page-head">
          <div>
            <p class="eyebrow"><?php echo $espace; ?></p>
            <h1>Participants</h1>
            <p class="lead">Consultez les profils, validez les inscriptions et les créneaux, et suivez la présence et les rétributions de vos participants.</p>
          </div>
          <div class="actions">
            <a class="btn" href="#"><img src="Public/assets/Common/part_Doc.svg" alt="">Exporter (CSV)</a>
            <a class="btn primary" href="index.php?Role=1&Page=7"><img src="Public/assets/Common/part_Comm.svg" alt="">Communiquer</a>
          </div>
        </div>

        <section class="stats" aria-label="Indicateurs">
          <article class="card stat">
            <div class="top"><span class="ico "><img src="Public/assets/Common/CercleIcone.svg" alt=""><img class="check" src="Public/assets/Common/IconeValidation.svg" alt=""></span><span class="delta up">+<?php echo $nbNouvellesCeMois; ?> ce mois-ci</span></div>
            <div class="value"><?php echo $nbExperimentationsActives; ?></div><div class="label">Expérimentations actives</div>
          </article>
          <article class="card stat">
            <div class="top"><span class="ico warn"><img src="Public/assets/Common/IconeInscriptions.svg" alt=""></span><span class="delta todo"><?php echo $nbInscriptionsEnAttente > 0 ? 'À traiter' : 'Rien à traiter'; ?></span></div>
            <div class="value"><?php echo $nbInscriptionsEnAttente; ?></div><div class="label">Inscriptions en attente</div>
          </article>
          <article class="card stat">
            <div class="top"><span class="ico "><img src="Public/assets/Common/Statistiques2.svg" alt=""></span><span class="delta neutral"><?php echo $detailTaux; ?></span></div>
            <div class="value"><?php echo $tauxParticipationMoyen; ?></div><div class="label">Taux de participation moyen</div>
          </article>
          <article class="card stat">
            <div class="top"><span class="ico "><img src="Public/assets/Common/Statistiques3.svg" alt=""></span><span class="delta neutral"><?php echo htmlspecialchars($salleProchaineSession); ?></span></div>
            <div class="value"><?php echo $prochaineSession; ?></div><div class="label">Prochaine session</div>
          </article>
        </section>

        <div class="filters">
          <label class="search wide"><img src="Public/assets/Common/part_Search.svg" alt=""><input type="search" placeholder="Rechercher un participant..." aria-label="Rechercher un participant"></label>
          <label class="select pill-select"><select aria-label="Expérimentation"><option>Toutes les expérimentations</option><?php
            foreach ($experimentations as $exp) {
              echo '<option>' . htmlspecialchars($exp['TITRE_EXP']) . '</option>';
            }
            ?></select></label>
        </div>

        <section class="card">
          <table class="data big-rows">
            <thead><tr><th>Participant</th><th>Expérimentation</th><th>Créneau</th><th>Profil</th><th>Statut</th><th>Rétribution</th><th>Actions</th></tr></thead>
            <tbody>
            <?php
            if (count($participants) === 0) {
              echo '<tr><td colspan="7">Aucun participant inscrit pour le moment.</td></tr>';
            }
            foreach ($participants as $participant) {
              $nomParticipant = htmlspecialchars($participant['PRENOM_USER'] . ' ' . $participant['NOM_USER']);
              $retribution = $participant['LIBELLE_RETRIB'] !== null ? '<span class="tag ' . $participant['CLASSE_RETRIB'] . '">' . $participant['LIBELLE_RETRIB'] . '</span>' : '-';
              if ($participant['STATUT_INSC'] === 'En attente') {
                $actions = '<button class="ghost" type="button" aria-label="Accepter ' . $nomParticipant . '"><img src="Public/assets/' . $dossierIcones . '/part_Accept.svg" alt=""></button><button class="ghost" type="button" aria-label="Refuser ' . $nomParticipant . '"><img src="Public/assets/' . $dossierIcones . '/part_Refuse.svg" alt=""></button>';
              } else {
                $actions = '<a class="ghost eye" href="index.php?Role=1&Page=4&Par=' . $participant['ID_PAR'] . '" aria-label="Voir le profil de ' . $nomParticipant . '"><img src="Public/assets/Common/part_Eye.svg" alt=""></a>';
              }
              echo '<tr>
              <td><span class="who2"><span class="av ' . $participant['CLASSE_AVATAR'] . '">' . htmlspecialchars($participant['INITIALES']) . '</span><b>' . $nomParticipant . '</b></span></td>
              <td class="soft">' . htmlspecialchars($participant['TITRE_EXP']) . '</td><td class="soft">' . $participant['JOUR_HEURE_CREN'] . '</td>
              <td><span class="chips"><span class="chip">' . $participant['AGE_PAR'] . ' ans</span><span class="chip">' . htmlspecialchars($participant['GEN_PAR']) . '</span><span class="chip">' . htmlspecialchars($participant['LANG_PAR']) . '</span></span></td>
              <td><span class="tag ' . $participant['CLASSE_STATUT'] . '">' . $participant['LIBELLE_STATUT'] . '</span></td><td>' . $retribution . '</td>
              <td><div class="row-actions">' . $actions . '</div></td>
            </tr>';
            }
            ?>
            </tbody>
          </table>
        </section>

        <div class="trio">
          <section class="card pad">
            <div class="exp-top"><h2 class="big sm">Demandes à valider</h2><span class="pill sm"><?php echo count($demandes); ?> en attente</span></div>
            <div class="reqs">
              <?php
              if (count($demandes) === 0) {
                echo '<p class="sub">Aucune demande en attente.</p>';
              }
              foreach ($demandes as $demande) {
                $nomDemandeur = htmlspecialchars($demande['PRENOM_USER'] . ' ' . $demande['NOM_USER']);
                $selection = $profil !== null && $profil['ID_PAR'] == $demande['ID_PAR'] && $profil['ID_CREN'] == $demande['ID_CREN'] ? ' sel' : '';
                echo '<div class="req' . $selection . '"><span class="av">' . htmlspecialchars($demande['INITIALES']) . '</span><div class="info"><b>' . $nomDemandeur . '</b><span>' . htmlspecialchars($demande['TITRE_EXP']) . ' - ' . $demande['JOUR_HEURE_CREN'] . '</span></div>
                <button class="ghost" type="button" aria-label="Accepter ' . $nomDemandeur . '"><img src="Public/assets/' . $dossierIcones . '/part_Accept.svg" alt=""></button>
                <button class="ghost" type="button" aria-label="Refuser ' . $nomDemandeur . '"><img src="Public/assets/' . $dossierIcones . '/part_Refuse.svg" alt=""></button></div>';
              }
              ?>
            </div>
          </section>
          <section class="card pad">
            <?php if ($profil === null) { ?>
            <div class="exp-top"><h2 class="big sm">Profil participant</h2></div>
            <p class="sub">Aucun participant à afficher.</p>
            <?php } else { ?>
            <div class="exp-top"><h2 class="big sm">Profil participant</h2><span class="tag <?php echo $profil['CLASSE_STATUT']; ?>"><?php echo $profil['LIBELLE_STATUT']; ?></span></div>
            <div class="who3"><span class="av"><?php echo htmlspecialchars($profil['INITIALES']); ?></span><div><b><?php echo htmlspecialchars($profil['PRENOM_USER'] . ' ' . $profil['NOM_USER']); ?></b><span><?php echo htmlspecialchars($profil['MAIL_USER'] ?? ''); ?></span></div></div>
            <div class="kv sm">
              <div><span>Âge</span><b><?php echo $profil['AGE_PAR']; ?> ans</b></div>
              <div><span>Genre</span><b><?php echo htmlspecialchars($profil['GEN_PAR']); ?></b></div>
              <div><span>Langue</span><b><?php echo htmlspecialchars($profil['LANG_PAR']); ?></b></div>
              <div><span>Port de lunettes</span><b><?php echo $profil['LUNETTES_PAR'] ? 'Oui' : 'Non'; ?></b></div>
              <div><span>Consentement</span><b><?php echo $profil['CONSENT_USER'] ? 'Donné' : 'Non donné'; ?></b></div>
              <?php if (!empty($profil['CONTRAINTES_PAR'])) { ?>
              <div><span>Contraintes</span><b><?php echo htmlspecialchars($profil['CONTRAINTES_PAR']); ?></b></div>
              <?php } ?>
            </div>
            <?php } ?>
          </section>
          <section class="card pad">
            <h2 class="big sm">Rétributions à traiter</h2>
            <?php
            if (count($retributionsATraiter) === 0 && count($retributionsEnvoyees) === 0) {
              echo '<p class="sub">Aucune rétribution à traiter.</p>';
            }
            foreach ($retributionsATraiter as $retribution) {
              echo '<div class="pay"><div><b>' . htmlspecialchars($retribution['PRENOM_USER'] . ' ' . $retribution['NOM_USER']) . '</b><span>' . htmlspecialchars($retribution['RETRIBUTION']) . '</span></div><a class="mini solid" href="#">Valider l\'envoi</a></div>';
            }
            foreach ($retributionsEnvoyees as $retribution) {
              echo '<div class="pay"><div><b>' . htmlspecialchars($retribution['PRENOM_USER'] . ' ' . $retribution['NOM_USER']) . '</b><span>' . htmlspecialchars($retribution['RETRIBUTION'] ?? '') . '</span></div><span class="tag ok">Envoyée</span></div>';
            }
            ?>
          </section>
        </div>
        <div class="footer"><?php echo $espace; ?> - Le Mans Université</div>
      </main>
    </div>
  </div>
</body>
</html>

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
  <title>Participants - LabPilot</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;900&amp;display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../../Public/css/style.css">
  <link rel="stylesheet" href="../../Public/css/page.css">
</head>
<body>
  <input type="checkbox" id="theme-toggle" class="theme-check" aria-label="Mode sombre">
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
            <a class="btn" href="#"><img src="../../Public/assets/Common/part_Doc.svg" alt="">Exporter (CSV)</a>
            <a class="btn primary" href="communications.php"><img src="../../Public/assets/Common/part_Comm.svg" alt="">Communiquer</a>
          </div>
        </div>

        <section class="stats" aria-label="Indicateurs">
          <article class="card stat">
            <div class="top"><span class="ico "><img src="../../Public/assets/Common/CercleIcone.svg" alt=""><img class="check" src="../../Public/assets/Common/IconeValidation.svg" alt=""></span><span class="delta up">+2 ce mois-ci</span></div>
            <div class="value">6</div><div class="label">Expérimentations actives</div>
          </article>
          <article class="card stat">
            <div class="top"><span class="ico warn"><img src="../../Public/assets/Common/IconeInscriptions.svg" alt=""></span><span class="delta todo">À traiter</span></div>
            <div class="value">9</div><div class="label">Inscriptions en attente</div>
          </article>
          <article class="card stat">
            <div class="top"><span class="ico "><img src="../../Public/assets/Common/Statistiques2.svg" alt=""></span><span class="delta up">+4% vs. dernier mois</span></div>
            <div class="value">78%</div><div class="label">Taux de participation moyen</div>
          </article>
          <article class="card stat">
            <div class="top"><span class="ico "><img src="../../Public/assets/Common/Statistiques3.svg" alt=""></span><span class="delta neutral">Salle B204</span></div>
            <div class="value">Auj. 14h00</div><div class="label">Prochaine session</div>
          </article>
        </section>

        <div class="filters">
          <label class="search wide"><img src="../../Public/assets/Common/part_Search.svg" alt=""><input type="search" placeholder="Rechercher un participant..." aria-label="Rechercher un participant"></label>
          <label class="select pill-select"><select aria-label="Expérimentation"><option>Toutes les expérimentations</option></select></label>
        </div>

        <section class="card">
          <table class="data big-rows">
            <thead><tr><th>Participant</th><th>Expérimentation</th><th>Créneau</th><th>Profil</th><th>Statut</th><th>Rétribution</th><th>Actions</th></tr></thead>
            <tbody>
            <tr>
              <td><span class="who2"><span class="av ">LT</span><b>Lucas Tessier</b></span></td>
              <td class="soft">Étude mémoire visuelle</td><td class="soft">Ven. 19h00</td>
              <td><span class="chips"><span class='chip'>26 ans</span><span class='chip'>Homme</span><span class='chip'>FR</span></span></td>
              <td><span class="tag warn">En attente</span></td><td>-</td>
              <td><div class="row-actions"><button class="ghost" type="button" aria-label="Accepter"><img src="../../Public/assets/Common/part_Accept.svg" alt=""></button><button class="ghost" type="button" aria-label="Refuser"><img src="../../Public/assets/Common/part_Refuse.svg" alt=""></button></div></td>
            </tr>
            <tr>
              <td><span class="who2"><span class="av ">MA</span><b>Manon Albert</b></span></td>
              <td class="soft">Entretien qualitatif - Lot 2</td><td class="soft">Mar. 14h00</td>
              <td><span class="chips"><span class='chip'>25 ans</span><span class='chip'>Femme</span><span class='chip'>FR</span></span></td>
              <td><span class="tag warn">En attente</span></td><td>-</td>
              <td><div class="row-actions"><button class="ghost" type="button" aria-label="Accepter"><img src="../../Public/assets/Common/part_Accept.svg" alt=""></button><button class="ghost" type="button" aria-label="Refuser"><img src="../../Public/assets/Common/part_Refuse.svg" alt=""></button></div></td>
            </tr>
            <tr>
              <td><span class="who2"><span class="av ">KB</span><b>Karim Benali</b></span></td>
              <td class="soft">Questionnaire post-test</td><td class="soft">Jeu. 11h00</td>
              <td><span class="chips"><span class='chip'>27 ans</span><span class='chip'>Homme</span><span class='chip'>FR, AR</span></span></td>
              <td><span class="tag warn">En attente</span></td><td>-</td>
              <td><div class="row-actions"><button class="ghost" type="button" aria-label="Accepter"><img src="../../Public/assets/Common/part_Accept.svg" alt=""></button><button class="ghost" type="button" aria-label="Refuser"><img src="../../Public/assets/Common/part_Refuse.svg" alt=""></button></div></td>
            </tr>
            <tr>
              <td><span class="who2"><span class="av ok">SG</span><b>Sarah Gallois</b></span></td>
              <td class="soft">Étude mémoire visuelle</td><td class="soft">Ven. 13h00</td>
              <td><span class="chips"><span class='chip'>22 ans</span><span class='chip'>Femme</span><span class='chip'>FR</span></span></td>
              <td><span class="tag ok">Présente</span></td><td><span class="tag ok">Coupon envoyé</span></td>
              <td><div class="row-actions"><button class="ghost eye" type="button" aria-label="Voir le profil"><img src="../../Public/assets/Common/part_Eye.svg" alt=""></button></div></td>
            </tr>
            <tr>
              <td><span class="who2"><span class="av ">NP</span><b>Nathan Perrot</b></span></td>
              <td class="soft">Étude mémoire visuelle</td><td class="soft">Lun. 19h00</td>
              <td><span class="chips"><span class='chip'>21 ans</span><span class='chip'>Homme</span><span class='chip'>FR</span></span></td>
              <td><span class="tag warn">Absent - Incident</span></td><td><span class="tag warn soft">À valider</span></td>
              <td><div class="row-actions"><button class="ghost eye" type="button" aria-label="Voir le profil"><img src="../../Public/assets/Common/part_Eye.svg" alt=""></button></div></td>
            </tr>
            <tr>
              <td><span class="who2"><span class="av violet">IC</span><b>Isis Coulon</b></span></td>
              <td class="soft">Entretien qualitatif - Lot 2</td><td class="soft">Mar. 14h00</td>
              <td><span class="chips"><span class='chip'>24 ans</span><span class='chip'>Femme</span><span class='chip'>FR, EN</span></span></td>
              <td><span class="tag violet">Confirmée</span></td><td>-</td>
              <td><div class="row-actions"><button class="ghost eye" type="button" aria-label="Voir le profil"><img src="../../Public/assets/Common/part_Eye.svg" alt=""></button></div></td>
            </tr>
            <tr>
              <td><span class="who2"><span class="av ok">JF</span><b>Jules Farge</b></span></td>
              <td class="soft">Test utilisateur - trousse-bêta</td><td class="soft">Mer. 09h30</td>
              <td><span class="chips"><span class='chip'>28 ans</span><span class='chip'>Homme</span><span class='chip'>FR</span></span></td>
              <td><span class="tag ok">Terminée</span></td><td><span class="tag ok">Crédits envoyés</span></td>
              <td><div class="row-actions"><button class="ghost eye" type="button" aria-label="Voir le profil"><img src="../../Public/assets/Common/part_Eye.svg" alt=""></button></div></td>
            </tr>
            <tr>
              <td><span class="who2"><span class="av ">CR</span><b>Chloé Robin</b></span></td>
              <td class="soft">Questionnaire post-test</td><td class="soft">-</td>
              <td><span class="chips"><span class='chip'>23 ans</span><span class='chip'>Femme</span><span class='chip'>FR</span></span></td>
              <td><span class="tag warn">Refusée</span></td><td>-</td>
              <td><div class="row-actions"><button class="ghost eye" type="button" aria-label="Voir le profil"><img src="../../Public/assets/Common/part_Eye.svg" alt=""></button></div></td>
            </tr>
            </tbody>
          </table>
        </section>

        <div class="trio">
          <section class="card pad">
            <div class="exp-top"><h2 class="big sm">Demandes à valider</h2><span class="pill sm">3 en attente</span></div>
            <div class="reqs">
              <div class="req sel"><span class="av">LT</span><div class="info"><b>Lucas Tessier</b><span>Étude mémoire visuelle - Ven. 19h00</span></div>
                <button class="ghost" type="button" aria-label="Accepter Lucas Tessier"><img src="../../Public/assets/Common/part_Accept.svg" alt=""></button>
                <button class="ghost" type="button" aria-label="Refuser Lucas Tessier"><img src="../../Public/assets/Common/part_Refuse.svg" alt=""></button></div>
              <div class="req"><span class="av">MA</span><div class="info"><b>Manon Albert</b><span>Entretien qualitatif - LOT 2 - Mar. 14h00</span></div>
                <button class="ghost" type="button" aria-label="Accepter Manon Albert"><img src="../../Public/assets/Common/part_Accept.svg" alt=""></button>
                <button class="ghost" type="button" aria-label="Refuser Manon Albert"><img src="../../Public/assets/Common/part_Refuse.svg" alt=""></button></div>
              <div class="req"><span class="av">KB</span><div class="info"><b>Karim Benali</b><span>Questionnaire post-test - Jeu. 11h00</span></div>
                <button class="ghost" type="button" aria-label="Accepter Karim Benali"><img src="../../Public/assets/Common/part_Accept.svg" alt=""></button>
                <button class="ghost" type="button" aria-label="Refuser Karim Benali"><img src="../../Public/assets/Common/part_Refuse.svg" alt=""></button></div>
            </div>
          </section>
          <section class="card pad">
            <div class="exp-top"><h2 class="big sm">Profil participant</h2><span class="tag warn">En attente</span></div>
            <div class="who3"><span class="av">LT</span><div><b>Lucas Tessier</b><span>lucas.tessier@etu.univ-lemans.fr</span></div></div>
            <div class="kv sm"><div><span>Âge</span><b>26 ans</b></div><div><span>Genre</span><b>Homme</b></div><div><span>Langues</span><b>Français, Anglais</b></div><div><span>Port de lunettes</span><b>Non</b></div><div><span>Consentement</span><b>Signé le 15/01/2026</b></div></div>
          </section>
          <section class="card pad">
            <h2 class="big sm">Rétributions à traiter</h2>
            <div class="pay"><div><b>Nathan Perrot</b><span>Coupon d'achat - 15 €</span></div><a class="mini solid" href="#">Valider l'envoi</a></div>
            <div class="pay"><div><b>Jules Farge</b><span>Crédits recherche</span></div><span class="tag ok">Envoyé</span></div>
          </section>
        </div>
        <div class="footer"><?php echo $espace; ?> - Le Mans Université</div>
      </main>
    </div>
  </div>
</body>
</html>

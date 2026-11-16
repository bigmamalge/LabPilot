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
  <title>Tableau de bord - LabPilot</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;900&amp;display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../../Public/css/style.css">
  <link rel="stylesheet" href="../../Public/css/page.css">
</head>
<body>
  <input type="checkbox" id="theme-toggle" class="theme-check" aria-label="Mode sombre">
  <div class="layout">
    <aside class="sidebar">
      <a class="logo" href="index.php"><img src="../../Public/assets/Common/Logo.png" alt="LabPilot"></a>
      <div class="role"><?php echo $espace; ?></div>
      <nav aria-label="Navigation principale">
        <a href="index.php" aria-current="page"><img src="../../Public/assets/Common/IconeTableauDeBord.svg" alt="" width="20" height="20"> Tableau de bord</a>
        <a href="experimentations.php"><img src="../../Public/assets/Common/IconeExperimentations.svg" alt="" width="20" height="20"> Mes expérimentations</a>
        <a href="planning.php"><img src="../../Public/assets/Common/IconePlanning.svg" alt="" width="20" height="20"> Planning</a>
        <a href="participants.php"><img src="../../Public/assets/Common/IconeParticipants.svg" alt="" width="20" height="20"> Participants</a>
        <a href="ressources.php"><img src="../../Public/assets/Common/IconeRessources.svg" alt="" width="20" height="20"> Ressources &amp; documents</a>
        <a href="statistiques.php"><img src="../../Public/assets/Common/IconeStatistiques.svg" alt="" width="20" height="20"> Statistiques</a>
        <a href="communications.php"><img src="../../Public/assets/Common/IconeCommunications.svg" alt="" width="20" height="20"> Communications</a>
        <a href="parametres.php"><img src="../../Public/assets/Common/IconeParametres.svg" alt="" width="20" height="20"> Paramètres</a>
      </nav>
      <div class="spacer"></div>
      <hr>
      <div class="help">Première expérimentation ?<br>Suivez notre <b>guide pas-à-pas</b> ou partez d'un modèle de protocole existant.</div>
    </aside>

    <div class="main">
      <header class="topbar">
        <label class="search">
          <img src="../../Public/assets/Common/RechercheIco.svg" alt="">
          <input type="search" placeholder="Rechercher une expérimentation..." aria-label="Rechercher">
        </label>
        <div class="grow"></div>
        <label class="icon-btn" for="theme-toggle" aria-label="Basculer le thème jour/nuit"><img src="../../Public/assets/Common/Trace.svg" alt=""></label>
        <button class="lang" type="button">FR - Français <img src="../../Public/assets/Common/FlecheBas.svg" alt=""></button>
        <button class="icon-btn bell" type="button" aria-label="Notifications"><img src="../../Public/assets/Common/Notifications.svg" alt=""></button>
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
            <p class="lead">Voici l'état de vos expérimentations et ce qui demande votre attention aujourd'hui.</p>
          </div>
          <div class="actions">
            <a class="btn" href="ressources.php"><img src="../../Public/assets/Common/RessourcesDocuments2.svg" alt="">Depuis un modèle</a>
            <a class="btn primary" href="experimentations.php"><img src="../../Public/assets/Common/IconeAjouter.svg" alt="">Créer une expérimentation</a>
          </div>
        </div>

        <section class="stats" aria-label="Indicateurs">
          <article class="card stat">
            <div class="top"><span class="ico"><img src="../../Public/assets/Common/CercleIcone.svg" alt=""><img class="check" src="../../Public/assets/Common/IconeValidation.svg" alt=""></span><span class="delta up">+2 ce mois-ci</span></div>
            <div class="value">6</div><div class="label">Expérimentations actives</div>
          </article>
          <article class="card stat">
            <div class="top"><span class="ico warn"><img src="../../Public/assets/Common/IconeInscriptions.svg" alt=""></span><span class="delta todo">À traiter</span></div>
            <div class="value">9</div><div class="label">Inscriptions en attente</div>
          </article>
          <article class="card stat">
            <div class="top"><span class="ico"><img src="../../Public/assets/Common/Statistiques2.svg" alt=""></span><span class="delta up">+4% vs. dernier mois</span></div>
            <div class="value">78%</div><div class="label">Taux de participation moyen</div>
          </article>
          <article class="card stat">
            <div class="top"><span class="ico"><img src="../../Public/assets/Common/Statistiques3.svg" alt=""></span><span class="delta neutral">Salle B204</span></div>
            <div class="value">Auj. 14h00</div><div class="label">Prochaine session</div>
          </article>
        </section>

        <div class="cols">
          <section class="card">
            <div class="panel-head"><div><h2>Mes expérimentations</h2><p>6 expérimentations · dernière mise à jour il y a 12 minutes</p></div></div>
            <div class="tabs" role="tablist" data-filters="#exp-table">
              <button role="tab" aria-selected="true" data-filter="all">Toutes</button>
              <button role="tab" aria-selected="false" data-filter="run">En cours</button>
              <button role="tab" aria-selected="false" data-filter="draft">Brouillons</button>
              <button role="tab" aria-selected="false" data-filter="done">Terminées</button>
              <button role="tab" aria-selected="false" data-filter="archived">Archivées</button>
            </div>
            <table class="data" id="exp-table">
              <thead><tr><th>Expérimentation</th><th>Statut</th><th>Participants</th><th>Prochain créneau</th><th></th></tr></thead>
              <tbody>
              <tr data-status="run">
                <td class="name"><b>Étude mémoire visuelle</b><small>Créée le 03/09/2026</small></td>
                <td><span class="pill run">En cours</span></td>
                <td><div class="progress"><span class="bar"><i style="width:74%"></i></span>18/24</div></td>
                <td>Auj. 14h00 (Salle B204)</td>
                <td><div class="row-actions"><button class="ghost" type="button"><img src="../../Public/assets/Common/BoutonActionLigne1.svg" alt="Voir le planning"></button><button class="ghost" type="button"><img src="../../Public/assets/Common/BoutonActionInscription1.svg" alt="Modifier"></button></div></td>
              </tr>
              <tr data-status="run">
                <td class="name"><b>Entretien qualitatif - Lot 2</b><small>Créée le 28/08/2026</small></td>
                <td><span class="pill run">En cours</span></td>
                <td><div class="progress"><span class="bar"><i style="width:40%"></i></span>6/15</div></td>
                <td>Demain 09h30 (Visio)</td>
                <td><div class="row-actions"><button class="ghost" type="button"><img src="../../Public/assets/Common/BoutonActionLigne1.svg" alt="Voir le planning"></button><button class="ghost" type="button"><img src="../../Public/assets/Common/BoutonActionInscription1.svg" alt="Modifier"></button></div></td>
              </tr>
              <tr data-status="draft">
                <td class="name"><b>Test utilisateur - nouvelle IHM</b><small>Créée le 20/09/2026</small></td>
                <td><span class="pill ">Brouillon</span></td>
                <td><div class="progress"><span class="bar"><i style="width:0%"></i></span>0/12</div></td>
                <td>Non planifié</td>
                <td><div class="row-actions"><button class="ghost" type="button"><img src="../../Public/assets/Common/BoutonActionInscription1.svg" alt="Modifier"></button></div></td>
              </tr>
              <tr data-status="run">
                <td class="name"><b>Questionnaire post-test</b><small>Créée le 15/09/2026</small></td>
                <td><span class="pill warn">Créneaux à valider</span></td>
                <td><div class="progress"><span class="bar"><i style="width:55%"></i></span>11/20</div></td>
                <td>Jeu. 11h00 (Salle A102)</td>
                <td><div class="row-actions"><button class="ghost" type="button"><img src="../../Public/assets/Common/BoutonActionLigne1.svg" alt="Voir le planning"></button></div></td>
              </tr>
              </tbody>
            </table>
          </section>

          <div class="stack">
            <section class="card">
              <div class="panel-head"><h2>Inscriptions à valider</h2><a href="participants.php">Tout voir</a></div>
            <div class="request">
              <span class="avatar">LT</span>
              <div class="info"><b>Lucas Tessier</b><span>Étude mémoire visuelle (créneau Ven. 10h00)</span></div>
              <div class="btns">
                <button class="ghost" type="button" aria-label="Accepter Lucas Tessier"><img src="../../Public/assets/Common/Groupe.svg" alt=""></button>
                <button class="ghost" type="button" aria-label="Refuser Lucas Tessier"><img src="../../Public/assets/Common/Groupe1.svg" alt=""></button>
              </div>
            </div>
            <div class="request">
              <span class="avatar">MA</span>
              <div class="info"><b>Manon Albert</b><span>Entretien qualitatif - Lot 2 (créneau Mar. 14h00)</span></div>
              <div class="btns">
                <button class="ghost" type="button" aria-label="Accepter Manon Albert"><img src="../../Public/assets/Common/Groupe.svg" alt=""></button>
                <button class="ghost" type="button" aria-label="Refuser Manon Albert"><img src="../../Public/assets/Common/Groupe1.svg" alt=""></button>
              </div>
            </div>
            <div class="request">
              <span class="avatar">KB</span>
              <div class="info"><b>Karim Benali</b><span>Questionnaire post-test (créneau Jeu. 11h00)</span></div>
              <div class="btns">
                <button class="ghost" type="button" aria-label="Accepter Karim Benali"><img src="../../Public/assets/Common/Groupe.svg" alt=""></button>
                <button class="ghost" type="button" aria-label="Refuser Karim Benali"><img src="../../Public/assets/Common/Groupe1.svg" alt=""></button>
              </div>
            </div>
            </section>
            <section class="card">
              <div class="panel-head"><h2>Prochains créneaux</h2><a href="planning.php">Planning</a></div>
              <div class="slots">
              <div class="slot"><div class="date">23<small>sept.</small></div><div><b>Étude mémoire visuelle - Session A</b><span>14h00-15h30 en Salle B204 (6/8 inscrits)</span></div></div>
              <div class="slot"><div class="date">24<small>sept.</small></div><div><b>Entretien qualitatif - Lot 2</b><span>09h30-10h00 en Visioconférence (1/1 inscrit)</span></div></div>
              <div class="slot"><div class="date">25<small>sept.</small></div><div><b>Questionnaire post-test</b><span>11h00-12h00 en Salle A102 (4/6 inscrits)</span></div></div>
              </div>
            </section>
          </div>
        </div>

        <section class="card">
          <div class="panel-head"><h2>Activité récente</h2><a class="link-2" href="communications.php">Incidents, annulations et rétributions</a></div>
          <div class="feed">
            <div class="feed-item"><span class="badge"><img src="../../Public/assets/Common/IconeAlerte.svg" alt=""></span><div><b>Incident signalé - Étude mémoire visuelle</b><span>Participant absent au créneau du 21/09, session à reprogrammer</span></div></div>
            <div class="feed-item"><span class="badge ok"><img src="../../Public/assets/Common/IconePaiement.svg" alt=""></span><div><b>Rétributions envoyées</b><span>12 coupons envoyés aux participants de « Perception sonore - Pilote »</span></div></div>
          </div>
        </section>
        <div class="footer"><?php echo $espace; ?> - Le Mans Université</div>
      </main>
    </div>
  </div>
</body>
</html>

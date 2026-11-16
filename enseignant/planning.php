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
  <title>Mon planning - LabPilot</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;900&amp;display=swap" rel="stylesheet">
  <link rel="stylesheet" href="styles.css">
  <link rel="stylesheet" href="pages.css">
</head>
<body>
  <input type="checkbox" id="theme-toggle" class="theme-check" aria-label="Mode sombre">
  <div class="layout">
    <aside class="sidebar">
      <a class="logo" href="index.php"><img src="../Public/assets/Common/Logo.png" alt="LabPilot"></a>
      <div class="role"><?php echo $espace; ?></div>
      <nav aria-label="Navigation principale">
        <a href="index.php"><img src="../Public/assets/Common/IconeTableauDeBord.svg" alt="" width="20" height="20"> Tableau de bord</a>
        <a href="experimentations.php"><img src="../Public/assets/Common/IconeExperimentations.svg" alt="" width="20" height="20"> Mes expérimentations</a>
        <a href="planning.php" aria-current="page"><img src="../Public/assets/Common/IconePlanning.svg" alt="" width="20" height="20"> Planning</a>
        <a href="participants.php"><img src="../Public/assets/Common/IconeParticipants.svg" alt="" width="20" height="20"> Participants</a>
        <a href="ressources.php"><img src="../Public/assets/Common/IconeRessources.svg" alt="" width="20" height="20"> Ressources &amp; documents</a>
        <a href="statistiques.php"><img src="../Public/assets/Common/IconeStatistiques.svg" alt="" width="20" height="20"> Statistiques</a>
        <a href="communications.php"><img src="../Public/assets/Common/IconeCommunications.svg" alt="" width="20" height="20"> Communications</a>
        <a href="parametres.php"><img src="../Public/assets/Common/IconeParametres.svg" alt="" width="20" height="20"> Paramètres</a>
      </nav>
      <div class="spacer"></div>
      <hr>
      <div class="help">Besoin d'aller vite ? Partez d'un <b>modèle existant</b> plutôt que de tout paramétrer à la main.</div>
    </aside>

    <div class="main">
      <header class="topbar">
        <label class="search">
          <img src="../Public/assets/Common/RechercheIco.svg" alt="">
          <input type="search" placeholder="Rechercher une expérimentation..." aria-label="Rechercher">
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
            <h1>Mon planning</h1>
            <p class="lead">Gérez vos créneaux, validez les demandes et suivez le remplissage de vos sessions.</p>
          </div>
          <div class="actions"><a class="btn primary" href="#"><img src="../Public/assets/Common/plan_IconeAjouter.svg" alt="">Nouveau créneau</a></div>
        </div>

        <div class="cols plan-cols">
          <section class="card pad">
            <div class="cal-bar">
              <h2>Semaine du 22 au 26 sept. 2026</h2>
              <button class="circle" type="button" aria-label="Semaine suivante"><img src="../Public/assets/Common/plan_ChevronRight.svg" alt=""></button>
              <span class="grow"></span>
              <div class="seg" role="tablist"><button role="tab" aria-selected="true" type="button">Semaine</button><button role="tab" aria-selected="false" type="button">Mois</button></div>
              <label class="select sm"><select aria-label="Filtrer"><option>Toutes les expérimentations</option></select></label>
            </div>
            <ul class="legend"><li><i style="background:var(--text)"></i>Confirmé</li><li><i style="background:var(--primary)"></i>Créneau à valider</li><li><i style="background:var(--succes-text)"></i>Complet</li></ul>
            <div class="week">
              <div class="day"><div class="dh"><small>LUN</small><b>22</b></div><div class="db"><div class="ev " style="top:12px"><b>Mémoire visuelle - A</b><span>10h00-11h30 - E284</span><span>6/8</span></div></div></div>
              <div class="day"><div class="dh"><small>MAR</small><b>23</b></div><div class="db"><div class="ev warn" style="top:166px"><b>Entretien Lot 2</b><span>14h00-15h00 - Malle</span><span>1/1</span></div></div></div>
              <div class="day"><div class="dh"><small>MER</small><span class="today">24</span></div><div class="db"><div class="ev " style="top:12px"><b>Test IHM</b><span>9h30-11h00 - B102</span><span>5/8</span></div><div class="ev ok" style="top:265px"><b>Mémoire visuelle - B</b><span>15h00-16h30 - B284</span><span>8/8</span></div></div></div>
              <div class="day"><div class="dh"><small>JEU</small><b>25</b></div><div class="db"><div class="ev warn" style="top:65px"><b>Questionnaire post-test</b><span>11h00-12h00 - A102</span><span>4/6</span></div></div></div>
              <div class="day"><div class="dh"><small>VEN</small><b>26</b></div><div class="db"><div class="ev " style="top:116px"><b>Mémoire visuelle - C</b><span>13h00-14h30 - B284</span><span>1/8</span></div></div></div>
            </div>
          </section>

          <div class="stack">
            <section class="card pad">
              <div class="exp-top"><h2 class="big sm">Mercredi 24 septembre</h2><span class="pill sm">2 créneaux</span></div>
              <article class="slot-card">
                <div class="st"><b class="hour">9h30</b><div><b>Test utilisateur - nouvelle IHM</b><span>Salle B102 - 5/8 inscrits</span></div></div>
                <div class="progress sm"><span class="bar"><i style="width:62%;background:var(--text)"></i></span><b>1 place restante</b></div>
              </article>
              <article class="slot-card hot">
                <div class="st"><b class="hour ok">15h00</b><div><b>Étude mémoire visuelle - Session B</b><span>Salle B284 - 8/8 inscrits</span></div></div>
                <div class="progress sm"><span class="bar"><i style="width:100%;background:var(--succes-text)"></i></span><b class="ok">Complet</b></div>
              </article>
              <div class="btn-row"><button class="btn-lg ok-t" type="button">Valider le créneau</button><button class="btn-lg danger-t" type="button">Refuser le créneau</button></div>
            </section>

            <section class="card pad">
              <h2 class="big sm">Nouveau créneau</h2>
              <form class="form" onsubmit="return false">
                <label>Expérimentation<span class="select"><select><option>Étude mémoire visuelle</option></select></span></label>
                <div class="two">
                  <label>Date<span class="input icon"><input value="26/09/2026"><img src="../Public/assets/Common/plan_Groupe.svg" alt=""></span></label>
                  <label>Heure de début<span class="input icon"><input value="14 : 00"><img src="../Public/assets/Common/plan_Clock.svg" alt=""></span></label>
                </div>
                <div class="two">
                  <label>Durée<span class="select"><select><option>1 h 00</option><option>1 h 30</option></select></span></label>
                  <label>Capacité<span class="input"><input value="8"></span></label>
                </div>
                <label>Salle / lieu<span class="input"><input value="Salle B284 - LIUM"></span></label>
                <p class="hint">Ressource associée à l'expérimentation</p>
                <button class="btn-lg primary" type="submit">Ajouter le créneau au planning</button>
              </form>
            </section>
          </div>
        </div>
        <div class="footer"><?php echo $espace; ?> - Le Mans Université</div>
      </main>
    </div>
  </div>
</body>
</html>

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
  <title>Mes expérimentations - LabPilot</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;900&amp;display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../../Public/css/style.css">
  <link rel="stylesheet" href="../../Public/css/page.css">
</head>
<body>
  <input type="checkbox" id="theme-toggle" class="theme-check" aria-label="Mode sombre">
  <div class="layout">
    
    <?php $ThisPage = 2; require_once __DIR__.'/SideBar.php'; ?>

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
            <h1>Mes expérimentations</h1>
            <p class="lead">Créez, paramétrez et suivez l'ensemble de vos études : restrictions de participation, associées et rétributions.</p>
          </div>
          <div class="actions">
            <a class="btn" href="ressources.php"><img src="../../Public/assets/Common/exp_IconeDocument.svg" alt="">Depuis un modèle</a>
            <a class="btn primary" href="#"><img src="../../Public/assets/Common/exp_IconeAjouter.svg" alt="">Créer une expérimentation</a>
          </div>
        </div>

        <div class="cols exp-cols">
          <section class="card pad">
            <h2 class="big">Toutes mes expérimentations</h2>
            <p class="sub">6 expérimentations</p>
            <div class="tabs flat" role="tablist" data-filters="#exp-list">
              <button role="tab" aria-selected="true" data-filter="all">Toutes</button>
              <button role="tab" aria-selected="false" data-filter="run">En-cours</button>
              <button role="tab" aria-selected="false" data-filter="draft">Brouillons</button>
              <button role="tab" aria-selected="false" data-filter="done">Terminées</button>
              <button role="tab" aria-selected="false" data-filter="archived">Archivées</button>
            </div>
            <div class="exp-list" id="exp-list">
              <article class="exp-card" data-status="run">
                <div class="exp-top"><h3>Étude mémoire visuelle</h3><span class="pill run sm">En cours</span></div>
                <p class="desc">Impact de la charge cognitive sur la reconnaissance d'images chez l'adulte jeune.</p>
                <div class="meta"><div><span>Période</span><b>03/01/2026 - 15/11/2026</b></div><div><span>Participants</span><b>18/24</b></div><div><span>Rétribution</span><b>Coupon 10 €</b></div><div><span>Ressources</span><b>3 documents</b></div></div>
                <div class="exp-foot">
                  <div class="progress"><span class="bar sm"><i style="width:75%"></i></span>75 % rempli</div>
                  <div class="foot-btns"><a class="mini" href="#">Voir le détail</a><a class="mini" href="planning.php">Planning</a><a class="mini plain" href="#">Modifier</a></div>
                </div>
              </article>
              <article class="exp-card" data-status="run">
                <div class="exp-top"><h3>Entretien qualitatif - Lot 2</h3><span class="pill run sm">En cours</span></div>
                <p class="desc">Entretiens semi-directifs sur les usages numériques des seniors.</p>
                <div class="meta"><div><span>Période</span><b>28/08 - 30/01/2026</b></div><div><span>Participants</span><b>8/15</b></div><div><span>Rétribution</span><b>Aucune</b></div><div><span>Ressources</span><b>2 documents</b></div></div>
                <div class="exp-foot">
                  <div class="progress"><span class="bar sm"><i style="width:53%"></i></span>53 % rempli</div>
                  <div class="foot-btns"><a class="mini" href="#">Voir le détail</a><a class="mini" href="planning.php">Planning</a><a class="mini plain" href="#">Modifier</a></div>
                </div>
              </article>
              <article class="exp-card" data-status="draft">
                <div class="exp-top"><h3>Test utilisateur - nouvelle IHM</h3><span class="pill sm">Brouillon</span></div>
                <p class="desc">Évaluation ergonomique d'un prototype d'interface avant mise en production.</p>
                <div class="meta"><div><span>Période</span><b>non planifiée</b></div><div><span>Participants</span><b>0/12</b></div><div><span>Rétribution</span><b>Crédits recherche</b></div><div><span>Ressources</span><b>1 document</b></div></div>
                <div class="exp-foot">
                  <div class="progress"><span class="bar sm"><i style="width:20%"></i></span>Paramétrage à 20 %</div>
                  <div class="foot-btns"><a class="mini solid" href="#">Terminer le paramétrage</a><a class="mini plain danger" href="#">Supprimer</a></div>
                </div>
              </article>
              <article class="exp-card" data-status="run">
                <div class="exp-top"><h3>Questionnaire post-test</h3><span class="pill warn sm">Créneaux à valider</span></div>
                <p class="desc">Recueil des impressions à chaud suite aux sessions de test utilisateur.</p>
                <div class="meta"><div><span>Période</span><b>15/09 - 10/10/2026</b></div><div><span>Participants</span><b>15/20</b></div><div><span>Rétribution</span><b>Aucune</b></div><div><span>Ressources</span><b>1 questionnaire</b></div></div>
                <div class="exp-foot">
                  <div class="progress"><span class="bar sm"><i style="width:35%"></i></span>35 % rempli</div>
                  <div class="foot-btns"><a class="mini" href="#">Voir le détail</a><a class="mini" href="planning.php">Planning</a><a class="mini plain" href="#">Modifier</a></div>
                </div>
              </article>
            </div>
          </section>

          <div class="stack">
            <section class="card pad">
              <div class="exp-top"><div><h2 class="big sm">Étude mémoire visuelle</h2><p class="sub accent">Paramètres de l'expérimentation</p></div><span class="pill run sm">En cours</span></div>
              <div class="kv"><div><span>Dates</span><b>03/01/2026 - 15/11/2026</b></div><div><span>Durée par session</span><b>1 h 30</b></div><div><span>Nombre de sessions</span><b>3 par participant</b></div><div><span>Rétribution</span><b>Coupon d'achat - 10 €</b></div><div><span>Restrictions</span><b>18-35 ans, vision normale</b></div><div><span>Consentement requis</span><b>Oui</b></div></div>
              <h3 class="h-sm">Ressources associées</h3>
              <div class="files">
              <div class="file"><img src="../../Public/assets/Common/exp_RessourcesDocuments1.svg" alt=""><div><b>Protocole_experimental.pdf</b><span>Ajouté le 01/01/2026</span></div></div>
              <div class="file"><img src="../../Public/assets/Common/exp_RessourcesDocuments1.svg" alt=""><div><b>Questionnaire_pre-test.docx</b><span>Ajouté le 01/01/2026</span></div></div>
              <div class="file"><img src="../../Public/assets/Common/exp_RessourcesDocuments1.svg" alt=""><div><b>Fiche_de_consentement.pdf</b><span>Ajouté le 01/01/2026</span></div></div>
              </div>
              <div class="btn-row"><a class="btn-lg dark" href="#">Modifier</a><a class="btn-lg" href="#">Archiver</a></div>
            </section>
            <section class="card pad">
              <h2 class="big sm">Modèles disponibles</h2>
              <div class="models">
              <div class="model"><div><b>Protocole mémoire visuelle standard</b><span>Utilisé 4 fois par votre équipe</span></div><a class="mini" href="#">Utiliser</a></div>
              <div class="model"><div><b>Entretien qualitatif type</b><span>Trame semi-directive, 45 min</span></div><a class="mini" href="#">Utiliser</a></div>
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

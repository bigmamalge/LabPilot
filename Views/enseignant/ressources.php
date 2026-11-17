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
  <title>Ressources et documents - LabPilot</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;900&amp;display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../../Public/css/style.css">
  <link rel="stylesheet" href="../../Public/css/page.css">
</head>
<body>
  <input type="checkbox" id="theme-toggle" class="theme-check" aria-label="Mode sombre">
  <div class="layout">
    <?php $ThisPage = 5;
    require_once __DIR__ . '/SideBar.php'; ?>

    <div class="main">
      <?php require_once __DIR__ . '/topbar.php'; ?>

      <main class="content">
        <div class="page-head">
          <div>
            <p class="eyebrow"><?php echo $espace; ?></p>
            <h1>Ressources et documents</h1>
            <p class="lead">Gérez les documents associés à vos expérimentations ainsi que les salles, équipements et matériels du laboratoire.</p>
          </div>
          <div class="actions">
            <a class="btn" href="#"><svg width="20" height="22" viewBox="0 0 18 22" fill="none" stroke="#21254a" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="9" cy="9" r="3"/><path d="M9 21l6.5-7.5C16.6 12.1 17 10.9 17 9a8 8 0 1 0-16 0c0 1.9.4 3.1 1.5 4.5z"/></svg>Réserver une ressource</a>
            <a class="btn primary" href="#"><img src="../../Public/assets/Common/IconeAjouter.svg" alt="">Ajouter un document</a>
          </div>
        </div>

        <section class="stats" aria-label="Indicateurs">
          <article class="card stat">
            <div class="top"><span class="ico "><img src="../../Public/assets/Common/part_Doc.svg" alt=""></span><span class="delta neutral">4 expérimentations</span></div>
            <div class="value">14</div><div class="label">Documents totaux</div>
          </article>
          <article class="card stat">
            <div class="top"><span class="ico ok-bg"><img src="../../Public/assets/Common/res_PinGreen.svg" alt=""></span><span class="delta up">2 libres cet après-midi</span></div>
            <div class="value">3/5</div><div class="label">Salles disponibles</div>
          </article>
          <article class="card stat">
            <div class="top"><span class="ico violet-bg"><svg width="20" height="20" viewBox="0 0 20 20" fill="none" stroke="#6d3fd1" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="2.5" y="3.5" width="15" height="10" rx="1.5"/><path d="M7 17h6M10 13.5V17"/></svg></span><span class="delta neutral">sur 9 équipements</span></div>
            <div class="value">4</div><div class="label">Équipements réservés</div>
          </article>
          <article class="card stat">
            <div class="top"><span class="ico warn"><img src="../../Public/assets/Common/Statistiques3.svg" alt=""></span><span class="delta neutral">sur 1 Go</span></div>
            <div class="value">128 Mo</div><div class="label">Espace de stockage utilisé</div>
          </article>
        </section>

        <div class="tabs big-tabs" role="tablist">
          <button role="tab" aria-selected="true" type="button">Documents</button>
          <button role="tab" aria-selected="false" type="button">Salles &amp; équipements</button>
        </div>

        <section class="card pad lg">
          <h2 class="big sm">Documents de mes expérimentations</h2>
          <p class="sub">Protocoles, questionnaires, fiches de consentement et documents administratifs.</p>
          <div class="filters in">
            <label class="search wide flat"><img src="../../Public/assets/Common/res_Search.svg" alt=""><input type="search" placeholder="Rechercher un document..." aria-label="Rechercher un document"></label>
            <label class="select flat"><select aria-label="Type"><option>Tous les types</option></select></label>
          </div>
          <table class="data docs">
            <thead><tr><th>Document</th><th>Type</th><th>Expérimentation</th><th>Ajouté le</th><th>Taille</th><th></th></tr></thead>
            <tbody>
              <tr>
                <td><span class="who2"><span class="fileico"><img src="../../Public/assets/Common/res_File.svg" alt=""></span><b>Protocole_experimental.pdf</b></span></td>
                <td><span class="tag sm violet">Protocole</span></td><td class="soft">Étude mémoire visuelle</td><td class="soft">01/01/2026</td><td class="soft">1,2 Mo</td>
                <td><div class="row-actions">
                  <button class="ghost rnd" type="button" aria-label="Voir"><img src="../../Public/assets/Common/res_Eye.svg" alt=""></button>
                  <button class="ghost rnd" type="button" aria-label="Télécharger"><img src="../../Public/assets/Common/res_Download.svg" alt=""></button>
                  <button class="ghost rnd del" type="button" aria-label="Supprimer"><img src="../../Public/assets/Common/res_Trash.svg" alt=""></button></div></td>
              </tr>
              <tr>
                <td><span class="who2"><span class="fileico"><img src="../../Public/assets/Common/res_File.svg" alt=""></span><b>Questionnaire_pre-test.docx</b></span></td>
                <td><span class="tag sm violet">Questionnaire</span></td><td class="soft">Étude mémoire visuelle</td><td class="soft">02/01/2026</td><td class="soft">240 Ko</td>
                <td><div class="row-actions">
                  <button class="ghost rnd" type="button" aria-label="Voir"><img src="../../Public/assets/Common/res_Eye.svg" alt=""></button>
                  <button class="ghost rnd" type="button" aria-label="Télécharger"><img src="../../Public/assets/Common/res_Download.svg" alt=""></button>
                  <button class="ghost rnd del" type="button" aria-label="Supprimer"><img src="../../Public/assets/Common/res_Trash.svg" alt=""></button></div></td>
              </tr>
              <tr>
                <td><span class="who2"><span class="fileico"><img src="../../Public/assets/Common/res_File.svg" alt=""></span><b>Fiche_de_consentement.pdf</b></span></td>
                <td><span class="tag sm ok">Consentement</span></td><td class="soft">Étude mémoire visuelle</td><td class="soft">03/01/2026</td><td class="soft">230 Ko</td>
                <td><div class="row-actions">
                  <button class="ghost rnd" type="button" aria-label="Voir"><img src="../../Public/assets/Common/res_Eye.svg" alt=""></button>
                  <button class="ghost rnd" type="button" aria-label="Télécharger"><img src="../../Public/assets/Common/res_Download.svg" alt=""></button>
                  <button class="ghost rnd del" type="button" aria-label="Supprimer"><img src="../../Public/assets/Common/res_Trash.svg" alt=""></button></div></td>
              </tr>
              <tr>
                <td><span class="who2"><span class="fileico"><img src="../../Public/assets/Common/res_File.svg" alt=""></span><b>Guide_entretien.pdf</b></span></td>
                <td><span class="tag sm violet">Protocole</span></td><td class="soft">Entretien qualitatif - Lot 2</td><td class="soft">28/08/2026</td><td class="soft">850 Ko</td>
                <td><div class="row-actions">
                  <button class="ghost rnd" type="button" aria-label="Voir"><img src="../../Public/assets/Common/res_Eye.svg" alt=""></button>
                  <button class="ghost rnd" type="button" aria-label="Télécharger"><img src="../../Public/assets/Common/res_Download.svg" alt=""></button>
                  <button class="ghost rnd del" type="button" aria-label="Supprimer"><img src="../../Public/assets/Common/res_Trash.svg" alt=""></button></div></td>
              </tr>
              <tr>
                <td><span class="who2"><span class="fileico"><img src="../../Public/assets/Common/res_File.svg" alt=""></span><b>Grille_analyse.xlsx</b></span></td>
                <td><span class="tag sm ">Administratif</span></td><td class="soft">Entretien qualitatif - Lot 2</td><td class="soft">28/08/2026</td><td class="soft">150 Ko</td>
                <td><div class="row-actions">
                  <button class="ghost rnd" type="button" aria-label="Voir"><img src="../../Public/assets/Common/res_Eye.svg" alt=""></button>
                  <button class="ghost rnd" type="button" aria-label="Télécharger"><img src="../../Public/assets/Common/res_Download.svg" alt=""></button>
                  <button class="ghost rnd del" type="button" aria-label="Supprimer"><img src="../../Public/assets/Common/res_Trash.svg" alt=""></button></div></td>
              </tr>
              <tr>
                <td><span class="who2"><span class="fileico"><img src="../../Public/assets/Common/res_File.svg" alt=""></span><b>Questionnaire_UX.pdf</b></span></td>
                <td><span class="tag sm violet">Questionnaire</span></td><td class="soft">Test utilisateur - nouvelle IHM</td><td class="soft">20/09/2026</td><td class="soft">410 Ko</td>
                <td><div class="row-actions">
                  <button class="ghost rnd" type="button" aria-label="Voir"><img src="../../Public/assets/Common/res_Eye.svg" alt=""></button>
                  <button class="ghost rnd" type="button" aria-label="Télécharger"><img src="../../Public/assets/Common/res_Download.svg" alt=""></button>
                  <button class="ghost rnd del" type="button" aria-label="Supprimer"><img src="../../Public/assets/Common/res_Trash.svg" alt=""></button></div></td>
              </tr>
              <tr>
                <td><span class="who2"><span class="fileico"><img src="../../Public/assets/Common/res_File.svg" alt=""></span><b>Autorisation_enregistrement.pdf</b></span></td>
                <td><span class="tag sm ok">Consentement</span></td><td class="soft">Test utilisateur - nouvelle IHM</td><td class="soft">20/09/2026</td><td class="soft">190 Ko</td>
                <td><div class="row-actions">
                  <button class="ghost rnd" type="button" aria-label="Voir"><img src="../../Public/assets/Common/res_Eye.svg" alt=""></button>
                  <button class="ghost rnd" type="button" aria-label="Télécharger"><img src="../../Public/assets/Common/res_Download.svg" alt=""></button>
                  <button class="ghost rnd del" type="button" aria-label="Supprimer"><img src="../../Public/assets/Common/res_Trash.svg" alt=""></button></div></td>
              </tr>
              <tr>
                <td><span class="who2"><span class="fileico"><img src="../../Public/assets/Common/res_File.svg" alt=""></span><b>Rapport_pilote.pdf</b></span></td>
                <td><span class="tag sm ">Administratif</span></td><td class="soft">Perception sonore - Pilote</td><td class="soft">10/08/2026</td><td class="soft">2,1 Mo</td>
                <td><div class="row-actions">
                  <button class="ghost rnd" type="button" aria-label="Voir"><img src="../../Public/assets/Common/res_Eye.svg" alt=""></button>
                  <button class="ghost rnd" type="button" aria-label="Télécharger"><img src="../../Public/assets/Common/res_Download.svg" alt=""></button>
                  <button class="ghost rnd del" type="button" aria-label="Supprimer"><img src="../../Public/assets/Common/res_Trash.svg" alt=""></button></div></td>
              </tr>
            </tbody>
          </table>
        </section>

        <section class="card pad upload">
          <h3 class="h-sm">Ajouter un document</h3>
          <div class="drop"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#52577a" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M4 15v3a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-3M12 16V4M7.5 8.5 12 4l4.5 4.5"/></svg><b>Glissez un fichier ici</b><span>ou <a href="#">parcourir vos fichiers</a></span><small>PDF, DOCX, XLSX - 10 Mo max.</small></div>
          <form class="form small" onsubmit="return false">
            <label>Type de document<span class="select"><select><option>Protocole expérimental</option></select></span></label>
            <label>Expérimentation associée<span class="select"><select><option>Étude mémoire visuelle</option></select></span></label>
            <button class="btn-lg primary" type="submit">Téléverser le document</button>
          </form>
        </section>
        <div class="footer"><?php echo $espace; ?> - Le Mans Université</div>
      </main>
    </div>
  </div>
</body>
</html>

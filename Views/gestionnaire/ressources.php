<!DOCTYPE html>
<html lang="<?php echo strtolower($langue); ?>" data-theme="<?php echo $theme; ?>">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Ressources et documents - LabPilot</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;900&amp;display=swap" rel="stylesheet">
  <link rel="stylesheet" href="Public/css/style.css?v=<?php echo filemtime(__DIR__ . "/../../Public/css/style.css"); ?>">
  <link rel="stylesheet" href="Public/css/page.css?v=<?php echo filemtime(__DIR__ . "/../../Public/css/page.css"); ?>">
  <link rel="stylesheet" href="Public/css/gestionnaire.css?v=<?php echo filemtime(__DIR__ . "/../../Public/css/gestionnaire.css"); ?>">
</head>
<body>
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
            <a class="btn primary" href="#"><img src="Public/assets/Common/IconeAjouter.svg" alt="">Ajouter un document</a>
          </div>
        </div>

        <section class="stats" aria-label="Indicateurs">
          <article class="card stat">
            <div class="top"><span class="ico "><img src="Public/assets/Common/part_Doc.svg" alt=""></span><span class="delta neutral"><?php echo $nbExperimentationsAvecDocuments; ?> expérimentation<?php echo $nbExperimentationsAvecDocuments > 1 ? 's' : ''; ?></span></div>
            <div class="value"><?php echo count($documents); ?></div><div class="label">Documents totaux</div>
          </article>
          <article class="card stat">
            <div class="top"><span class="ico ok-bg"><img src="Public/assets/Common/res_PinGreen.svg" alt=""></span><span class="delta up"><?php echo $nbSallesLibresAujourdhui; ?> libre<?php echo $nbSallesLibresAujourdhui > 1 ? 's' : ''; ?> aujourd'hui</span></div>
            <div class="value"><?php echo $nbSallesDisponibles . '/' . count($salles); ?></div><div class="label">Salles disponibles</div>
          </article>
          <article class="card stat">
            <div class="top"><span class="ico violet-bg"><svg width="20" height="20" viewBox="0 0 20 20" fill="none" stroke="#6d3fd1" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="2.5" y="3.5" width="15" height="10" rx="1.5"/><path d="M7 17h6M10 13.5V17"/></svg></span><span class="delta neutral">sur <?php echo count($equipements); ?> équipements</span></div>
            <div class="value"><?php echo $nbEquipementsReserves; ?></div><div class="label">Équipements réservés</div>
          </article>
          <article class="card stat">
            <div class="top"><span class="ico warn"><img src="Public/assets/Common/Statistiques3.svg" alt=""></span><span class="delta neutral">salles et équipements</span></div>
            <div class="value"><?php echo $nbMesReservations; ?></div><div class="label">Mes réservations à venir</div>
          </article>
        </section>

        <form class="tabs big-tabs" role="tablist" method="get" action="index.php">
          <input type="hidden" name="Role" value="1">
          <input type="hidden" name="Page" value="5">
          <button role="tab" aria-selected="<?php echo $onglet === 'documents' ? 'true' : 'false'; ?>" type="submit" name="Onglet" value="documents">Documents</button>
          <button role="tab" aria-selected="<?php echo $onglet === 'salles' ? 'true' : 'false'; ?>" type="submit" name="Onglet" value="salles">Salles &amp; équipements</button>
        </form>

        <?php if ($onglet === 'documents') { ?>
        <section class="card pad lg">
          <h2 class="big sm">Documents de mes expérimentations</h2>
          <p class="sub">Protocoles, questionnaires, fiches de consentement et documents administratifs.</p>
          <div class="filters in">
            <label class="search wide flat"><img src="Public/assets/Common/res_Search.svg" alt=""><input type="search" placeholder="Rechercher un document..." aria-label="Rechercher un document"></label>
            <label class="select flat"><select aria-label="Type"><option>Tous les types</option><?php
              foreach ($typesDocuments as $type) {
                echo '<option>' . htmlspecialchars($type) . '</option>';
              }
              ?></select></label>
          </div>
          <table class="data docs">
            <thead><tr><th>Document</th><th>Type</th><th>Expérimentation</th><th></th></tr></thead>
            <tbody>
              <?php
              if (count($documents) === 0) {
                echo '<tr><td colspan="4">Aucun document pour le moment.</td></tr>';
              }
              foreach ($documents as $document) {
                echo '<tr>
                <td><span class="who2"><span class="fileico"><img src="Public/assets/Common/res_File.svg" alt=""></span><b>' . htmlspecialchars($document['NOM_RESS']) . '</b></span></td>
                <td><span class="tag sm ' . $document['CLASSE_TYPE'] . '">' . htmlspecialchars($document['TYPE_RESS']) . '</span></td><td class="soft">' . htmlspecialchars($document['TITRE_EXP']) . '</td>
                <td><div class="row-actions">
                  <button class="ghost rnd" type="button" aria-label="Voir"><img src="Public/assets/Common/res_Eye.svg" alt=""></button>
                  <button class="ghost rnd" type="button" aria-label="Télécharger"><img src="Public/assets/Common/res_Download.svg" alt=""></button>
                  <button class="ghost rnd del" type="button" aria-label="Supprimer"><img src="Public/assets/Common/res_Trash.svg" alt=""></button></div></td>
              </tr>';
              }
              ?>
            </tbody>
          </table>
        </section>

        <section class="card pad upload">
          <h3 class="h-sm">Ajouter un document</h3>
          <div class="drop"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#52577a" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M4 15v3a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-3M12 16V4M7.5 8.5 12 4l4.5 4.5"/></svg><b>Glissez un fichier ici</b><span>ou <a href="#">parcourir vos fichiers</a></span><small>PDF, DOCX, XLSX - 10 Mo max.</small></div>
          <form class="form small" onsubmit="return false">
            <label>Type de document<span class="select"><select><?php
              foreach ($typesDocuments as $type) {
                echo '<option>' . htmlspecialchars($type) . '</option>';
              }
              ?></select></span></label>
            <label>Expérimentation associée<span class="select"><select><?php
              foreach ($experimentations as $exp) {
                echo '<option>' . htmlspecialchars($exp['TITRE_EXP']) . '</option>';
              }
              ?></select></span></label>
            <button class="btn-lg primary" type="submit">Téléverser le document</button>
          </form>
        </section>
        <?php } else { ?>
        <section class="card pad lg">
          <h2 class="big sm">Salles et équipements du laboratoire</h2>
          <p class="sub">État des ressources et prochaine réservation de chacune.</p>
          <table class="data docs">
            <thead><tr><th>Ressource</th><th>Type</th><th>État</th><th>Prochaine réservation</th></tr></thead>
            <tbody>
              <?php
              if (count($ressourcesLabo) === 0) {
                echo '<tr><td colspan="4">Aucune ressource de laboratoire.</td></tr>';
              }
              foreach ($ressourcesLabo as $ressource) {
                echo '<tr>
                <td><span class="who2"><span class="fileico"><img src="Public/assets/Common/res_Pin.svg" alt=""></span><b>' . htmlspecialchars($ressource['NOM_RESS_LABO']) . '</b></span></td>
                <td><span class="tag sm ' . $ressource['CLASSE_TYPE'] . '">' . htmlspecialchars($ressource['TYPE_RESS_LABO']) . '</span></td>
                <td class="soft">' . htmlspecialchars($ressource['ETAT_RESS_LABO']) . '</td>
                <td class="soft">' . htmlspecialchars($ressource['PROCHAINE_RESERVATION'] ?? 'Aucune') . '</td>
              </tr>';
              }
              ?>
            </tbody>
          </table>
        </section>
        <?php } ?>
        <div class="footer"><?php echo $espace; ?> - Le Mans Université</div>
      </main>
    </div>
  </div>
</body>
</html>

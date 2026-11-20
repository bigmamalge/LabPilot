<header class="topbar">
  <label class="search">
    <img src="Public/assets/Common/RechercheIco.svg" alt="">
    <input type="search" placeholder="Rechercher une expérimentation..." aria-label="Rechercher">
  </label>
  <div class="grow"></div>
  <?php require __DIR__ . "/../commun/themeBouton.php"; ?>
  <button class="lang" type="button"><?php echo $libelleLangue; ?> <img src="Public/assets/Common/FlecheBas.svg" alt=""></button>
  <button class="icon-btn bell" type="button" aria-label="Notifications"><img
      src="Public/assets/<?php echo $dossierIcones; ?>/Notifications.svg" alt=""></button>
  <div class="profile">
    <span class="avatar"><?php echo $initiales; ?></span>
    <span class="who"><b><?php echo $nom_complet; ?></b><span><?php echo $fonction; ?></span></span>
  </div>
</header>
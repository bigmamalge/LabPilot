<header class="topbar">
  <label class="search">
    <img src="../../Public/assets/Common/RechercheIco.svg" alt="">
    <input type="search" placeholder="Rechercher une expérimentation..." aria-label="Rechercher">
  </label>
  <div class="grow"></div>
  <label class="icon-btn" for="theme-toggle" aria-label="Basculer le thème jour/nuit"><img
      src="../../Public/assets/Common/Trace.svg" alt=""></label>
  <button class="lang" type="button">FR - Français <img src="../../Public/assets/Common/FlecheBas.svg" alt=""></button>
  <button class="icon-btn bell" type="button" aria-label="Notifications"><img
      src="../../Public/assets/Common/Notifications.svg" alt=""></button>
  <div class="profile">
    <span class="avatar"><?php echo $initiales; ?></span>
    <span class="who"><b><?php echo $nom_complet; ?></b><span><?php echo $fonction; ?></span></span>
  </div>
</header>
<aside class="sidebar">
      <a class="logo" href="index.php"><img src="Public/assets/Common/Logo.png" alt="LabPilot"></a>
      <div class="role">espace <?php echo $poste; ?></div>
      <nav aria-label="Navigation principale">
        <a href="index.php?Role=6&Page=1" <?php if($ThisPage == 1) { echo 'aria-current="page"'; } ?>><img src="Public/assets/Common/IconeTableauDeBord.svg" alt="" width="20" height="20"> Tableau de bord</a>
        <a href="index.php?Role=6&Page=2" <?php if($ThisPage == 2) { echo 'aria-current="page"'; } ?>><img src="Public/assets/Common/IconeParticipants.svg" alt="" width="20" height="20"> Gestion des utilisateurs</a>
        <a href="index.php?Role=6&Page=3" <?php if($ThisPage == 3) { echo 'aria-current="page"'; } ?>><img src="Public/assets/Common/IconeParametres.svg" alt="" width="20" height="20"> Paramétrage de l'application</a>
        <a href="index.php?Role=6&Page=4" <?php if($ThisPage == 4) { echo 'aria-current="page"'; } ?>><img src="Public/assets/Administrateur/IconeSecurite.svg" alt="" width="20" height="20"> Sécurité et maintenance</a>
        <a href="index.php?Role=6&Page=5" <?php if($ThisPage == 5) { echo 'aria-current="page"'; } ?>><img src="Public/assets/Common/IconeRessources.svg" alt="" width="20" height="20"> Gestion des modèles</a>
      </nav>
      <div class="spacer"></div>
      <hr>
      <div class="help">Un incident technique ? <b>Consultez les journaux</b> d'activité pour identifier la cause.</div>
</aside>

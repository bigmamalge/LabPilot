<aside class="sidebar">
      <a class="logo" href="index.php"><img src="Public/assets/Common/Logo.png" alt="LabPilot"></a>
      <div class="role">espace <?php echo $poste; ?></div>
      <nav aria-label="Navigation principale">
        <a href="index.php?Role=5&Page=1" <?php if($ThisPage == 1) { echo 'aria-current="page"'; } ?>><img src="Public/assets/Common/IconeTableauDeBord.svg" alt="" width="20" height="20"> Tableau de bord</a>
        <a href="index.php?Role=5&Page=2" <?php if($ThisPage == 2) { echo 'aria-current="page"'; } ?>><img src="Public/assets/Common/IconeExperimentations.svg" alt="" width="20" height="20"> Mes expérimentations</a>
        <a href="index.php?Role=5&Page=3" <?php if($ThisPage == 3) { echo 'aria-current="page"'; } ?>><img src="Public/assets/Common/IconePlanning.svg" alt="" width="20" height="20"> Planning global</a>
        <a href="index.php?Role=5&Page=4" <?php if($ThisPage == 4) { echo 'aria-current="page"'; } ?>><img src="Public/assets/Common/IconeRessources.svg" alt="" width="20" height="20"> Ressources globales</a>
        <a href="index.php?Role=5&Page=5" <?php if($ThisPage == 5) { echo 'aria-current="page"'; } ?>><img src="Public/assets/Common/IconeStatistiques.svg" alt="" width="20" height="20"> Statistiques consolidées</a>
      </nav>
      <div class="spacer"></div>
      <hr>
      <div class="help">Vue globale du laboratoire : <b>consultez toutes les études</b> menées par l'ensemble des équipes du <?php echo htmlspecialchars($sigleLabo); ?>.</div>
</aside>

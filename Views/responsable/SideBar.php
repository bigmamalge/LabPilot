<aside class="sidebar">
      <a class="logo" href="index.php"><img src="Public/assets/Common/Logo.png" alt="LabPilot"></a>
      <div class="role">espace <?php echo $poste; ?></div>
      <nav aria-label="Navigation principale">
        <a href="index.php?Role=4&Page=1" <?php if($ThisPage == 1) { echo 'aria-current="page"'; } ?>><img src="Public/assets/Common/IconeTableauDeBord.svg" alt="" width="20" height="20"> Tableau de bord</a>
        <a href="index.php?Role=4&Page=2" <?php if($ThisPage == 2) { echo 'aria-current="page"'; } ?>><img src="Public/assets/Common/IconeExperimentations.svg" alt="" width="20" height="20"> Expérimentations de l'équipe</a>
        <a href="index.php?Role=4&Page=3" <?php if($ThisPage == 3) { echo 'aria-current="page"'; } ?>><img src="Public/assets/Common/IconePlanning.svg" alt="" width="20" height="20"> Plannings de l'équipe</a>
        <a href="index.php?Role=4&Page=4" <?php if($ThisPage == 4) { echo 'aria-current="page"'; } ?>><img src="Public/assets/Common/IconeStatistiques.svg" alt="" width="20" height="20"> Statistiques et rapports</a>
      </nav>
      <div class="spacer"></div>
      <hr>
      <div class="help">Besoin de détails sur une étude ? <b>Consultez la vue supervision</b> depuis la liste des expérimentations de l'équipe.</div>
</aside>

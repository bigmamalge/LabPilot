<aside class="sidebar">
      <a class="logo" href="index.php"><img src="../../Public/assets/Common/Logo.png" alt="LabPilot"></a>
      <div class="role">espace <?php echo $poste; ?></div>
      <nav aria-label="Navigation principale">
        <a href="../../Controllers/enseignant/TableauDeBordController.php" <?php if($ThisPage == 1) { echo 'aria-current="page"'; } ?>><img src="../../Public/assets/Common/IconeTableauDeBord.svg" alt="" width="20" height="20"> Tableau de bord</a>
        <a href="../../Controllers/enseignant/ExperimentationsController.php" <?php if($ThisPage == 2) { echo 'aria-current="page"'; } ?>><img src="../../Public/assets/Common/IconeExperimentations.svg" alt="" width="20" height="20"> Mes expérimentations</a>
        <a href="../../Controllers/enseignant/PlanningController.php" <?php if($ThisPage == 3) { echo 'aria-current="page"'; } ?>><img src="../../Public/assets/Common/IconePlanning.svg" alt="" width="20" height="20"> Planning</a>
        <a href="../../Controllers/enseignant/ParticipantsController.php" <?php if($ThisPage == 4) { echo 'aria-current="page"'; } ?>><img src="../../Public/assets/Common/IconeParticipants.svg" alt="" width="20" height="20"> Participants</a>
        <a href="../../Controllers/enseignant/RessourcesController.php" <?php if($ThisPage == 5) { echo 'aria-current="page"'; } ?>><img src="../../Public/assets/Common/IconeRessources.svg" alt="" width="20" height="20"> Ressources &amp; documents</a>
        <a href="../../Controllers/enseignant/StatistiquesController.php" <?php if($ThisPage == 6) { echo 'aria-current="page"'; } ?>><img src="../../Public/assets/Common/IconeStatistiques.svg" alt="" width="20" height="20"> Statistiques</a>
        <a href="communications.php"><img src="../../Public/assets/Common/IconeCommunications.svg" alt="" width="20" height="20"> Communications</a>
        <a href="parametres.php"><img src="../../Public/assets/Common/IconeParametres.svg" alt="" width="20" height="20"> Paramètres</a>
      </nav>
      <div class="spacer"></div>
      <hr>
      <div class="help">Première expérimentation ?<br>Suivez notre <b>guide pas-à-pas</b> ou partez d'un modèle de protocole existant. </div>
      
            
</aside>


  
<aside class="sidebar">
      <a class="logo" href="index.php"><img src="Public/assets/Common/Logo.png" alt="LabPilot"></a>
      <div class="role">espace <?php echo $poste; ?></div>
      <nav aria-label="Navigation principale">
        <a href="index.php?Role=3&Page=1" <?php if($ThisPage == 1) { echo 'aria-current="page"'; } ?>><img src="Public/assets/Common/IconeTableauDeBord.svg" alt=""> Tableau de bord</a>
        <a href="index.php?Role=3&Page=2" <?php if($ThisPage == 2) { echo 'aria-current="page"'; } ?>><img src="Public/assets/Participant/pdash_Participants2.svg" alt=""> Mon profil</a>
        <a href="index.php?Role=3&Page=3" <?php if($ThisPage == 3) { echo 'aria-current="page"'; } ?>><img src="Public/assets/Common/IconeExperimentations.svg" alt=""> Expérimentations disponibles</a>
        <a href="index.php?Role=3&Page=4" <?php if($ThisPage == 4) { echo 'aria-current="page"'; } ?>><img src="Public/assets/Participant/pdash_KpiInscriptionsAttente3.svg" alt=""> Mon historique</a>
        <a href="index.php?Role=3&Page=1#notifications"><img src="Public/assets/Participant/pdash_Trace3.svg" alt=""> Mes notifications</a>
      </nav>
      <div class="spacer"></div>
      <hr>
      <div class="help">Profil incomplet ? <b>Complétez-le</b> pour être éligible à davantage d'expérimentations.</div>
</aside>

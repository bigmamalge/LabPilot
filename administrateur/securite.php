<?php
  $espace = "Espace Administrateur";
  $prenom = "Anna";
  $nom = "Lise";
  $nom_complet = $prenom . " " . $nom;
  $initiales = "AL";
  $fonction = "Administrateur";
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sécurité et maintenance - LabPilot</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;900&amp;display=swap" rel="stylesheet">
  <link rel="stylesheet" href="styles.css">
  <link rel="stylesheet" href="pages.css">
  <link rel="stylesheet" href="administrateur.css">
</head>
<body>
  <input type="checkbox" id="theme-toggle" class="theme-check" aria-label="Mode sombre">
  <div class="layout">
    <aside class="sidebar">
      <a class="logo" href="index.php"><img src="../Public/assets/Common/Logo.png" alt="LabPilot"></a>
      <div class="role"><?php echo $espace; ?></div>
      <nav aria-label="Navigation principale">
        <a href="index.php"><img src="../Public/assets/Common/IconeTableauDeBord.svg" alt="" width="20" height="20"> Tableau de bord</a>
        <a href="utilisateurs.php"><img src="../Public/assets/Common/IconeParticipants.svg" alt="" width="20" height="20"> Gestion des utilisateurs</a>
        <a href="parametrage.php"><img src="../Public/assets/Common/IconeParametres.svg" alt="" width="20" height="20"> Paramétrage de l'application</a>
        <a href="securite.php" aria-current="page"><img src="../Public/assets/Administrateur/IconeSecurite.svg" alt="" width="20" height="20"> Sécurité et maintenance</a>
        <a href="modeles.php"><img src="../Public/assets/Common/IconeRessources.svg" alt="" width="20" height="20"> Gestion des modèles</a>
      </nav>
      <div class="spacer"></div>
      <hr>
      <div class="help">Avant une mise à jour, <b>sauvegardez la base</b> de données pour pouvoir revenir en arrière.</div>
    </aside>

    <div class="main">
      <header class="topbar">
        <label class="search">
          <img src="../Public/assets/Common/RechercheIco.svg" alt="">
          <input type="search" placeholder="Rechercher une expérimentation..." aria-label="Rechercher">
        </label>
        <div class="grow"></div>
        <label class="icon-btn" for="theme-toggle" aria-label="Basculer le thème jour/nuit"><img src="../Public/assets/Common/Trace.svg" alt=""></label>
        <button class="lang" type="button">FR - Français <img src="../Public/assets/Common/FlecheBas.svg" alt=""></button>
        <button class="icon-btn bell" type="button" aria-label="Notifications"><img src="../Public/assets/Common/Notifications.svg" alt=""></button>
        <div class="profile">
          <span class="avatar"><?php echo $initiales; ?></span>
          <span class="who"><b><?php echo $nom_complet; ?></b><span><?php echo $fonction; ?></span></span>
        </div>
      </header>

      <main class="content">
        <div class="page-head a-head">
          <div>
            <p class="eyebrow"><?php echo $espace; ?></p>
            <h1>Sécurité et maintenance</h1>
            <p class="lead">État technique et organisationnel de l'application Lab Pilot.</p>
          </div>
          <div class="actions"></div>
        </div>

        <section class="card pad">
          <h2 class="big sm">Journaux d'activité</h2>
          <p class="sub sm">Traçabilité de toutes les connexions à l'application (acteur, adresse IP, horaires, erreurs).</p>
          <table class="data plain r-table">
            <thead><tr><th>Acteur</th><th>Adresse IP</th><th>Date de connexion</th><th>Début de session</th><th>Fin de session</th><th>Erreurs</th></tr></thead>
            <tbody>
              <tr><td class="nm"><b>John Doeuf</b></td><td class="soft">10.12.4.21</td><td class="soft">28/09/2026</td><td class="soft">08h12</td><td class="soft">09h59</td><td>—</td></tr>
              <tr><td class="nm"><b>Lucas Tessier</b></td><td class="soft">92.145.3.88</td><td class="soft">28/09/2026</td><td class="soft">07h55</td><td class="soft">08h17</td><td>—</td></tr>
              <tr><td class="nm"><b>Isabelle Renard</b></td><td class="soft">10.12.4.40</td><td class="soft">28/09/2026</td><td class="soft">08h30</td><td class="soft">—</td><td>—</td></tr>
              <tr><td class="nm"><b>Inconnu</b></td><td class="soft">45.9.201.14</td><td class="soft">27/09/2026</td><td class="soft">23h41</td><td class="soft">—</td><td><span class="pill sm ko">Échec d'authentification (×5)</span></td></tr>
              <tr><td class="nm"><b>Sarah Guillou</b></td><td class="soft">78.192.4.5</td><td class="soft">20/07/2026</td><td class="soft">14h02</td><td class="soft">14h35</td><td>—</td></tr>
            </tbody>
          </table>
        </section>

        <div class="cols a-sec">
          <div class="stack">
            <section class="card pad">
              <h2 class="big sm">Sauvegarde de la base de données</h2>
              <div class="kv r-kv"><div><span>Dernière sauvegarde</span><b>28/09/2026 04h00</b></div><div><span>Fréquence</span><b>Quotidienne, automatique</b></div></div>
              <div class="btn-row left"><button class="btn-lg primary fit" type="button">Sauvegarder maintenant</button><button class="btn-lg fit" type="button">Restaurer une sauvegarde</button></div>
            </section>
            <section class="card pad">
              <h2 class="big sm">Maintenance</h2>
              <div class="kv r-kv"><div><span>Version de l'application</span><b>Lab Pilot 1.0</b></div><div><span>Dernière mise à jour</span><b>15/09/2026</b></div><div><span>Statut des services</span><span class="pill sm ok">Opérationnel</span></div></div>
            </section>
          </div>
          <section class="card pad fit">
            <h2 class="big sm">Conformité RGPD</h2>
            <form class="form small" onsubmit="return false">
              <div class="switch-row"><div><b>Anonymisation automatique à l'archivage</b><span>Appliquée à l'échelle de l'application, pour toutes les expérimentations</span></div><label class="switch"><input type="checkbox" checked aria-label="Anonymisation automatique"><i></i></label></div>
              <div class="switch-row"><div><b>Consentement éthique obligatoire</b><span>Requis pour toute inscription à une expérimentation</span></div><label class="switch"><input type="checkbox" checked aria-label="Consentement éthique obligatoire"><i></i></label></div>
              <label>Durée de conservation des données après archivage<span class="select"><select><option>1 an</option><option>2 ans</option><option>5 ans</option></select></span></label>
              <div class="save-row"><button class="btn-lg primary fit" type="submit">Enregistrer</button></div>
            </form>
          </section>
        </div>
        <div class="footer"><?php echo $espace; ?> - Le Mans Université</div>
      </main>
    </div>
  </div>
</body>
</html>

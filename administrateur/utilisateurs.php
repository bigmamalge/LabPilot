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
  <title>Gestion des utilisateurs - LabPilot</title>
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
        <a href="utilisateurs.php" aria-current="page"><img src="../Public/assets/Common/IconeParticipants.svg" alt="" width="20" height="20"> Gestion des utilisateurs</a>
        <a href="parametrage.php"><img src="../Public/assets/Common/IconeParametres.svg" alt="" width="20" height="20"> Paramétrage de l'application</a>
        <a href="securite.php"><img src="../Public/assets/Administrateur/IconeSecurite.svg" alt="" width="20" height="20"> Sécurité et maintenance</a>
        <a href="modeles.php"><img src="../Public/assets/Common/IconeRessources.svg" alt="" width="20" height="20"> Gestion des modèles</a>
      </nav>
      <div class="spacer"></div>
      <hr>
      <div class="help">Nouveau membre du laboratoire ? <b>Créez son compte</b> et attribuez-lui le rôle correspondant.</div>
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
            <h1>Gestion des utilisateurs</h1>
            <p class="lead">Créez, modifiez et supprimez les comptes, et gérez les rôles et permissions des utilisateurs.</p>
          </div>
          <div class="actions"></div>
        </div>

        <section class="card pad">
          <h2 class="big sm">Comptes utilisateurs</h2>
          <p class="sub sm">8 comptes</p>
          <table class="data plain r-table users">
            <thead><tr><th>Utilisateur</th><th>Rôle</th><th>Statut</th><th>Dernière connexion</th><th></th></tr></thead>
            <tbody>
              <tr><td><span class="who2"><span class="av">JD</span><span class="who-t"><b>John Doeuf</b><small>john.doeuf@univ-lemans.fr</small></span></span></td>
                <td><span class="tag sm">Enseignant-chercheur</span></td><td><span class="pill sm ok">Actif</span></td><td class="soft">Il y a 2 h</td><td><div class="row-actions"><button class="rnd" type="button" aria-label="Modifier John Doeuf"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#52577a" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M17 3a2.8 2.8 0 0 1 4 4L7.5 20.5 2 22l1.5-5.5z"/></svg></button><button class="rnd" type="button" aria-label="Supprimer John Doeuf"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#d13a3a" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M3 6h18M19 6l-1 14a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2L5 6M10 11v6M14 11v6M9 6V4a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v2"/></svg></button></div></td></tr>
              <tr><td><span class="who2"><span class="av">CV</span><span class="who-t"><b>Claire Vasseur</b><small>claire.vasseur@univ-lemans.fr</small></span></span></td>
                <td><span class="tag sm">Enseignant-chercheur</span></td><td><span class="pill sm ok">Actif</span></td><td class="soft">Hier</td><td><div class="row-actions"><button class="rnd" type="button" aria-label="Modifier Claire Vasseur"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#52577a" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M17 3a2.8 2.8 0 0 1 4 4L7.5 20.5 2 22l1.5-5.5z"/></svg></button><button class="rnd" type="button" aria-label="Supprimer Claire Vasseur"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#d13a3a" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M3 6h18M19 6l-1 14a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2L5 6M10 11v6M14 11v6M9 6V4a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v2"/></svg></button></div></td></tr>
              <tr><td><span class="who2"><span class="av">TL</span><span class="who-t"><b>Thomas Lefèvre</b><small>thomas.lefevre@univ-lemans.fr</small></span></span></td>
                <td><span class="tag sm">Gestionnaire</span></td><td><span class="pill sm ok">Actif</span></td><td class="soft">Il y a 4 h</td><td><div class="row-actions"><button class="rnd" type="button" aria-label="Modifier Thomas Lefèvre"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#52577a" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M17 3a2.8 2.8 0 0 1 4 4L7.5 20.5 2 22l1.5-5.5z"/></svg></button><button class="rnd" type="button" aria-label="Supprimer Thomas Lefèvre"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#d13a3a" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M3 6h18M19 6l-1 14a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2L5 6M10 11v6M14 11v6M9 6V4a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v2"/></svg></button></div></td></tr>
              <tr><td><span class="who2"><span class="av">IR</span><span class="who-t"><b>Isabelle Renard</b><small>isabelle.renard@univ-lemans.fr</small></span></span></td>
                <td><span class="tag sm">Responsable d'équipe</span></td><td><span class="pill sm ok">Actif</span></td><td class="soft">Il y a 3 h</td><td><div class="row-actions"><button class="rnd" type="button" aria-label="Modifier Isabelle Renard"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#52577a" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M17 3a2.8 2.8 0 0 1 4 4L7.5 20.5 2 22l1.5-5.5z"/></svg></button><button class="rnd" type="button" aria-label="Supprimer Isabelle Renard"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#d13a3a" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M3 6h18M19 6l-1 14a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2L5 6M10 11v6M14 11v6M9 6V4a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v2"/></svg></button></div></td></tr>
              <tr><td><span class="who2"><span class="av">MF</span><span class="who-t"><b>Marc Fontaine</b><small>marc.fontaine@univ-lemans.fr</small></span></span></td>
                <td><span class="tag sm">Directeur de laboratoire</span></td><td><span class="pill sm ok">Actif</span></td><td class="soft">Il y a 1 jour</td><td><div class="row-actions"><button class="rnd" type="button" aria-label="Modifier Marc Fontaine"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#52577a" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M17 3a2.8 2.8 0 0 1 4 4L7.5 20.5 2 22l1.5-5.5z"/></svg></button><button class="rnd" type="button" aria-label="Supprimer Marc Fontaine"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#d13a3a" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M3 6h18M19 6l-1 14a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2L5 6M10 11v6M14 11v6M9 6V4a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v2"/></svg></button></div></td></tr>
              <tr><td><span class="who2"><span class="av">LT</span><span class="who-t"><b>Lucas Tessier</b><small>lucas.tessier@etu.univ-lemans.fr</small></span></span></td>
                <td><span class="tag sm">Participant</span></td><td><span class="pill sm ok">Actif</span></td><td class="soft">Il y a 2 h</td><td><div class="row-actions"><button class="rnd" type="button" aria-label="Modifier Lucas Tessier"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#52577a" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M17 3a2.8 2.8 0 0 1 4 4L7.5 20.5 2 22l1.5-5.5z"/></svg></button><button class="rnd" type="button" aria-label="Supprimer Lucas Tessier"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#d13a3a" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M3 6h18M19 6l-1 14a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2L5 6M10 11v6M14 11v6M9 6V4a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v2"/></svg></button></div></td></tr>
              <tr><td><span class="who2"><span class="av">SG</span><span class="who-t"><b>Sarah Guillou</b><small>sarah.guillou@etu.univ-lemans.fr</small></span></span></td>
                <td><span class="tag sm">Participant</span></td><td><span class="pill sm ko">Suspendu</span></td><td class="soft">Il y a 2 mois</td><td><div class="row-actions"><button class="rnd" type="button" aria-label="Modifier Sarah Guillou"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#52577a" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M17 3a2.8 2.8 0 0 1 4 4L7.5 20.5 2 22l1.5-5.5z"/></svg></button><button class="rnd" type="button" aria-label="Supprimer Sarah Guillou"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#d13a3a" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M3 6h18M19 6l-1 14a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2L5 6M10 11v6M14 11v6M9 6V4a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v2"/></svg></button></div></td></tr>
              <tr><td><span class="who2"><span class="av">YC</span><span class="who-t"><b>Yanis Costa</b><small>yanis.costa@etu.univ-lemans.fr</small></span></span></td>
                <td><span class="tag sm">Administrateur</span></td><td><span class="pill sm ok">Actif</span></td><td class="soft">En ligne</td><td><div class="row-actions"><span class="you">Vous</span></div></td></tr>
            </tbody>
          </table>
        </section>

        <div class="cols a-users">
          <section class="card pad">
            <h2 class="big sm">Créer un compte</h2>
            <form class="form small tinted" onsubmit="return false">
              <label>Nom complet<span class="input"><input placeholder="Ex. Nadia Khelif"></span></label>
              <label>Adresse e-mail<span class="input"><input placeholder="prenom.nom@univ-lemans.fr"></span></label>
              <label>Rôle<span class="select"><select><option>Enseignant-chercheur</option><option>Gestionnaire</option><option>Participant</option><option>Responsable d'équipe</option><option>Directeur de laboratoire</option><option>Administrateur</option></select></span></label>
              <label>Laboratoire / Équipe<span class="input"><input placeholder="Ex. LIUM — IEIAH"></span></label>
              <button class="btn-lg primary" type="submit">Créer le compte</button>
            </form>
          </section>
          <section class="card pad fit">
            <h2 class="big sm">Rôles et permissions</h2>
            <div class="perms">
              <div class="perm"><span>Enseignant-chercheur</span><b>Crée et pilote ses expérimentations</b><button class="rnd" type="button" aria-label="Modifier Enseignant-chercheur"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#52577a" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M17 3a2.8 2.8 0 0 1 4 4L7.5 20.5 2 22l1.5-5.5z"/></svg></button></div>
              <div class="perm"><span>Gestionnaire</span><b>Gère les ressources du laboratoire</b><button class="rnd" type="button" aria-label="Modifier Gestionnaire"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#52577a" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M17 3a2.8 2.8 0 0 1 4 4L7.5 20.5 2 22l1.5-5.5z"/></svg></button></div>
              <div class="perm"><span>Participant</span><b>S'inscrit aux expérimentations</b><button class="rnd" type="button" aria-label="Modifier Participant"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#52577a" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M17 3a2.8 2.8 0 0 1 4 4L7.5 20.5 2 22l1.5-5.5z"/></svg></button></div>
              <div class="perm"><span>Responsable d'équipe</span><b>Supervise les études de son équipe</b><button class="rnd" type="button" aria-label="Modifier Responsable d'équipe"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#52577a" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M17 3a2.8 2.8 0 0 1 4 4L7.5 20.5 2 22l1.5-5.5z"/></svg></button></div>
              <div class="perm"><span>Directeur de laboratoire</span><b>Supervise le laboratoire</b><button class="rnd" type="button" aria-label="Modifier Directeur de laboratoire"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#52577a" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M17 3a2.8 2.8 0 0 1 4 4L7.5 20.5 2 22l1.5-5.5z"/></svg></button></div>
              <div class="perm"><span>Administrateur</span><b>Gère l'application et les comptes</b><button class="rnd" type="button" aria-label="Modifier Administrateur"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#52577a" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M17 3a2.8 2.8 0 0 1 4 4L7.5 20.5 2 22l1.5-5.5z"/></svg></button></div>
            </div>
          </section>
        </div>
        <div class="footer"><?php echo $espace; ?> - Le Mans Université</div>
      </main>
    </div>
  </div>
</body>
</html>

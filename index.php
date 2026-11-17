<?php
$espace = "Connexion";
$titre = "Ravi de vous revoir";
$sous_titre = "Connectez-vous à votre espace LAB PILOT.";
$email = htmlspecialchars(trim($_POST["email"] ?? ""), ENT_QUOTES, "UTF-8");
?>
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Connexion - LabPilot</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&amp;display=swap" rel="stylesheet">
  <link rel="stylesheet" href="Public/css/connexion.css">
</head>

<body>
  <div class="login">
    <aside class="brand">
      <a class="logo" href="index.php"><img src="Public/assets/Common/Logo.png" alt="LabPilot"></a>
      <div class="role"><?php echo $espace; ?></div>
    </aside>

    <div class="zone">
      <div class="bar">
        <p>Portail de connexion sécurisé</p>
        <a class="support" href="#"><img src="Public/assets/Connexion/circle-help.svg" alt="" width="22.667"
            height="22.667"> Besoin d'aide ?</a>
      </div>

      <main class="card">
        <div class="heading">
          <h1><?php echo $titre; ?></h1>
          <p><?php echo $sous_titre; ?></p>
        </div>

        <form class="credentials" method="post" action="">
          <div class="field">
            <label for="email">Adresse e-mail</label>
            <div class="input">
              <img src="Public/assets/Connexion/mail.svg" alt="" width="25.333" height="25.333">
              <input type="email" id="email" name="email" value="<?php echo $email; ?>"
                placeholder="prenom.nom@univ-lemans.fr" autocomplete="username" required>
            </div>
          </div>

          <div class="field">
            <label for="password">Mot de passe</label>
            <div class="input">
              <img src="Public/assets/Connexion/lock-keyhole.svg" alt="" width="25.333" height="25.333">
              <input type="password" id="password" name="password" placeholder="••••••••••••"
                autocomplete="current-password" required>
              <button class="toggle" type="button" id="toggle-password" aria-label="Afficher le mot de passe"><img
                  src="Public/assets/Connexion/eye.svg" alt="" width="25.333" height="25.333"></button>
            </div>
          </div>

          <div class="options">
            <label class="remember">
              <input type="checkbox" name="remember" checked>
              <span class="box"><img src="Public/assets/Connexion/check.svg" alt="" width="16" height="16"></span>
              <span>Rester connecté</span>
            </label>
            <a class="forgot" href="#">Mot de passe oublié ?</a>
          </div>

          <button class="btn primary" type="submit"><img src="Public/assets/Connexion/log-in.svg" alt="" width="26.667"
              height="26.667"> Se connecter</button>
        </form>

        <div class="divider"><span>OU CONTINUER AVEC</span></div>

        <div class="alt">
          <a class="btn" href="#"><span class="g-mark"><img src="Public/assets/Connexion/google.png" alt=""></span>
            Continuer avec Google</a>
          <a class="btn sso" href="sso.php"><img src="Public/assets/Connexion/logo-lemans.svg" alt="" width="32"
              height="39"> Se connecter via Le Mans Université</a>
        </div>

        <div class="note">
          <img src="Public/assets/Connexion/shield-check.svg" alt="" width="25.333" height="25.333">
          <p>Connexion sécurisée. Vos identifiants universitaires ne sont jamais enregistrés par LAB PILOT.</p>
        </div>
      </main>

      <nav class="legal" aria-label="Liens légaux">
        <a href="#">Confidentialité</a>
        <a href="#">Accessibilité</a>
        <a href="#">Mentions légales</a>
      </nav>
    </div>
  </div>

  <script>
    var champ = document.getElementById("password");
    var bouton = document.getElementById("toggle-password");
    bouton.addEventListener("click", function () {
      var visible = champ.type === "text";
      champ.type = visible ? "password" : "text";
      bouton.setAttribute("aria-label", visible ? "Afficher le mot de passe" : "Masquer le mot de passe");
    });
  </script>
</body>

</html>
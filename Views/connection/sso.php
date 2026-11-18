<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Connexion SSO - LabPilot</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&amp;display=swap" rel="stylesheet">
  <link rel="stylesheet" href="Public/css/sso.css">
</head>

<body>
  <div class="sso">
    <main class="formulaire">
      <div class="bloc">
        <a class="logo" href="connection.php"><img src="Public/assets/Connexion/sso_logo.svg"
            alt="Le Mans Université"></a>

        <form method="post" action="index.php?Controlleur=connectionController">
          <div class="champ actif">
            <label for="identifiantsso">Identifiant: *</label>
            <input type="text" id="identifiantsso" name="identifiantsso" placeholder="i2500000" autocomplete="username"
              required>
          </div>

          <div class="champ">
            <input type="password" id="password" name="password" placeholder="********" aria-label="Mot de passe"
              autocomplete="current-password" required>
            <button class="oeil" type="button" id="toggle-password" aria-label="Afficher le mot de passe"><img
                src="Public/assets/Connexion/sso_eye.svg" alt=""></button>
          </div>

          <label class="souvenir">
            <input type="checkbox" name="remember">
            <span class="interrupteur"><span class="pouce"><img src="Public/assets/Connexion/sso_minus.svg"
                  alt=""></span></span>
            <span>Se souvenir de moi</span>
          </label>

          <button class="bouton" type="submit">Se connecter</button>
        </form>

        <a class="premiere" href="#">1ère connexion</a>
        <a class="oubli" href="#">Mot de passe oublié ?</a>
        <p class="securite">Pour des raisons de sécurité, veuillez vous <a href="#">déconnecter</a> et fermer votre
          navigateur Web une fois que vous avez fini d'utiliser les services nécessitant une authentification !</p>
      </div>
    </main>

    <div class="photo"><img src="Public/assets/Connexion/sso_campus.jpg" alt=""></div>
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
<!DOCTYPE html>
<!-- PAGE D'ACCEUIL FR -->
<html lang="fr">
<?php include('./../config/header.php'); ?>


<body class="m-1 position-relative  ">
  <style>
    html,
    body {
      width: 99% !important;
      height: 99%;
    }

    body {
      background: linear-gradient(-45deg, #ee7752, #e73c7e, #23a6d5, #23d5ab);
      background-size: 400% 400%;
      animation: gradient 15s ease infinite;
    }

    @keyframes gradient {
      0% {
        background-position: 0% 50%;
      }

      50% {
        background-position: 100% 50%;
      }

      100% {
        background-position: 0% 50%;
      }
    }
  </style>
  <!-- TETE DE PAGE -->
  <header><?php
          include './../config/barre_nav.php'
          ?>
  </header>

  <main class="d-flex flex-nowrap">
    <div id="box1">
      <div id="form1" class="d-flex flex-wrap justify-content-center ">
        <style>

        </style>

        <div class=" f-100 active rounded text-center mt-3  " id="login">
          <h1 class=" border rounded d-inline text-bg-dark  p-1 ">LOGIN</h1>
        </div>

        <form action="connexion.php" method="post" class="" id="form_login">

          <?php
          if (isset($_GET['login_err'])) {
            $err = htmlspecialchars($_GET['login_err']);
            switch ($err) {
              case 'password':
          ?>
                <div class="alert alert-danger" role="alert">
                  <strong>Erreur</strong> mot de passe incorrect
                </div>
              <?php
                break;
              case 'email':
              ?>

                <div class="alert alert-danger" role="alert">
                  <strong>Erreur</strong> email incorrect
                </div>
              <?php
                break;
              case 'already':
              ?>

                <div class="alert alert-danger" role="alert">
                  <strong>Erreur</strong> compte introuvable
                </div>
          <?php
                break;
            }
          }
          ?>
          <div class="m-1 d-block ">
            <label class=" border rounded d-inline  text-uppercase text-bg-dark  p-1 m-1 mb-1  ">Username/email</label>
            <input name="email" class=" d-block mt-2  text-bg-dark  rounded border p-1 m-1 bg-gradient" type="text">
          </div>
          <div class="m-1 mt-3">
            <label name="Password" class=" border rounded d-inline  text-uppercase text-bg-dark  p-1 m-1 ">Password</label>
            <input name="password" class="d-block mt-2  text-bg-dark  rounded border p-1 m-1 bg-gradient" type="password">
          </div>
          <a href="register.php" class="text-center d-inline d-block text-white mt-3
          ">I haven't an account</a>
          <a href="register.php" class="text-center d-inline d-block text-white ">I lost my password</a>
          <div class="text-center mt-3  "><input type="submit" name="envoyer" value="Je m'inscris" class="rounded text-bg-dark"></div>
        </form>
      </div>
    </div>
  </main>

  <!-- PARTIE Principale  -->


</body>

</html>
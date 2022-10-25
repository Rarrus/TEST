<?php
require_once './../config/config.php';
if (isset($_SESSION['user'])) {
  header('Location: ./../home.php'); die();}
?>
<!DOCTYPE html>
<!-- PAGE D'ACCEUIL FR -->
<html lang="fr">

<head>
  <meta charset="utf-8">
  <title>TAPY</title>
  <link href="./../../css/style.css" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="./../../js/screen.js"></script>
</head>


<body class="m-1 bg-dark ">
  <!-- TETE DE PAGE -->
  <header>
    <nav class="navbar navbar-expand-lg justify-content-around">
      <!-- LOGO + TITRE -->

      <a class="btn active text-white bg-gradient " id="HAUT" href="./../home.php">TAPY</a>
      <button class="navbar-toggler" data-bs-target="#navbarSupportedContent" data-bs-toggle="collapse" type="button" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <!-- BARRE DE NAVIGATION -->

      <div class="collapse navbar-collapse flex-grow-0 flex-wrap " id="navbarSupportedContent">
        <ul class="navbar-nav f-100 justify-content-between  ">
          <li class="nav-item flex-grow-1 m-1 ">
            <a class="btn nav-link active text-center  text-white bg-gradient nav_style" href="./../home.php" aria-current="page">HOME</a>
          </li>
          <li class="nav-item dropdown flex-grow-1 m-1  ">
            <a class="nav-link  btn dropdown-toggle active text-center  text-white bg-gradient nav_style " data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">
              TOOLS
            </a>
            <ul class="dropdown-menu text-center" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="./tools/timer.php" style="font-weight: bold">TIMER</a></li>
              <li><a class="dropdown-item  " href="./tools/simulateurs_stamina.php" style="font-weight: bold">Simulateur Stamina</a></li>
              <li><a class="dropdown-item  " href="./tools/simulateurs_combat.php" style="font-weight: bold">Simulateur Combat</a></li>
              <li><a class="dropdown-item  " href="./tools/suivi_price.php" style="font-weight: bold">Suivi price</a></li>


            </ul>
          </li>

          <li class="nav-item flex-grow-1 m-1  ">
            <a class="nav-link btn active text-center  text-white bg-gradient nav_style " href="#" aria-current="page">FORUMS</a>
          </li>


          <li class="nav-item flex-grow-1 dropdown  m-1  ">
            <a class="nav-link btn dropdown-toggle active text-center  text-white bg-gradient nav_style " data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">
              TURORIEL
            </a>
            <ul class="dropdown-menu text-center nav_style_display">
              <li><a class="dropdown-item" href="#" style="font-weight: bold">Video</a></li>
              <li><a class="dropdown-item " href="#">Article</a></li>
            </ul>
          </li>

        </ul>
        <form class="  search f-100 " role="search" id="search">
          <input class="form-control " id="barre_search" type="search" aria-label="Search" placeholder="Search">
        </form>


      </div>

      <?php if (isset($_SESSION['user'])) {

        // On récupere les données de l'utilisateur
        $req = $bdd->prepare('SELECT * FROM utilisateurs WHERE token = ?');
        $req->execute(array($_SESSION['user']));
        $data = $req->fetch();
      ?>
        <form action="./connect/deconnexion.php" method="post" class=" start-50  ">
          <div class="top-0 start-100 text-center position-absolute translate-100"> <input type="submit" name="envoyer" value="deconnexion" class="rounded text-white bg-gradient mt-3"></div>
        </form>
        <?php if ($_SESSION['ADMIN'] = 1) { ?>
          <div class=" position-absolute top-0 start-100 text-center translate-100 w-25" id="BIG_screen_register">
            <a class="btn active rounded m-2 text-white bg-gradient text-uppercase big_screen_login" id=" " href="./admin/panel_admin.php">Panel_Admin</a>
          </div> <?php }
              } else { ?>



      <?php } ?>
      <!-- LOGIN/REGISTER -->







    </nav>


  </header>

  <main>
    <div id="box1">
      <div id="form1" class="d-flex flex-wrap justify-content-center ">
        <style>

        </style>

        <div class=" active rounded  m-3  ">
          <h1 class=" border rounded d-inline text-bg-dark  p-1 mt-3">LOGIN</h1>
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
              case 'notconfirmed':
              ?>
                <div class="alert alert-danger" role="alert">
                  <strong>Erreur</strong> Veuillez confirmer le compte
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
          <?php

          if (isset($_GET['pseudo'], $_GET['token'])) {
            $pseudo = htmlspecialchars(urldecode($_GET['pseudo']));
            $token = htmlspecialchars($_GET['token']);
            $requser = $bdd->prepare("SELECT * FROM utilisateurs WHERE pseudo = ? AND token = ?");
            $requser->execute(array($pseudo, $token));
            $userexist = $requser->rowCount();
            $user = $requser->fetch();
            if ($user['confirm'] == 0) {
              $updateuser = $bdd->prepare("UPDATE utilisateurs SET confirm = 1 WHERE pseudo = ? AND token = ?");
              $updateuser->execute(array($pseudo, $token)); ?>
              <div class="alert alert-success" role="alert">
                <strong>Succes</strong> compte confirmé
              </div> <?php
                    } else { ?>
              <div class="alert alert-danger" role="alert">
                <strong>Erreur</strong> compte deja confirmé
              </div>
          <?php }
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
          <a href="change_password.php" class="text-center d-inline d-block text-white ">I lost my password</a>
          <div class="text-center mt-3  "><input type="submit" name="envoyer" value="Je m'inscris" class="rounded text-bg-dark"></div>
        </form>
      </div>
    </div>
  </main>

  <!-- PARTIE Principale  -->


</body>

</html>
<?php if (isset($_SESSION['user'])) {
  header('Location: ./../home.php');
  die();
}
?>

<!DOCTYPE html>
<!-- PAGE D'ACCEUIL FR -->
<html lang="fr">


<?php include('./../config/header.php'); ?>

<body class="m-1 bg-dark">

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
    <div class="">

      <div class=" text-center active rounded m-3 ">
        <h1 class=" border rounded d-inline text-bg-dark p-1 mt-3 " id="login">REGISTER</h1>
      </div>
      <?php
      if (isset($_GET['reg_err'])) {
        $err = htmlspecialchars($_GET['reg_err']);
        switch ($err) {
          case 'success':
      ?>
            <div class=" text-centeralert alert-success">
              <strong>Succès</strong> Compte crée
            </div>
          <?php
            break;
          case 'password':
          ?>

            <div class=" text-centeralert alert-danger">
              <strong>Erreur</strong> mot de pass incorrect
            </div>
          <?php
            break;
          case 'email':
          ?>
            <div class=" text-centeralert alert-danger">
              <strong>Erreur</strong> email non valide
            </div>
          <?php
            break;
          case 'email_length':
          ?>

            <div class=" text-centeralert alert-danger">
              <strong>Erreur</strong> email trop long
            </div>
          <?php
            break;
          case 'pseudo_length':
          ?>
            <div class=" text-centeralert alert-danger">
              <strong>Erreur</strong> pseudo trop long
            </div>
          <?php
          case 'already':
          ?>


            <div class=" text-centeralert alert-danger">
              <strong>Erreur</strong> compte deja existant
            </div>
      <?php

        }
      }
      ?>
      <form action="inscription_traitement.php" method="post" class=" text-center   ">

        <div class=" text-center m-1 mt-2 ">
          <label class=" text-center border rounded d-inline  text-uppercase  text-bg-dark p-1 mt-2 mb-1   ">Username</label>
          <div></div>
          <input name="pseudo" class=" text-center d-inline mt-2   text-bg-dark rounded border p-1 m-1 bg-gradient" required type="text">
        </div>
        <div class=" text-center ">
          <label name="email" class="text-center border rounded d-inline  text-uppercase  text-bg-dark p-1 m-1  ">Email</label>
          <div></div>
          <input name="email" id="M1" class=" text-center  mt-2   text-bg-dark rounded border p-1 m-1 bg-gradient" required type="email" onkeyup="check_mail()">
        </div>


        <div class=" text-center m-1 mt-3 ">
          <label class=" text-center border rounded d-inline  text-uppercase  text-bg-dark p-1 m-1 ">Password</label>
          <div></div>
          <input name="password" id="P1" class=" text-center mt-2   text-bg-dark rounded border p-1 m-1 bg-gradient " required type="password" onkeyup="check_mdp()">
          <i class="far fa-eye invert" style="margin-left: -30px; cursor: pointer;" id="togglePassword" onclick="reveal()"></i>
    </div>
    </div>
    <div class=" text-center m-1 mt-3 d-block">
      <label class=" text-center border rounded d-inline text-uppercase  text-bg-dark p-1 m-1 ">re-enter password</label>
      <div></div>
      <input name="password_retype" id="P2" class=" text-center  mt-2   text-bg-dark rounded border p-1 m-1 bg-gradient " required type="password" onkeyup="check_mdp()">
      <i class="far fa-eye invert" style="margin-left: -30px; cursor: pointer;" id="togglePassword" onclick="reveal()"></i>
      <span id="msg"></span>

      <p class=" text-success">Mot de passe ayant minimun : </p>
      <p class=" text-success">8 caractères</p>
      <p class=" text-success">1 lettre majuscule</p>
      <p class=" text-success">1 lettre miniscule</p>
      <p class=" text-success">1 chiffre</p>
    </div>
    <a href="register.php" class=" text-center d-inline d-block text-white mt-1
          ">I have an account</a>
    <div class=" text-center mt-3  " id="div_login"><button onclick="validate()" name="envoyer" value="Je m'inscris" class=" rounded text-centerr text-bg-dark" id="B1">Je m'inscris</button></div>


    </form>

    </div>
  </main>

  <!-- PARTIE Principale  -->


</body>

</html>
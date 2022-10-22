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
  <header>
    <nav class="navbar navbar-expand-lg rounded d-flex flex-lg-column justify-content-around  ">
      <!-- LOGO + TITRE -->
      <a class="navbar-brand  text-center rounded top-0 start-0 mb-1 btn active m-2 text-bg-dark  " id="HAUT" href="../test.php"><img class="img-fluid" src="./../../img/logo-site.png" alt="logo du site" style="width: 20%;">TAPY</a>
      <button class="navbar-toggler" data-bs-target="#navbarSupportedContent" data-bs-toggle="collapse" type="button" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <!-- BARRE DE NAVIGATION -->

      <div class="collapse navbar-collapse   " id="navbarSupportedContent">
        <!-- LIEN ENTRE LES PAGES -->
        <ul class="navbar-nav mb-2 mb-lg-0  rounded collapse border" id="barre_nav">
          <li class="nav-item rounded m-2 text-bg-dark ">
            <a class="btn nav-link active text-center text-bg-dark" href="../test.php" aria-current="page">HOME</a>
          </li>
          <li class="nav-item dropdown rounded m-2  ">
            <a class="nav-link  btn dropdown-toggle active text-center text-bg-dark" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">
              TOOLS
            </a>
            <ul class="dropdown-menu text-center ">
              <li><a class="dropdown-item text-bg-dark bg-gradient " href="#" style="font-weight: bold">TIMER</a></li>
              <li><a class="dropdown-item text-bg-dark bg-gradient " href="#">Another action</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item text-bg-dark " href="#">Something else here</a></li>
            </ul>
          </li>

        </ul>
        <ul class="navbar-nav mb-2 mb-lg-0  rounded collapse border ms-1 " id="barre_nav">
          <li class="nav-item  rounded m-2 text-bg-dark ">
            <a class="nav-link btn active text-center text-bg-dark" href="#" aria-current="page">FORUMS</a>
          </li>


          <li class="nav-item dropdown  rounded m-2 text-bg-dark ">
            <a class="nav-link btn dropdown-toggle active text-center text-bg-dark" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">
              TURORIEL
            </a>
            <ul class="dropdown-menu text-center">
              <li><a class="dropdown-item" href="#" style="font-weight: bold">Video</a></li>
              <li><a class="dropdown-item fg" href="#">Article</a></li>
            </ul>
          </li>

        </ul>
        <!-- RECHERCHE -->
        <form class="top-0 start-50" id="search" role="search">
          <input class="form-control m-2"  type="search" aria-label="Search" placeholder="Search">
        </form>
      </div>
      <!-- LOGIN/REGISTER -->
      <div class="d-lg-flex flex-nowrap align-content-center justify-content-center top-0 start-100 text-center" id="REGISTER">
        <a class="btn active rounded m-2 text-bg-dark  text-uppercase " href="login.php">Login</a>
        <a class="btn active rounded m-2 text-bg-dark  text-uppercase" href="register.php">Register</a>
      </div>


    </nav>

  </header>

  <main class="d-flex flex-nowrap">
    <div id="box1">
      <div id="form1" class="d-flex flex-wrap justify-content-center ">
        <style>
         
        </style>

        <div class=" f-100 active rounded text-center mt-3  "  id="login">
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
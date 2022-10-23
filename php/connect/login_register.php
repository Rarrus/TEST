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
    <nav class="navbar navbar-expand-lg rounded d-flex flex-lg-column   ">
      <!-- LOGO + TITRE -->
      <a class="d-inline  text-center rounded top-0 start-0 mb-1 btn active m-2 text-bg-dark fs-1  " style="" id="HAUT" href="../test.php">TAPY</a>
      <button class="navbar-toggler" data-bs-target="#navbarSupportedContent" data-bs-toggle="collapse" type="button" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <!-- BARRE DE NAVIGATION -->

      <div class="collapse navbar-collapse mb-1 w-25" id="navbarSupportedContent">
        <!-- LIEN ENTRE LES PAGES -->
        <ul class="navbar-nav mb-lg-2 bg-black d-lg-flex w-100 bg-gradient  justify-content-between flex-nowrap border border-white" id="barre_nav">
          <li class="nav-item rounded m-2 text-bg-dark ">

            <a class="btn nav-link active text-center text-bg-dark nav_style" href="../test.php" aria-current="page">HOME</a>

          </li>
          <li class="nav-item dropdown rounded m-2  ">
            <a class="nav-link  btn dropdown-toggle active text-center text-bg-dark nav_style" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">
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

          <li class="nav-item  rounded m-2 text-bg-dark ">
            <a class="nav-link btn active text-center text-bg-dark nav_style" href="#" aria-current="page">FORUMS</a>
          </li>


          <li class="nav-item dropdown  rounded m-2 text-bg-dark ">
            <a class="nav-link btn dropdown-toggle active text-center text-bg-dark nav_style" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">
              TURORIEL
            </a>
            <ul class="dropdown-menu text-center">
              <li><a class="dropdown-item" href="#" style="font-weight: bold">Video</a></li>
              <li><a class="dropdown-item fg" href="#">Article</a></li>
            </ul>
          </li>

        </ul>
        <!-- RECHERCHE -->
      </div>

      <form class="  search   " role="search" id="search">
        <div id="search2">
          <img src="./../../img/search.svg" alt="" class="invert text-center style_search">
          <input class="form-control m-2 w-25 " id="barre_search" type="search" aria-label="Search" placeholder="Search">
        </div>
        <input class="form-control m-2 w-25" id="barre_search2" type="search" aria-label="Search" placeholder="Search">
      </form>
      <!-- LOGIN/REGISTER -->


    </nav>

  </header>

  <main class="d-flex flex-nowrap mt-5">
    <div id="box1">
      <div id="form1" class="d-flex flex-wrap justify-content-center ">
        <style>

        </style>

        <div class="   active rounded text-center m-3 f-100  ">
          <h1 class=" border rounded d-inline text-bg-dark  mt-3 p-1 ">LOGIN</h1>
        </div>
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

        <form action="connexion.php" method="post" class="" class="star-50">


          <div class="m-1 mt-2">
            <label class=" border rounded d-inline  text-uppercase text-bg-dark  p-1 m-1 mb-1  ">Username/email</label>
            <input name="email" class=" d-block mt-2  text-bg-dark  rounded border p-1 m-1 bg-gradient" type="text">
          </div>
          <div class="m-1 mt-3">
            <label name="Password" class=" border rounded d-inline  text-uppercase text-bg-dark  p-1 m-1 ">Password</label>
            <input name="password" class="d-block mt-2  text-bg-dark  rounded border p-1 m-1 bg-gradient" type="password">
          </div>
          <a href="register.php" class="text-center d-inline d-block text-white ">I lost my password</a>
          <div class="text-center mt-3  "><input type="submit" name="envoyer" value="Je m'inscris" class="rounded text-bg-dark"></div>
        </form>
      </div>
    </div>
    <div id="box2">
      <div id="form2" class="d-flex flex-wrap justify-content-center ">


        <div class=" text-center active rounded m-3 ">
          <h1 class=" border rounded d-inline text-bg-dark p-1 mt-3 " id="login">REGISTER</h1>
        </div>
        <?php
        if (isset($_GET['reg_err'])) {
          $err = htmlspecialchars($_GET['reg_err']);
          switch ($err) {
            case 'success':
        ?>
              <div class="alert alert-success">
                <strong>Succès</strong> Compte crée
              </div>
            <?php
              break;
            case 'password':
            ?>

              <div class="alert alert-danger">
                <strong>Erreur</strong> mot de pass incorrect
              </div>
            <?php
              break;
            case 'email':
            ?>
              <div class="alert alert-danger">
                <strong>Erreur</strong> email non valide
              </div>
            <?php
              break;
            case 'email_length':
            ?>

              <div class="alert alert-danger">
                <strong>Erreur</strong> email trop long
              </div>
            <?php
              break;
            case 'pseudo_length':
            ?>
              <div class="alert alert-danger">
                <strong>Erreur</strong> pseudo trop long
              </div>
            <?php
            case 'already':
            ?>


              <div class="alert alert-danger">
                <strong>Erreur</strong> compte deja existant
              </div>
        <?php

          }
        }
        ?>
        <form action="inscription_traitement.php" method="post" class=" start-50  ">

          <div class="m-1 mt-2 ">
            <label class=" border rounded d-inline  text-uppercase  text-bg-dark p-1 m-1 mb-1  ">Username</label>
            <input name="pseudo" class=" d-block mt-2   text-bg-dark rounded border p-1 m-1 bg-gradient" style="background-color: var(--bs-indigo)" type="text">
          </div>
          <div class="m-1 mt-3">
            <label name="email" class=" border rounded d-inline  text-uppercase  text-bg-dark p-1 m-1  ">Email</label>
            <input name="email" class=" d-block mt-2   text-bg-dark rounded border p-1 m-1 bg-gradient" style="background-color: var(--bs-indigo)" type="email">
          </div>
          <div class="m-1 mt-3">
            <label class=" border rounded d-inline  text-uppercase  text-bg-dark p-1 m-1 ">Password</label>
            <input name="password" class="d-block mt-2   text-bg-dark rounded border p-1 m-1 bg-gradient " style="background-color: var(--bs-indigo)" type="password">
          </div>
          <div class=" m-1 mt-3">
            <label class=" border rounded d-inline  text-uppercase  text-bg-dark p-1 m-1 ">re-enter password</label>
            <input name="password_retype" class="d-block mt-2   text-bg-dark rounded border p-1 m-1 bg-gradient " style="background-color: var(--bs-indigo)" type="password">
          </div>
          <div class="text-center  "><input type="submit" name="envoyer" value="Je m'inscris" class="rounded text-bg-dark mt-3"></div>
        </form>
      </div>
    </div>
  </main>

  <!-- PARTIE Principale  -->


</body>

</html>
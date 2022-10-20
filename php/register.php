<!DOCTYPE html>
<!-- PAGE D'ACCEUIL FR -->
<html lang="fr">

<head>
<?php include('header.php'); ?>
</head>

<body class="m-1 position-relative  " style="background-color: var(--bs-indigo)">
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
    <nav class="navbar navbar-expand-lg  rounded d-flex flex-lg-column justify-content-around  " s>
      <!-- LOGO + TITRE -->
      <a class="navbar-brand  text-center rounded top-0 start-0 mb-1 btn active m-2  text-bg-dark " id="HAUT" href="test.php"><img class="img-fluid" src="./../img/logo-site.png" alt="logo du site" style="width: 20%;">TAPY</a>
      <button class="navbar-toggler" data-bs-target="#navbarSupportedContent" data-bs-toggle="collapse" type="button" aia-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <!-- BARRE DE NAVIGATION -->

      <div class="collapse navbar-collapse   " id="navbarSupportedContent">
        <!-- LIEN ENTRE LES PAGES -->
        <ul class="navbar-nav mb-2 mb-lg-0  rounded collapse border me-1" id="barre_nav">
          <li class="nav-item rounded m-2 ">

            <a class="btn nav-link active text-center text-bg-dark " href="test.php" aria-current="page">HOME</a>
          </li>
          <li class="nav-item dropdown rounded m-2 ">
            <a class="nav-link  btn dropdown-toggle active text-center text-bg-dark" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">
              TOOLS
            </a>
            <ul class="dropdown-menu text-center" style="background-color: var(--bs-purple);background-image: var(--bs-gradient);">
              <li><a class="dropdown-item " href="#" style="font-weight: bold">TIMER</a></li>
              <li><a class="dropdown-item " href="#">Another action</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item " href="#">Something else here</a></li>
            </ul>
          </li>

        </ul>
        <ul class="navbar-nav mb-2 mb-lg-0  rounded collapse border   " id="barre_nav">
          <li class="nav-item  rounded m-2 ">
            <a class="nav-link btn active text-center text-bg-dark" href="#" aria-current="page">FORUMS</a>
          </li>


          <li class="nav-item dropdown  rounded m-2 ">
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
        <form class="top-0 start-5" role="search">
          <input class="form-control m-2" type="search" aria-label="Search" placeholder="Search">
        </form>
      </div>
      <!-- LOGIN/REGISTER -->
      <div class="d-lg-flex flex-nowrap align-content-center justify-content-center top-0 start-100 text-center" id="REGISTER">
        <a class="btn active rounded m-2  text-bg-dark text-uppercase " href="login.php">Login</a>
        <a class="btn active rounded m-2  text-bg-dark text-uppercase" href="register.php">Register</a>
      </div>


    </nav>

  </header>

  <main>
    <div class=" text-center active rounded m-3 ">
      <h1 class=" border rounded d-inline text-bg-dark p-1 " id="login">REGISTER</h1>
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
        <label  class=" border rounded d-inline  text-uppercase  text-bg-dark p-1 m-1 mb-1  ">Username</label>
        <input name="pseudo" class=" d-block mt-2   text-bg-dark rounded border p-1 m-1 bg-gradient" style="background-color: var(--bs-indigo)" type="text">
      </div>
      <div class="m-1 mt-2">
        <label name="email" class=" border rounded d-inline  text-uppercase  text-bg-dark p-1 m-1  ">Email</label>
        <input name="email" class=" d-block mt-2   text-bg-dark rounded border p-1 m-1 bg-gradient" style="background-color: var(--bs-indigo)" type="email">
      </div>
      <div class="m-1 mt-2">
        <label  class=" border rounded d-inline  text-uppercase  text-bg-dark p-1 m-1 ">Password</label>
        <input name="password" class="d-block mt-2   text-bg-dark rounded border p-1 m-1 bg-gradient " style="background-color: var(--bs-indigo)" type="password">
      </div>
      <div class=" m-1 mt-2">
        <label  class=" border rounded d-inline  text-uppercase  text-bg-dark p-1 m-1 ">re-enter password</label>
        <input  name="password_retype" class="d-block mt-2   text-bg-dark rounded border p-1 m-1 bg-gradient " style="background-color: var(--bs-indigo)" type="password">
      </div>
      <a href="login.php" class="text-center d-inline d-block text-black ">I have an account</a>
      <div class="text-center  "><input type="submit" name="envoyer" value="Je m'inscris" style="background-color: var(--bs-indigo)" class="rounded text-bg-dark"></div>
    </form>

  </main>

  <!-- PARTIE Principale  -->


</body>

</html>
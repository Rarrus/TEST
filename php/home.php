<?php
session_start();
require_once './config/config.php'; // ajout connexion bdd 
// si la session existe pas soit si l'on est pas connecté on redirige



?>

<!DOCTYPE html>
<!-- PAGE D'ACCEUIL FR -->
<html lang="fr">

<head>
  <meta charset="utf-8">
  <title>TAPY</title>
  <link href="./../css/style.css" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="./../js/screen.js"></script>

</head>



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

  <div class=" ">
    <!-- TETE DE PAGE -->
    <header>
      <nav class="navbar navbar-expand-lg  rounded d-flex flex-lg-column justify-content-around  ">
        <!-- LOGO + TITRE -->

        <a class="d-inline  text-center rounded top-0 start-0 mb-1 btn active m-2 text-bg-dark fs-1  " style="" id="HAUT" href="home.php">TAPY</a>
        <button class="navbar-toggler" data-bs-target="#navbarSupportedContent" data-bs-toggle="collapse" type="button" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <!-- BARRE DE NAVIGATION -->

        <div class="collapse navbar-collapse mb-1 w-25" id="navbarSupportedContent">
          <ul class="navbar-nav mb-lg-2 d-lg-flex w-100 justify-content-between rounded flex-nowrap">
            <li class="nav-item rounded m-2 text-bg-dark ">
              <a class="btn nav-link active text-center  text-bg-dark nav_style" href="home.php" aria-current="page">HOME</a>
            </li>
            <li class="nav-item dropdown rounded m-2 text-bg-dark ">
              <a class="nav-link  btn dropdown-toggle active text-center  text-bg-dark nav_style " data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">
                TOOLS
              </a>
              <ul class="dropdown-menu text-center">
                <li><a class="dropdown-item text-bg-dark " href="#" style="font-weight: bold">TIMER</a></li>
                <li><a class="dropdown-item text-bg-dark " href="#">Another action</a></li>
                <li>
                  <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item text-bg-dark " href="#">Something else here</a></li>
              </ul>
            </li>

            <li class="nav-item  rounded m-2 text-bg-dark ">
              <a class="nav-link btn active text-center  text-bg-dark nav_style " href="#" aria-current="page">FORUMS</a>
            </li>


            <li class="nav-item dropdown  rounded m-2  ">
              <a class="nav-link btn dropdown-toggle active text-center  text-bg-dark nav_style " data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">
                TURORIEL
              </a>
              <ul class="dropdown-menu text-center nav_style_display">
                <li><a class="dropdown-item" href="#" style="font-weight: bold">Video</a></li>
                <li><a class="dropdown-item fg" href="#">Article</a></li>
              </ul>
            </li>
          </ul>
          <!-- LIEN ENTRE LES PAGES -->

          <!-- RECHERCHE -->

        </div>

        <?php if (isset($_SESSION['user'])) {

          // On récupere les données de l'utilisateur
          $req = $bdd->prepare('SELECT * FROM utilisateurs WHERE token = ?');
          $req->execute(array($_SESSION['user']));
          $data = $req->fetch();
        ?>
          <form action="./connect/deconnexion.php" method="post" class=" start-50  ">
            <div class="top-0 start-100 text-center position-absolute translate-100"> <input type="submit" name="envoyer" value="deconnexion" class="rounded text-bg-dark mt-3"></div>
          </form>
          <?php if ($_SESSION['ADMIN'] = 1) { ?>
            <div class=" position-absolute top-0 start-100 text-center translate-100 w-25" id="BIG_screen_register">
              <a class="btn active rounded m-2 text-bg-dark text-uppercase big_screen_login" id=" " href="./admin/panel_admin.php">Panel_Admin</a>
            </div> <?php }
                } else { ?>

          <div class=" position-absolute top-0 start-100 text-center translate-100 w-25" id="BIG_screen_register">
            <a class="btn active rounded m-2 text-bg-dark text-uppercase big_screen_login" id=" " href="connect/login_register.php">Login / Register</a>
          </div>


          <div class="  top-0 start-100 text-center" id="SMALL_screen_register">
            <a class="btn active rounded m-2 text-bg-dark  text-uppercase small_screen_login" id="" href="connect/login.php">Login</a>
            <a class="btn active rounded m-2 text-bg-dark  text-uppercase small_screen_login" id="" href="connect/register.php">Register</a>
          </div>



        <?php } ?>
        <!-- LOGIN/REGISTER -->


        <form class="  search   " role="search" id="search">
          <div id="search2">
            <img src="./../img/search.svg" alt="" class="invert text-center style_search">
            <input class="form-control m-2 w-25 " id="barre_search" type="search" aria-label="Search" placeholder="Search">
          </div>
          <input class="form-control m-2 w-25" id="barre_search2" type="search" aria-label="Search" placeholder="Search">
        </form>




      </nav>


    </header>
    <main class="">
      <!-- liste des articles -->
      <div class="m-5 w-25 position-absolute start-50 translate-1 ">
        <ul class=" list-group bg-black">
          <?php while ($a = $articles->fetch()) { ?>
            <li class=" list-group-item bg- text-center">
              <div class="">
              <img src="./img/<?= $a['img'] ?>" class="w-25 h-auto  float-start bg-light">
              </div>
              <div>
              <a href="./article/article.php?id=<?= $a['id'] ?>" class=" btn active text-center  text-bg-dark nav_style"><?= $a['titre'] ?></a>
              <p class=" text-bg-dark"> <?= $a['resum'] ?> </p>
              </div>
            </li>
          <?php } ?>

        </ul>
      </div>
    </main>
    <!-- PARTIE Principale 
        <main>
            <header class="headersubnav  d-flex bg-danger flex-nowrap m-1 ">
                <h1 class=" flex-fill ">NEWS</h1>
                <aside class="Price rounded">Price</aside>
                <aside class="Timer rounded">Timer</aside>
            </header>
        </main>-->
  </div>
</body>

</html>
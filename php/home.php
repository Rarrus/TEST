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
  <link href=’https://fonts.googleapis.com/css?family=Fuzzy+Bubbles’ rel=’stylesheet’ />

</head>



<body class="m-1 bg-dark ">

  <div class=" ">
    <!-- TETE DE PAGE -->
    <div style="background-color: #495057 ;" class="rounded pb-2">
      <header>
        <nav class="navbar navbar-expand-lg justify-content-around flex-wrap">
          <!-- LOGO + TITRE -->
          <div class=" f-100 text-center">
            <a class="btn  border border-dark text-white bg-gradient " href="home.php">TAPY</a>
            <?php if (isset($_SESSION['user'])) {

              // On récupere les données de l'utilisateur
              $req = $bdd->prepare('SELECT * FROM utilisateurs WHERE token = ?');
              $req->execute(array($_SESSION['user']));
              $data = $req->fetch();
            ?>
              <form action="./connect/deconnexion.php" method="post" class=" ">
                <div class=""> <input type="submit" name="envoyer" value="Deconnexion" class="rounded text-white bg-danger"></div>
              </form>
              <?php if ($data['ADMIN'] == 1) { ?>
                <div class=" position-absolute top-0 start-100 text-center translate-100 w-25" id="BIG_screen_register">
                  <a class="btn  rounded m-2 text-white bg-gradient text-uppercase big_screen_login" id=" " href="./admin/panel_admin.php">Panel_Admin</a>
                </div> <?php }
                    } else { ?>

              <div class="" id="SMALL_screen_register">
                <a class="btn  rounded m-2 border border-dark text-white bg-gradient  text-uppercase " id="" href="connect/login.php">Login</a>
                <a class="btn  rounded m-2 border border-dark  text-white bg-gradient  text-uppercase   " id="" href="connect/register.php">Register</a>
              </div>



            <?php } ?>
          </div>
          <button class="navbar-toggler" data-bs-target="#navbarSupportedContent" data-bs-toggle="collapse" type="button" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <!-- BARRE DE NAVIGATION -->

          <div class="collapse navbar-collapse flex-grow-0 flex-wrap " id="navbarSupportedContent">
            <ul class="navbar-nav f-100 justify-content-between  ">
              <li class="nav-item flex-grow-1 m-1 ">
                <a class="btn nav-link  text-center border border-dark   text-white bg-gradient nav_style" href="home.php" aria-current="page">HOME</a>
              </li>
              <li class="nav-item dropdown flex-grow-1 m-1  ">
                <a class="nav-link  btn dropdown-toggle border border-dark  text-center  text-white bg-gradient nav_style " data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">
                  TOOLS
                </a>
                <ul class="dropdown-menu text-center" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="./tools/timer.php" style="font-weight: bold">TIMER</a></li>
                  <li><a class="dropdown-item  " href="./tools/simulateurs_stamina.php" style="font-weight: bold">Simulateur Stamina</a></li>
                  <li><a class="dropdown-item  " href="./tools/simulateurs_combat.php" style="font-weight: bold">Simulateur Combat</a></li>
                  <li><a class="dropdown-item  " href="./tools/suivi_price.php" style="font-weight: bold">Suivi price</a></li>


                </ul>
              </li>

              <li class="nav-item flex-grow-1 m-1  rounded  ">
                <a class="nav-link btn dropdown-toggle  text-center border border-dark  text-white bg-gradient" href="#" aria-current="page">FORUMS</a>
              </li>


              <li class="nav-item flex-grow-1 dropdown  m-1  ">
                <a class="nav-link btn dropdown-toggle  text-center border border-dark  text-white bg-gradient nav_style " data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">
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


          <!-- LOGIN/REGISTER -->







        </nav>


      </header>
      <div class="text-white text-center" id="Marquee">
        <span id="TAP" class="ms-auto me-auto btn text-center text-center border border-dark   text-white bg-gradient nav_style">TAP/USD : </span>
        <span id="MC" class="ms-auto me-auto btn  text-center text-center border border-dark   text-white bg-gradient nav_style"> MC/USD : </span>
        <span id="BUSD" class="ms-auto me-auto btn text-center text-center border border-dark   text-white bg-gradient nav_style"> BUSD/USD : </span>
        <span id="BNB" class="ms-auto me-auto btn text-center text-center border border-dark   text-white bg-gradient nav_style"> BNB/USD : </span>
        <span id="SOL" class="ms-auto me-auto btn text-center text-center border border-dark   text-white bg-gradient nav_style"> SOL/USD : </span>
        <script type="text/javascript">
          crypto();
        </script>
      </div>
    </div>
    <main class="d-flex justify-content-center flex-wrap">

      <div class=" f-25 d-flex justify-content-center flex-wrap">
        <div class="d-flex f-100">
          <div class="flex-grow-1 text-center">
            <h1 class="text-white bg-gradient">Timer</h1>
          </div>

        </div>
        <!-- liste des articles -->
        <div class="">
          <ul class=" list-group bg-black">
            <?php while ($a = $articles->fetch()) { ?>
              <li class=" list-group-item bg- text-center">
                <div class="">
                  <img src="./img/<?= $a['img'] ?>" class="w-25 h-auto  float-start bg-light">
                </div>
                <div>
                  <a href="./article/article.php?id=<?= $a['id'] ?>" class=" btn  text-center  text-bg-dark nav_style"><?= $a['titre'] ?></a>
                  <p class=" text-bg-dark"> <?= $a['resum'] ?> </p>
                </div>
              </li>
            <?php } ?>

          </ul>
        </div>
      </div>
    </main>
  </div>

</body>

</html>
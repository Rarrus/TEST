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



<body class="m-1 bg-dark ">

  <div class=" ">
    <!-- TETE DE PAGE -->
    <header>
      <nav class="navbar navbar-expand-lg ">
        <!-- LOGO + TITRE -->

        <a class="btn active text-white bg-gradient " id="HAUT" href="home.php">TAPY</a>
        <button class="navbar-toggler" data-bs-target="#navbarSupportedContent" data-bs-toggle="collapse" type="button" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <!-- BARRE DE NAVIGATION -->

        <div class="collapse navbar-collapse flex-grow-0 flex-wrap " id="navbarSupportedContent">
          <ul class="navbar-nav f-100 justify-content-between  ">
            <li class="nav-item flex-grow-1 m-1 ">
              <a class="btn nav-link active text-center  text-white bg-gradient nav_style" href="home.php" aria-current="page">HOME</a>
            </li>
            <li class="nav-item dropdown flex-grow-1 m-1  ">
              <a class="nav-link  btn dropdown-toggle active text-center  text-white bg-gradient nav_style " data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">
                TOOLS
              </a>
              <ul class="dropdown-menu text-center" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="#" style="font-weight: bold">TIMER</a></li>
                <li><a class="dropdown-item  " href="./tools/simulateurs_stamina.php">Simulateur Stamina</a></li>
                <li>
                  <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item text-white bg-gradient " href="#">Something else here</a></li>
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

          <div class="" id="SMALL_screen_register">
            <a class="btn active rounded m-2 text-white bg-gradient  text-uppercase " id="" href="connect/login.php">Login</a>
            <a class="btn active rounded m-2 text-white bg-gradient  text-uppercase   " id="" href="connect/register.php">Register</a>
          </div>



        <?php } ?>
        <!-- LOGIN/REGISTER -->







      </nav>


    </header>
    <main class="d-flex justify-content-center flex-wrap">
     <form>
      
     </form>
    </main>
  </div>
</body>

</html>
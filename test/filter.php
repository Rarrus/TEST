<?php
$bdd = new PDO('mysql:host=127.0.0.1;dbname=users', 'root', '');
$bdd_nft = new PDO('mysql:host=127.0.0.1;dbname=users', 'root', '');

if (isset($_GET['nom'])) {
  $nom = $_GET['nom'];
} else {
  header('Location: index.php');
  die();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <?php include('./../php/config/header.php'); ?>
</head>

<body class="m-1 bg-dark ">


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
            <form action="./connect/deconnexion.php" method="post" rounded text-bg-dark>
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
        <button class="navbar-toggler" data-bs-target="#navbarSupportedContent" data-bs-toggle="collapse" type="button" aria-controls="navbarSupportedContent" aria-expanded="false" aria-p="Toggle navigation">
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
            <input class="form-control " id="barre_search" type="search" aria-p="Search" placeholder="Search">
          </form>


        </div>


        <!-- LOGIN/REGISTER -->







      </nav>


    </header>
  </div>
  <main>
    <div class="text-center">
      <h1><?php echo $nom ?></h1>
      <form action="pagehome.php?nom=<?php echo $nom ?>" method="post">
        <p for="">Level</p>
        <div class="  ">
          <input type="radio" id="0" name="level" value="0">
          <label for="0">0</label>
          <input type="radio" id="1" name="level" value="1">
          <label for="1">1</label>
          <input type="radio" id="2" name="level" value="2">
          <label for="2">2</label>
          <input type="radio" id="3" name="level" value="3">
          <label for="3">3</label>
          <input type="radio" id="4" name="level" value="4">
          <label for="4">4</label>
          <input type="radio" id="5" name="level" value="5">
          <label for="5">5</label>
        </div>
        <h2>Attribute</h2>
        <p for="">Wind</p>
        <div rounded text-bg-dark>
          <input type="radio" id="0" name="wind" value="0">
          <label for="0">0</label>
          <input type="radio" id="2" name="wind" value="2">
          <label for="2">2</label>
          <input type="radio" id="4" name="wind" value="4">
          <label for="4">4</label>
          <input type="radio" id="6" name="wind" value="6">
          <label for="6">6</label>
          <input type="radio" id="8" name="wind" value="8">
          <label for="8">8</label>
          <input type="radio" id="10" name="wind" value="10">
          <label for="10">10</label>
        </div>
        <p for="">Fire</p>
        <div rounded text-bg-dark>
          <input type="radio" id="0" name="fire" value="0">
          <label for="0">0</label>
          <input type="radio" id="2" name="fire" value="2">
          <label for="2">2</label>
          <input type="radio" id="4" name="fire" value="4">
          <label for="4">4</label>
          <input type="radio" id="6" name="fire" value="6">
          <label for="6">6</label>
          <input type="radio" id="8" name="fire" value="8">
          <label for="8">8</label>
          <input type="radio" id="10" name="fire" value="10">
          <label for="10">10</label>
        </div>
        <p for="">Earth</p>
        <div rounded text-bg-dark>
          <input type="radio" id="0" name="earth" value="0">
          <label for="0">0</label>
          <input type="radio" id="2" name="earth" value="2">
          <label for="2">2</label>
          <input type="radio" id="4" name="earth" value="4">
          <label for="4">4</label>
          <input type="radio" id="6" name="earth" value="6">
          <label for="6">6</label>
          <input type="radio" id="8" name="earth" value="8">
          <label for="8">8</label>
          <input type="radio" id="10" name="earth" value="10">
          <label for="10">10</label>
        </div>
        <p for="">Wather</p>
        <div rounded text-bg-dark>
          <input type="radio" id="0" name="wather" value="0">
          <label for="0">0</label>
          <input type="radio" id="2" name="wather" value="2">
          <label for="2">2</label>
          <input type="radio" id="4" name="wather" value="4">
          <label for="4">4</label>
          <input type="radio" id="6" name="wather" value="6">
          <label for="6">6</label>
          <input type="radio" id="8" name="wather" value="8">
          <label for="8">8</label>
          <input type="radio" id="10" name="wather" value="10">
          <label for="10">10</label>
        </div>
        <input type="submit" name="envoyer" value="Recherche" class="rounded text-bg-dark">
      </form>
    </div>
  </main>
</body>
<style>
  label,
  h1,
  h2,
  p {
    color: white
  }
</style>

</html>
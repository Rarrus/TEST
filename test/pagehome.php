<?php
$bdd = new PDO("mysql:host=localhost;dbname=nft;charset=utf8", "root", "");
$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if (isset($_GET['nom'])) {
  $nom = str_replace(" ","", $_GET['nom']);
  $table_name = $nom. $_POST['level'] . $_POST['wind'] . $_POST['wather'] . $_POST['fire'] . $_POST['earth'];
  try {$data = $bdd->query('SELECT * FROM '.$table_name);
  $vide = FALSE;}
  catch(PDOException $e) {
    $vide = TRUE;
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
     <h1 class=" text-white"><?php echo $table_name ?></h1>
     <?php 
     if (!$vide){
      while($row = $data->fetch_assoc()){
        unserialize($row[''])
      }
      }
     ?>
    </main>
  </body>

  </html>






<?php } else {
 
}

?>
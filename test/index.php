<?php
$bdd = new PDO('mysql:host=127.0.0.1;dbname=users', 'root', '');

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <?php include('./../php/config/header.php'); ?>
  <link rel="stylesheet" href="style.css">
</head>

<body class="m-1 ">

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



        </div>


        <!-- LOGIN/REGISTER -->







      </nav>


    </header>
  </div>


  <main class="main-content">

    <div class="input-control">
      <label for="search">
      </label>
      <input type="text" id="search" placeholder="Search for an user">
    </div>
    <div class="d-flex justify-content-center ">
      <table class="text-center">
        <thead>
          <tr>
            <th class="p-1 m-2 text-white rounded bg-dark bg-gradient  " colspan="6">Information / Trier </th>
          </tr>
        </thead>
        <tbody>
          <tr class ="text-center">
            <td colspan="2" class=" p-1 m-2 text-white rounded  "rowspan="2">Information</td>
            <td style="width: 66.4%!important" class=" text-center" colspan="4"> <button type="button" id="nom" class="p-1 m-2 w-90b text-white rounded bg-dark bg-gradient  " onclick="Nom(this.id)">Nom </button></td>
          </tr>
          <tr>
            <td colspan="2" class=""> <button id="perso" type="button" class="p-1 m-2 text-white rounded bg-dark bg-gradient w-90b " onclick="Nom(this.id)">Character</button>
            </td>
            <td colspan="2" class=""> <button id="rarity" type="button" class="p-1 m-2  text-white rounded bg-dark bg-gradient w-90b " onclick="Nom(this.id)">Rarity</button>
            </td>
          </tr>
          <tr>
            <td colspan="2" class="text-center  p-1 m-2 text-white rounded   ">Price</td>
            <td class=""> <button id="price_moyen_buy" type="button" class="p-1 m-2 text-white rounded bg-dark bg-gradient w-90b" onclick="Nom(this.id)">Buy</button>
            </td>
            <td class=""> <button id="diff_price_moyen_buy" type="button" class="p-1 m-2 text-white rounded bg-dark bg-gradient w-90b " onclick="Nom(this.id)"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-graph-up-arrow" viewBox="0 0 16 16">
                  <path fill-rule="evenodd" d="M0 0h1v15h15v1H0V0Zm10 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-1 0V4.9l-3.613 4.417a.5.5 0 0 1-.74.037L7.06 6.767l-3.656 5.027a.5.5 0 0 1-.808-.588l4-5.5a.5.5 0 0 1 .758-.06l2.609 2.61L13.445 4H10.5a.5.5 0 0 1-.5-.5Z" />
                </svg></button>
            </td>
            <td class=""> <button id="price_moyen_rent" type="button" class="p-1 m-2 text-white rounded bg-dark bg-gradient w-90b" onclick="Nom(this.id)">Rent</button>
            </td>
            <td class=""> <button id="diff_price_moyen_rent" type="button" class="p-1 m-2 text-white rounded bg-dark bg-gradient w-90b" onclick="Nom(this.id)"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-graph-up-arrow" viewBox="0 0 16 16">
                  <path fill-rule="evenodd" d="M0 0h1v15h15v1H0V0Zm10 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-1 0V4.9l-3.613 4.417a.5.5 0 0 1-.74.037L7.06 6.767l-3.656 5.027a.5.5 0 0 1-.808-.588l4-5.5a.5.5 0 0 1 .758-.06l2.609 2.61L13.445 4H10.5a.5.5 0 0 1-.5-.5Z" />
                </svg></button>
            </td>
          </tr>
          <tr>
            <td style="width: 33.2%!important" colspan="2" class="text-center p-1 m-2 text-white rounded   ">Stock</td>
            <td style="width: 16.6%!important" colspan="1"> <button id="stock_buy" type="button" class="p-1 m-2 text-white rounded bg-dark bg-gradient w-90b" onclick="Nom(this.id)">Buy</button>
            </td>
            <td style="width: 16.6%!important" colspan="1"> <button id="diff_stock_buy" type="button" class="p-1 m-2 text-white rounded bg-dark bg-gradient w-90b" onclick="Nom(this.id)"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-graph-up-arrow" viewBox="0 0 16 16">
                  <path fill-rule="evenodd" d="M0 0h1v15h15v1H0V0Zm10 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-1 0V4.9l-3.613 4.417a.5.5 0 0 1-.74.037L7.06 6.767l-3.656 5.027a.5.5 0 0 1-.808-.588l4-5.5a.5.5 0 0 1 .758-.06l2.609 2.61L13.445 4H10.5a.5.5 0 0 1-.5-.5Z" />
                </svg></button>
            </td>
            <td style="width: 16.6%!important" colspan="1"> <button id="stock_rent" type="button" class="p-1 m-2 text-white rounded bg-dark bg-gradient w-90b" onclick="Nom(this.id)">Rent</button>
            </td>
            <td style="width: 16.6%!important" colspan="1"> <button id="diff_stock_rent" type="button" class="p-1 m-2 text-white rounded bg-dark bg-gradient w-90b" onclick="Nom(this.id)"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-graph-up-arrow" viewBox="0 0 16 16">
                  <path fill-rule="evenodd" d="M0 0h1v15h15v1H0V0Zm10 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-1 0V4.9l-3.613 4.417a.5.5 0 0 1-.74.037L7.06 6.767l-3.656 5.027a.5.5 0 0 1-.808-.588l4-5.5a.5.5 0 0 1 .758-.06l2.609 2.61L13.445 4H10.5a.5.5 0 0 1-.5-.5Z" />
                </svg></button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>





  </main>



  <div class="table-results">
    <script src="script.js"></script>
  </div>
</body>

</html>
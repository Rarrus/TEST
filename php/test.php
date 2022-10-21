<?php
session_start();
require_once 'config.php'; // ajout connexion bdd 
// si la session existe pas soit si l'on est pas connecté on redirige


// On récupere les données de l'utilisateur
$req = $bdd->prepare('SELECT * FROM utilisateurs WHERE token = ?');
$req->execute(array($_SESSION['user']));
$data = $req->fetch();

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

        <a class="navbar-brand  text-center rounded top-0 start-0 mb-1 btn active m-2 text-bg-dark  " id="HAUT" href="test.php"><img class="img-fluid" src="./../img/logo-site.png" alt="logo du site" style="width: 20%;">TAPY</a>
        <button class="navbar-toggler" data-bs-target="#navbarSupportedContent" data-bs-toggle="collapse" type="button" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <!-- BARRE DE NAVIGATION -->

        <div class="collapse navbar-collapse   " id="navbarSupportedContent">
          <!-- LIEN ENTRE LES PAGES -->
          <ul class="navbar-nav mb-2 mb-lg-0  rounded collapse border border-white" id="barre_nav">
            <li class="nav-item rounded m-2 text-bg-dark ">
              <a class="btn nav-link active text-center  text-bg-dark " href="test.php" aria-current="page">HOME</a>
            </li>
            <li class="nav-item dropdown rounded m-2 text-bg-dark ">
              <a class="nav-link  btn dropdown-toggle active text-center  text-bg-dark " data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">
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

          </ul>
          <ul class="navbar-nav mb-2 mb-lg-0  rounded collapse border border-white ms-1  " id="barre_nav">
            <li class="nav-item  rounded m-2 text-bg-dark ">
              <a class="nav-link btn active text-center  text-bg-dark " href="#" aria-current="page">FORUMS</a>
            </li>


            <li class="nav-item dropdown  rounded m-2  ">
              <a class="nav-link btn dropdown-toggle active text-center  text-bg-dark " data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">
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
        <?php if (!isset($_SESSION["user"])) {

          include("notconnect.php");
        } else {
          include("connect.php");
        }; ?>





      </nav>

    </header>

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
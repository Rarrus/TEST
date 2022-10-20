<!doctype html>
<html>

<head>
  <?php include('header.php'); ?>
</head>

<body>
  <?php if (!isset($_SESSION["user"])) {
  ?> <header>
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

    </header> <?php
            } else { ?>

  <?php }; ?>

</body>

</html>
<!DOCTYPE html>
<!-- PAGE D'ACCEUIL FR -->
<html lang="fr">

<head>
  <meta charset="utf-8">
  <title>TAPY</title>
  <link href="./../css/style.css" rel="stylesheet">
  <link href="./../css/style.scss" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body class="m-1 position-relative  " style="background-color: var(--bs-indigo)">
  <!-- TETE DE PAGE -->
  <header>
    <nav class="navbar navbar-expand-lg  rounded d-flex flex-lg-column justify-content-around bg-gradient " style="background-color: var(--bs-indigo)">
      <!-- LOGO + TITRE -->
      <a class="navbar-brand text-green text-center rounded top-0 start-0 mb-1 btn active m-2 bg-gradient " id="HAUT" href="test.php"><img class="img-fluid" src="./../img/logo-site.png" alt="logo du site" style="width: 20%;">TAPY</a>
      <button class="navbar-toggler" data-bs-target="#navbarSupportedContent" data-bs-toggle="collapse" type="button" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <!-- BARRE DE NAVIGATION -->

      <div class="collapse navbar-collapse   " id="navbarSupportedContent">
        <!-- LIEN ENTRE LES PAGES -->
        <ul class="navbar-nav mb-2 mb-lg-0  rounded collapse" id="barre_nav">
          <li class="nav-item rounded m-2 bg-gradient">
            <a class="btn nav-link active text-center" style="color: var(--bs-green)" href="test.php" aria-current="page">HOME</a>
          </li>
          <li class="nav-item dropdown rounded m-2 bg-gradient">
            <a class="nav-link  btn dropdown-toggle active text-center" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">
              TOOLS
            </a>
            <ul class="dropdown-menu text-center" style="background-color: var(--bs-purple);background-image: var(--bs-gradient);">
              <li><a class="dropdown-item bg-gradient" href="#" style="font-weight: bold">TIMER</a></li>
              <li><a class="dropdown-item bg-gradient" href="#">Another action</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item bg-gradient" href="#">Something else here</a></li>
            </ul>
          </li>

        </ul>
        <ul class="navbar-nav mb-2 mb-lg-0  rounded collapse  " id="barre_nav">
          <li class="nav-item  rounded m-2 bg-gradient">
            <a class="nav-link btn active text-center" href="#" aria-current="page">FORUMS</a>
          </li>


          <li class="nav-item dropdown  rounded m-2 bg-gradient">
            <a class="nav-link btn dropdown-toggle active text-center" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">
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
        <a class="btn active rounded m-2 bg-gradient text-uppercase " href="login.php">Login</a>
        <a class="btn active rounded m-2 bg-gradient text-uppercase" href="register.php">Register</a>
      </div>


    </nav>

  </header>

  <main>
    <div class=" text-center active rounded m-2  ">
      <h1 class=" border rounded d-inline bg-gradient  " style="color: #90FE9F!important;" id="login">LOGIN</h1>
    </div>
    <form action="login" class=" start-50  ">
      <div class="m-1 mt-2 ">
        <label for="username" class=" border rounded d-inline  text-uppercase bg-gradient p-1 m-1 mb-1  " style="color: #90FE9F!important;">Username/email</label>
        <input class=" d-block mt-2  bg-gradient rounded border p-1 m-1" style="background-color: var(--bs-indigo)" type="text">
      </div>
      <div class="m-1 mt-2">
        <label for="Password" class=" border rounded d-inline  text-uppercase bg-gradient p-1 m-1 " style="color: #90FE9F!important;">Password</label>
        <input class="d-block mt-2  bg-gradient rounded border p-1 m-1 " style="background-color: var(--bs-indigo)" type="password">
      </div>
      <a href="register.php" class="text-center d-inline d-block" style="">I haven't an account</a>
      <a href="register.php" class="text-center d-inline d-block" style="">I lost my password</a>
    </form>

  </main>

  <!-- PARTIE Principale  -->


</body>

</html>
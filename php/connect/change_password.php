<!DOCTYPE html>
<!-- PAGE D'ACCEUIL FR -->
<html lang="fr">

<head>
  <meta charset="utf-8">
  <title>TAPY</title>
  <link href="./../../css/style.css" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="./../../js/screen.js"></script>
</head>


<body class="m-1 bg-dark ">
  <!-- TETE DE PAGE -->
  <header>
    <nav class="navbar navbar-expand-lg justify-content-around">
      <!-- LOGO + TITRE -->

      <a class="btn active text-white bg-gradient " id="HAUT" href="./../home.php">TAPY</a>
      <button class="navbar-toggler" data-bs-target="#navbarSupportedContent" data-bs-toggle="collapse" type="button" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <!-- BARRE DE NAVIGATION -->

      <div class="collapse navbar-collapse flex-grow-0 flex-wrap " id="navbarSupportedContent">
        <ul class="navbar-nav f-100 justify-content-between  ">
          <li class="nav-item flex-grow-1 m-1 ">
            <a class="btn nav-link active text-center  text-white bg-gradient nav_style" href="./../home.php" aria-current="page">HOME</a>
          </li>
          <li class="nav-item dropdown flex-grow-1 m-1  ">
            <a class="nav-link  btn dropdown-toggle active text-center  text-white bg-gradient nav_style " data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">
              TOOLS
            </a>
            <ul class="dropdown-menu text-center" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="./tools/timer.php" style="font-weight: bold">TIMER</a></li>
              <li><a class="dropdown-item  " href="./tools/simulateurs_stamina.php" style="font-weight: bold">Simulateur Stamina</a></li>
              <li><a class="dropdown-item  " href="./tools/simulateurs_combat.php" style="font-weight: bold">Simulateur Combat</a></li>
              <li><a class="dropdown-item  " href="./tools/suivi_price.php" style="font-weight: bold">Suivi price</a></li>


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



      <?php } ?>
      <!-- LOGIN/REGISTER -->







    </nav>


  </header>
  <main>
    <?php
    if (isset($_GET['pseudo'], $_GET['token'])) { ?>
      <form action="./change_password_mail.php">
        <div class="m-1 mt-3">
          <label class=" border rounded d-inline  text-uppercase  text-bg-dark p-1 m-1 ">Password</label>
          <input name="password" class="d-block mt-2   text-bg-dark rounded border p-1 m-1 bg-gradient "   type="password">
        </div>
        <div class=" m-1 mt-3">
          <label class=" border rounded d-inline  text-uppercase  text-bg-dark p-1 m-1 ">re-enter password</label>
          <input name="password_retype" class="d-block mt-2   text-bg-dark rounded border p-1 m-1 bg-gradient "   type="password" onBlur="checkPass()">
        </div>
        <input type="submit" name="envoyer" value="envoyer" class="rounded bg-gradient text-bg-dark">
      </form>

    <?php } else { ?>
      <form action="./change_password_mail.php">
        <?php
        if (isset($_GET['login_err'])) {
          $err = htmlspecialchars($_GET['login_err']);
          switch ($err) {
            case 'already':
        ?>
              <div class="alert alert-danger" role="alert">
                <strong>Erreur</strong> Compte introuvable
              </div>
        <?php }
        } ?>
        <label for="email" class="text-bg-dark">Veuillez mettre l'email du compte où vous voulez changer de MDP </label>
        <input name="email" class=" d-block mt-2  text-bg-dark  rounded border p-1 m-1 bg-gradient " required type="text">
        <input type="submit" name="envoyer" value="envoyer" class="rounded bg-gradient text-bg-dark">
      </form>
    <?php } ?>
  </main>
<?php
session_start();
require_once './config/config.php'; // ajout connexion bdd 
// si la session existe pas soit si l'on est pas connecté on redirige
if (isset($_SESSION['user'])) {

  // On récupere les données de l'utilisateur
  $req = $bdd->prepare('SELECT * FROM utilisateurs WHERE token = ?');
  $req->execute(array($_SESSION['user']));
  $data = $req->fetch();
}



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
      <?php
      include 'barre_nav.php'
      ?>

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
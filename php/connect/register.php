<!DOCTYPE html>
<!-- PAGE D'ACCEUIL FR -->
<html lang="fr">

<head>
  <?php include('./../config/header.php'); ?>
</head>

<body class="m-1 position-relative  " style="background-color: var(--bs-indigo)">
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

  <!-- TETE DE PAGE -->
  <header><?php 
      include './../config/barre_nav.php'
      ?>
</header>

  <main>
    <div id="box2">
      <div id="form2" class="d-flex flex-wrap justify-content-center ">


        <div class=" text-center active rounded m-3 ">
          <h1 class=" border rounded d-inline text-bg-dark p-1 mt-3 " id="login">REGISTER</h1>
        </div>
        <?php
        if (isset($_GET['reg_err'])) {
          $err = htmlspecialchars($_GET['reg_err']);
          switch ($err) {
            case 'success':
        ?>
              <div class="alert alert-success">
                <strong>Succès</strong> Compte crée
              </div>
            <?php
              break;
            case 'password':
            ?>

              <div class="alert alert-danger">
                <strong>Erreur</strong> mot de pass incorrect
              </div>
            <?php
              break;
            case 'email':
            ?>
              <div class="alert alert-danger">
                <strong>Erreur</strong> email non valide
              </div>
            <?php
              break;
            case 'email_length':
            ?>

              <div class="alert alert-danger">
                <strong>Erreur</strong> email trop long
              </div>
            <?php
              break;
            case 'pseudo_length':
            ?>
              <div class="alert alert-danger">
                <strong>Erreur</strong> pseudo trop long
              </div>
            <?php
            case 'already':
            ?>


              <div class="alert alert-danger">
                <strong>Erreur</strong> compte deja existant
              </div>
        <?php

          }
        }
        ?>
        <form action="inscription_traitement.php" method="post" class=" start-50  ">

          <div class="m-1 mt-2 ">
            <label class=" border rounded d-inline  text-uppercase  text-bg-dark p-1 m-1 mb-1  ">Username</label>
            <input name="pseudo" class=" d-block mt-2   text-bg-dark rounded border p-1 m-1 bg-gradient" style="background-color: var(--bs-indigo)" type="text">
          </div>
          <div class="m-1 mt-3">
            <label name="email" class=" border rounded d-inline  text-uppercase  text-bg-dark p-1 m-1  ">Email</label>
            <input name="email" class=" d-block mt-2   text-bg-dark rounded border p-1 m-1 bg-gradient" style="background-color: var(--bs-indigo)" type="email">
          </div>
          <div class="m-1 mt-3">
            <label class=" border rounded d-inline  text-uppercase  text-bg-dark p-1 m-1 ">Password</label>
            <input name="password" class="d-block mt-2   text-bg-dark rounded border p-1 m-1 bg-gradient " style="background-color: var(--bs-indigo)" type="password">
          </div>
          <div class=" m-1 mt-3">
            <label class=" border rounded d-inline  text-uppercase  text-bg-dark p-1 m-1 ">re-enter password</label>
            <input name="password_retype" class="d-block mt-2   text-bg-dark rounded border p-1 m-1 bg-gradient " style="background-color: var(--bs-indigo)" type="password">
          </div>
          <div class="text-center  "><input type="submit" name="envoyer" value="Je m'inscris" class="rounded text-bg-dark mt-3"></div>
        </form>
      </div>
    </div>

  </main>

  <!-- PARTIE Principale  -->


</body>

</html>
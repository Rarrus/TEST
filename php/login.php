<!DOCTYPE html>
<!-- PAGE D'ACCEUIL FR -->
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>TAPY</title>
    <link href="./../css/style.css" rel="stylesheet">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body class="m-1 position-relative bg-black">
    <div class="rounded border" style="background-color: var(--bs-indigo);background-image: var(--bs-gradient);" id="page">
        <!-- TETE DE PAGE -->
        <header>
            <nav class="navbar navbar-expand-lg  rounded d-flex flex-lg-column justify-content-around ">
                <!-- LOGO + TITRE -->
                <a class="navbar-brand text-green text-center rounded bg-gradient top-0 mb-1 " id="HAUT" href="#"><img class="img-fluid" src="./../img/logo-site.png" alt="logo du site" style="width: 20%;">TAPY</a>
                <button class="navbar-toggler" data-bs-target="#navbarSupportedContent" data-bs-toggle="collapse" type="button" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <!-- BARRE DE NAVIGATION -->
                <div class="collapse navbar-collapse " id="navbarSupportedContent">
                    <!-- LIEN ENTRE LES PAGES -->
                    <ul class="navbar-nav mb-2 mb-lg-0  rounded collapse  " id="barre_nav">
                        <li class="nav-item border border-dark rounded m-2 bg-gradient ">
                            <a class="nav-link active text-center " style="color: var(--bs-green)" href="test.php" aria-current="page">HOME</a>
                        </li>
                        <li class="nav-item dropdown border border-dark rounded m-2 bg-gradient">
                            <a class="nav-link dropdown-toggle active text-center" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">
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
                    <ul class="navbar-nav mb-2 mb-lg-0  rounded d-flex  collapse " id="barre_nav">
                        <li class="nav-item border border-dark rounded m-2 bg-gradient">
                            <a class="nav-link active text-center" href="#" aria-current="page">FORUMS</a>
                        </li>


                        <li class="nav-item dropdown border border-dark rounded m-2 bg-gradient">
                            <a class="nav-link dropdown-toggle active text-center" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">
                                TURORIEL
                            </a>
                            <ul class="dropdown-menu text-center">
                                <li><a class="dropdown-item" href="#" style="font-weight: bold">Video</a></li>
                                <li><a class="dropdown-item fg" href="#">Article</a></li>
                            </ul>
                        </li>

                    </ul>
                    <!-- RECHERCHE -->
                    <form class="top-0 start-0 mb-2" role="search">
                        <input class="form-control me-2" type="search" aria-label="Search" placeholder="Search">
                    </form>
                    <!-- LOGIN/REGISTER -->
                    <div class="d-lg-flex flex-nowrap align-content-center justify-content-center top-0 start-100 text-center" id="REGISTER">
                        <a class="btn border border-dark rounded m-2 bg-gradient text-uppercase " href="login.php">Login</a>
                        <a class="btn border border-dark rounded m-2 bg-gradient text-uppercase" href="register.php">Register</a>
                    </div>
                </div>

            </nav>

        </header>

        <!-- PARTIE Principale-->
        <main class="">
            <div class="d-flex justify-content-center bg-black">
                <form class="bg-black">
                    <label> ea </label>
                    <input>
                </form>
            </div>
            <header class="headersubnav  d-flex bg-danger flex-nowrap m-1 ">
                <h1 class=" flex-fill ">NEWS</h1>
                <aside class="Price rounded">Price</aside>
                <aside class="Timer rounded">Timer</aside>
            </header>
        </main> 
    </div>
</body>

</html>
<nav class="navbar navbar-expand-lg  rounded d-flex flex-lg-column justify-content-around  ">
        <!-- LOGO + TITRE -->

        <a class="d-inline  text-center rounded top-0 start-0 mb-1 btn active m-2 text-bg-dark fs-1  " style="" id="HAUT" href="test.php">TAPY</a>
        <button class="navbar-toggler" data-bs-target="#navbarSupportedContent" data-bs-toggle="collapse" type="button" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <!-- BARRE DE NAVIGATION -->

        <div class="collapse navbar-collapse mb-1 w-25" id="navbarSupportedContent">
          <ul class="navbar-nav mb-lg-2 d-lg-flex w-100 justify-content-between rounded flex-nowrap">
            <li class="nav-item rounded m-2 text-bg-dark ">
              <a class="btn nav-link active text-center  text-bg-dark nav_style" href="test.php" aria-current="page">HOME</a>
            </li>
            <li class="nav-item dropdown rounded m-2 text-bg-dark ">
              <a class="nav-link  btn dropdown-toggle active text-center  text-bg-dark nav_style " data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">
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

            <li class="nav-item  rounded m-2 text-bg-dark ">
              <a class="nav-link btn active text-center  text-bg-dark nav_style " href="#" aria-current="page">FORUMS</a>
            </li>


            <li class="nav-item dropdown  rounded m-2  ">
              <a class="nav-link btn dropdown-toggle active text-center  text-bg-dark nav_style " data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">
                TURORIEL
              </a>
              <ul class="dropdown-menu text-center nav_style_display">
                <li><a class="dropdown-item" href="#" style="font-weight: bold">Video</a></li>
                <li><a class="dropdown-item fg" href="#">Article</a></li>
              </ul>
            </li>
          </ul>
          <!-- LIEN ENTRE LES PAGES -->

          <!-- RECHERCHE -->

        </div>

          <form class="  search   " role="search" id="search">
            <div id="search2">
              <img src="./../img/search.svg" alt="" class="invert text-center style_search">
              <input class="form-control m-2 w-25 " id="barre_search" type="search" aria-label="Search" placeholder="Search">
            </div>
            <input class="form-control m-2 w-25" id="barre_search2" type="search" aria-label="Search" placeholder="Search">
          </form>
          <!-- LOGIN/REGISTER -->

          <div class=" position-absolute top-0 start-100 text-center translate-100 w-25" id="BIG_screen_register">
            <a class="btn active rounded m-2 text-bg-dark text-uppercase big_screen_login" id=" " href="connect/login_register.php">Login / Register</a>
          </div>


          <div class="  top-0 start-100 text-center" id="SMALL_screen_register">
            <a class="btn active rounded m-2 text-bg-dark  text-uppercase small_screen_login" id="" href="connect/login.php">Login</a>
            <a class="btn active rounded m-2 text-bg-dark  text-uppercase small_screen_login" id="" href="connect/register.php">Register</a>
          </div>





      </nav>
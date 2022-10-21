<?php
// For instance, you can do something like this:
if(isset($_POST['width']) && isset($_POST['height'])) {
    $_SESSION['screen_width'] = $_POST['width'];
    $_SESSION['screen_height'] = $_POST['height'];
    if(isset($_POST['width']) <= 992 ){ ?>
      <div class="d-lg-flex flex-nowrap align-content-center justify-content-center top-0 start-100 text-center " id="REGISTER">
          <a class="btn active rounded m-2 text-bg-dark text-uppercase " href="login.php">Login </a>
          <a class="btn active rounded m-2 text-bg-dark text-uppercase " href="register.php">Register</a>
        </div>

    <?php }else{
      ?><div class="d-lg-flex flex-nowrap align-content-center justify-content-center top-0 start-100 text-center " id="REGISTER">
          <a class="btn active rounded m-2 text-bg-dark text-uppercase " href="login_register.php">Login / Register</a>
        </div>
    <?php }
} else {
    echo json_encode(array('outcome'=>'error','error'=>"Couldn't save dimension info"));
}
?>


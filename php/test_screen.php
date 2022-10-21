<?php
// For instance, you can do something like this:
if(isset($_POST['width']) && isset($_POST['height'])) {
    $_SESSION['screen_width'] = $_POST['width'];
    $_SESSION['screen_height'] = $_POST['height'];
    if(isset($_POST['width']) <= 992 ){ 
      header('Location: test_mobile.php'); die();

    }else{
      header('Location: test_pc.php'); die();
       }
} else {
    echo json_encode(array('outcome'=>'error','error'=>"Couldn't save dimension info"));
}
?>
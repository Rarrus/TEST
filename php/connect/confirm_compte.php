<?php
$bdd = new PDO('mysql:host=127.0.0.1;dbname=users', 'root', '');
 
if(isset($_GET['pseudo'], $_GET['tohen']) AND !empty($_GET['pseudo']) AND !empty($_GET['token'])) {
   $pseudo = htmlspecialchars(urldecode($_GET['pseudo']));
   $token = htmlspecialchars($_GET['token']);
   $requser = $bdd->prepare("SELECT * FROM membres WHERE pseudo = ? AND confirmtoken = ?");
   $requser->execute(array($pseudo, $token));
   $userexist = $requser->rowCount();
   if($userexist == 1) {
      $user = $requser->fetch();
      if($user['confirme'] == 0) {
         $updateuser = $bdd->prepare("UPDATE membres SET confirme = 1 WHERE pseudo = ? AND confirmtoken = ?");
         $updateuser->execute(array($pseudo,$token));
         echo "Votre compte a bien été confirmé !";
      } else {
         echo "Votre compte a déjà été confirmé !";
      }
   } else {
      echo "L'utilisateur n'existe pas !";
   }
}
?>
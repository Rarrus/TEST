<?php  
    require_once './../config/config.php'; // On inclut la connexion à la base de données
    
    if(!empty($_POST['email'])) // Si il existe le champ email et qu'il sont pas vident
    {
        $email = htmlspecialchars($_POST['email']); 
        
        $email = strtolower($email); // email transformé en minuscule
        
        // On regarde si l'utilisateur est inscrit dans la table utilisateurs
        $check = $bdd->prepare('SELECT pseudo, email, password, token, confirm FROM utilisateurs WHERE email = ?');
        $check->execute(array($email));
        $data = $check->fetch();
        $row = $check->rowCount();
        if($row > 0)
        {
          $header="MIME-Version: 1.0\r\n";
          $header.='From:"[VOUS]"<sword2269@mail.com>'."\n";
          $header.='Content-Type:text/html; charset="uft-8"'."\n";
          $header.='Content-Transfer-Encoding: 8bit';
          $message='
          <html>
             <body>
                <div align="center">
                   <a href="http://127.0.0.1/BIG/php/connect/change_password.php?pseudo='.urlencode($pseudo).'&token='.$token.'">Changer de MDP !</a>
                </div>
             </body>
          </html>
          ';
          mail($email, "Changer de MDP", $message, $header);
          header('Location:./../home.php?reg_err=success');
            
        }else{ header('Location: login.php?login_err=already'); die(); }
      }else{ echo $_POST['email']; die(); }
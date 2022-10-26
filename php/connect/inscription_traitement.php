<?php 
    require_once './../config/config.php'; // On inclu la connexion à la bdd

    // Si les variables existent et qu'elles ne sont pas vides
    if(!empty($_POST['pseudo']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['password_retype']))
    {
        // Patch XSS
        $pseudo = htmlspecialchars($_POST['pseudo']);
        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['password']);
        $password_retype = htmlspecialchars($_POST['password_retype']);

        // On vérifie si l'utilisateur existe
        $check = $bdd->prepare('SELECT pseudo, email, password FROM utilisateurs WHERE email = ?');
        $check->execute(array($email));
        $data = $check->fetch();
        $row = $check->rowCount();

        $email = strtolower($email); // on transforme toute les lettres majuscule en minuscule pour éviter que Foo@gmail.com et foo@gmail.com soient deux compte différents ..
        
        // Si la requete renvoie un 0 alors l'utilisateur n'existe pas 
        if($row == 0){ 
            if(strlen($pseudo) <= 100){ // On verifie que la longueur du pseudo <= 100
                if(strlen($email) <= 100){ // On verifie que la longueur du mail <= 100
                    if(filter_var($email, FILTER_VALIDATE_EMAIL)){ // Si l'email est de la bonne forme
                        if($password === $password_retype){ // si les deux mdp saisis sont bon

                            // On hash le mot de passe avec Bcrypt, via un coût de 12
                            $cost = ['cost' => 12];
                            $password = password_hash($password, PASSWORD_BCRYPT, $cost);
                            
                            // On stock l'adresse IP
                            $ip = $_SERVER['REMOTE_ADDR']; 
                             /*
                              ATTENTION
                              Verifiez bien que le champs token est présent dans votre table utilisateurs, il a été rajouté APRÈS la vidéo
                              le .sql est dispo pensez à l'importer ! 
                              ATTENTION
                            */
                            // On insère dans la base de données
                            $token = bin2hex(openssl_random_pseudo_bytes(64));
                            $insert = $bdd->prepare('INSERT INTO utilisateurs(pseudo, email, password, ip, token) VALUES(:pseudo, :email, :password, :ip, :token)');
                            $insert->execute(array(
                                'pseudo' => $pseudo,
                                'email' => $email,
                                'password' => $password,
                                'ip' => $ip,
                                'token' => $token
                            ));

                            $header="MIME-Version: 1.0\r\n";
                            $header.='From:"[VOUS]"<sword2269@mail.com>'."\n";
                            $header.='Content-Type:text/html; charset="uft-8"'."\n";
                            $header.='Content-Transfer-Encoding: 8bit';
                            $message='
                            <html>
                               <body>
                                  <div align="center">
                                     <a href="http://127.0.0.1/BIG/php/connect/login.php?pseudo='.urlencode($pseudo).'&token='.$token.'">Confirmez votre compte !</a>
                                  </div>
                               </body>
                            </html>
                            ';
                            mail($email, "Confirmation de compte", $message, $header);
                            // On redirige avec le message de succès
                            header('Location:./login.php?reg_err=success');
                            die();
                        }else{ header('Location: register.php?reg_err=password'); die();}
                    }else{ header('Location: register.php?reg_err=email'); die();}
                }else{ header('Location: register.php?reg_err=email_length'); die();}
            }else{ header('Location: register.php?reg_err=pseudo_length'); die();}
        }else{ header('Location: register.php?reg_err=already'); die();}
    }else{ header('Location: register.php?reg_err=already'); die();}

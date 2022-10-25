<?php

$header = "MIME-Version: 1.0\r\n";
$header .= 'From:"[VOUS]"<sword2269@mail.com>' . "\n";
$header .= 'Content-Type:text/html; charset="uft-8"' . "\n";
$header .= 'Content-Transfer-Encoding: 8bit';
$message = '
                            <html>
                               <body>
                                  <div align="center">
                                     <a href="http://127.0.0.1/BIG/php/connect/confirm_compte.php">Confirmez votre compte !</a>
                                  </div>
                               </body>
                            </html>
                            ';
mail("sword2269@gmail.com", "Confirmation de compte", $message, $header);

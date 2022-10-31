<?php
error_reporting(E_ALL ^ E_NOTICE);

$bdd = new PDO("mysql:host=localhost;dbname=users;charset=utf8", "root", "");
$bdd->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

$api_url = 'https://api.tapfantasy.io/web2/market/list/56/0/3000?order=-o1&filter=';

// Read JSON file
$json_data = file_get_contents($api_url);

// Decode JSON data into PHP array
$response_data = json_decode($json_data);

// All user data exists in 'data' object
$user_data = $response_data->data;

// Print data if need to debug
//print_r($user_data);


// Traverse array and display user data
if (is_array($user_data) || is_object($user_data)) {
  foreach ($user_data as $user) {
    if (is_array($user)) {
      foreach ($user as $user2) {
        $name = $user2->name;
        if($name == "busd"){
          $name == "";
        }
        $img = $user2 -> preview;
        $perso = $user2->character;
        $rarity = $user2->rarity;
        $insert = $bdd -> prepare("INSERT IGNORE into list_nft(img, nom, perso, rarity) VALUES(:img, :nom, :perso, :rarity)");
        $insert->execute(array(
          'img' => $img,
          'nom' => $name,
          'perso' => $perso,
          'rarity' => $rarity

      ));
        
          
        
      }
    }
  }
  $bdd -> query("DELETE FROM `list_nft` WHERE `list_nft`.`nom` = 'busd'");
}

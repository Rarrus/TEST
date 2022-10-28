<?php
error_reporting(E_ALL ^ E_NOTICE);

$bdd = new PDO("mysql:host=localhost;dbname=nft;charset=utf8", "root", "");
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
        if ($name == 'busd'){
          $name = '';
        }
        $price = $user2->price;
        $level = $user2->level;
        $wind = $user2->wind;
        $water = $user2->water;
        $fire = $user2->fire;
        $earth = $user2->earth;
        $perso = $user2->character;
        $rarity = $user2->rarity;
        $table_name = $name . $level . $wind . $water . $fire . $earth ;
        $table_name = str_replace(" ","", $table_name);
        $table_name = str_replace("'",'', $table_name);
        
        $bdd -> query("CREATE TABLE if not exists " .$table_name. " (name VARCHAR(255),level INT,wind INT,water INT,fire INT,earth INT,perso VARCHAR(255),rarity VARCHAR(255),price INT,date DATETIME Default CURRENT_TIMESTAMP )");
        $insert = $bdd->prepare('INSERT INTO ' .$table_name . '(name , level, wind, fire, water, earth, perso, rarity, price ) VALUES(:name , :level, :wind, :fire, :water, :earth, :perso, :rarity, :price)');
        $insert->execute(array(
            'name' => $name, 'level' => $level, 'wind' => $wind, 'fire' => $fire, 'water' => $water, 'earth' => $earth, 'perso' => $perso, 'rarity' => $rarity, 'price' => $price
          ));
          
        
      }
    }
  }
}

<?php
# ACHAT
$table_price = array();
$table_compte = array();
$table_nom = array();
$table_price_down = array();
$table_price_up = array();
error_reporting(E_ALL ^ E_NOTICE);

$bdd = new PDO("mysql:host=localhost;dbname=nft;charset=utf8", "root", "");
$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);



$api_url = 'https://api.tapfantasy.io/web/market/list/56/0/3000?order=-o1&filter=';
// Read JSON file
$json_data = file_get_contents($api_url);

// Decode JSON data into PHP array
$response_data = json_decode($json_data);

// All user data exists in 'data' object
$user_data = $response_data->data->list;

// Print data if need to debug
//print_r($user_data);


// Traverse array and display user data
if (is_array($user_data) || is_object($user_data)) {
  foreach ($user_data as $user) {
    $name = $user->name;
    if ($name == 'busd') {
      $name = '';
    }
    $price = $user->price;
    $level = $user->level;
    $wind = $user->wind;
    $water = $user->water;
    $fire = $user->fire;
    $earth = $user->earth;
    $perso = $user->character;
    $rarity = $user->rarity;
    $token = $user->tokenid;
    $table_name = $name . $level . $wind . $water . $fire . $earth;
    $table_name = str_replace(" ", "", $table_name);
    $table_name = str_replace("'", '', $table_name);
    $table_price[$table_name] = $table_price[$table_name] + $price;
    $table_compte[$table_name] = $table_compte[$table_name] + 1;
    array_push($table_nom, $table_name);
    try {
      if ($table_price_down[$table_name] > $price) {
        $table_price_down[$table_name] = $price;
      } elseif ($table_price_up[$table_name] < $price) {
        $table_price_up[$table_name] = $price;
      }
    } catch (Exception  $e) {
      $table_price_down[$table_name] = $price;
      $table_price_up[$table_name] = $price;
    }
    $bdd->query("CREATE TABLE if not exists " . $table_name . " (token VARCHAR(255), price INT,date DATETIME Default CURRENT_TIMESTAMP )");
    $insert = $bdd->prepare('INSERT INTO ' . $table_name . '(token, price) VALUES(:token, :price)');
    $insert->execute(array(
      'price' => $price,
      'token' => $token
    ));
  }
}
$bdd = new PDO("mysql:host=localhost;dbname=nft_calcul_buy;charset=utf8", "root", "");
$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
for ($index = 0; $index < count($table_price); $index++) {
  $moyenne = $table_price[$table_nom[$index]] / $table_price[$table_nom[$index]];




  $bdd->query("CREATE TABLE if not exists " . $table_nom[$index] . " (price_UP FLOAT, price_DOWN FLOAT, price_moyen FLOAT,date DATETIME Default CURRENT_TIMESTAMP )");
  $insert = $bdd->prepare('INSERT INTO ' . $table_nom[$index] . '(price_UP, price_DOWN, price_moyen) VALUES(:price_UP, :price_DOWN, :price_moyen)');
  $insert->execute(array(
    'price_UP' => $table_price_up[$table_nom[$index]],
    'price_DOWN' => $table_price_down[$table_nom[$index]],
    'price_moyen' => $moyenne[$table_nom[$index]]
  ));
}

$table_price2 = array();
$table_compte2 = array();
$table_nom2 = array();
$table_price_down2 = array();
$table_price_up2 = array();
# Louer
error_reporting(E_ALL ^ E_NOTICE);

$bdd = new PDO("mysql:host=localhost;dbname=nft_lending;charset=utf8", "root", "");
$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$api_url = 'https://api.tapfantasy.io/web/lending/list/56/0/3000?order=-o1&filter=';

// Read JSON file
$json_data = file_get_contents($api_url);;

// Decode JSON data into PHP array
$response_data = json_decode($json_data);

// All user data exists in 'data' object
$user_data = $response_data->data->list;

// Print data if need to debug
//print_r($user_data);


// Traverse array and display user data
if (is_array($user_data) || is_object($user_data)) {
  foreach ($user_data as $user) {
    $name = $user->name;
    if ($name == 'busd') {
      $name = '';
    }
    $price = $user->price;
    $level = $user->level;
    $wind = $user->wind;
    $water = $user->water;
    $fire = $user->fire;
    $earth = $user->earth;
    $perso = $user->character;
    $period = $user->period;
    $period = intval($period / (3600 * 24));
    $rarity = $user->rarity;
    $token = $user->tokenid;
    $table_name = $name . $level . $wind . $water . $fire . $earth;
    $table_name = str_replace(" ", "", $table_name);
    $table_name = str_replace("'", '', $table_name);
    $table_price2[$table_name] = $table_price2[$table_name] + $price;
    $table_compte2[$table_name] = $table_compte2[$table_name] + 1;
    array_push($table_nom2, $table_name);
    try {
      if ($table_price_down2[$table_name] > $price) {
        $table_price_down2[$table_name] = $price;
      } elseif ($table_price_up2[$table_name] < $price) {
        $table_price_up2[$table_name] = $price;
      }
    } catch (Exception  $e) {
      $table_price_down2[$table_name] = $price;
      $table_price_up2[$table_name] = $price;
    }
    
    $bdd->query("CREATE TABLE if not exists " . $table_name . " (token VARCHAR(255), duration INT,price INT,date DATETIME Default CURRENT_TIMESTAMP )");
    $insert = $bdd->prepare('INSERT INTO ' . $table_name . '(token, duration, price) VALUES(:token, :duration, :price)');
    $insert->execute(array(
      'price' => $price,
      'duration' => $period,
      'token' => $token
    ));
  }
}

$bdd = new PDO("mysql:host=localhost;dbname=nft_calcul_rent;charset=utf8", "root", "");
$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
for ($index = 0; $index < count($table_price2); $index++) {
  $moyenne = $table_price2[$table_nom2[$index]] / $table_price2[$table_nom2[$index]];
  echo $moyenne. $table_price_down2[[$table_nom2[$index]]];



  $bdd->query("CREATE TABLE if not exists " . $table_nom2[$index] . " (price_UP FLOAT, price_DOWN FLOAT, price_moyen FLOAT,date DATETIME Default CURRENT_TIMESTAMP )");
  $insert = $bdd->prepare('INSERT INTO ' . $table_nom2[$index] . '(price_UP, price_DOWN, price_moyen) VALUES(:price_UP, :price_DOWN, :price_moyen)');
  $insert->execute(array(
    'price_UP' => $table_price_up2[$table_nom2[$index]],
    'price_DOWN' => $table_price_down2[$table_nom2[$index]],
    'price_moyen' => $moyenne[$table_nom2[$index]]
  ));
}

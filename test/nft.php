<?php
$nom = array();
$table_img = array();
$table_perso = array();
$table_rarity = array();
# ACHAT
$table_price = array();
$table_compte = array();
$table_nom = array();
$table_price_down = array();
$table_price_up = array();
$table_preview = array();
error_reporting(E_ERROR);
ini_set('display_errors', 'On');
$bdd = new PDO("mysql:host=localhost;dbname=nft;charset=utf8", "root", "");
$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);



$api_url = 'https://api.tapfantasy.io/web2/market/list/56/0/3000?order=-o1&filter=';
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
    $img = $user->preview;
    $preview = $user->image;
    $perso = $user->character;
    $rarity = $user->rarity;
    $token = $user->tokenid;
    $table_name = $name."§" . $level ."§" . $wind."§" . $water."§" .$fire ."§" . $earth ."§" . "buy";
    $table_name = str_replace(" ", "", $table_name);
    $table_name = str_replace("'", '', $table_name);
    if (gettype($table_price[$table_name]) == "NULL") {
      $table_price[$table_name] = $price;
    }else{
      $table_price[$table_name] =  $table_price[$table_name] + $price;;
    }
    if (gettype($table_compte[$table_name]) == "NULL") {
      $table_compte[$table_name] = 1;
    } else {
      $table_compte[$table_name] = $table_compte[$table_name] + 1;
    };


    if (!in_array($table_name, $table_nom)) {
      array_push($table_nom, $table_name);
      $bdd->query("DROP TABLE if exists $table_name");
    }
    if (!in_array($name, $nom)) {
      array_push($nom, $name);
      array_push($table_rarity, $rarity);
      array_push($table_img, $img);
      array_push($table_perso, $perso);
      array_push($table_preview, $preview);
    }
    if (gettype($table_price_down[$table_name]) == "NULL") {
      $table_price_down[$table_name] = $price;
    } else {
      if ($price < $table_price_down[$table_name]) {
        $table_price_down[$table_name] = $price;
      }
    };

    if (gettype($table_price_up[$table_name]) == "NULL") {
      $table_price_up[$table_name] = $price;
    } else {
      if ($price > $table_price_up[$table_name]) {
        $table_price_up[$table_name] = $price;
      }
    };

    $bdd->query("CREATE TABLE if not exists $table_name  (token VARCHAR(255), price INT, date DATETIME Default CURRENT_TIMESTAMP )");
    $insert = $bdd->prepare("INSERT INTO  $table_name (token, price) VALUES(:token, :price)");
    $insert->execute(array(
      'price' => $price,
      'token' => $token
    ));
  }
}
$bdd = new PDO("mysql:host=localhost;dbname=nft_rent_buy;charset=utf8", "root", "");
$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
for ($index = 0; $index < count($table_price); $index++) {
  $moyenne = $table_price[$table_nom[$index]] / $table_compte[$table_nom[$index]];
  $bdd->query("CREATE TABLE if not exists $table_nom[$index]  (price_UP DECIMAL(60,2), price_DOWN DECIMAL(60,2), price_moyen DECIMAL(60,2), price_all DECIMAL(60,2), stock INT,diff_price_UP DECIMAL(60,2), diff_price_DOWN DECIMAL(60,2), diff_price_moyen DECIMAL(60,2), diff_price_all DECIMAL(60,2), diff_stock DECIMAL(60,2), date DATETIME Default CURRENT_TIMESTAMP )");
  $rqut_nb = $bdd->query("SELECT * FROM  $table_nom[$index]  order by date desc limit 0,1")->fetch();



  $insert = $bdd->prepare("INSERT INTO  $table_nom[$index] (price_UP, price_DOWN, price_moyen, price_all, stock, diff_price_UP , diff_price_DOWN , diff_price_moyen , diff_price_all , diff_stock ) VALUES(:price_UP, :price_DOWN, :price_moyen, :price_all, :stock,:diff_price_UP , :diff_price_DOWN , :diff_price_moyen , :diff_price_all , :diff_stock)");
  $insert->execute(array(
    'price_UP' => $table_price_up[$table_nom[$index]],
    'price_DOWN' => $table_price_down[$table_nom[$index]],
    'price_moyen' => $moyenne,
    'price_all' => $table_price[$table_nom[$index]],
    'stock' => $table_compte[$table_nom[$index]],
    'diff_price_UP' => $table_price_up[$table_nom[$index]] - $rqut_nb['price_UP'],
    'diff_price_DOWN' => $table_price_down[$table_nom[$index]] - $rqut_nb['price_DOWN'],
    'diff_price_moyen' => $moyenne - $rqut_nb['price_moyen'],
    'diff_price_all' => $table_price[$table_nom[$index]] - $rqut_nb['price_all'],
    'diff_stock' => $table_compte[$table_nom[$index]] - $rqut_nb['stock']
  ));
}

$table_price2 = array();
$table_compte2 = array();
$table_nom2 = array();
$table_price_down2 = array();
$table_price_up2 = array();
# Louer

$bdd = new PDO("mysql:host=localhost;dbname=nft;charset=utf8", "root", "");
$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$api_url = 'https://api.tapfantasy.io/web2/lending/list/56/0/3000?order=-o1&filter=';

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
    $img = $user->preview;
    $preview = $user->image;
    $fire = $user->fire;
    $earth = $user->earth;
    $perso = $user->character;
    $period = $user->period;
    $period = intval($period / (3600 * 24));
    $rarity = $user->rarity;
    $token = $user->tokenid;
    $table_name = $name."§" . $level ."§" . $wind."§" . $water."§" .$fire ."§" . $earth ."§" . "rent";
    $table_name = str_replace(" ", "", $table_name);
    $table_name = str_replace("'", '', $table_name);
    if (gettype($table_price2[$table_name]) == "NULL") {
      $table_price2[$table_name] = $price;
    }else{
    $table_price[$table_name] =  $table_price[$table_name] + $price;;
    }
    if (gettype($table_compte2[$table_name]) == "NULL") {
      $table_compte2[$table_name] = 1;
    } else {
      $table_compte2[$table_name] = $table_compte2[$table_name] + 1;
    };
    if (!in_array($table_name, $table_nom2)) {
      array_push($table_nom2, $table_name);
      $bdd->query("DROP TABLE if exists $table_name");
    }
    if (!in_array($name, $nom)) {
      array_push($nom, $name);
      array_push($table_rarity, $rarity);
      array_push($table_img, $img);
      array_push($table_perso, $perso);
      array_push($table_preview, $preview);
    }
    if (gettype($table_price_down2[$table_name]) == "NULL") {
      $table_price_down2[$table_name] = $price;
    } else {
      if ($price < $table_price_down2[$table_name]) {
        $table_price_down2[$table_name] = $price;
      }
    };

    if (gettype($table_price_up2[$table_name]) == "NULL") {
      $table_price_up2[$table_name] = $price;
    } else {
      if ($price > $table_price_up2[$table_name]) {
        $table_price_up2[$table_name] = $price;
      }
    };

    $bdd->query("CREATE TABLE if not exists $table_name  (token VARCHAR(255), duration INT,price INT,date DATETIME Default CURRENT_TIMESTAMP )");
    $insert = $bdd->prepare("INSERT INTO  $table_name (token, duration, price) VALUES(:token, :duration, :price)");
    $insert->execute(array(
      'price' => $price,
      'duration' => $period,
      'token' => $token
    ));
  }
}

$bdd = new PDO("mysql:host=localhost;dbname=nft_rent_buy;charset=utf8", "root", "");
$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
for ($index = 0; $index < count($table_price2); $index++) {
  $moyenne = $table_price2[$table_nom2[$index]] / $table_compte2[$table_nom2[$index]];
  $bdd->query("CREATE TABLE if not exists $table_nom2[$index]  (price_UP DECIMAL(60,2), price_DOWN DECIMAL(60,2), price_moyen DECIMAL(60,2), price_all DECIMAL(60,2), stock INT,diff_price_UP DECIMAL(60,2), diff_price_DOWN DECIMAL(60,2), diff_price_moyen DECIMAL(60,2), diff_price_all DECIMAL(60,2), diff_stock DECIMAL(60,2), date DATETIME Default CURRENT_TIMESTAMP )");
  $rqut_nb = $bdd->query("SELECT * FROM  $table_nom2[$index]  order by date desc limit 0,1")->fetch();


  $insert = $bdd->prepare("INSERT INTO  $table_nom2[$index] (price_UP, price_DOWN, price_moyen, price_all, stock, diff_price_UP , diff_price_DOWN , diff_price_moyen , diff_price_all , diff_stock ) VALUES(:price_UP, :price_DOWN, :price_moyen, :price_all, :stock,:diff_price_UP , :diff_price_DOWN , :diff_price_moyen , :diff_price_all , :diff_stock)");
  $insert->execute(array(
    'price_UP' => $table_price_up2[$table_nom2[$index]],
    'price_DOWN' => $table_price_down2[$table_nom2[$index]],
    'price_moyen' => $moyenne,
    'price_all' => $table_price2[$table_nom2[$index]],
    'stock' => $table_compte2[$table_nom2[$index]],
    'diff_price_UP' => $table_price_up2[$table_nom2[$index]] - $rqut_nb['price_UP'],
    'diff_price_DOWN' => $table_price_down2[$table_nom2[$index]] - $rqut_nb['price_DOWN'],
    'diff_price_moyen' => $moyenne - $rqut_nb['price_moyen'],
    'diff_price_all' => $table_price2[$table_nom2[$index]] - $rqut_nb['price_all'],
    'diff_stock' => $table_compte2[$table_nom2[$index]] - $rqut_nb['stock']
  ));
}

$bdd3 = new PDO("mysql:host=localhost;dbname=nft_rent_buy;charset=utf8", "root", "");
$bdd3->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$bdd = new PDO("mysql:host=localhost;dbname=nft_calcul;charset=utf8", "root", "");
$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$bdd4 = new PDO("mysql:host=localhost;dbname=users;charset=utf8", "root", "");
$bdd4->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$bdd4->query("DROP TABLE if exists list_nft");
$bdd4->query("CREATE TABLE list_nft (preview text, img TEXt, nom varchar(100) PRIMARY KEY, perso text, rarity text,price_moyen_buy DECIMAL(60,2), price_moyen_rent DECIMAL(60,2), stock_buy DECIMAL(60,2), stock_rent DECIMAL(60,2),diff_price_moyen_buy DECIMAL(60,2), diff_price_moyen_rent DECIMAL(60,2), diff_stock_buy DECIMAL(60,2), diff_stock_rent DECIMAL(60,2),  date DATETIME Default CURRENT_TIMESTAMP )");
$long = count($nom);
for ($i = 0; $i < $long; $i++) {
  $nom2 = strtolower(str_replace(array(' ', "'"), '', $nom[$i]));
  $calcul = 0;
  $calcul2 = 0;
  $stock1 = 0;
  $stock2 = 0;
  $stockall2 = 0;
  $stockall1 = 0;
  $P1 = $bdd3->query("SHOW TABLES LIKE '$nom2%buy' ")->fetchAll();
  $P2 = $bdd3->query("SHOW TABLES LIKE '$nom2%rent' ")->fetchAll();
  foreach ($P1 as $P11) {
    $P11 = str_replace(" ", "", $P11);
    $array_price_P1 = $bdd3->query("SELECT price_moyen FROM $P11[0] order by date desc limit 0,1")->fetch();
    $calcul = $calcul + $array_price_P1[0];
    $stock1 = $stock1 + 1;
    $array_stock_P1 = $bdd3->query("SELECT stock FROM $P11[0] order by date desc limit 0,1")->fetch();
    $stockall1 = $stockall1 + $array_stock_P1[0];
  }
  foreach ($P2 as $P21) {
    $P21 = str_replace(" ", "", $P21);
    $array_P2 = $bdd3->query("SELECT price_moyen FROM $P21[0] order by date desc limit 0,1")->fetch();
    $calcul2 = $calcul2 + $array_P2[0];
    $stock2 = $stock2 + 1;
    $array_stock_P2 = $bdd3->query("SELECT stock FROM $P21[0] order by date desc limit 0,1")->fetch();
    $stockall2 = $stockall2 + $array_stock_P2[0];
  }

  $bdd->query("CREATE TABLE if not exists $nom2 (preview text, img TEXt, nom varchar(100), perso text, rarity text, price_moyen_buy DECIMAL(60,2), price_moyen_rent DECIMAL(60,2), stock_buy INT, stock_rent INT,diff_price_moyen_buy DECIMAL(60,2), diff_price_moyen_rent DECIMAL(60,2), diff_stock_buy DECIMAL(60,2), diff_stock_rent DECIMAL(60,2),  date DATETIME Default CURRENT_TIMESTAMP )");
  $rqut_nb = $bdd->query("SELECT * FROM  $nom2  order by date desc limit 0,1")->fetch();
  $insert = $bdd->prepare("INSERT INTO  $nom2 (preview, img, nom, perso, rarity,price_moyen_buy, price_moyen_rent, stock_buy, stock_rent,diff_price_moyen_buy , diff_price_moyen_rent , diff_stock_buy , diff_stock_rent ) VALUES(:preview, :img, :nom, :perso, :rarity, :price_moyen_buy, :price_moyen_rent, :stock_buy, :stock_rent, :diff_price_moyen_buy, :diff_price_moyen_rent, :diff_stock_buy, :diff_stock_rent)");
  $insert->execute(array(
    'preview' => $table_preview[$i],
    'img' => $table_img[$i],
    'nom' => $nom[$i],
    'perso' => $table_perso[$i],
    'rarity' => $table_rarity[$i],
    'price_moyen_buy' => $calcul / $stock1,
    'price_moyen_rent' => $calcul2 / $stock2,
    'stock_buy' => $stockall1,
    'stock_rent' => $stockall2,
    'diff_price_moyen_buy' => ($calcul / $stock1) - $rqut_nb["price_moyen_buy"],
    'diff_price_moyen_rent' => ($calcul2 / $stock2) - $rqut_nb["price_moyen_rent"],
    'diff_stock_buy' => $stockall1 - $rqut_nb["diff_stock_buy"],
    'diff_stock_rent' =>   $stockall2  - $rqut_nb["diff_stock_rent"]
  ));
}
$P3 = $bdd->query("SHOW TABLES LIKE '%' ")->fetchAll();
foreach ($P3 as $P31) {
  $P31 = str_replace(" ", "", $P31);
  $array_P3 = $bdd->query("SELECT * FROM $P31[0] order by date desc limit 0,1")->fetch();
  $insert = $bdd4->prepare("INSERT ignore into list_nft(preview, img, nom, perso, rarity,price_moyen_buy, price_moyen_rent, stock_buy, stock_rent,diff_price_moyen_buy , diff_price_moyen_rent , diff_stock_buy , diff_stock_rent) VALUES(:preview, :img, :nom, :perso, :rarity, :price_moyen_buy, :price_moyen_rent, :stock_buy, :stock_rent, :diff_price_moyen_buy, :diff_price_moyen_rent, :diff_stock_buy, :diff_stock_rent)");
  $insert->execute(array(
    'preview' => $array_P3[0],
    'img' => $array_P3[1],
    'nom' => $array_P3[2],
    'perso' => $array_P3[3],
    'rarity' => $array_P3[4],
    'price_moyen_buy' => $array_P3[5],
    'price_moyen_rent' => $array_P3[6],
    'stock_buy' => $array_P3[7],
    'stock_rent' => $array_P3[8],
    'diff_price_moyen_buy' => $array_P3[9],
    'diff_price_moyen_rent' => $array_P3[10],
    'diff_stock_buy' => $array_P3[11],
    'diff_stock_rent' => $array_P3[12]
  ));
}

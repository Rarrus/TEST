<?php
error_reporting(E_ALL);
if (isset($_GET['nom'])) {
  $nom = htmlspecialchars($_GET['nom']);
  $nom2 = strtolower(str_replace(" ", "", $nom));
  $bdd_info = new PDO("mysql:host=localhost;dbname=users;charset=utf8", "root", "");
  $execute = $bdd_info->prepare("SELECT preview FROM list_nft where nom = ?");
  $execute->execute(array($nom));
  $data["preview"] = ($execute->fetch())[0];
  $bdd = new PDO("mysql:host=localhost;dbname=nft_rent_buy;charset=utf8", "root", "");
  $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $P1 = $bdd->query("SHOW TABLES LIKE '$nom2%' ")->fetchAll();
  array_push($P1, "a");
  for ($i = 0; $i < (count($P1) - 1); $i++) {
    $row = array();
    $P11 = $P1[$i][0];
    $query = $bdd->query("SELECT * FROM $P11  order by date desc limit 0,1")->fetch();
    if ($P1[$i + 1][0] == str_replace("buy", "rent", $P1[$i][0])) {
      $i2 = $i + 1;
      $P11 = $P1[$i2][0];
      $query2 = $bdd->query("SELECT * FROM $P11 order by date desc limit 0,1")->fetch();
      $row["nom"] = $P1[$i][0];
      array_push($row, $query2);
      array_push($row, $query );
      $response[] = $row;
    }else{
      $row["nom"] = $P1[$i][0];
      array_push($row, $query);
      $response[] = $row;

    }
  }





  $data["data"] = $response;

  header('Content-Type: application/json');
  header('Access-Control-Allow-Origin: *');

  echo json_encode($data, JSON_PRETTY_PRINT);
} else {
  header('location: index.php');
  die();
}

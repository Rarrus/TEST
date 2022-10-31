<?php
$bdd = new PDO("mysql:host=localhost;dbname=users;charset=utf8", "root", "");
$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$query = $bdd ->  query("SELECT * FROM list_nft");

while ($row = $query -> fetch()) {
  $response[] = $row;
}
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

echo json_encode($response, JSON_PRETTY_PRINT);
?>

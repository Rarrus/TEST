<?php
# ACHAT

use function PHPSTORM_META\type;

$table_price = array();
$table_compte = array();
$table_nom = array();
$table_price_down = array(0 => 0, 1 => 1, 2 =>2);
$table_price_up = array();

echo gettype($table_price_down[0]);
if (gettype($table_price_down[3]) == "NULL"){
  echo 36;
};


<?php
require 'vendor/autoload.php';

try {
  //$link = new MongoDB\Client("mongodb://localhost:27017");
  $link = new MongoDB\Client("mongodb://localhost");
  $bd = $link->pruebaDB;
  // operaciones

} catch (Exception $e) {
  print($e);
  die();
}
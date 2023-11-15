<?php
require 'conectionPDO.php';

$results = $link->query('SELECT * FROM clients');

$results->bindColumn('id', $id);
$results->bindColumn('first_name', $first_name);
$results->bindColumn('cars', $cars);
$results->bindColumn('vip', $vip);

while ($results->fetch(PDO::FETCH_BOUND)) {
  echo "<li>$id: $first_name, $cars coches - $vip</li>";
}

$results = null;
$link = null;

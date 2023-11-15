<?php
require 'conectionPDO.php';

$results = $link->query('SELECT * FROM clients');

while ($client = $results->fetch(PDO::FETCH_OBJ)) {
  echo "<li>$client->id: $client->first_name, $client->vip</li>";
}

$results = null;
$link = null;

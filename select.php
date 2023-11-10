<?php
$link = new mysqli('localhost', 'root', '', 'pruebas');

$results = $link->query('SELECT * FROM clients');

while ($client = $results->fetch_object()) {
  echo "<li>$client->id: $client->first_name, $client->vip</li>";
}

$results->free();

$link->close();

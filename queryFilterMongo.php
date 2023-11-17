<?php

require 'connectionMongo.php';

echo "<p>Todos los clientes</p>";
echo "<ul>";
$clients = $bd->clients->find(['ciclo' => 'DAW']);
foreach($clients as $client) {
  echo "<li> $client->nombre ($client->ciclo) de $client->edad años. </li>";
}

echo "</ul>";
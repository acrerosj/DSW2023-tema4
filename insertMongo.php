<?php

require 'connectionMongo.php';

$res = $bd->clients->insertOne([
  "nombre" => "Andrés",
  "ciclo" => 'DAW',
  'edad' => 19
]);

echo "Id del último registro: {$res->getInsertedId()} <br>";

$res = $bd->clients->insertMany([
  ['nombre' => 'Marta', 'ciclo' => 'ASIR','edad' => 21],
  ['nombre' => 'Pepe', 'ciclo' => 'ASIR','edad' => 24],
  ['nombre' => 'Julia', 'ciclo' => 'DAW','edad' => 22],

]);

echo "Documentos insertados: {$res->getInsertedCount()} <br>";
print_r($res->getInsertedIds());

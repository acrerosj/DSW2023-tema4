<?php

require 'connectionMongo.php';
echo "Quedan en la colección clients: " . $bd->clients->count();
$deleteResult = $bd->clients->deleteOne(['nombre' => 'Pepe']);
echo "<br>Quedan en la colección clients: " . $bd->clients->count();
<?php
require 'conection.php';

$results = $link->query('SELECT * FROM clients WHERE vip=1');

$link -> autocommit(FALSE);

$stmt_insert = $link->stmt_init();
$stmt_insert->prepare("INSERT INTO clientsVIP (name, cars) VALUES(?, ?)");
$stmt_insert->bind_param("si", $name, $cars);

$stmt_delete = $link->stmt_init();
$stmt_delete->prepare("DELETE FROM clients WHERE id=?");
$stmt_delete->bind_param("i", $id);

while ($client = $results->fetch_object()) {
  // Comprobar si es cars==0 para anular la transacción.
  if ($client->cars==0) {
    echo "Se aborta porque el cliente con id=" .$client->id . " tiene 0 coches";
    $link -> rollback();
    exit();
  }
  
  // Insertar en la nueva tabla
  $name = $client->first_name;
  $cars = $client->cars;
  $stmt_insert->execute();
  echo "<p>Se inserta el cliente $name con el número de coches $cars</p>";
  
  // Borrar de la tabla
  $id = $client->id;
  $stmt_delete->execute();
  echo "<p>Se ha borrado el cliente con el id = $id</p>";
}

if (!$link -> commit()) {
  echo "Commit transaction failed";
  exit();
}
$stmt_insert->close();
$stmt_delete->close();
$link->close();
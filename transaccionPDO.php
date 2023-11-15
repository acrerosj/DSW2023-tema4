<?php
require 'conectionPDO.php';

$results = $link->query('SELECT * FROM clients WHERE vip=1');

$link->beginTransaction();

$stmt_insert = $link->prepare("INSERT INTO clientsVIP (name, cars) VALUES(:name, :cars)");
$stmt_insert->bindParam(":name", $name);
$stmt_insert->bindParam(":cars", $cars);

$stmt_delete = $link->prepare("DELETE FROM clients WHERE id=:id");
$stmt_delete->bindParam(":id", $id);

while ($client = $results->fetch(PDO::FETCH_OBJ)) {
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
//$result = null;
unset($result);
$stmt_insert=null;
$stmt_delete=null;
$link=null;
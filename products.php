<?php
  if (isset($_POST['name'])) {
    $file = fopen('products.csv','a');
    $name = $_POST['name'];
    $price = $_POST['price'];
    $stock = $_POST['stock'];
    fwrite($file, "$name;$price;$stock" . PHP_EOL);
    fclose($file);
  }
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Products</title>
</head>
<body>
  <h1>Listado de productos</h1>
  <table>
    <thead>
      <tr>
        <th>Nombre</th>
        <th>Precio</th>
        <th>Stock</th>
      </tr>
    </thead>
    <tbody>
<?php
  $file = fopen('products.csv','r');
  if (!$file) die("ERROR AL ABRIR EL FICHERO");
  while($product = fgets($file)) {
    list($name,$price,$stock) = explode(';',$product);
  // while (fscanf($file, "%s;%s;%s", $name,$price,$stock)) {
?>
      <tr>
        <td><?=$name?></td>
        <td><?=$price?>€</td>
        <td><?=$stock?></td>
      </tr>      
<?php
  }
?>      
    </tbody>
  </table>
  <form action="" method="post">
    <p><input type="text" name="name" placeholder="nombre"></p>
    <p><input type="number" step="0.01" name="price" placeholder="precio"></p>
    <p><input type="number" name="stock" placeholder="stock"></p>
    <p><input type="submit" value="Insertar"></p>
  </form>
</body>
</html>
<?php
fclose($file);
?>
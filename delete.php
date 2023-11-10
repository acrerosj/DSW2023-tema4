<?php
@$link = new mysqli('localhost', 'root', '', 'pruebas');
//echo $link->server_info;

$error = $link->connect_errno;

if ($error == null) {
  echo "<p>Conexión establecida correctamente</p>";
  $sql = "DELETE FROM clientazos WHERE birthday < '1955-01-01';";
  @$result = $link->query($sql);
  if ($result) {
    echo "<p>Se han borrado $link->affected_rows registros.</p>";
  } else {
    echo "<p>Se produjo un error al hacer la consulta.</p>";
  }
  $link->close();
} else {
  echo "<p>HAY UN ERROR CHUNGO: $link->connect_error</p>";
}
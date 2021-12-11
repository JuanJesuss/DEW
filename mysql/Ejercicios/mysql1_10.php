<?php
//CON DELETE

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "db1";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// sql to delete a record
$sql = "DELETE FROM clientes WHERE id=3";

if (mysqli_query($conn, $sql)) {
  echo "La fila se eliminó correctamente.";
} else {
  echo "Error al eliminar la fila: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
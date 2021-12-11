<?php
//CON ORDER BY

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

$sql = "SELECT id, nombre, apellido FROM clientes ORDER BY apellido";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
    echo "id: " . $row["id"]. " - Name: " . $row["nombre"]. " - Apellido: " . $row["apellido"]. "<br>";
  }
} else {
  echo "0 results";
}

mysqli_close($conn);
?>
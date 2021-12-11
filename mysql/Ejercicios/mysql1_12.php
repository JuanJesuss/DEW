<?php
//SELECT CON LIMIT

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

//$sql = "SELECT * FROM clientes LIMIT 5";coge las 5 primeras filas
$sql = "SELECT * FROM clientes LIMIT 5 OFFSET 5";//coge a partir de la sexta fila, cinco filas
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  echo "<table>
  <tr>
  <th>ID</th>
  <th>Nombre</th>
  </tr>";
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
    //echo "id: ".$row["id"]." - Nombre: ".$row["nombre"]." - Apellido: ".$row["apellido"]."<br>";
    echo "<tr>
    <td>".$row["id"]."</td>
    <td>".$row["nombre"]." ".$row["apellido"]."</td>
    </tr>";
  }
  echo "</table>";
} else {
  echo "0 results";
}

mysqli_close($conn);
?>
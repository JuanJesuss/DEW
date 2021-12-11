<?php
/*Inserción en tabla - MySQLi procedural*/

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "empleados1n";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "INSERT INTO departamento (cod_departamento, nombre) VALUES ('D001', 'CONTABILIDAD')";

if (mysqli_query($conn, $sql)) {
    echo "Inserción creada correctamente";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>


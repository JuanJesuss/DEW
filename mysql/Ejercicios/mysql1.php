<?php

$servername= "localhost";
$username= "root";
$password= "root";

//para abrir conexión a myqsl
$conn= mysqli_connect($servername, $username, $password);

//chequeamos conexión
if(!$conn){
    die("Connection failed: ".mysqli_connect_error());
}
echo "Connected successfully";

?>
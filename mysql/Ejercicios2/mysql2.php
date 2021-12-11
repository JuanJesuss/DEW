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
else{
    echo "Connected successfully<br>";
}

//creamos base de datos empleados1n
$sql= "create database empleados1n";
if(mysqli_query($conn ,$sql)){
    echo "Database created successfully";
}
else{
    echo "Error creating database: ".mysqli_error($conn);
}

//cerramos conexión
mysqli_close($conn);

?>
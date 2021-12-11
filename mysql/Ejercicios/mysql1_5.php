<?php

$servername= "localhost";
$username= "root";
$password= "root";
$dbname= "db1";

//abrimos conexión
$conn= mysqli_connect($servername, $username, $password, $dbname);

//chequeamos conexión
if(!$conn){
    die("Connection failed: ".mysqli_connect_error());
}
else{
    $sql= "insert into clientes(nombre, apellido, email)
    values('Carlos', 'Pérez', 'c.perez@example.com');";
    $sql .="insert into clientes(nombre, apellido, email)
    values('Pedro', 'Garcia', 'p.garcia@example.com');";
    $sql .="insert into clientes(nombre, apellido, email)
    values('Ana', 'Rodriguez', 'a.rodriguez@example.com')";
}

if(mysqli_multi_query($conn, $sql)){
    echo "Se insertaron los datos correctamente.";
}
else{
    echo "Error: ".$sql."<br>".mysqli_error($conn);
}

//cerramos conexión
mysqli_close($conn);

?>
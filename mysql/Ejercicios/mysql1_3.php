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
    values('John', 'Smith', 'j.smith@example.com')";
}

if(mysqli_query($conn, $sql)){
    echo "Se insertaron los datos correctamente.";
}
else{
    echo "Error: ".$sql."<br>".mysqli_error($conn);
}

//cerramos conexión
mysqli_close($conn);

?>
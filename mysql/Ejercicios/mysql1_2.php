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
    $sql= "create table clientes(id int(6) unsigned auto_increment primary key,
    nombre varchar(30) not null,
    apellido varchar(30) not null,
    email varchar(50),
    fecha_alta timestamp
    )";
}
//unsigned --> números positivos y cero
//timestamp --> Formato: AAAA-MM-DD hh: mm: ss. La inicialización automática y la actualización a la fecha y hora actuales se pueden especificar usando DEFAULT CURRENT_TIMESTAMP y ON UPDATE CURRENT_TIMESTAMP en la definición de columna

if(mysqli_query($conn, $sql)){
    echo "Tabla clientes creada correctamente";
}
else{
    echo "Error al crear la tabla: ".mysqli_error($conn);
}

//cerramos conexión
mysqli_close($conn);

?>
<?php

$servername= "localhost";
$username= "root";
$password= "root";
$dbname= "empleados1n";

//abrimos conexión
$conn= mysqli_connect($servername, $username, $password, $dbname);

//chequeamos conexión
if(!$conn){
    die("Connection failed: ".mysqli_connect_error());
}
else{
    $sql= "create table departamento(cod_departamento varchar(4),
    nombre char(20) not null);";

    $sql .="create table empleado(dni VARCHAR(9),
    nombre VARCHAR(40) not null,
    apellidos VARCHAR(40) not null,
    fecha_nac DATE not null,
    salario	DOUBLE,
    cod_departamento VARCHAR(4));";

    $sql .="ALTER TABLE departamento ADD CONSTRAINT pk_departamento 
    PRIMARY KEY (cod_departamento);";
    
    $sql .="ALTER TABLE empleado ADD CONSTRAINT pk_empleado 
    PRIMARY KEY (dni);";

    $sql .="ALTER TABLE empleado ADD CONSTRAINT fk_empleado FOREIGN KEY (cod_departamento) REFERENCES departamento(cod_departamento);";
}

if(mysqli_multi_query($conn, $sql)){
    echo "Se ha creado correctamente";
}
else{
    echo "Error al crear la tabla: ".mysqli_error($conn);
}

//cerramos conexión
mysqli_close($conn);

?>
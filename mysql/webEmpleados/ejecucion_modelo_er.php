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

$sql= "create database empleadosnn;";

$sql .="use empleadosnn;";

$sql .="CREATE TABLE departamento(cod_dpto VARCHAR(4),
 nombre_dpto VARCHAR(40));";

$sql .="CREATE TABLE empleado
(dni VARCHAR(9),
 nombre VARCHAR(40),
 apellidos VARCHAR(40),
 fecha_nac DATE,
 salario DOUBLE);";
    
$sql .="CREATE TABLE emple_depart
(dni VARCHAR(9),
 cod_dpto   VARCHAR(4),
 fecha_ini  DATETIME,
 fecha_fin DATETIME);";

$sql .="ALTER TABLE departamento ADD CONSTRAINT pk_departamento 
PRIMARY KEY (cod_dpto);";

$sql .="ALTER TABLE empleado ADD CONSTRAINT pk_empleado 
PRIMARY KEY (dni);";

$sql .="ALTER TABLE emple_depart ADD CONSTRAINT pk_emple_depart
PRIMARY KEY (dni,cod_dpto,fecha_ini);";

$sql .="ALTER TABLE emple_depart
ADD CONSTRAINT fk_empledepart_dni FOREIGN KEY (dni) 
REFERENCES empleado(dni);";

$sql .="ALTER TABLE emple_depart
ADD CONSTRAINT fk_empledepart_cd FOREIGN KEY (cod_dpto) 
REFERENCES departamento(cod_dpto);";

}

if(mysqli_multi_query($conn ,$sql)){
    echo "Ejecución correcta";
}
else{
    echo "Error: ".mysqli_error($conn);
}

//cerramos conexión
mysqli_close($conn);

?>
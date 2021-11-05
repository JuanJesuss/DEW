<!DOCTYPE html>

<html>

<head>
<title>Datos alumnos</title>
<link href="estilos.css" rel="stylesheet" type="text/css"/>
</head>

<body>
<h1>Datos alumnos</h1>

<?php

$nombre=$_POST["nombre"];
$apellido1=$_POST["apellido1"];
$apellido2=$_POST["apellido2"];
$email=$_POST["email"];

require "funciones.php";

if($nombre==""){
    no_hay_nombre($apellido1, $apellido2, $email);
}

elseif($email==""){
    no_hay_email($nombre, $apellido1, $apellido2);
}

elseif(isset($_POST["r"])==false){
    no_hay_sexo($nombre, $apellido1, $apellido2, $email);
}

else{
    campos_correctos($nombre, $apellido1, $apellido2, $email);
}

?>

</body>

</html>
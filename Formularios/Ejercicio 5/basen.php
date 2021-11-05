<!DOCTYPE html>

<html>

<head>
<title>Cambio de Base</title>
</head>

<body>
<h1>Cambio de Base</h1>

<?php

$cadena=$_POST["numero_base"];
$num_base= explode("/",$cadena); //sirve para partir una cadena hasta el caracter especificado, y convertirla en un array.
$numero=$num_base[0];//obtenemos el número
$base=$num_base[1];//obtenemos la base
$nueva_base=$_POST["nueva_base"];//obtenemos la nueva base

echo "N&uacutemero ".$numero." en base ".$base." = ";
require "funcion.php";
echo convertir($numero, $base, $nueva_base);
echo " en base ".$nueva_base; 

?>

</body>

</html>


<!DOCTYPE html>

<html>

<head>
<title>IPs</title>
</head>

<body>
<h1>IPs</h1>

<?php

$ip_decimal=$_POST["ip_decimal"];
$numeros= explode(".",$ip_decimal); //sirve para partir una cadena hasta el caracter especificado, y convertirla en un array.
require "funcion.php";

if($numeros[0]<0 || $numeros[0]>255 || $numeros[1]<0 || $numeros[1]>255 || $numeros[2]<0 || $numeros[2]>255 || $numeros[3]<0 || $numeros[3]>255)//si el primer, segundo, tercer o cuarto número fuera menor a 0 o mayor a 255, la IP no sería correcta
{
    echo "La direcci&oacuten IP no es correcta";
}
else
{
    ipdecimal_ipbinario($ip_decimal, $numeros);
}


?>

</body>

</html>
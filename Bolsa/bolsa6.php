<!DOCTYPE html>

<html>

<head>
<title>La Bolsa</title>
<meta charset="utf-8">
<link href="espacio-entre-columnas.css" rel="stylesheet" type="text/css"/>
</head>

<body>
<h1>La Bolsa</h1>

<?php

require "funciones_bolsa.php";
$mi_fichero= "ibex35.txt";
$valor_bursatil_1=$_POST["valor_bursatil_uno"];
$valor_bursatil_2=$_POST["valor_bursatil_dos"];
$valor_bursatil_1= strtoupper($valor_bursatil_1);//pasamos a mayusculas
$valor_bursatil_2= strtoupper($valor_bursatil_2);//pasamos a mayusculas
mostrar_minima_cotizacion_y_media_volumen($mi_fichero, $valor_bursatil_1, $valor_bursatil_2);

?>

</body>

</html>
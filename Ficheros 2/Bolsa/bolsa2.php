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
$valor_bursatil=$_POST["nombre_valor_bursatil"];
$valor_bursatil= strtoupper($valor_bursatil);//pasamos a mayusculas
mostrar_datos_valor_bursatil($mi_fichero, $valor_bursatil);

?>

</body>

</html>
<!DOCTYPE html>

<html>

<head>
<title>La Bolsa</title>
<meta charset="utf-8">
</head>

<body>
<h1>Consulta Operaciones Bolsa</h1>

<?php

require "funciones_bolsa.php";
$mi_fichero= "ibex35.txt";
$nombre_valor_bursatil= $_POST["valor"];
$campo= $_POST["campo"];
$nombre_valor_bursatil= strtoupper($nombre_valor_bursatil);//pasamos a mayusculas
consultar_bolsa($mi_fichero, $nombre_valor_bursatil, $campo);

?>

</body>

</html>
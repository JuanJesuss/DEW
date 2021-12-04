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
$campo= $_POST["campo"];
total_valores($mi_fichero, $campo);

?>

</body>

</html>
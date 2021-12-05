<!DOCTYPE html>

<html>

<head>
<title>La Bolsa</title>
<meta charset="utf-8">
</head>

<body>

<h1>Consulta Bolsa</h1>

<?php

require "funciones_bolsa.php";
$mi_fichero= "ibex35.txt";
maxcot_mincot_mayorvol_menorvol_maxcapi_menorcapi($mi_fichero);

?>

</body>

</html>
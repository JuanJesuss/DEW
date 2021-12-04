<!DOCTYPE html>

<html>

<head>
<title>Bolsa 1</title>
<meta charset="utf-8">
<link href="espacio-entre-columnas.css" rel="stylesheet" type="text/css"/>
</head>

<body>

<?php

require "funciones_bolsa.php";
$mi_fichero= "ibex35.txt";
leer_datos_fichero($mi_fichero);

?>

</body>

</html>
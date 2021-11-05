<!DOCTYPE html>

<html>

<head>
<title>Calculadora</title>
</head>

<body>
<h1>CONVERSOR BINARIO</h1>

<?php

$num1=$_POST["decimal"];

echo "Número decimal: <input type=text value=$num1><br><br>";

require "funcion.php";

decimalAbinario($num1);


?>

</body>

</html>
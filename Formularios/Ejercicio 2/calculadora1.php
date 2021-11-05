<!DOCTYPE html>

<html>

<head>
<title>Calculadora</title>
</head>

<body>
<h1>CALCULADORA</h1>

<?php

$num1=$_POST["operando1"];
$num2=$_POST["operando2"];

echo "Operando1: <input type=text value=$num1><br><br>";
echo "Operando2: <input type=text value=$num2><br><br>";

require "funciones.php";

if($_POST["r"]=="suma"){
    sumarNumeros($num1,$num2);
}
elseif($_POST["r"]=="resta"){
    restarNumeros($num1,$num2);
}
elseif($_POST["r"]=="producto"){
    productoNumeros($num1,$num2);
}
elseif($_POST["r"]=="division"){
    divisionNumeros($num1,$num2);
}

?>

</body>

</html>
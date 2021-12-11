<!DOCTYPE html>

<html>

<head>
<title>Prueba</title>
<meta charset="utf-8">
</head>

<body>

<?php

/*
require "funciones_bolsa.php";
$mi_fichero= "ibex35.txt";
$valor_bursatil=$_POST["nombre_valor_bursatil"];
$valor_bursatil= strtoupper($valor_bursatil);//pasamos a mayusculas
mostrar_datos_valor_bursatil($mi_fichero, $valor_bursatil);
*/

$letra= "D";
$num= 0;
$num+=1000;
if($num>0 && $num<10){
    echo $letra.str_repeat("0", 2).$num;
}

if($num>9 && $num<100){
    echo $letra.str_repeat("0", 1).$num;
}

if($num>99 && $num <1000){
    echo $letra.$num;
}

//echo $cod_dpto."<br>";
//$string = substr(str_repeat(0, $length).$number, - $length);

//output: 0000098765
/*
$num= 0;
$valor= sprintf('%0004d', $num);
$valor++;
echo $valor;
*/


?>

</body>

</html>
<!DOCTYPE HTML>

<html>

<head>
<title>Ej4 Arrays unidimensionales</title>
<link href="ej4aEstilos.css" rel="stylesheet" type="text/css" />
</head>

<body>

<?php

$numeros= array();//definimos array numeros

for($i=0; $i<20; $i++){
$numeros[$i]= decbin($i);//creamos indices de 0 a 19, y definimos a cada uno su valor en binario
}

rsort($numeros);//ordenamos los valores en orden inverso

echo "
<table>
<tr>
<th>Indice</th>
<th>Binario orden inverso</th>
<th>Octal</th>
</tr>";
foreach($numeros as $clave => $valor){//recorremos el array asociativamente
    
$octal= base_convert($clave,10,8);//convertimos el indice en octal    

//mostramos índice, su valor en binario y su valor en octal
echo "
<tr>
<td>$clave</td>
<td>$valor</td>
<td>$octal</td>
</tr>";
}

echo"</table>";

?>

</body>

</html>
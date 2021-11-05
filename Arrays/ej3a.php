<!DOCTYPE HTML>

<html>

<head>
<title>Ej3 Arrays unidimensionales</title>
<link href="ej3aEstilos.css" rel="stylesheet" type="text/css" />
</head>

<body>

<?php

$numeros= array();//definimos array numeros

for($i=0; $i<20; $i++){
$numeros[$i]= decbin($i);//creamos indices de 0 a 19, y definimos a cada uno su valor en binario
}

echo "
<table>
<tr>
<th>Indice</th>
<th>Binario</th>
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
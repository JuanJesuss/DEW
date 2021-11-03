<!DOCTYPE HTML>

<html>

<head>
<title>Ej1 Arrays unidimensionales</title>
<link href="ej1aEstilos.css" rel="stylesheet" type="text/css" />
</head>

<body>

<?php

$numeros=array();//definimos el array 

for($i=1; $i<=40; $i+=2){
    array_push($numeros, $i);//introducimos al array los 20 primeros números impares
}

$longitud= count($numeros);//definimos la longitud del array

$suma=0;
echo "
<table>
<tr>
<th>Indice</th>
<th>Valor</th>
<th>Suma</th>
</tr>";
for($i=0; $i<$longitud; $i++){
$suma=$suma+$numeros[$i];
echo "
<tr>
<td>$i</td>
<td>$numeros[$i]</td>
<td>$suma</td>
</tr>";
}
echo"</table>";

?>

</body>

</html>
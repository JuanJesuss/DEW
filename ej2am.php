<!DOCTYPE HTML>

<html>

<head>
<title>Ej2 Arrays multidimensionales</title>
<link href="ej2amEstilos.css" rel="stylesheet" type="text/css" />
</head>

<body>

<?php

$array1= array();//creamos el array 1
for($i=2; $i<=6; $i+=2){
    array_push($array1, $i);//llenamos array1 con los multiplos de 2, de 2 a 6
}

$array2= array();//creamos array 2
for($i=8; $i<=12; $i+=2){
    array_push($array2, $i);//llenamos array2 con los multiplos de 2, de 8 a 12
}

$array3= array();//creamos el array 3
for($i=14; $i<=18; $i+=2){//llenamos array3 con los multiplos de 2, de 14 a 18
    array_push($array3, $i);
}

$matriz= array ($array1, $array2, $array3);//llenamos la matriz con los tres arrays

//MOSTRAMOS LA SUMA DE LOS ELEMENTOS POR FILAS
echo "
<p>Suma por filas:</p>
<table>";
for($fila=0; $fila<3; $fila++){
    $suma_filas=0;
    for($col=0; $col<3; $col++){
        $suma_filas= $suma_filas+$matriz[$fila][$col];
    }
        echo "
        <tr>
        <td>$suma_filas</td>
        </tr>";
}
echo "</table><br>";


//MOSTRAMOS LA SUMA DE LOS ELEMENTOS POR COLUMNAS
echo "
<p>Suma por columnas:</p>
<table>
<tr>";
for($fila=0; $fila<3; $fila++){
    $suma_columnas=0;    
    for($col=0; $col<3; $col++){
        $suma_columnas= $suma_columnas+$matriz[$col][$fila];
    }
    echo "
    <td>$suma_columnas</td>";  
}
echo "
</tr>
</table>";



?>

</body>

</html>

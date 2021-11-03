<!DOCTYPE HTML>

<html>

<head>
<title>Ej1 Arrays multidimensionales</title>
<link href="ej1amEstilos.css" rel="stylesheet" type="text/css" />
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

//imprimimos la matriz
echo "<table>";
for($fila=0; $fila<3; $fila++){
echo "<tr>";
    for($col=0; $col<3; $col++){
        echo "<td>".$matriz[$fila][$col]."</td>";
    }
    echo "</tr>";
}
echo "</table>";


?>

</body>

</html>



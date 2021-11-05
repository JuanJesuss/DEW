<!DOCTYPE HTML>

<html>

<head>
<title>Ej5 Arrays multidimensionales</title>
<meta charset="utf-8"/>
</head>

<body>

<?php

//creamos la matriz 5x3
$matriz= array (array(0, 1, 2), array(1, 2, 3), array(2, 3, 4), array(3, 4, 5), array(4, 5, 6));

//mostramos los elementos de la matriz por columnas
for($col=0; $col<3; $col++){
    echo "Columna: ".$col."<br>";
    for($fila=0; $fila<5; $fila++){
        echo $matriz[$fila][$col]."<br>";
    }
}


?>

</body>

</html>
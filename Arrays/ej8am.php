<!DOCTYPE HTML>

<html>

<head>
<title>Ej8 Arrays multidimensionales</title>
<meta charset="utf-8"/>
</head>

<body>

<?php

//definimos dos matrices de 3x3
$matriz_1= array(array(2, 3, 4), array(5, 2, 1), array(6, 1, 2));
$matriz_2= array(array(3, 4, 1), array(2, 1, 3), array(4, 5, 1));


//obtenemos la suma de ambas matrices
$suma=0;
for($fila=0; $fila<3; $fila++){
    for($col=0; $col<3; $col++){
        $suma= $suma+$matriz_1[$fila][$col]+$matriz_2[$fila][$col];
    }
}
echo "La suma de ambas matrices es: ".$suma."<br>";


//obtenemos el producto de la matriz 1
$producto=1;
for($fila=0; $fila<3; $fila++){
    for($col=0; $col<3; $col++){
        $producto= $producto*$matriz_1[$fila][$col];
    }
}
echo "El producto de la matriz 1 es: ".$producto."<br>";


//obtenemos el producto de la matriz 2
$producto=1;
for($fila=0; $fila<3; $fila++){
    for($col=0; $col<3; $col++){
        $producto= $producto*$matriz_2[$fila][$col];
    }
}
echo "El producto de la matriz 2 es: ".$producto;


?>

</body>

</html>
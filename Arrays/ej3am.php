<!DOCTYPE HTML>

<html>

<head>
<title>Ej3 Arrays multidimensionales</title>
<meta charset="utf-8"/>
</head>

<body>

<?php

//creamos la matriz 3x5
$matriz= array (array("Juan",7,"Casa",4,"Mesa"), array(6,"Sara","Carton",2,19), array("Arbol",33,44,"PC","Ratón"));


//mostramos las filas de la matriz
echo "<h1>FILAS</h1>";
$num_mayor=0;
for($fila=0; $fila<3; $fila++){
    echo "<p>Fila: ".$fila."<p>";
    echo "<ul>";
    for($col=0; $col<5; $col++){
        echo "<li>".$matriz[$fila][$col]."</li>";
    }
    echo "</ul>";
}


//mostramos las columnas de la matriz
echo "<h1>COLUMNAS</h1>";
for($col=0; $col<5; $col++){
    echo "<p>Columna: ".$col."<p>";
    echo "<ul>";
    for($fila=0; $fila<3; $fila++){
        echo "<li>".$matriz[$fila][$col]."</li>";
    }
    echo "</ul>";
}


?>

</body>

</html>

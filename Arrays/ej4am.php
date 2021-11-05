<!DOCTYPE HTML>

<html>

<head>
<title>Ej4 Arrays multidimensionales</title>
<meta charset="utf-8"/>
</head>

<body>

<?php

//creamos la matriz 3x5
$matriz= array (array("Juan",7,"Casa",4,"Mesa"), array(6,"Sara","Carton",2,19), array("Arbol",33,44,"PC","Ratón"));

//mostramos la fila y la columna del elemento mayor
$num_mayor=0;
foreach($matriz as $clave => $valor){
  
    foreach ($valor as $indice => $value)
        if($value>$num_mayor){
            $num_mayor=$value;
            $fila= $clave;
            $columna= $indice;
        }
}
echo "Elemento mayor: ".$num_mayor."<br>";
echo "Fila: ".$fila."<br>";
echo "Columna: ".$columna;
  
?>

</body>

</html>
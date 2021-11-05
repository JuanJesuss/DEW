<!DOCTYPE HTML>

<html>

<head>
<title>Ej6 Arrays multidimensionales</title>
<meta charset="utf-8"/>
</head>

<body>

<?php

$array1= array();//creamos el primer array
$array2= array();//creamos el segundo array
$array3= array();//creamos el tercer array

for($i=0; $i<3; $i++){

    $num_aleatorio_a1= rand(1,50);//generamos un número aleatorio entre 1 y 50 p.e.
    array_push($array1, $num_aleatorio_a1);//almacenamos el número aleatorio en array1


    $num_aleatorio_a2= rand(51,100);//generamos un número aleatorio entre 51 y 100 p.e.
    array_push($array2, $num_aleatorio_a2);//almacenamos el número aleatorio en array2


    $num_aleatorio_a3= rand(101,150);//generamos un número aleatorio entre 101 y 150 p.e.
    array_push($array3, $num_aleatorio_a3);//almacenamos el número aleatorio en array2
}

$matriz= array($array1, $array2, $array3);//llenamos la matriz con los 3 arrays y sus números aleatorios correspondientes

//mostramos los valores de la matriz
for($fila=0; $fila<3; $fila++){
    echo "<p>Fila: ".$fila."<p>";
    for($col=0; $col<3; $col++){
        echo $matriz[$fila][$col]."<br>";
    }
}

$numeros_maximos_filas= array();//creamos el array que va a contener los números máximos de cada fila
$promedios_filas= array();//creamos el array que va a contener el promedio de cada fila
$num_max=0;

for($fila=0; $fila<3; $fila++){
    $suma_filas=0;
    for($col=0; $col<3; $col++){
        if($matriz[$fila][$col]>$num_max){
        $num_max= $matriz[$fila][$col];
        }
        $suma_filas=$suma_filas+$matriz[$fila][$col];
    }    
array_push($numeros_maximos_filas, $num_max);//añadimos al array el número máximo de cada fila
$promedio=$suma_filas/3;
array_push($promedios_filas, $promedio);//añadimos al array el promedio de cada fila
}

echo "<p>Números máximos de cada fila:<p>";
for($i=0; $i<3; $i++){
    echo "Fila ".$i.": ".$numeros_maximos_filas[$i]."<br>";
}

echo "<p>Promedio de cada fila:<p>";
for($i=0; $i<3; $i++){
    echo "Fila ".$i.": ".$promedios_filas[$i]."<br>";
}


?>

</body>

</html>
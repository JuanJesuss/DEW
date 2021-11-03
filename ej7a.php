<!DOCTYPE HTML>

<html>

<head>
<title>Ej7 Arrays unidimensionales</title>
</head>

<body>

<?php

//array asociativo con los nombres de cinco alumnos y sus respectivas notas
$alumnos= array ("Juan"=>30, "Pedro"=>27, "Ana"=>25, "Marta"=>18, "Ignacio"=>34);


//mostramos el contenido del array mostrando el bucle foreach
foreach($alumnos as $clave => $valor){
    echo "Alumno ".$clave.", Nota: ".$valor."<br>";
}

$alumnos= array ("Juan"=>30, "Pedro"=>27, "Ana"=>25, "Marta"=>18, "Ignacio"=>34);


//situamos el puntero en la segunda posición y mostramos su valor
$segunda_posicion= next($alumnos);
echo "Segunda posici&oacuten: ".$segunda_posicion."<br>";


//avanzamos una posición y mostramos su valor
$tercera_posicion= next($alumnos);
echo "Tercera posici&oacuten: ".$tercera_posicion."<br>";


//colocamos el puntero en la última posición y mostramos su valor
$ultima_posicion= end($alumnos);
echo "&Uacuteltima posici&oacuten: ".$ultima_posicion."<br>";



sort($alumnos);//ordenamos el array por orden de edad(de menor a mayor)

$primera_posicion= current($alumnos);//apuntamos a la primera posición del array
echo $primera_posicion."<br>";

$ultima_posicion= end($alumnos);//apuntamos a la última posición del array
echo $ultima_posicion;


?>

</body>

</html>
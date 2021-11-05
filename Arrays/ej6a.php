<!DOCTYPE HTML>

<html>

<head>
<title>Ej6 Arrays unidimensionales</title>
</head>

<body>

<?php

//definimos los arrays
$modulos1= array("Bases Datos","Entornos Desarrollo","Programación");
$modulos2= array("Sistemas informáticos", "FOL");//he borrado 'mecanizado'
$modulos3= array("Desarrollo web ES", "Desarrollo web EC", "Despliegue", "Desarrollo interfaces", "Inglés");


//si queremos añadir al array $modulos1 los otros array SIN USAR FUNCIONES
$modulos1[3]= $modulos2[0];//a la última posición del array $modulos1 le sumamos 1, y le asignamos el valor de la primera posición del array $modulos2
$modulos1[4]= $modulos2[1];//y así sucesivamente hasta que el array $modulos1 tenga todos los valores de los otros array
$modulos1[5]= $modulos2[2];//al haber borrado 'mecanizado' la posición 5 del array ya no tiene valor
$modulos1[6]= $modulos3[0];
$modulos1[7]= $modulos3[1];
$modulos1[8]= $modulos3[2];
$modulos1[9]= $modulos3[3];
$modulos1[10]= $modulos3[4];

$longitud= count($modulos1);//obtenemos la longitud de todos los modulos

rsort($modulos1);//ordenamos inversamente el array

for($i=0; $i<$longitud; $i++){
    echo $modulos1[$i]."<br>";//al imprimir los valores del array, nos dará error debido a que la posición 5 del array ya no tiene valor
}



//si queremos añadir al array $modulos1 los otros array UTILIZANDO LA FUNCION ARRAY_PUSH
//en el primer párametro introducimos el array al cual se le quieren añadir los otros arrays
//seguidamente habra que ir introduciendo los valores de los otros array
array_push($modulos1, $modulos2[0], $modulos2[1], $modulos2[2], $modulos3[0], $modulos3[1], $modulos3[2], $modulos3[3], $modulos3[4]);



//si queremos juntar todos lo array en uno solo UTILIZANDO LA FUNCION ARRAY_MERGE
//definimos una variable, en este caso $resultado
//seguidamente escribimos array_merge y dentro escribimos los arrays
$resultado= array_merge($modulos1,$modulos2,$modulos3);

?>

</body>

</html>
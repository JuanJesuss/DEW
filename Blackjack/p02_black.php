<!DOCTYPE html>

<html>

<head>
<title>BLACKJACK</title>
<meta charset="utf-8">
<link href="estilos.css" rel="stylesheet" type="text/css"/>
</head>

<body>

<?php

$jugador1= $_POST["nombre1"];//nombre jugador 1
$jugador2= $_POST["nombre2"];//nombre jugador 2
$jugador3= $_POST["nombre3"];//nombre jugador 3
$jugador4= $_POST["nombre4"];//nombre jugador 4
$numero_cartas= $_POST["numcartas"];//número de cartas
$cantidad_apostada= $_POST["apuesta"];//cantidad apostada

if(empty($jugador1) || empty($jugador2) || empty($jugador3) || empty($jugador4)){//comprobamos que se hayan introducido los nombres de todos los jugadores
    echo "Debe introducir el nombre de los cuatro jugadores.";
}
elseif($numero_cartas<2 || $numero_cartas>6){//si el número de cartas no está comprendido entre 2 y 6
    echo "El número de cartas debe estar entre 2 y 6 (ambos incluidos).";
}
elseif(empty($cantidad_apostada)){//si no se ha introducido la cantidad a apostar
    echo "Debe introducir una cantidad a apostar";
}
else{

$banca= "Banca";
$baraja= array("AC"=>1,"2C"=>2,"3C"=>3,"4C"=>4,"5C"=>5,"6C"=>6,"7C"=>7,"JC"=>10,"QC"=>10,"KC"=>10,
               "AD"=>1,"2D"=>2,"3D"=>3,"4D"=>4,"5D"=>5,"6D"=>6,"7D"=>7,"JD"=>10,"QD"=>10,"KD"=>10,
               "AP"=>1,"2P"=>2,"3P"=>3,"4P"=>4,"5P"=>5,"6P"=>6,"7P"=>7,"JP"=>10,"QP"=>10,"KP"=>10,
               "AT"=>1,"2T"=>2,"3T"=>3,"4T"=>4,"5T"=>5,"6T"=>6,"7T"=>7,"JT"=>10,"QT"=>10,"KT"=>10);

//creamos las cartas de los jugadores y la banca               
$cartas_jugador1= array();//cartas jugador 1
$cartas_jugador2= array();//cartas jugador 2
$cartas_jugador3= array();//cartas jugador 3
$cartas_jugador4= array();//cartas jugador 4
$cartas_banca= array();//cartas banca

//según el número de cartas obtenemos un determinado número de claves de la baraja y lo almacenamos en la variable $valores_cartas de cada jugador y de la banca
$valores_cartas_j1= array_rand($baraja, $numero_cartas);
$valores_cartas_j2= array_rand($baraja, $numero_cartas);
$valores_cartas_j3= array_rand($baraja, $numero_cartas);
$valores_cartas_j4= array_rand($baraja, $numero_cartas);
$valores_cartas_banca= array_rand($baraja, $numero_cartas);

//según el número de cartas, almacenamos sus valores en las cartas de cada jugador y de la banca
for($i=0; $i<$numero_cartas; $i++){
array_push($cartas_jugador1, $baraja[$valores_cartas_j1[$i]]);
array_push($cartas_jugador2, $baraja[$valores_cartas_j2[$i]]);
array_push($cartas_jugador3, $baraja[$valores_cartas_j3[$i]]);
array_push($cartas_jugador4, $baraja[$valores_cartas_j4[$i]]);
array_push($cartas_banca, $baraja[$valores_cartas_banca[$i]]);
}

require "funciones.php";

//mostramos las cartas
mostrar_cartas($jugador1, $jugador2, $jugador3, $jugador4, $banca, $numero_cartas, $valores_cartas_j1, $valores_cartas_j2, $valores_cartas_j3, $valores_cartas_j4, $valores_cartas_banca);

//inicializamos la puntuación de cada jugador y de la banca a cero
$puntuacion_j1=0;
$puntuacion_j2=0;
$puntuacion_j3=0;
$puntuacion_j4=0;
$puntuacion_banca=0;

//calculamos la puntuación de cada jugador y de la banca
for($i=0; $i<$numero_cartas; $i++){
$puntuacion_j1= $puntuacion_j1+$cartas_jugador1[$i];
$puntuacion_j2= $puntuacion_j2+$cartas_jugador2[$i];
$puntuacion_j3= $puntuacion_j3+$cartas_jugador3[$i];
$puntuacion_j4= $puntuacion_j4+$cartas_jugador4[$i];
$puntuacion_banca= $puntuacion_banca+$cartas_banca[$i];
}

$puntuacion= array($puntuacion_j1, $puntuacion_j2, $puntuacion_j3, $puntuacion_j4);//almacenamos la puntuación de cada jugador en el array puntuación
rsort($puntuacion);//ordenamos las puntuaciones de mayor a menor

//mostramos las puntuaciones
mostrar_puntuaciones($puntuacion, $puntuacion_banca, $jugador1, $jugador2, $jugador3, $jugador4, $banca);

echo "Cantidad apostada: ".$cantidad_apostada."<br>";//mostramos la cantidad apostada

//mostramos ganador/es, puntuación/es y almacenamos en un fichero al ganador/es y su/s puntuación/es
mostrarGanadorPuntuacion_crearFichero($puntuacion, $puntuacion_j1, $puntuacion_j2, $puntuacion_j3, $puntuacion_j4, $puntuacion_banca, $jugador1, $jugador2, $jugador3, $jugador4, $banca, $cantidad_apostada);

}


?>

</body>

</html>
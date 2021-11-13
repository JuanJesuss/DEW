<!DOCTYPE html>

<html>

<head>
<title>JUEGO DADOS</title>
<meta charset="utf-8">
<link href="estilos.css" rel="stylesheet" type="text/css"/>
</head>

<body>
<h1>RESULTADO JUEGO DADOS</h1>

<?php

$jugador1=$_POST["nombre1"];//nombre jugador 1
$jugador2=$_POST["nombre2"];//nombre jugador 2
$jugador3=$_POST["nombre3"];//nombre jugador 3
$jugador4=$_POST["nombre4"];//nombre jugador 4
$numero_dados=$_POST["numdados"];//número de dados con los que se juega

$dados_jugador1= array();//dados del jugador 1
$dados_jugador2= array();//dados del jugador 2
$dados_jugador3= array();//dados del jugador 3
$dados_jugador4= array();//dados del jugador 4

if(empty($Jugador1) || empty($Jugador2) || empty($Jugador3) || empty($Jugador4)){//comprobamos que se hayan introducido los nombres de todos los jugadores
    echo "Debe introducir el nombre de los cuatro jugadores";
}

elseif($numero_dados<1 || $numero_dados>10){//comprobamos que el número de dados sea como mínimo 1 y como máximo 10
    echo "Solo se puede jugar como mínimo con 1 dado y como máximo con 10 dados";
}

else{

require "funciones_dados.php";

if($numero_dados==1){//si se juega con 1 dado
    $resultado= numero_dados_1($jugador1, $jugador2, $jugador3, $jugador4, $dados_jugador1, $dados_jugador2, $dados_jugador3, $dados_jugador4);//llamamos a la funcion numero_dados_1 y almacenamos el resultado en la variable $resultado
    echo $resultado;//imprimimos el resultado
}


if($numero_dados==2){//si se juega con 2 dados
    $resultado= numero_dados_2($jugador1, $jugador2, $jugador3, $jugador4, $dados_jugador1, $dados_jugador2, $dados_jugador3, $dados_jugador4);//llamamos a la funcion numero_dados_2 y almacenamos el resultado en la variable $resultado
    echo $resultado;//imprimimos el resultado
}

if($numero_dados==3){//si se juega con 3 dados
    $resultado= numero_dados_3($jugador1, $jugador2, $jugador3, $jugador4, $dados_jugador1, $dados_jugador2, $dados_jugador3, $dados_jugador4);//llamamos a la funcion numero_dados_3 y almacenamos el resultado en la variable $resultado
    echo $resultado;//imprimimos el resultado
}

if($numero_dados==4){//si se juega con 4 dados
    $resultado= numero_dados_4($jugador1, $jugador2, $jugador3, $jugador4, $dados_jugador1, $dados_jugador2, $dados_jugador3, $dados_jugador4);//llamamos a la funcion numero_dados_4 y almacenamos el resultado en la variable $resultado
    echo $resultado;//imprimimos el resultado
}

if($numero_dados==5){//si se juega con 5 dados
    $resultado= numero_dados_5($jugador1, $jugador2, $jugador3, $jugador4, $dados_jugador1, $dados_jugador2, $dados_jugador3, $dados_jugador4);//llamamos a la funcion numero_dados_5 y almacenamos el resultado en la variable $resultado
    echo $resultado;//imprimimos el resultado
}

if($numero_dados==6){//si se juega con 6 dados
    $resultado= numero_dados_6($jugador1, $jugador2, $jugador3, $jugador4, $dados_jugador1, $dados_jugador2, $dados_jugador3, $dados_jugador4);//llamamos a la funcion numero_dados_6 y almacenamos el resultado en la variable $resultado
    echo $resultado;//imprimimos el resultado
}

if($numero_dados==7){//si se juega con 7 dados
    $resultado= numero_dados_7($jugador1, $jugador2, $jugador3, $jugador4, $dados_jugador1, $dados_jugador2, $dados_jugador3, $dados_jugador4);//llamamos a la funcion numero_dados_7 y almacenamos el resultado en la variable $resultado
    echo $resultado;//imprimimos el resultado
}

if($numero_dados==8){//si se juega con 8 dados
    $resultado= numero_dados_8($jugador1, $jugador2, $jugador3, $jugador4, $dados_jugador1, $dados_jugador2, $dados_jugador3, $dados_jugador4);//llamamos a la funcion numero_dados_8 y almacenamos el resultado en la variable $resultado
    echo $resultado;//imprimimos el resultado
}

if($numero_dados==9){//si se juega con 9 dados
    $resultado= numero_dados_9($jugador1, $jugador2, $jugador3, $jugador4, $dados_jugador1, $dados_jugador2, $dados_jugador3, $dados_jugador4);//llamamos a la funcion numero_dados_9 y almacenamos el resultado en la variable $resultado
    echo $resultado;//imprimimos el resultado
}

if($numero_dados==10){//si se juega con 10 dados
    $resultado= numero_dados_10($jugador1, $jugador2, $jugador3, $jugador4, $dados_jugador1, $dados_jugador2, $dados_jugador3, $dados_jugador4);//llamamos a la funcion numero_dados_10 y almacenamos el resultado en la variable $resultado
    echo $resultado;//imprimimos el resultado
}

}

?>

</body>

</html>
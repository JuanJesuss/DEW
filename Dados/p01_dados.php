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

if(empty($jugador1) || empty($jugador2) || empty($jugador3) || empty($jugador4)){//comprobamos que se hayan introducido los nombres de todos los jugadores
    echo "Debe introducir el nombre de los cuatro jugadores";
}

elseif($numero_dados<1 || $numero_dados>10){//comprobamos que el número de dados sea como mínimo 1 y como máximo 10
    echo "Solo se puede jugar como mínimo con 1 dado y como máximo con 10 dados";
}

else{
$date = getdate();//obtenemos los valores de fecha y hora y los almacenamos en la variable date
echo "<p>",$date["mday"],"/",$date["mon"],"/",$date["year"]," ",$date["hours"]+1,":",$date["minutes"],":",$date["seconds"],"</p>";//imprimimos fecha y hora
jugar($jugador1, $jugador2, $jugador3, $jugador4, $numero_dados);//jugamos
}

Function jugar($jugador1, $jugador2, $jugador3, $jugador4, $numero_dados){

    $dados_jugador1= array();//dados del jugador 1
    $dados_jugador2= array();//dados del jugador 2
    $dados_jugador3= array();//dados del jugador 3
    $dados_jugador4= array();//dados del jugador 4

    for($i=0; $i<$numero_dados; $i++){//obtenemos los dados de cada jugador
    $dado= rand(1,6);//obtenemos un dado cuyo valor esta comprendido entre 1 y 6
    array_push($dados_jugador1, $dado);//lo almacenamos en los dados del jugador 1
    $dado= rand(1,6);
    array_push($dados_jugador2, $dado);
    $dado= rand(1,6);
    array_push($dados_jugador3, $dado);
    $dado= rand(1,6);
    array_push($dados_jugador4, $dado);
    }

    //imprimimos el nombre de los jugadores junto a sus respectivos dados
    echo "
    <table>
    <tr>
    <td>".$jugador1."</td>";
        for($i=0; $i<$numero_dados; $i++){
        echo "<td><img src=Images/".$dados_jugador1[$i].".png alt=Bola ".$dados_jugador1[$i]." width=50 height=50></td>";
        }
    echo "</tr>
    <tr>
    <td>".$jugador2."</td>";
    for($i=0; $i<$numero_dados; $i++){
        echo "<td><img src=Images/".$dados_jugador2[$i].".png alt=Bola ".$dados_jugador2[$i]." width=50 height=50></td>";
    }
    echo "</tr>
    <tr>
    <td>".$jugador3."</td>";
    for($i=0; $i<$numero_dados; $i++){
        echo "<td><img src=Images/".$dados_jugador3[$i].".png alt=Bola ".$dados_jugador3[$i]." width=50 height=50></td>";
    }
    echo "</tr>
    <tr>
    <td>".$jugador4."</td>";
    for($i=0; $i<$numero_dados; $i++){
        echo "<td><img src=Images/".$dados_jugador4[$i].".png alt=Bola ".$dados_jugador4[$i]." width=50 height=50></td>";
    }
    echo "</tr>
    </table>";

    if($numero_dados<=2){
        $resultado_tirada_jugador1=0;
        $resultado_tirada_jugador2=0;
        $resultado_tirada_jugador3=0;
        $resultado_tirada_jugador4=0;
        for($i=0; $i<$numero_dados; $i++){
            $resultado_tirada_jugador1= $resultado_tirada_jugador1+$dados_jugador1[$i];
            $resultado_tirada_jugador2= $resultado_tirada_jugador2+$dados_jugador2[$i];
            $resultado_tirada_jugador3= $resultado_tirada_jugador3+$dados_jugador3[$i];
            $resultado_tirada_jugador4= $resultado_tirada_jugador4+$dados_jugador4[$i];
        }
    }
    
    if($numero_dados>=3){//si el número de dados es mayor 0 igual 3
    $dados_iguales_j1= false;//inicializamos $dados_iguales_j1 a false
    $dados_iguales_j2= false;
    $dados_iguales_j3= false;
    $dados_iguales_j4= false;
    $cont_j1=0;//inicializamos $cont_j1 a cero
    $cont_j2=0;
    $cont_j3=0;
    $cont_j4=0;
    for($i=0; $i<($numero_dados-1); $i++){//recorremos los dados de cada jugador
        if($dados_jugador1[$i]==$dados_jugador1[($i+1)]){//comprobamos si todos los dados del jugador son iguales
            $cont_j1++;//si es igual, el contador suma 1
            if($cont_j1==($numero_dados-1)){//si el contador es igual a todas las comparaciones que se hizo
                $dados_iguales_j1=true;//significa que todos los dados son iguales
            }
        }
        if($dados_jugador2[$i]==$dados_jugador2[($i+1)]){
            $cont_j2++;
            if($cont_j2==($numero_dados-1)){
                $dados_iguales_j2=true;
            }
        }
        if($dados_jugador3[$i]==$dados_jugador3[($i+1)]){
            $cont_j3++;
            if($cont_j3==($numero_dados-1)){
                $dados_iguales_j3=true;
            }
        }
        if($dados_jugador4[$i]==$dados_jugador4[($i+1)]){
            $cont_j4++;
            if($cont_j4==($numero_dados-1)){
                $dados_iguales_j4=true;
            }
        }
    }

    if($dados_iguales_j1==true){//si todos los dados del jugador 1 son iguales
        $resultado_tirada_jugador1=100;//su puntuación es 100
    }
    else{//si no son iguales
        $resultado_tirada_jugador1=0;
        for($i=0; $i<$numero_dados; $i++){
            $resultado_tirada_jugador1= $resultado_tirada_jugador1+ $dados_jugador1[$i];//obtenemos la suma de todos los dados del jugador 1
        }
    }

    if($dados_iguales_j2==true){//si todos los dados del jugador 2 son iguales
        $resultado_tirada_jugador2=100;
    }
    else{
        $resultado_tirada_jugador2=0;
        for($i=0; $i<$numero_dados; $i++){
            $resultado_tirada_jugador2= $resultado_tirada_jugador2+ $dados_jugador2[$i];
        }
    }
    
    if($dados_iguales_j3==true){//si todos los dados del jugador 3 son iguales
        $resultado_tirada_jugador3=100;
    }
    else{
        $resultado_tirada_jugador3=0;
        for($i=0; $i<$numero_dados; $i++){
            $resultado_tirada_jugador3= $resultado_tirada_jugador3+ $dados_jugador3[$i];
        }
    }

    if($dados_iguales_j4==true){//si todos los dados del jugador 4 son iguales
        $resultado_tirada_jugador4=100;
    }
    else{
        $resultado_tirada_jugador4=0;
        for($i=0; $i<$numero_dados; $i++){
            $resultado_tirada_jugador4= $resultado_tirada_jugador4+ $dados_jugador4[$i];
        }
    }

    }

    //almacenamos el resultado de la tirada de cada jugador en un array
    $resultados= array($jugador1=>$resultado_tirada_jugador1, $jugador2=>$resultado_tirada_jugador2, $jugador3=>$resultado_tirada_jugador3, $jugador4=>$resultado_tirada_jugador4);

    //imprimimos los resultados de cada jugador
    foreach($resultados as $clave => $valor){
        echo "<p>".$clave."= ".$valor."</p>";
    }

    //obtenemos el resultado mayor
    $resultado_mayor=0;
    foreach($resultados as $clave => $valor){
        if($valor>$resultado_mayor){
            $resultado_mayor=$valor;
        }
    }

    //vemos a quien o quienes pertenece el resultado mayor
    $cont=0;
    foreach($resultados as $clave => $valor){
        if($valor==$resultado_mayor){//si alguno de los resultados es igual al resultado mayor
            $cont++;//el contador suma 1
            $ganador=$clave;//almacenamos el nombre en la variable ganador
            echo "<p>Ganador: ".$ganador."</p>";//mostramos el nombre del ganador
        }
    }

    //mostramos el número de ganadores
    echo "<p>Número de ganadores: ".$cont."</p>";

}

?>

</body>

</html>
<!doctype html>

<html>

<head>
<title>Bingo</title>
<meta charset="utf-8"/>
</head>

<body>

<?php

//creamos a los 4 jugadores
$jugador1=array(array(),//carton1
                array(),//carton2
                array());//carton3

$jugador2=array(array(),//carton1
                array(),//carton2
                array());//carton3

$jugador3=array(array(),//carton1
                array(),//carton2
                array());//carton3

$jugador4=array(array(),//carton1
                array(),//carton2
                array());//carton3

//llenamos cada cartón de cada jugador con 15 números distintos comprendidos entre 1 y 60
for($i=0;$i<3;$i++){
    $jugador1[$i]= carton();
    $jugador2[$i]= carton();
    $jugador3[$i]= carton();
    $jugador4[$i]= carton();
}

//devuelve un carton con 15 números distintos comprendidos entre 1 y 60
function carton(){
    $array=array();
    while(count($array)!=15){
        $numero= rand(1, 60);
        if(!in_array($numero, $array)){
            array_push($array, $numero);
        }
    }
    return $array;
}

echo "<h1>Cartones:</h1>";
//mostramos los tres cartones del jugador 1
for($i=0; $i<count($jugador1); $i++){
    echo "<p>Cartón ".$i." Jugador 1: ";
    for($j=0; $j<15; $j++){
        echo $jugador1[$i][$j]." | ";
    }
echo "</p>";    
}

//mostramos los tres cartones del jugador 2
for($i=0; $i<count($jugador2); $i++){
    echo "<p>Cartón ".$i." Jugador 2: ";
    for($j=0; $j<15; $j++){
        echo $jugador2[$i][$j]." | ";
    }
echo "</p>";    
}

//mostramos los tres cartones del jugador 3
for($i=0; $i<count($jugador3); $i++){
    echo "<p>Cartón ".$i." Jugador 3: ";
    for($j=0; $j<15; $j++){
        echo $jugador3[$i][$j]." | ";
    }
echo "</p>";    
}

//mostramos los tres cartones del jugador 4
for($i=0; $i<count($jugador4); $i++){
    echo "<p>Cartón ".$i." Jugador 4: ";
    for($j=0; $j<15; $j++){
        echo $jugador4[$i][$j]." | ";
    }
echo "</p>";    
}
      
$aciertosJugador1=array(0,//carton0 aciertos
                        0,//carton1 aciertos
                        0);//carton2 aciertos
    
$aciertosJugador2=array(0,//carton0 aciertos
                        0,//carton1 aciertos
                        0);//carton2 aciertos
    
$aciertosJugador3=array(0,//carton0 aciertos
                        0,//carton1 aciertos
                        0);//carton2 aciertos
    
$aciertosJugador4=array(0,//carton0 aciertos
                        0,//carton1 aciertos
                        0);//carton2 aciertos
    
$bombo=array();
    
echo "<h1>Ganador:</h1>";
while($aciertosJugador1[0]<15 && $aciertosJugador1[1]<15  && $aciertosJugador1[2]<15 && $aciertosJugador2[0]<15 && $aciertosJugador2[1]<15 && $aciertosJugador2[2]<15
&& $aciertosJugador3[0]<15 && $aciertosJugador3[1]<15 && $aciertosJugador3[2]<15 && $aciertosJugador4[0]<15 && $aciertosJugador4[1]<15 && $aciertosJugador4[2]<15){
    
    do{//comprobamos que la bola no haya salido antes
    $bola=rand(1,60);//sacamos la bola
    }while(in_array($bola,$bombo)==true);
    
    if(in_array($bola,$jugador1[0])){//si la bola está en el carton 0 del jugador 1
        $aciertosJugador1[0]++;//aciertosJugador1Carton0 suma uno
        if($aciertosJugador1[0]==15){//si aciertosJugador1Carton0 es quince
            echo "<p>El cartón 0 del jugador 1 ha ganado. Estos son sus números:</p>";
            for($i=0; $i<15; $i++){
                echo "<img src=Imagenes/".$jugador1[0][$i].".png alt=Bola".$jugador1[0][$i]." width=50 height=50>";
            }
        }
    }
    
    if(in_array($bola,$jugador1[1])){//si la bola está en el cartón 1 del jugador 1 
        $aciertosJugador1[1]++;
        if($aciertosJugador1[1]==15){
            echo "<p>El cartón 1 del jugador 1 ha ganado. Estos son sus números:</p>";
            for($i=0; $i<15; $i++){
                echo "<img src=Imagenes/".$jugador1[1][$i].".png alt=Bola".$jugador1[1][$i]." width=50 height=50>";
            }
        }
    }
    
    if(in_array($bola,$jugador1[2])){//si la bola está en el cartón 2 del jugador 1
        $aciertosJugador1[2]++;
        if($aciertosJugador1[2]==15){
            echo "<p>El cartón 2 del jugador 1 ha ganado Estos son sus números:</p>";
            for($i=0; $i<15; $i++){
                echo "<img src=Imagenes/".$jugador1[2][$i].".png alt=Bola".$jugador1[2][$i]." width=50 height=50>";
            }
        }
    }  
    
    if(in_array($bola,$jugador2[0])){//si la bola está en el carton 0 del jugador 2
        $aciertosJugador2[0]++;
        if($aciertosJugador2[0]==15){
            echo "<p>El cartón 0 del jugador 2 ha ganado. Estos son sus números:</p>";
            for($i=0; $i<15; $i++){
                echo "<img src=Imagenes/".$jugador2[0][$i].".png alt=Bola".$jugador2[0][$i]." width=50 height=50>";
            }
        }
    }
    
    if(in_array($bola,$jugador2[1])){//si la bola está en el carton 1 del jugador 2
        $aciertosJugador2[1]++;
        if($aciertosJugador2[1]==15){
            echo "<p>El cartón 1 del jugador 2 ha ganado. Estos son sus números:</p>";
            for($i=0; $i<15; $i++){
                echo "<img src=Imagenes/".$jugador2[1][$i].".png alt=Bola".$jugador2[1][$i]." width=50 height=50>";
            }
        }
    }
    
    if(in_array($bola,$jugador2[2])){//si la bola está en el carton 2 del jugador 2
        $aciertosJugador2[2]++;
        if($aciertosJugador2[2]==15){
            echo "<p>El cartón 2 del jugador 2 ha ganado. Estos son sus números:</p>";
            for($i=0; $i<15; $i++){
                echo "<img src=Imagenes/".$jugador2[2][$i].".png alt=Bola".$jugador2[2][$i]." width=50 height=50>";
            }
        }
    }
    
    if(in_array($bola,$jugador3[0])){//si la bola está en el carton 0 del jugador 3
        $aciertosJugador3[0]++;
        if($aciertosJugador3[0]==15){
            echo "<p>El cartón 0 del jugador 3 ha ganado. Estos son sus números:</p>";
            for($i=0; $i<15; $i++){
                echo "<img src=Imagenes/".$jugador3[0][$i].".png alt=Bola".$jugador3[0][$i]." width=50 height=50>";
            }
        }
    }
    
    if(in_array($bola,$jugador3[1])){ //si la bola está en el carton 1 del jugador 3
        $aciertosJugador3[1]++;
        if($aciertosJugador3[1]==15){
            echo "<p>El cartón 1 del jugador 3 ha ganado. Estos son sus números:</p>";
            for($i=0; $i<15; $i++){
                echo "<img src=Imagenes/".$jugador3[1][$i].".png alt=Bola".$jugador3[1][$i]." width=50 height=50>";
            }
        }
    }
    
    if(in_array($bola,$jugador3[2])){//si la bola está en el carton 2 del jugador 3
        $aciertosJugador3[2]++;
        if($aciertosJugador3[2]==15){
            echo "<p>El cartón 2 del jugador 3 ha ganado. Estos son sus números:</p>";
            for($i=0; $i<15; $i++){
                echo "<img src=Imagenes/".$jugador3[2][$i].".png alt=Bola".$jugador3[2][$i]." width=50 height=50>";
            }
        }
    }    
    
    if(in_array($bola,$jugador4[0])){//si la bola está en el carton 0 del jugador 4
        $aciertosJugador4[0]++;
        if($aciertosJugador4[0]==15){
            echo "<p>El cartón 0 del jugador 4 ha ganado. Estos son sus números:</p>";
            for($i=0; $i<15; $i++){
                echo "<img src=Imagenes/".$jugador4[0][$i].".png alt=Bola".$jugador4[0][$i]." width=50 height=50>";
            }
        }
    }
    
    if(in_array($bola,$jugador4[1])){//si la bola está en el carton 1 del jugador 4
        $aciertosJugador4[1]++;
        if($aciertosJugador4[1]==15){
            echo "<p>El cartón 1 del jugador 4 ha ganado. Estos son sus números</p>";
            for($i=0; $i<15; $i++){
                echo "<img src=Imagenes/".$jugador4[1][$i].".png alt=Bola".$jugador4[1][$i]." width=50 height=50>";
            }
        }
    }
    
    if(in_array($bola,$jugador4[2])){//si la bola está en el carton 2 del jugador 4
        $aciertosJugador4[2]++;
        if($aciertosJugador4[2]==15){
            echo "<p>El cartón 2 del jugador 4 ha ganado. Estos son sus números:</p>";
            for($i=0; $i<15; $i++){
                echo "<img src=Imagenes/".$jugador4[2][$i].".png alt=Bola".$jugador4[2][$i]." width=50 height=50>";
            }
        }
    } 
    
    array_push($bombo,$bola);
    
}

echo "<h1>Aciertos:</h1>";
echo "<p>Aciertos cartón 0, jugador 1: ".$aciertosJugador1[0]."</p>";
echo "<p>Aciertos cartón 1, jugador 1: ".$aciertosJugador1[1]."</p>";
echo "<p>Aciertos cartón 2, jugador 1: ".$aciertosJugador1[2]."</p>";
echo "<p>Aciertos cartón 0, jugador 2: ".$aciertosJugador2[0]."</p>";
echo "<p>Aciertos cartón 1, jugador 2: ".$aciertosJugador2[1]."</p>";
echo "<p>Aciertos cartón 2, jugador 2: ".$aciertosJugador2[2]."</p>";
echo "<p>Aciertos cartón 0, jugador 3: ".$aciertosJugador3[0]."</p>";
echo "<p>Aciertos cartón 1, jugador 3: ".$aciertosJugador3[1]."</p>";
echo "<p>Aciertos cartón 2, jugador 3: ".$aciertosJugador3[2]."</p>";
echo "<p>Aciertos cartón 0, jugador 4: ".$aciertosJugador4[0]."</p>";
echo "<p>Aciertos cartón 1, jugador 4: ".$aciertosJugador4[1]."</p>";
echo "<p>Aciertos cartón 2, jugador 4: ".$aciertosJugador4[2]."</p>";
    
$longitud=count($bombo);
echo "<h1>Bolas que han salido:</h1>";
for($i=0; $i<$longitud; $i++){
    echo "<img src=Imagenes/".$bombo[$i].".png alt=Bola".$bombo[$i]." width=50 height=50>";
}

echo "<h1>Número de bolas que han salido:</h1>".$longitud;


?>

</body>

</html>
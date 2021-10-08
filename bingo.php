<HTML>

<HEAD>
<TITLE>Bingo</TITLE>
</HEAD>

<BODY>

<?php

//Creación cartón vacío    
$carton=array();
//Asignación números aleatorios al cartón
$i=0;
while (count($carton)<15)
{
    $bola=rand(1,60);    
    if (! (in_array($bola,$carton)))
        $carton[$i++]=$bola;
}

$bombo=array();
for($i=1; $i<=60; $i++){
    array_push($bombo,$i);
}

$aciertos=15;
for($i=0; $i<60; $i++){
$numero= $bombo[array_rand($bombo)];
unset($bombo[$numero-1]);
while($aciertos>0)
if(in_array($numero, $carton)
    $aciertos--;
}
if($aciertos==0){
    echo "El jugador ha ganado";
}

?>

</body>

</html>

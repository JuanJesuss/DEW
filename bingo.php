<HTML>

<HEAD>
<TITLE>Bingo</TITLE>
</HEAD>

<BODY>

<?php

/*$carton = array();

for ($i=0; $i<15; $i++) {
    $numeroAleatorio= rand(1,60);
    array_push($carton,$numeroAleatorio);
}

for ($i=0; $i<15; $i++){
    echo $carton[$i]."<br/>";
}

$bombo=array();
for($i=1; $i<=60; $i++){
    array_push($bombo,$i);
}*/
$carton = array();
$cont=0;

while($cont<=15){

/*for ($i=0; $i<15; $i++) */
    $numeroAleatorio= rand(1,60);
    if(!in_array($numeroAleatorio, $carton))
    array_push($carton,$numeroAleatorio);
    $cont++;
}



for ($i=0; $i<15; $i++){
    echo $carton[$i]."<br/>";
}


?>

</body>

</html>

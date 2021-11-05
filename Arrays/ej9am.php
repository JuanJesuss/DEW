<!DOCTYPE HTML>

<html>

<head>
<title>Ej9 Arrays multidimensionales</title>
<meta charset="utf-8"/>
</head>

<body>

<?php

$matrizOriginal=array(array(1,2,3,4), array(5,6,7,8), array(9,10,11,12));

$matrizTraspuesta=array();

//creamos la matriz transpuesta
for($i=0;$i<4;$i++){
  for($j=0;$j<3;$j++){
    $matrizTraspuesta[$i][$j]=$matrizOriginal[$j][$i];
    }
}


//mostramos la matriz original
for($i=0;$i<3;$i++){
    for($j=0;$j<4;$j++){
      echo $matrizOriginal[$i][$j]." ";
    }
echo "<br>";    
}


//mostramos la matriz transpuesta
echo "<br>";
for($i=0;$i<4;$i++){
    for($j=0;$j<3;$j++){
      echo $matrizTraspuesta[$i][$j]." ";
    }
echo "<br>";
}


?>

</body>

</html>
<!DOCTYPE HTML>

<html>

<head>
<title>Ej8 Arrays unidimensionales</title>
</head>

<body>

<?php

//array asociativo con los nombres de cinco alumnos y sus respectivas notas en Base de datos
$alumnos= array ("Juan"=>4, "Pedro"=>6, "Ana"=>3, "Marta"=>1, "Ignacio"=>5);


//para obtener el alumno con mayor nota
$nota_mayor=0;
foreach($alumnos as $clave => $valor){
    if($valor>$nota_mayor){
        $nota_mayor=$valor;
        $alumno_nota_mayor=$clave;
    }
}
echo "El alumno ".$alumno_nota_mayor." tiene la mayor nota: ".$nota_mayor."<br>";


//para obtener el alumno con menor nota
$nota_menor=$alumnos["Juan"];
foreach($alumnos as $clave => $valor){
    if($nota_menor>$valor){
        $nota_menor=$valor;
        $alumno_nota_menor=$clave;
    }
}
echo "El alumno ".$alumno_nota_menor." tiene la menor nota: ".$nota_menor."<br>";


//media de las notas obtenidas por los alumnos
$suma=0;
foreach($alumnos as $clave => $valor){
    $suma=$suma+$valor;
}
$numero_notas= count($alumnos);
$media= $suma/$numero_notas;
echo "Media de las notas obtenidas por los alumnos: ".$media;


?>

</body>

</html>
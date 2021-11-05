<!DOCTYPE HTML>

<html>

<head>
<title>Ej7 Arrays multidimensionales</title>
<meta charset="utf-8"/>
</head>

<body>

<?php

// Nombre	PHP		Java       DIW             DAW
// =================================================
// Juan		7		5           6               8           
// Pedro	7		8           5               4
// Ana		10 		9           8               8
// Marta	3		5           6               5
// Javier   6       7           6               7
// Maria    4       5           8               6
// Ivan     2       4           5               5
// Ernesto  9       9           8               8
// Noelia   3       3           6               4
// Carlos   5       6           7               8

$alumnos = array ("Juan"=>array("PHP"=> 7, "Java"=> 5, "DIW"=> 6, "DAW"=> 8), "Pedro"=>array("PHP"=> 7, "Java"=> 8, "DIW"=> 5, "DAW"=> 4), "Ana"=>array("PHP"=> 10, "Java"=> 9, "DIW"=> 8, "DAW"=> 8), "Marta"=>array("PHP"=> 3, "Java"=> 5, "DIW"=> 6, "DAW"=> 5), "Javier"=>array("PHP"=> 6, "Java"=> 7, "DIW"=> 6, "DAW"=> 7), "Maria"=>array("PHP"=> 4, "Java"=> 5, "DIW"=> 8, "DAW"=> 6), "Ivan"=>array("PHP"=> 2, "Java"=> 4, "DIW"=> 5, "DAW"=> 5), "Ernesto"=>array("PHP"=> 9, "Java"=> 9, "DIW"=> 8, "DAW"=> 8), "Noelia"=>array("PHP"=> 3, "Java"=> 3, "DIW"=> 6, "DAW"=> 4), "Carlos"=>array("PHP"=> 5, "Java"=> 6, "DIW"=> 7, "DAW"=> 8));


//calculamos el alumno con mayor nota en la asignatura PHP
$nota_mayor= 0;
foreach($alumnos as $clave => $valor){
    foreach($valor as $indice => $nota)
        if($indice=="PHP"){//si la asignatura es PHP
            if($nota>$nota_mayor){
                $nota_mayor=$nota;//Obtenemos la nota mayor de la asignatura
                $alumno=$clave;//guardamos el alumno
            }
        }
}
echo "Alumno con mayor nota en la asignatura PHP: ".$alumno."<br>";//mostramos el alumno con mayor nota en la asignatura PHP



//calculamos el alumno con menor nota en la asignatura Java
$nota_menor= $alumnos["Juan"]["Java"];//comenzamos por la nota Java de Juan
foreach($alumnos as $clave => $valor){
    foreach($valor as $indice => $nota)
        if($indice=="Java"){//si la asignatura es Java
            if($nota_menor>$nota){
                $nota_menor=$nota;//Obtenemos la nota menor de la asignatura
                $alumno=$clave;//guardamos el alumno
            }
        }
}
echo "Alumno con menor nota en la asignatura Java: ".$alumno."<br>";//mostramos el alumno con menor nota en la asignatura Java



//calculamos a que asignatura corresponde la nota más baja del alumno Pedro
$nota_menor= $alumnos["Pedro"]["PHP"];//obtenemos la primera nota de Pedro
foreach($alumnos as $clave => $valor){
    if($clave=="Pedro"){//si el alumno es Pedro
        foreach($valor as $indice => $nota)
            if($nota_menor>$nota){
                $nota_menor= $nota;//obtenemos la menor nota
                $asignatura= $indice;//obtenemos la asignatura
            }
    }
}
echo "El alumno Pedro tiene su nota más baja en la asignatura: ".$asignatura."<br>";



//calculamos a que asignatura corresponde la nota más alta de la alumna Maria
$nota_mayor= 0;
foreach($alumnos as $clave => $valor){
    if($clave=="Maria"){//si el alumno es Maria
        foreach($valor as $indice => $nota)
            if($nota>$nota_mayor){
                $nota_mayor= $nota;//obtenemos la mayor nota
                $asignatura= $indice;//obtenemos la asignatura
            }
    }
}
echo "La alumna Maria tiene su nota más alta en la asignatura: ".$asignatura."<br>";




//calculamos la media por materia de todos los alumnos
$suma_PHP= 0;
$suma_java= 0;
$suma_diw= 0;
$suma_daw= 0;
foreach($alumnos as $clave => $valor){
    foreach($valor as $indice => $nota)
        if($indice=="PHP"){
            $suma_PHP= $suma_PHP+$nota;
        }
        elseif($indice=="Java"){
            $suma_java= $suma_java+$nota;
        }
        elseif($indice=="DIW"){
            $suma_diw= $suma_diw+$nota;
        }
        else{
            $suma_daw= $suma_daw+$nota;
        }
}

$num_alumnos= count($alumnos);//obtenemos el número de alumnos
$media_php= $suma_PHP/$num_alumnos;//obtenemos media php
$media_java= $suma_java/$num_alumnos;//obtenemos media java
$media_diw= $suma_diw/$num_alumnos;//obtenemos media diw
$media_daw= $suma_daw/$num_alumnos;//obtenemos media daw

echo "La media de PHP de todos los alumnos es: ".$media_php."<br>";
echo "La media de Java de todos los alumnos es: ".$media_java."<br>";
echo "La media de DIW de todos los alumnos es: ".$media_diw."<br>";
echo "La media de DAW de todos los alumnos es: ".$media_daw."<br>";



//calculamos la media por alumno de todas sus materias
$suma_notas_juan=0;
$suma_notas_pedro=0;
$suma_notas_ana=0;
$suma_notas_marta=0;
$suma_notas_javier=0;
$suma_notas_maria=0;
$suma_notas_ivan=0;
$suma_notas_ernesto=0;
$suma_notas_noelia=0;
$suma_notas_carlos=0;
foreach($alumnos as $clave => $valor){
    if($clave=="Juan"){
        foreach($valor as $indice => $nota)
            $suma_notas_juan= $suma_notas_juan+$nota;
    }
    elseif($clave=="Pedro"){
        foreach($valor as $indice => $nota)
            $suma_notas_pedro= $suma_notas_pedro+$nota;
    }
    elseif($clave=="Ana"){
        foreach($valor as $indice => $nota)
            $suma_notas_ana= $suma_notas_ana+$nota;
    }
    elseif($clave=="Marta"){
        foreach($valor as $indice => $nota)
            $suma_notas_marta= $suma_notas_marta+$nota;
    }
    elseif($clave=="Javier"){
        foreach($valor as $indice => $nota)
            $suma_notas_javier= $suma_notas_javier+$nota;
    }
    elseif($clave=="Maria"){
        foreach($valor as $indice => $nota)
            $suma_notas_maria= $suma_notas_maria+$nota;
    }
    elseif($clave=="Ivan"){
        foreach($valor as $indice => $nota)
            $suma_notas_ivan= $suma_notas_ivan+$nota;
    }
    elseif($clave=="Ernesto"){
        foreach($valor as $indice => $nota)
            $suma_notas_ernesto= $suma_notas_ernesto+$nota;
    }
    elseif($clave=="Noelia"){
        foreach($valor as $indice => $nota)
            $suma_notas_noelia= $suma_notas_noelia+$nota;
    }
    else{
        foreach($valor as $indice => $nota)
            $suma_notas_carlos= $suma_notas_carlos+$nota;
    }
}

$media_juan= $suma_notas_juan/4;
$media_pedro= $suma_notas_pedro/4;
$media_ana= $suma_notas_ana/4;
$media_marta= $suma_notas_marta/4;
$media_javier= $suma_notas_javier/4;
$media_maria= $suma_notas_maria/4;
$media_ivan= $suma_notas_ivan/4;
$media_ernesto= $suma_notas_ernesto/4;
$media_noelia= $suma_notas_noelia/4;
$media_carlos= $suma_notas_carlos/4;
echo "La media de Juan es: ".$media_juan."<br>";
echo "La media de Pedro es: ".$media_pedro."<br>";
echo "La media de Ana es: ".$media_ana."<br>";
echo "La media de Marta es: ".$media_marta."<br>";
echo "La media de Javier es: ".$media_javier."<br>";
echo "La media de Maria es: ".$media_maria."<br>";
echo "La media de Ivan es: ".$media_ivan."<br>";
echo "La media de Ernesto es: ".$media_ernesto."<br>";
echo "La media de Noelia es: ".$media_noelia."<br>";
echo "La media de Carlos es: ".$media_carlos;



?>

</body>

</html>
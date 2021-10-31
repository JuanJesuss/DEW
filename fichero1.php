<?php

$nombre=$_POST["nombre"];
$apellido1=$_POST["apellido1"];
$apellido2=$_POST["apellido2"];
$fecha_nac=$_POST["fecha_nac"];
$localidad=$_POST["localidad"];

$fecha= explode("/",$fecha_nac);//sirve para partir una cadena hasta el caracter especificado, y convertirla en un array.
$dia= $fecha[0];//guardamos dia
$mes= $fecha[1];//guardamos mes
$anio= $fecha[2];//guardamos año

if(checkdate($mes, $dia, $anio)==true){//si es una fecha correcta
    
    while(strlen($nombre)<40){//rellenamos el nombre con espacios hasta que la longitud sea 40
        $nombre= " ".$nombre;
    }

    while(strlen($apellido1)<41){//rellenamos el apellido1 con espacios hasta que la longitud sea 41
        $apellido1= " ".$apellido1;
    }

    while(strlen($apellido2)<42){//rellenamos el apellido2 con espacios hasta que la longitud sea 42
        $apellido2= " ".$apellido2;
    }

    while(strlen($fecha_nac)<10){//rellenamos la fecha de nacimiento con espacios hasta que la longitud sea 40
        $fecha_nac= " ".$fecha_nac;
    }

    while(strlen($localidad)<27){//rellenamos la localidad con espacios hasta que la longitud sea 27
        $localidad= " ".$localidad;
    }

    $alumno= $nombre.$apellido1.$apellido2.$fecha_nac.$localidad."\n";//almacenamos todas las variables en la variable $alumno e introducimos un salto de línea

    $fichero = fopen("files/alumnos1.txt", "a") or die("No se puede abrir el archivo");//abrimos el fichero, con permiso de solo escritura, en caso de no existir el fichero lo crea
    fwrite($fichero, $alumno);//escribimos en el fichero los datos del alumno
    fclose($fichero);//cerramos el fichero

}

else{//si la fecha no es correcta, mostraremos un mensaje indicándolo
    echo "La fecha de nacimiento introducida es incorrecta";
}


?>


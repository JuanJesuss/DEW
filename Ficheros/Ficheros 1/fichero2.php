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
    
    $tamanio= strlen($nombre)+2;//se sumará 2 caracteres al nombre
    $n= str_pad($nombre,$tamanio,"#",STR_PAD_RIGHT);//se pondrá ## al lado derecho del nombre
    
    $tamanio= strlen($apellido1)+2;//se sumará 2 caracteres al apellido1
    $a1= str_pad($apellido1,$tamanio,"#",STR_PAD_RIGHT);//se pondrá ## al lado derecho del apellido1

    $tamanio= strlen($apellido2)+2;//se sumará 2 caracteres al apellido2
    $a2= str_pad($apellido2,$tamanio,"#",STR_PAD_RIGHT);//se pondrá ## al lado derecho del apellido2

    $tamanio= strlen($fecha_nac)+2;//se sumará 2 caracteres a la fecha de nacimiento
    $f= str_pad($fecha_nac,$tamanio,"#",STR_PAD_RIGHT);//se pondrá ## al lado derecho de la fecha de nacimiento

    $alumno= $n.$a1.$a2.$f.$localidad."\n";//almacenamos todas las variables en la variable $alumno e introducimos un salto de línea

    $fichero = fopen("files/alumnos2.txt", "a") or die("No se puede abrir el archivo");//abrimos el fichero, con permiso de solo escritura, en caso de no existir el fichero lo crea
    fwrite($fichero, $alumno);//escribimos en el fichero los datos del alumno
    fclose($fichero);//cerramos el fichero

}

else{//si la fecha no es correcta, mostraremos un mensaje indicándolo
    echo "La fecha de nacimiento introducida es incorrecta";
}


?>

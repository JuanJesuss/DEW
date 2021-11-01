<!DOCTYPE html>

<html>

<head>
<title>Operaciones Ficheros</title>
<meta charset="UTF-8"/>
</head>

<body>
<h1>Operaciones Ficheros</h1>

<?php

$path= $_POST["fichero"];//guardamos la ruta del fichero en la variable $path

if(file_exists($path)){
    $nombre_fichero= basename($path);//guardamos el nombre del fichero y luego lo imprimimos
    echo "<b>Nombre del fichero: </b>".$nombre_fichero."<br>";

    $directorio_principal= dirname($path);//guardamos el directorio principal del fichero y luego lo imprimimos
    echo "<b>Directorio: </b>".$directorio_principal."<br>";
    
    $tamano= (filesize($nombre_fichero)/1000)." kilobytes";//guardamos el tamaño del fichero y luego lo imprimimos
    echo "<b>Tamaño del fichero: </b>".$tamano."<br>";

    $ultima_modificacion_fichero= date("j/n/Y H:i.", filemtime($nombre_fichero));//guardamos la última modificación del fichero y luego la imprimimos
    echo "<b>Fecha última modificación fichero: </b>".$ultima_modificacion_fichero; 
}
else{
    echo "El fichero no existe";
}

?>

</body>

</html>
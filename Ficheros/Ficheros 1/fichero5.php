<!DOCTYPE html>

<html>

<head>
<title>Operaciones Ficheros</title>
<meta charset="UTF-8"/>
</head>

<body>
<h1>Operaciones Ficheros</h1>

<?php

$path_nombre= $_POST["fichero"];//guardamos la ruta del fichero en la variable $path_nombre

if($_POST["r"]=="mostrarFichero"){//si se quiere es mostrar el fichero entero
    if(file_exists($path_nombre)){//si el fichero existe
    $myfile = fopen($path_nombre, "r") or die("No se puede abrir el archivo");//abrimos el fichero en modo lectura
    while(!feof($myfile)) {//mientras no se acabe el fichero
        echo fgets($myfile) . "<br>";//mostramos una fila y saltamos de línea
    }
    fclose($myfile);//cerramos el fichero    
    }
    else{//si el fichero no existe muestra un mensaje
        echo "El fichero no existe";
    }
}

elseif($_POST["r"]=="mostrarLinea"){//si se quiere mostrar una línea específica
    if(file_exists($path_nombre)){//si el fichero existe
    $linea= $_POST["linea"];//guardamos la línea la cual se quiere mostrar
    $myfile = fopen($path_nombre, "r") or die("No se puede abrir el archivo");//abrimos el fichero en modo lectura
    $contador= 0;//inicializamos el contador a cero
    while(!feof($myfile)) {//mientras no se acabe el fichero
        $lin=fgets($myfile);//guardamos la linea
        $contador++;//el contador suma uno
        if($contador==$linea){//si el contador es igual a la linea que se quiere mostrar, la imprime
            echo $lin;
        }
    }
    fclose($myfile);//cerramos el fichero
    }
    else{//si el fichero no existe, muestra un mensaje
        echo "El fichero no existe";
    }
}

else{//si se quiere mostrar nprimeras líneas
    $nlineas= $_POST["nlineas"];//guardamos nprimeras líneas
    if(file_exists($path_nombre)){//si el fichero existe
    $myfile = fopen($path_nombre, "r") or die("No se puede abrir el archivo");//abrimos el fichero en modo lectura
    $contador= 0;//inicializamos el contador a cero
    while($contador<$nlineas){//mientras el contador sea menor a nprimeras lineas, mostramos las líneas
        echo fgets($myfile)."<br>";
        $contador++;
    }
    fclose($myfile);//cerramos el fichero
    }
    else{//si el fichero no existe, muestra un mensaje
        echo "El fichero no existe";
    }
}


?>

</body>

</html>
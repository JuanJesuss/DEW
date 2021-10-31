<!DOCTYPE html>

<html>

<head>
<title>Fichero alumnos</title>
<link href="estilosFichero1r.css" rel="stylesheet" type="text/css"/>    
</head>

<body>

<?php

$myfile = fopen("files/alumnos1.txt", "r") or die("Unable to open file!");//abrimos fichero en modo lectura
$cuentaLineas= 0;//establecemos un cuenta lineas

echo "
<table>
  <tr>
    <th>Nombre</th>
    <th>Apellido 1</th>
    <th>Apellido 2</th>
    <th>Fecha nacimiento</th>
    <th>Localidad</th>
  </tr>";

while(!feof($myfile)) {//mientras el fichero no se acabe

$linea= fgets($myfile);//obtenemos la primera línea

if($linea!=""){//si la línea no está vacía

$cuentaLineas++;//se cuenta 1 línea

echo "<tr>";

$nombre="";
for($i=0; $i<40; $i++){
    if($linea[$i]!=" "){//si de la posicion 1 a 40 no es un espacio
        $nombre= $nombre.$linea[$i];//guardamos los caracteres en la variable nombre
    }
}
echo "<td>$nombre</td>";


$apellido1="";
for($i=40; $i<81; $i++){
    if($linea[$i]!=" "){//si de la posicion 41 a 81 no es un espacio
        $apellido1= $apellido1.$linea[$i];//guardamos los caracteres en la variable apellido1
    }
}
echo "<td>$apellido1</td>";


$apellido2="";
for($i=81; $i<123; $i++){
    if($linea[$i]!=" "){// si de la posicion 82 a 123 no es un espacio
        $apellido2= $apellido2.$linea[$i];//guardamos los caracteres en la variable apellido2
    }
}
echo "<td>$apellido2</td>";


$fecha_nac="";
for($i=123; $i<133; $i++){
    if($linea[$i]!=" "){//si de la posicion 124 a 133 no es un espacio
        $fecha_nac= $fecha_nac.$linea[$i];//guardamos los caracteres en la variable fecha_nac
    }
}
echo "<td>$fecha_nac</td>";

$localidad="";
for($i=133; $i<160; $i++){
    if($linea[$i]!=" "){//si de la posicion 134 a 160 no es un espacio
        $localidad= $localidad.$linea[$i];//guardamos los caracteres en la variable localidad
    }
}
echo "<td>$localidad</td>";

echo "</tr>";

}

}

echo "</table>";

echo "<br>";

echo "El n&uacutemero de filas que se han le&iacutedo es: ".$cuentaLineas;

fclose($myfile);

?>

</body>

</html>
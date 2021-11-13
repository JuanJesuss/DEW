<!DOCTYPE html>

<html>

<head>
<title>Fichero alumnos</title>
<link href="estilosFichero2r.css" rel="stylesheet" type="text/css"/>
</head>

<body>
    

<?php

$myfile = fopen("files/alumnos2.txt", "r") or die("No se puede abrir el archivo");//abrimos fichero en modo lectura
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

$linea= fgets($myfile);//obtenemos una línea

if($linea!=""){//si la línea no está vacía

$cuentaLineas++;//se cuenta 1 línea

$alumno= explode("##",$linea);//cada vez que se encuentre ##, se dividirá en cadenas y cada cadena se almacenará en el array $alumno

$nombre= $alumno[0];//la primera posición corresponde al nombre
$apellido1= $alumno[1];//la segunda posición corresponde al apellido 1
$apellido2= $alumno[2];//la tercera posición corresponde al apellido 2
$fecha_nac= $alumno[3];//la cuarta posición corresponde a la fecha de nacimiento
$localidad= $alumno[4];//la quinta posición corresponde a la localidad

echo "
<tr>
<td>$nombre</td>
<td>$apellido1</td>
<td>$apellido2</td>
<td>$fecha_nac</td>
<td>$localidad</td>
</tr>";

}

}

echo "</table>";

echo "<br>";

echo "El n&uacutemero de filas que se han le&iacutedo es: ".$cuentaLineas;

fclose($myfile);

?>

</body>

</html>
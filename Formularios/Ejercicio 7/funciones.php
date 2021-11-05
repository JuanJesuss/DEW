<?php
function no_hay_nombre($apellido1, $apellido2, $email){
    echo "
<label>Nombre: </label>
<input type=text>*<b>Campo obligatorio</b><br><br>
<label >Apellido1: </label>
<input type=text value=$apellido1><br><br>
<label>Apellido2: </label>
<input type=text value=$apellido2><br><br>
<label>Email: </label>
<input type=email value=$email><br><br>
Sexo:
<input type=radio>
<label>Mujer</label>
<input type=radio> 
<label>Hombre</label>";
}

function no_hay_email($nombre, $apellido1, $apellido2){
    echo "
    <label>Nombre: </label>
    <input type=text value=$nombre><br><br>
	<label >Apellido1: </label>
    <input type=text value=$apellido1><br><br>
    <label>Apellido2: </label>
    <input type=text value=$apellido2><br><br>
    <label>Email: </label>
    <input type=email><b>*Campo obligatorio</b><br><br>
    Sexo:
    <input type=radio>
    <label>Mujer</label>
    <input type=radio> 
	<label>Hombre</label>";
}

function no_hay_sexo($nombre, $apellido1, $apellido2, $email){
    echo "
    <label>Nombre: </label>
    <input type=text value=$nombre><br><br>
	<label >Apellido1: </label>
    <input type=text value=$apellido1><br><br>
    <label>Apellido2: </label>
    <input type=text value=$apellido2><br><br>
    <label>Email: </label>
    <input type=email value=$email><br><br>
    Sexo:
    <input type=radio>
    <label>Mujer</label>
    <input type=radio> 
	<label>Hombre</label><b> *Campo obligatorio</b>";
}

function campos_correctos($nombre, $apellido1, $apellido2, $email){
    $apellidos=$apellido1." ".$apellido2;
    if($_POST["r"]=="hombre"){
        $sexo="H";
    }
    else{
        $sexo="M";
    }
    echo "
    <table>
    <tr>
    <th>Nombre</th>
    <th>Apellidos</th>
    <th>Email</th>
    <th>Sexo</th>
    </tr>
    <tr>
    <td>$nombre</td>
    <td>$apellidos</td>
    <td>$email</td>
    <td>$sexo</td>
    </tr>
    </table>";
    $alumno= $nombre." ".$apellido1." ".$apellido2." ".$email." ".$sexo."\n";
    $fic_alumnos = fopen("datos.txt", "a") or die("No se puede abrir el fichero");
    fwrite($fic_alumnos, $alumno);
    fclose($fic_alumnos);
    }

?>
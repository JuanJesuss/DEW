<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'rootroot');
define('DB_DATABASE', 'empleadosnn');
    
// creamos conexión
$conn = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);

if(!$conn){
    die("Connection failed: " . mysqli_connect_error());
}
else{
    require "funciones.php";//pegamos funciones

    //Se muestra el formulario la primera vez
    if (!isset($_POST) || empty($_POST)) {//si las variables no están definidas o están vacías
?>
	<form  method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <label for="text1">Introduzca una fecha:</label>
	<input type="date" name="fecha"><br><br>
    <input type="submit" value="Enviar">
    <input type="reset" value="Borrar">
	</form>

    <?php
    }
    else{
    $fecha= $_POST['fecha'];//almacenamos la fecha introducida
    $fecha_entrada= strtotime($fecha);//almacenamos la fecha introducida en formato Unix
    $sql = "SELECT * FROM emple_depart;";//seleccionamos todas las filas de la tabla emple_depart
    if(mysqli_query($conn, $sql)){//si la consulta se hizo correctamente
    $result = mysqli_query($conn, $sql);//almacenamos el resultado
    if(mysqli_num_rows($result)>0){//si hay filas
        $cont_empl=0;//contrador empleados
        $cont_filas=0;//contador filas
        echo "<p>Relaci&oacute;n de los empleados que trabajaban en ".$fecha."</p>
        <table>
        <tr>
        <th>Nombre_dpto</th>
        <th>Nombre</th>
        <th>Apellidos</th>
        </tr>";
        while($row = mysqli_fetch_assoc($result)) {//mientras que haya filas
            $fechaini= strtotime($row['fecha_ini']);//almacenamos fecha_inicio en formato Unix
            $fechafin= strtotime($row['fecha_fin']);//almacenamos fecha_fin en formato Unix

            //EXISTEN 2 FORMAS DE RAZONAMIENTO
            if($fecha_entrada>=$fechaini && empty($fechafin)){//si fecha entrada es mayor o igual a fecha inicio y fecha fin está vacía
                $dni= $row['dni'];//obtenemos dni
                $cod_dpto= $row['cod_dpto'];//obtenemos cod_dpto
                obtener_relacion($dni, $cod_dpto, $conn);//obtenemos nombre_dpto, nombre y apellidos del empleado
            }

            elseif($fecha_entrada>=$fechaini && $fecha_entrada<=$fechafin){//si fecha entrada es mayor o igual a fecha inicio y fecha entrada es menor o igual a fecha fin
                $dni= $row['dni'];//almacenamos dni
                $cod_dpto= $row['cod_dpto'];//almacenamos cod_dpto
                obtener_relacion($dni, $cod_dpto, $conn);//obtenemos nombre_dpto, nombre y apellidos del empleado
            }
            else{//la fecha_entrada no está dentro
                $cont_empl++;
            }
            $cont_filas++;
        }
        echo "</table>";
        if($cont_empl==$cont_filas){//si cont_empl es igual a cont_filas
            echo "Ning&uacute;n empleado trabajaba en ".$fecha;
        }
    }
    else {
        echo "No hay datos";
    }
    }
    else{
        echo "Error: ".$sql."<br>".mysqli_error($conn);
    }
   
}

}

    //cerramos conexión
    mysqli_close($conn);

    ?>
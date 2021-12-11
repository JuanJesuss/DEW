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
        $dni= obtener_dni($conn);//obtenemos los dni
?>
    <h1>Modificar Salario Empleado</h1>
	<form  method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <label for="text">Seleccione DNI del empleado:</label>
    <select name="dni">
		<?php
        foreach($dni as $valor) : ?>
			<option> <?php echo $valor ?> </option>
		<?php endforeach; ?>
	</select><br><br>
    <label for="text1">Introduzca el porcentaje:</label>
	<input type="text" name="porcentaje"><br><br>
    <label for="text2">Seleccione operaci&oacute;n:</label>
    <select name="operacion">
			<option>Sumar</option>
            <option>Restar</option>
	</select><br><br>
    <input type="submit" value="Enviar">
    <input type="reset" value="Borrar">
	</form>

    <?php
    }
    else{
        $dni= $_POST["dni"];//obtenemos DNI
        $porcentaje_cambio= $_POST["porcentaje"];//obtenemos porcentaje_cambio
        $sql= "SELECT salario FROM empleado WHERE dni='$dni';";//seleccionamos el salario del empleado
        $result = mysqli_query($conn, $sql);//consultamos si hay datos
        $row = mysqli_fetch_assoc($result);
        $salario= $row['salario'];//almacenamos el salario del empleado
        $porcentaje= ($porcentaje_cambio/100)*$salario;//almacenamos porcentaje
                
        if($salario==0 || $salario==NULL){//si el salario es 0 o NULL
            echo "No existe registro del salario del empleado con DNI ".$dni;
        }
        else{//sino
            if($_POST['operacion']=='Sumar'){//si la operación seleccionada es Sumar
                $nuevosalario= $salario+$porcentaje;
            }
            else{
                $nuevosalario= $salario-$porcentaje;
            }        
            $sql .= "UPDATE empleado SET salario= '$nuevosalario' WHERE dni='$dni';";//actualizamos el salario del empleado
        } 

        //comprobamos si las consulta se hicieron correctamente
        if(mysqli_multi_query($conn, $sql)){
            echo "<br>Consultas relizadas correctamente";
        }
        else{
            echo "Error: ".$sql."<br>".mysqli_error($conn);
        }
    
    }
    
}

    //cerramos conexión
    mysqli_close($conn);

    ?>
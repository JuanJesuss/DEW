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
        $dptos= obtener_dptos($conn);//obtenemos lista dptos
?>

    <h1>Alta Empleado</h1>
    <p>Introduce los datos del empleado a dar de alta:</p>
	<form  method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
	<label for="text1">DNI:</label>
	<input type="text" name="dni">*Obligatorio<br><br>
    <label for="text2">Nombre:</label>
	<input type="text" name="nombre"><br><br>
    <label for="text3">Apellidos:</label>
	<input type="text" name="apell"><br><br>
    <label for="text4">Fecha nacimiento:</label>
	<input type="date" name="fecha_nac"><br><br>
    <label for="text5">Salario:</label>
	<input type="text" name="salario"><br><br>
    <label for="text6">Fecha Inicio:</label>
	<input type="date" name="fec_ini">*Obligatorio<br><br>
    <label for="text7">Fecha Fin:</label>
	<input type="date" name="fec_fin"><br><br>
    <label for="text8">Departamento:</label>
	<select name="dpto">
		<?php
        foreach($dptos as $valor) : ?>
			<option> <?php echo $valor ?> </option>
		<?php endforeach; ?>
	</select>*Obligatorio<br><br>
    <input type="submit" value="Enviar">
    <input type="reset" value="Borrar">
	</form>

    <?php
    }
    else{

    $dni= $_POST["dni"];
    $nombre= $_POST["nombre"];
    $apellidos= $_POST["apell"];
    $fecha_nac= $_POST["fecha_nac"];
    $salario= $_POST["salario"];
    $fecha_ini= $_POST["fec_ini"];
    $fecha_fin= $_POST["fec_fin"];
    $dpto= $_POST["dpto"];
    
    if(empty($dni)){
        echo "Debe introducir el DNI";
    }
    elseif(empty($fecha_ini)){
        echo "Debe introducir la fecha de inicio";
    }
    else{
    
        //insertamos en la tabla empleado
        $sql= "INSERT INTO empleado (dni, nombre, apellidos, fecha_nac, salario) VALUES ('$dni','$nombre', '$apellidos', '$fecha_nac', '$salario');";

        $cod_dpto= obtener_cod_dpto($dpto, $conn);//obtenemos cod_dpto

        //insertamos en la tabla emple_depart
        $sql .= "INSERT INTO emple_depart (dni, cod_dpto, fecha_ini, fecha_fin) VALUES ('$dni','$cod_dpto', '$fecha_ini', '$fecha_fin');";
    

        //comprobamos si las inserciones se hicieron correctamente
        if(mysqli_multi_query($conn, $sql)){
            echo "<br>Alta creada correctamente";
        }
        else{
            echo "Error: ".$sql."<br>".mysqli_error($conn);
        }

    }
    
    }

}
    
    //cerramos conexión
    mysqli_close($conn);

    ?>


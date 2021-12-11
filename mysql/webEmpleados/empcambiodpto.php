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
        $dni= obtener_dni($conn);//obtenemos lista dni
        $dptos= obtener_dptos($conn);//obtenemos lista dptos
?>

    <h1>Cambio Departamento</h1>
	<form  method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <label for="text">Selecciona el DNI del empleado:</label>
	<select name="dni">
		<?php
        foreach($dni as $valor) : ?>
			<option> <?php echo $valor ?> </option>
		<?php endforeach; ?>
	</select><br><br>
    <label for="text1">Selecciona el nuevo Departamento:</label>
    <select name="dpto">
		<?php
        foreach($dptos as $valor) : ?>
			<option> <?php echo $valor ?> </option>
		<?php endforeach; ?>
	</select><br><br>
    <input type="submit" value="Enviar">
    <input type="reset" value="Borrar">
	</form>

    <?php
    }
    else{
       
    $dni= $_POST["dni"];
    $dpto= $_POST["dpto"];

    $cod_dpto= obtener_cod_dpto($dpto, $conn);//obtenemos cod_dpto del nuevo dpto seleccionado

    //actualizamos el nuevo dpto del empleado
    $sql= "UPDATE emple_depart SET cod_dpto='$cod_dpto' WHERE dni='$dni';";

    //comprobamos si las inserciones se hicieron correctamente
    if(mysqli_query($conn, $sql)){
        echo "<br>Cambio creado correctamente";
    }
    else{
        echo "Error: ".$sql."<br>".mysqli_error($conn);
    }
    
    }
    
}    

    //cerramos conexión
    mysqli_close($conn);

    ?>


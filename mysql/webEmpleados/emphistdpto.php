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
    <p>Seleccione un departamento para mostrar a sus antiguos empleados:</p>
	<form  method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <label for="text">Departamento:</label>
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
       
    $dpto= $_POST["dpto"];//obtenemos nombre dpto

    $cod_dpto= obtener_cod_dpto($dpto, $conn);//obtenemos cod_dpto del dpto seleccionado

    //seleccionamos nombre y apellidos de los empleados que pertenecieron antiguamente al dpto seleccionado
    $sql= "SELECT nombre, apellidos FROM empleado WHERE dni IN 
    (SELECT dni FROM emple_depart WHERE cod_dpto='$cod_dpto' AND fecha_fin!='0000-00-00 00:00:00');";

    $result = mysqli_query($conn, $sql);//consultamos si hay datos
    if(mysqli_num_rows($result)==0){//si no hay filas
        echo "El departamento <b>".$dpto."</b> no tiene empleados que no trabajen actualmente.";
    }
    else{
        echo "<p>Empleados que trabajaron en el dpto <b>".$dpto."</b>:</p>
        <table>
        <tr>
        <th>Nombre</th>
        <th>Apellidos</th>
        </tr>";
        while($row = mysqli_fetch_assoc($result)) {
            echo "
            <tr>
            <td>".$row['nombre']."</td>
            <td>".$row['apellidos']."</td>
            </tr>";
        }
        echo "</table>";
    }


    //comprobamos si la consulta se hizo correctamente
    if(mysqli_query($conn, $sql)){
        echo "<br>Consulta relizada correctamente";
    }
    else{
        echo "Error: ".$sql."<br>".mysqli_error($conn);
    }
    
    }
    
}
    
    //cerramos conexión
    mysqli_close($conn);

    ?>
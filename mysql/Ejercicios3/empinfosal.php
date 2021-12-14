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
        $dpto= obtener_dptos($conn);//obtenemos los dptos
?>
	<form  method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <label for="text">Departamento:</label>
    <select name="dpto">
		<?php
        foreach($dpto as $valor) : ?>
			<option> <?php echo $valor ?> </option>
		<?php endforeach; ?>
	</select><br><br>
    <input type="submit" value="Mostrar salarios">
    <input type="reset" value="Borrar">
	</form>

    <?php
    }
    else{
        $nom_dpto=$_POST['dpto'];//guardamos nom_dpto
        $cod_dpto= obtener_cod_dpto($nom_dpto, $conn);//obtenemos cod_dpto
        
        //seleccionamos nombre, apellidos y salario de los empleados que trabajan actualmente en el dpto seleccionado
        $sql= "SELECT nombre, apellidos, salario
        FROM empleado, emple_depart
        WHERE empleado.dni = emple_depart.dni
        AND emple_depart.cod_dpto= '$cod_dpto'
        AND (fecha_fin IS NULL || fecha_fin=0);";
        if(mysqli_query($conn, $sql)){//si la consulta se hizo correctamente
            $result = mysqli_query($conn, $sql);//guardamos el resultado
            if(mysqli_num_rows($result)>0){//si número filas es mayor a cero
                echo"
                <table>
                <tr>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>Salario</th>
                </tr>";
                while($row = mysqli_fetch_assoc($result)) {//mientras que haya filas
                    echo"
                    <tr>
                    <td>".$row['nombre']."</td>
                    <td>".$row['apellidos']."</td>
                    <td>".$row['salario']."</td>
                    </tr>";
                }
                echo"
                </table>";
                $total= totalsalario($cod_dpto, $conn);//guardamos total salarios
                echo $total;//mostramos total salarios
            }
            else{
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
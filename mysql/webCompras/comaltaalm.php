<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'rootroot');
define('DB_DATABASE', 'COMPRASWEB');
    
$conn = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);// creamos conexion

if(!$conn){//si no hay conexion
    die("Connection failed: " . mysqli_connect_error());
}
else{
    require "funciones.php";//pegamos funciones

    if (!isset($_POST) || empty($_POST)) {//si las variables no estan definidas o estan vacias
?>
    <h1>Alta Almac&eacute;n</h1>
	<form  method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <label for="text1">Localidad:</label>
    <input type="text" name="loc"><br><br>
    <input type="submit" value="Enviar">
    <input type="reset" value="Borrar">
	</form>

    <?php
    }
    else{
        $num_almacenes= obtener_cantidad_almacenes($conn);
        $loc= $_POST["loc"];//almacenamos localidad

        if($num_almacenes==0){//si numero almacenes es cero
            $sql= "INSERT INTO ALMACEN (NUM_ALMACEN, LOCALIDAD) VALUES (10,'$loc');";//num_almacen es 10
        }
        else{
            $numero= (intval($num_almacenes)+1)*10;//sumamos uno y multiplicamos por diez
            $sql= "INSERT INTO ALMACEN (NUM_ALMACEN, LOCALIDAD) VALUES ($numero,'$loc');";
        }
    
        if(mysqli_query($conn, $sql)){
            echo "Alta correcta";
        }
        else{
            echo "Error: ".$sql."<br>".mysqli_error($conn);
        }
    }
}             
    mysqli_close($conn);//cerramos conexion

    ?>
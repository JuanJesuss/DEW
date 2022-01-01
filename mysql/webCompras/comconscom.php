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
        $dni= obtenerdni($conn);
?>
    <h1>Consultar Compra</h1>
	<form  method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <label for="text1">DNI:</label>
    <select name="dni">
		<?php
        foreach($dni as $valor) : ?>
			<option> <?php echo $valor ?> </option>
		<?php endforeach; ?>
	</select><br><br>
    <label for="text2">Desde:</label>
    <input type="date" name="desde"><br><br>
    <label for="text3">Hasta:</label>
    <input type="date" name="hasta"><br><br>
    <input type="submit" value="Enviar">
    <input type="reset" value="Borrar">
	</form>

    <?php
    }
    else{
        $dni= $_POST["dni"];
        $desde= $_POST["desde"];
        $hasta= $_POST["hasta"];
        con_compra($conn, $dni, $desde, $hasta);//consultamos compra
        tot_com($conn, $dni, $desde, $hasta);//obtenemos total si lo hay
    }
}           
    mysqli_close($conn);//cerramos conexion

    ?>
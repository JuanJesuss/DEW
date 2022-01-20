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
        $alm= num_alm($conn);
?>
    <h1>Consultar Almac&eacute;n</h1>
	<form  method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <label for="text1">N&uacute;mero almac&eacute;n:</label>
    <select name="alm">
		<?php
        foreach($alm as $valor) : ?>
			<option> <?php echo $valor ?> </option>
		<?php endforeach; ?>
	</select><br><br>
    <input type="submit" value="Enviar">
    <input type="reset" value="Borrar">
	</form>

    <?php
    }
    else{
        $num_alm= $_POST['alm'];
        con_alm($conn, $num_alm);
    }
}           
    mysqli_close($conn);//cerramos conexion

    ?>
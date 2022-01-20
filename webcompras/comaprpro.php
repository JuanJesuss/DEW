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
        $nom_pro= nom_pro($conn);//obtenemos nombres productos
        $num_alm= num_alm($conn);//obtenemos numeros almacenes
?>
    <h1>Aprovisionar productos</h1>
	<form  method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <label for="text3">N&uacute;mero almac&eacute;n:</label>
    <select name="num_alm">
		<?php
        foreach($num_alm as $valor) : ?>
			<option> <?php echo $valor ?> </option>
		<?php endforeach; ?>
	</select><br><br>
    <label for="text2">Nombre producto:</label>
    <select name="nom_pro">
		<?php
        foreach($nom_pro as $valor) : ?>
			<option> <?php echo $valor ?> </option>
		<?php endforeach; ?>
	</select><br><br>
    <label for="text1">Cantidad:</label>
    <input type="text" name="can"><br><br>
    <input type="submit" value="Enviar">
    <input type="reset" value="Borrar">
	</form>

    <?php
    }
    else{
        $nompro= $_POST["nom_pro"];
        $idpro= obtener_idpro($conn, $nompro);
        $numero_alm= $_POST["num_alm"];
        $cant= $_POST["can"];
        almacenar($idpro, $numero_alm, $cant, $conn);
    }
}           
    mysqli_close($conn);//cerramos conexion

    ?>
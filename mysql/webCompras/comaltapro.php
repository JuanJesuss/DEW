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
        $cat= obtenercat($conn);//obtenemos categorias
?>
    <h1>Alta Producto</h1>
	<form  method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <label for="text1">Nombre producto:</label>
    <input type="text" name="nom_pro"><br><br>
    <label for="text2">Precio:</label>
    <input type="text" name="precio"><br><br>
    <label for="text3">Categor&iacute;a:</label>
    <select name="cat">
		<?php
        foreach($cat as $valor) : ?>
			<option> <?php echo $valor ?> </option>
		<?php endforeach; ?>
	</select><br><br>
    <input type="submit" value="Enviar">
    <input type="reset" value="Borrar">
	</form>

    <?php
    }
    else{
        $nomcat= $_POST["cat"];//guardamos nombre categoria
        $idcat= obteneridcat($nomcat, $conn);//guardamos id categoria
        $nompro= $_POST["nom_pro"];//guardamos nombre producto
        $precio= $_POST["precio"];//guardamos precio
        $idpro= obteneridpro($conn);//guardamos id producto
        altapro($idcat, $nompro, $precio, $idpro, $conn);//damos de alta el producto
    }
}              
    mysqli_close($conn);//cerramos conexión

    ?>
<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'rootroot');
define('DB_DATABASE', 'COMPRASWEB');
    
// creamos conexión
$conn = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);

//si no hay conexión
if(!$conn){
    die("Connection failed: " . mysqli_connect_error());
}
else{
    require "funciones.php";//pegamos funciones

    //Se muestra el formulario la primera vez
    if (!isset($_POST) || empty($_POST)) {//si las variables no están definidas o están vacías
?>
    <h1>Alta Categor&iacute;a</h1>
	<form  method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <label for="text1">Introduzca nombre categor&iacute;a:</label>
	<input type="text" name="nom_cat"><br><br>
    <input type="submit" value="Enviar">
    <input type="reset" value="Borrar">
	</form>

    <?php
    }
    else{
        $nom_cat= $_POST["nom_cat"];
        insertarfila($conn, $nom_cat);
    }
}               

    //cerramos conexión
    mysqli_close($conn);

    ?>
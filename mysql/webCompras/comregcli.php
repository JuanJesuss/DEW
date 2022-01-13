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
    <h1>Alta Cliente</h1>
	<form  method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <label for="text1">NIF:</label>
    <input type="text" name="nif"><br><br>
    <label for="text2">Nombre:</label>
    <input type="text" name="nom"><br><br>
    <label for="text3">Apellido:</label>
    <input type="text" name="ape"><br><br>
    <label for="text4">C&oacute;digo postal:</label>
    <input type="text" name="cp"><br><br>
    <label for="text5">Direcci&oacute;n:</label>
    <input type="text" name="dir"><br><br>
    <label for="text6">Ciudad:</label>
    <input type="text" name="ciu"><br><br>
    <input type="submit" value="Enviar">
    <input type="reset" value="Borrar">
	</form>

    <?php
    }
    else{
        $nif= $_POST["nif"];
        $nif= strtoupper($nif);//nif en mayuscula
        $nom= $_POST["nom"];//nombre
        $ape= $_POST["ape"];//apellido
        $cp= $_POST["cp"];//codigo postal
        $dir= $_POST["dir"];//direccion
        $ciu= $_POST["ciu"];//ciudad
        $pass= strrev($ape);

        insertarRegistro($conn, $nif, $nom, $ape, $cp, $dir, $ciu, $pass);
        
        }
            
    }
          
    mysqli_close($conn);//cerramos conexion

    ?>



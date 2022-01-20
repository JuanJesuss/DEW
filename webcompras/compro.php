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
        $pro= nom_pro($conn);
?>
    <h1>Compra Productos</h1>
	<form  method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <label for="text1">Introduzca NIF:</label>
    <input type="text" name="nif"><br><br>
    <label for="text2">Seleccione producto:</label>
    <select name="pro">
		<?php
        foreach($pro as $valor) : ?>
			<option> <?php echo $valor ?> </option>
		<?php endforeach; ?>
	</select><br><br>
    <input type="submit" value="Enviar">
    <input type="reset" value="Borrar">
	</form>

    <?php
    }
    else{
        $nif= $_POST["nif"];
        $nif= strtoupper($nif);//nif en mayuscula
        $prod= $_POST["pro"];
        $idpro= obtener_idpro($conn, $prod);
        $comprobar= comprobar_compra($conn, $nif, $idpro);//comprobamos si el cliente ya ha comprado el producto anteriormente
        if($comprobar==null){//si no hay registro
            $cant_prod= obtener_cant_prod($conn, $idpro);//vemos si hay disponibilidad del producto
            if($cant_prod>0){//si hay disponibilidad
                $date = getdate();
                $fecha= $date['year']."-".$date['mon']."-".$date['mday'];//almacenamos fecha
                insertar_compra($conn, $nif, $idpro, $fecha);//insertamos compra
            }
            else{
                echo "No hay disponibilidad";
            }
        }
        else{
            echo "El cliente ya ha comprado el producto";
        }



        
        
        
        
        }
            
    }
          
    mysqli_close($conn);//cerramos conexion

    ?>
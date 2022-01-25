<?php 
   include('config.php');
   session_start();

   if(!isset($_SESSION['nif_cliente'])){
    header("location: comlogincli.php");
   }
else {
    require "../webcompras/funciones.php";//pegamos funciones
if (isset($_POST) && !empty($_POST)) {
  // AGREGAR A LA CESTA DE LA COMPRA
	if (isset($_POST['agregar']) && !empty($_POST['agregar'])) {
	  
	    if (!isset($_SESSION['$cesta'])){ 
		   $_SESSION['$cesta']=array(array($_POST['pro'],$_POST['cantidad']));
        }
	    else{
	       array_push($_SESSION['$cesta'],array($_POST['pro'],$_POST['cantidad']));
        }
    }

    elseif(isset($_POST['comprar']) && !empty($_POST['comprar'])){
        $cesta= $_SESSION['$cesta'];
        $nif= $_SESSION['nif_cliente'];
        comprar($cesta, $db, $nif);
        unset($_SESSION['$cesta']);
    }
    elseif(isset($_POST['limpiar']) && !empty($_POST['limpiar'])){
        unset($_SESSION['$cesta']);
        echo "Se elimin&oacute; la cesta";
    }
}


$productos = nom_pro($db);// Array que contiene los nombres de los productos para el select (desplegable)
    
?>

<html>
   
   <head>
      <title>Welcome </title>
   </head>
   
   <body>
		<h1>Bienvenido <?php echo $_SESSION['login_cliente']; ?></h1> 
		<!-- INICIO DEL FORMULARIO -->
	<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
	<label for="text">Productos:</label>
    <select name="pro">
		<?php
        foreach($productos as $valor) : ?>
			<option> <?php echo $valor ?> </option>
		<?php endforeach; ?>
	</select><br><br>
			<label for="cantidad1">Cantidad:</label>
			<input type="number" name="cantidad">
			<input type="submit" value="Comprar Producto" name="comprar">
			<input type="submit" value="Agregar a la Cesta" name="agregar">
			<input type="submit" value="Limpiar la Cesta" name="limpiar">
	</form>

   </body>
   
</html>

<?php
}
?>


   
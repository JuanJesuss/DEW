<?php 
   include('config.php');
   //Se recuperan los valores de la sesión
   session_start();
     
?>

<html>
   
   <head>
      <title>Welcome </title>
   </head>
   
   <body>
		<!-- Se muestra el nombre del usuario recuperado de una variable de sesión -->
		<h1>Bienvenido <?php echo $_SESSION['login_cliente']."-NIF: ".$_SESSION['nif_cliente']; ?></h1> 
		<!-- INICIO DEL FORMULARIO -->
	<form method="post">
		<div>
			<input type="submit" value="Comprar Productos" name="comprar">
			<input type="submit" value="Consulta Compras" name="consultar">
			<input type="submit" value="Cerrar Sesión" name="cerrar">
		</div>
	</form>
	<!-- FIN DEL FORMULARIO -->
   </body>
   
</html>

<?php
	if($_SERVER["REQUEST_METHOD"] == "POST") {
		if($_POST["comprar"]){
			header("location: comprocli.php");
		}
		elseif($_POST["consultar"]){
			header("location: consprocli.php");
		}
		else{
			session_unset();
			session_destroy();
			header("location: logout.php");
		}
	}
?>






<?php 
   include('config.php');
   
   session_start();

   if (isset($_SESSION['nif_cliente'])){
   
?>

<html>
   
   <head>
      <title>Welcome </title>
      <meta charset="utf-8">
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
			header("location: comconscli.php");
		}
		else{
			header("location: logout.php");
		}
	}
}
else{
	header("location: comlogincli.php");
}
?>
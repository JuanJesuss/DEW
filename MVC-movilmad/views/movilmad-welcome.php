<html>
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <title>MovilMad</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
 </head> 
 <body>
    <h1>Bienvenido a MovilMad</h1>
    <div class="container ">
		<div class="card border-success mb-3" style="max-width: 30rem;">
		<div class="card-header">Menú Usuario - OPERACIONES </div>
		<div class="card-body">
		<B>Bienvenido/a: <?php echo $_SESSION['nombre_cliente']." ".$_SESSION['apellido_cliente']; ?> </B>    <BR><BR>
		<B>Identificador Cliente: <?php echo $_SESSION['id_cliente']; ?></B>  <BR><BR>
		<form id="" name="" method = "post">
		<!--<input type="button" value="Alquilar Vehículo" onclick="window.location.href='movalquilar.php'" class="btn btn-warning disabled">
		<input type="button" value="Consultar Alquileres" onclick="window.location.href='movconsultar.php'" class="btn btn-warning disabled">
		<input type="button" value="Devolver Vehículo" onclick="window.location.href='movdevolver.php'" class="btn btn-warning disabled">-->
			<input type="submit" value="Alquilar Vehículo" name="alquilar" class="btn btn-warning disabled">
			<input type="submit" value="Consultar Alquileres" name="consultar" class="btn btn-warning disabled">
			<input type="submit" value="Devolver Vehículo" name="devolver" class="btn btn-warning disabled">
			</br></br>
			<!--<BR><a href="logout.php">Cerrar Sesión</a>-->
			<input type="submit" value="Cerrar sesión" name="cerrar" class="btn btn-warning disabled">
		</form>
	</div>  
   </body>
</html>



﻿<html>
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bienvenido a MovilMAD</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
  </head>   
 <body>
    <h1>Servicio de ALQUILER DE E-CARS</h1> 
    <div class="container ">
		<div class="card border-success mb-3" style="max-width: 30rem;">
		<div class="card-header">Menú Usuario - CONSULTA ALQUILERES </div>
		<div class="card-body">
	<form action="" method="post">
		<B>Bienvenido/a: <?php echo $_SESSION['nombre_cliente']." ".$_SESSION['apellido_cliente']; ?></B>   <BR><BR>
		<B>Identificador Cliente: <?php echo $_SESSION['id_cliente']; ?></B> <BR><BR>
			 Fecha Desde: <input type='date' name='fechadesde' value='' size=10 placeholder="fechadesde" class="form-control"><br>
			 Fecha Hasta: <input type='date' name='fechahasta' value='' size=10 placeholder="fechahasta" class="form-control"><br>
		<div>
			<input type="submit" value="Consultar" name="Consultar" class="btn btn-warning disabled">
			<input type="submit" value="Volver" name="Volver" class="btn btn-warning disabled">
            </br></br>
            <input type="submit" value="Cerrar sesión" name="Cerrar" class="btn btn-warning disabled">
		</div>
	</form>
    <!--<a href = "logout.php">Cerrar Sesion</a>-->
  </body>
</html>

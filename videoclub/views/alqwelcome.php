<?php
session_start();
if(isset($_SESSION['id_cliente'])){
?>
<html>
   
   <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>VIDEOCLUB - IES Leonardo Da Vinci</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    </head>
   
    <body>
    <h1 class="text-center"> VIDEOCLUB IES LEONARDO DA VINCI</h1>

    <div class="container ">
        <!--Aplicacion-->
		<div class="card border-success mb-3" style="max-width: 30rem;">
		<div class="card-header">Menú Usuario</div>
		<div class="card-body">
		<B>Nombre Cliente: <?php echo $_SESSION['nombre_cliente'];?></B>   <BR>
		<B>Email Cliente: <?php echo $_SESSION['email_cliente'];?></B> <BR>
		<B>Número Socio: <?php echo $_SESSION['id_cliente'];?></B> <BR><BR>
			
		<!--Formulario con botones -->
		<input type="button" value="Alquilar Películas" onclick="window.location.href='../controllers/controller-alquilar.php'" class="btn btn-warning disabled">
		
		<input type="button" value="Consultar Alquileres" onclick="window.location.href='../controllers/controller-consultar.php'" class="btn btn-warning disabled">
		
		<input type="button" value="Devolver Películas" onclick="window.location.href='../controllers/controller-devolver.php'" class="btn btn-warning disabled"><BR><BR>
		<input type="button" value="Volver" onclick="window.location.href='../controllers/controller-volver.php'" class="btn btn-warning disabled"><BR>
		<!--<input type="button" value="Volver" onclick="window.location.href='../index.php'" class="btn btn-warning disabled"><BR>-->

		  <BR><a href="../controllers/controller-cerrar-sesion.php">Cerrar Sesión</a>
	</div>  
   </body>
   
</html>
<?php
}
else{
	header("location: ../controllers/controller-session.php");
}
?>


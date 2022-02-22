<?php

include_once('movconfig.php');

   $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
   
	if (!$db) {
		die("Error conexión: " . mysqli_connect_error());
	}
   
session_start();

if(!isset($_SESSION['id_cliente'])){
    header("location: movlogin.php");
}
else{
    include_once('funciones.php');//pegamos funciones
    if(isset($_POST) && !empty($_POST)) {

        if(isset($_POST['devolver']) && !empty($_POST['devolver'])) {
        
            $matricula= $_POST['vehiculos'];
            insertar_fecha_devolucion($matricula,$_SESSION['id_cliente'], $db);
        }
    
        else(isset($_POST['volver']) && !empty($_POST['volver'])) {
            header("location: movwelcome.php");
        }
      
    }
$matriculas = obtenerMatriculas($_SESSION['id_cliente'],$db);
?>
<html>
   
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
        <!--Aplicacion-->
		<div class="card border-success mb-3" style="max-width: 30rem;">
		<div class="card-header">Menú Usuario - DEVOLUCIÓN VEHÍCULO </div>
		<div class="card-body">
	  
	   

	<!-- INICIO DEL FORMULARIO -->
	<form action="" method="post">

		<B>Bienvenido/a: <?php echo $_SESSION['nombre_cliente']." ".$_SESSION['apellido_cliente']; ?></B>   <BR><BR>
		<B>Identificador Cliente: <?php echo $_SESSION['id_cliente']; ?></B> <BR><BR>
				
			<B>Matricula/Marca/Modelo: </B><select name="vehiculos" class="form-control">
			<?php
            foreach($matriculas as $valor):?>
                <option><?php echo $valor ?></option>
            <?php endforeach;?>	
			</select>
		<BR><BR>
		<div>
			<input type="submit" value="Devolver Vehiculo" name="devolver" class="btn btn-warning disabled">
			<input type="submit" value="Volver" name="volver" class="btn btn-warning disabled">
		</div>		
	</form>
	<!-- FIN DEL FORMULARIO -->
	<a href = "logout.php">Cerrar Sesion</a>
	
  </body>
   
</html>
<?php
}
?>




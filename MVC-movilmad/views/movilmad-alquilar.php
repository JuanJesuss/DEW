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
		<div class="card border-success mb-3" style="max-width: 30rem;">
		<div class="card-header">Menú Usuario - ALQUILAR VEHÍCULOS</div>
		<div class="card-body">
	<form action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
		<B>Bienvenido/a: <?php echo $_SESSION['nombre_cliente']." ".$_SESSION['apellido_cliente']; ?> </B>    <BR><BR>
		<B>Identificador Cliente: <?php echo $_SESSION['id_cliente']; ?></B>  <BR><BR>
		<B>Vehiculos disponibles en este momento: <?php echo $fecha;?></B>  <BR><BR>
			<B>Matricula/Marca/Modelo: </B>
            <select name="vehiculos" class="form-control">
            <?php
            foreach($coches as $valor):?>
                <option><?php echo $valor ?></option>
            <?php endforeach;?>
            </select>
		<BR> <BR>
		<div>
			<input type="submit" value="Agregar a Cesta" name="agregar" class="btn btn-warning disabled">
			<input type="submit" value="Ver Cesta" name="verCesta" class="btn btn-warning disabled">
			<input type="submit" value="Realizar Alquiler" name="realizarAlquiler" class="btn btn-warning disabled"><BR><BR>
			<input type="submit" value="Vaciar Cesta" name="vaciar" class="btn btn-warning disabled">
		</div>		
	</form>
  </body>
</html>


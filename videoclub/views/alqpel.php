<html>
   <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>VIDEOCLUB - IES Leonardo Da Vinci - Alquiler Películas</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    </head>
   <body>
    <h1 class="text-center"> VIDEOCLUB IES LEONARDO DA VINCI</h1>
    <div class="container ">
        <!--Aplicacion-->
		<div class="card border-success mb-3" style="max-width: 30rem;">
		<div class="card-header">Alquiler Películas</div>
		<div class="card-body">
	<!-- INICIO DEL FORMULARIO -->
	<form action="" method="post">
	<B>Nombre Cliente: <?php echo $_SESSION['nombre_cliente'];?></B>   <BR>
	<B>Email Cliente: <?php echo $_SESSION['email_cliente'];?></B> <BR>
	<B>Número Socio: <?php echo $_SESSION['id_cliente'];?></B> <BR><BR>
		<label for="pelicula"><B>Selecciona pelicula: </B></label>
		<select name="pelicula" class="form-control">
		<?php
            foreach($peliculas as $valor):?>
                <option><?php echo $valor ?></option>
            <?php endforeach;?>
		</select><br><br>
		<div>
			<input type="submit" value="Agregar a Cesta" name="agregar" class="btn btn-warning disabled">
			<input type="submit" value="Realizar Alquiler" name="alquilar" class="btn btn-warning disabled">
			<input type="submit" value="Vaciar Cesta" name="vaciar" class="btn btn-warning disabled">
			<input type="submit" value="Volver" name="volver" class="btn btn-warning disabled">
		</div>	
	</form>
	<!-- FIN DEL FORMULARIO -->
	</div>	
  </div>
</body>
</html>

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
		<div class="card-header">Devolución Alquileres</div>
		<div class="card-body">
	<!-- INICIO DEL FORMULARIO -->
	<form action="" method="post">
	<B>Nombre Cliente: <?php echo $_SESSION['nombre_cliente'];?></B>   <BR>
	<B>Email Cliente: <?php echo $_SESSION['email_cliente'];?></B> <BR>
	<B>Número Socio: <?php echo $_SESSION['id_cliente'];?></B> <BR><BR>
	
	<label for="pelicula" > <B>Películas alquiladas:</B> </label>
	<select name="rental" class="form-control">
	<?php foreach($pelis as $clave => $valor){
			foreach($valor as $indice => $val){
				if($indice==0){		
				?><option><?php echo $valor[$indice]."-".$valor[$indice+1];?></option><?php
				}
			}
		  }?>
	</select><br><br>
		<div>
			<input type="submit" value="Devolver Pelicula" name="devolver" class="btn btn-warning disabled">
			<input type="submit" value="Volver" name="volver" class="btn btn-warning disabled">
		</div>		
	</form>
	<!-- FIN DEL FORMULARIO -->
  </div>
</body>
</html>



<?php 
   include('config.php');
   session_start();

   if(!isset($_SESSION['nif_cliente'])){
    header("location: comlogincli.php");
   }
else {
    
if (isset($_POST) && !empty($_POST)) {
    require "../webcompras/funciones.php";//pegamos funciones
	if (isset($_POST['consultar']) && !empty($_POST['consultar'])) {
	  
        if(isset($_POST['fechaini']) && !empty($_POST['fechaini']) && isset($_POST['fechafin']) && !empty($_POST['fechafin'])){
            $fechaini= $_POST['fechaini'];
            $fechafin= $_POST['fechafin'];
            $nif= $_SESSION['nif_cliente'];
            consultar_compra($fechaini, $fechafin, $nif, $db);
        }
        else{
            echo "Debe introducir fecha inicio y fecha fin.";
        }

	    
    }

    
}
    
?>

<html>
   
   <head>
      <title>Welcome </title>
   </head>
   
   <body>
		<h1>Bienvenido <?php echo $_SESSION['login_cliente']; ?></h1> 
		<!-- INICIO DEL FORMULARIO -->
	<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
	<label for="fechaini">Fecha inicio:</label>
    <input type="date" name="fechaini">
    <label for="fechafin">Fecha fin:</label>
    <input type="date" name="fechafin">
	<input type="submit" value="Consultar compras" name="consultar">
	</form>

   </body>
   
</html>

<?php
}
?>


   
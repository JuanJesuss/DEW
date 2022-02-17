<?php
if($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario= $_POST['email'];
    $clave= $_POST['password'];
    
    require_once("models/funciones.php");
    if (comprobar_login($usuario,$clave,$db)==true){
	    require_once("views/movilmad-welcome.php");
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            if(isset($_POST['alquilar']) && !empty($_POST['alquilar'])){
                $fecha= fechaActual();
                $coches = cochesDisponibles($db);
                require_once("views/movilmad-alquilar.php");
            }
        }
    }
    else{
        require_once("views/movilmad-login.php");
    }
}
else{
    require_once("views/movilmad-login.php");
}








?>
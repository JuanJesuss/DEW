<?php
if($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario= $_POST['email'];
    $clave= $_POST['password'];
    
    require_once("models/funciones.php");
    if (comprobar_login($usuario,$clave,$db)==true)
	    require_once("views/movilmad-welcome.php");
    else
        require_once("views/movilmad-nowelcome.php");
}
else{
    require_once("views/movilmad-login.php");
}






?>
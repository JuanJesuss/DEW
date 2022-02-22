<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
    require_once("models/funciones.php");
    if(isset($_POST['alquilar']) && !empty($_POST['alquilar'])){
        $fecha= fechaActual();
        $coches = cochesDisponibles($db);
        session_start();
        require_once("views/movilmad-alquilar.php");
    }
    else{
        $usuario= $_POST['email'];
        $clave= $_POST['password'];
        if (comprobar_login($usuario,$clave,$db)==true){
            $fila= obtenerfila($usuario,$clave,$db);
            session_start();
            $_SESSION['id_cliente'] = $fila['IDCLIENTE'];
            $_SESSION['nombre_cliente'] = $fila['NOMBRE'];
            $_SESSION['apellido_cliente'] = $fila['APELLIDO'];
            require_once("views/movilmad-welcome.php");
        }
        else{
            require_once("views/movilmad-login.php");
        }
    }
}
else{
    require_once("views/movilmad-login.php");
}

?>
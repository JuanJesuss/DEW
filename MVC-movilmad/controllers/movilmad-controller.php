<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
    require_once("models/funciones.php");
    if(isset($_POST['alquilar']) && !empty($_POST['alquilar'])){
        $fecha= fechaActual();
        $coches = cochesDisponibles($db);
        session_start();
        require_once("views/movilmad-alquilar.php");
    }
    elseif(isset($_POST['agregar']) && !empty($_POST['agregar'])){
        session_start();
        if(!isset($_SESSION['cesta'])){
            $_SESSION['cesta']=array($_POST['vehiculos']);
            $fecha= fechaActual();
            $coches = cochesDisponibles($db);
            require_once("views/movilmad-alquilar.php");
        }
        else{
            if(comprobarMatricula($_SESSION['cesta'],$_POST['vehiculos'])==true){
                $fecha= fechaActual();
                $coches = cochesDisponibles($db);
                require_once("views/movilmad-alquilar.php");
            }
            else{
                $fecha= fechaActual();
                $coches = cochesDisponibles($db);
                array_push($_SESSION['cesta'],$_POST['vehiculos']);
                require_once("views/movilmad-alquilar.php");
            }
        }
    }
    elseif(isset($_POST['realizarAlquiler']) && !empty($_POST['realizarAlquiler'])){
        session_start();
        if (!isset($_SESSION['cesta'])){
            $fecha= fechaActual();
            $coches = cochesDisponibles($db);
            require_once("views/movilmad-alquilar.php");
        }
        else{
            $saldo= obtener_saldo($db,$_SESSION['id_cliente']);
            if($saldo>=10){
                efectuar_alquiler($_SESSION['cesta'],$_SESSION['id_cliente'],$db);
                unset($_SESSION['cesta']);
                $fecha= fechaActual();
                $coches = cochesDisponibles($db);
                require_once("views/movilmad-alquilar.php");
            }
            else{
                $fecha= fechaActual();
                $coches = cochesDisponibles($db);
                require_once("views/movilmad-alquilar.php");
            }
        }
    }
    elseif(isset($_POST['vaciar']) && !empty($_POST['vaciar'])){
        session_start();
        if (!isset($_SESSION['cesta'])){
            $fecha= fechaActual();
            $coches = cochesDisponibles($db);
            require_once("views/movilmad-alquilar.php");
        }else{
            unset($_SESSION['cesta']);
            $fecha= fechaActual();
            $coches = cochesDisponibles($db);
            require_once("views/movilmad-alquilar.php");
        }
    }
    elseif(isset($_POST['verCesta']) && !empty($_POST['verCesta'])){
        session_start();
        if (!isset($_SESSION['cesta'])){
            $fecha= fechaActual();
            $coches = cochesDisponibles($db);
            require_once("views/movilmad-alquilar.php");
        }else{
            $fecha= fechaActual();
            $coches = cochesDisponibles($db);
            require_once("views/movilmad-vercesta.php");
        }
    }
    elseif(isset($_POST['consultar']) && !empty($_POST['consultar'])){
        session_start();
        require_once("views/movilmad-consultar.php");
    }
    elseif(isset($_POST['devolver']) && !empty($_POST['devolver'])){
        /*session_start();
        require_once("views/movilmad-consultar.php");*/
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
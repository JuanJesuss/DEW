<?php
require_once("../models/funciones.php");
$db= conexion();
if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(isset($_POST['usuario']) && !empty($_POST['usuario']) && isset($_POST['clave']) && !empty($_POST['clave'])){
        $fila = getCustomerId($db,$_POST['usuario'], $_POST['clave']);
        if(mysqli_num_rows($fila)==1){
            $row = mysqli_fetch_assoc($fila);
            session_start();
            $_SESSION['id_cliente'] = $row['CUSTOMER_ID'];
            $_SESSION['nombre_cliente'] = $row['FIRST_NAME'];
            $_SESSION['apellido_cliente'] = $row['LAST_NAME'];
            $_SESSION['email_cliente'] = $row['EMAIL'];
            header("location: ../views/alqwelcome.php");
        }
        else{
            echo "No existe ningún email con esa contrase&ntilde;a.";
        }
    }
    else{
        if(empty($_POST['usuario'])){
            echo "No se ha proporcionado un usuario!";
        }
        if(empty($_POST['clave'])){
            echo "No se ha proporcionado una contrase&ntilde;a!";
        }
    }
}
require_once("../views/login.php");
?>
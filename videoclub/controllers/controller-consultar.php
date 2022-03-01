<?php
require_once("../models/funciones.php");
$db= conexion();
session_start();
if(isset($_SESSION['id_cliente'])){
    if(isset($_POST['consultar'])){
        $consulta= consultar_alquiler($db,$_POST['tematica'],$_SESSION['id_cliente']);
        while($row = mysqli_fetch_assoc($consulta)) {
            echo "Título: ".$row['TITLE'].", Año de estreno: ".$row['RELEASE_YEAR'].", Fecha de alquiler ".$row['RENTAL_DATE'].", Fecha de devolución ".$row['RETURN_DATE']."<br>";
        }
    }

    if(isset($_POST['volver'])){
        header("location: ../views/alqwelcome.php");
    }

    $fila= obtener_tematicas($db,$_SESSION['id_cliente']);
    $tematicas= array();
    while($row = mysqli_fetch_assoc($fila)) {
        $tema= $row['THEME'];
        array_push($tematicas, $tema);
    }
    require_once("../views/alqcons.php");
}

else{
    header("location: ../controllers/controller-session.php");
}
?>
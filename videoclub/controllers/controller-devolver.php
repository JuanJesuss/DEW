<?php
require_once("../models/funciones.php");
$db= conexion();
session_start();
if(isset($_SESSION['id_cliente'])){
    if(isset($_POST['devolver'])){
        $consulta= consultar_pelis($_SESSION['id_cliente'],$db);
        $pelis= array();
        while($row = mysqli_fetch_assoc($consulta)) {
            array_push($pelis, array($row['TITLE'], $row['RENTAL_DATE']));
        }
        for($i=0; $i<count($pelis); $i++){
            $pel= $pelis[$i][0]."-".$pelis[$i][1];
            if($pel==$_POST['rental']){
                $fila= obtener_id_peli($db,$pelis[$i][0]);
                $row = mysqli_fetch_assoc($fila);
                $id_peli= $row['FILM_ID'];
                $date = getdate();
                $fecha= $date['year']."-".$date['mon']."-".$date['mday']." ".$date['hours'].":".$date['minutes'].":".$date['seconds'];
                if(devolver($id_peli, $pelis[$i][1], $db, $_SESSION['id_cliente'],$fecha)==true){
                    echo "Se devolvió ".$pel;
                }
            }
        }
    }

    if(isset($_POST['volver'])){
        header("location: ../views/alqwelcome.php");
    }

    $consulta= consultar_pelis($_SESSION['id_cliente'],$db);
    $pelis= array();
    while($row = mysqli_fetch_assoc($consulta)) {
        array_push($pelis, array($row['TITLE'], $row['RENTAL_DATE']));
    }
    require_once("../views/alqdev.php");
}

else{
    header("location: ../controllers/controller-session.php");
}
?>
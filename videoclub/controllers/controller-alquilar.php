<?php
require_once("../models/funciones.php");
$db= conexion();
session_start();
if(isset($_SESSION['id_cliente'])){
    if(isset($_POST['agregar'])){
        if(!isset($_SESSION['cesta'])){
            $_SESSION['cesta']=array($_POST['pelicula']);
            echo "Se agregó la película ".$_POST['pelicula'];
        }
        else{
            if(comprobarPelicula($_SESSION['cesta'],$_POST['pelicula'])==true){
                echo "La película ".$_POST['pelicula']." ya ha sido agregada a la cesta";
            }
            else{
                array_push($_SESSION['cesta'],$_POST['pelicula']);
                for($i=0; $i<count($_SESSION['cesta']); $i++){
                    echo "Se agregó la pelicula ".$_SESSION['cesta'][$i]."<br>";
                }
            }
        }
    }

    if(isset($_POST['alquilar'])){
        if(!isset($_SESSION['cesta'])){
            echo "No se ha añadido ninguna película a la cesta.";
        }
        else{
            $pelis_disponibles= array();
            $pelis_no_disponibles= array();
            for($i=0; $i<count($_SESSION['cesta']); $i++){
                $fila= comprobar_disponibilidad($db,$_SESSION['cesta'][$i]);
                $row = mysqli_fetch_assoc($fila);
                $cantidad= $row['QUANTITY'];
                if($cantidad>0){
                    array_push($pelis_disponibles, $_SESSION['cesta'][$i]);
                }
                else{
                    array_push($pelis_no_disponibles, $_SESSION['cesta'][$i]);
                }
            }
            if(empty($pelis_disponibles)){
                unset($_SESSION['cesta']);
                echo "Las películas elegidas ya no están disponibles";
            }
            else{
                for($i=0; $i<count($pelis_disponibles); $i++){
                    $fila= obtener_id_peli($db,$pelis_disponibles[$i]);
                    $row = mysqli_fetch_assoc($fila);
                    $id_peli= $row['FILM_ID'];
                    $date = getdate();
                    $fecha= $date['year']."-".$date['mon']."-".$date['mday']." ".$date['hours'].":".$date['minutes'].":".$date['seconds'];
                    if(alquilar($db,$_SESSION['id_cliente'],$id_peli,$fecha)==true){
                        actualizar_cantidad($db,$id_peli);
                    }
                }
                unset($_SESSION['cesta']);
                for($i=0; $i<count($pelis_disponibles); $i++){
                    echo "Se alquiló ".$pelis_disponibles[$i]."<br>";
                }
                if(!empty($pelis_no_disponibles)){
                    for($i=0; $i<count($pelis_no_disponibles); $i++){
                        echo "Película ".$pelis_no_disponibles[$i]." no disponible<br>";
                    }
                }
            }
        }
    }

    if(isset($_POST['vaciar'])){
        if(!isset($_SESSION['cesta'])){
            echo "No se ha añadido ninguna película a la cesta";
        }
        else{
            unset($_SESSION['cesta']);
            echo "Se quitaron las películas de la cesta";
        }
    }

    if(isset($_POST['volver'])){
        header("location: ../views/alqwelcome.php");
    }

    $fila= obtener_peliculas($db);
    $peliculas= array();
    while($row = mysqli_fetch_assoc($fila)){
        $peli= $row['TITLE'];
        array_push($peliculas, $peli);
    }
    
    require_once("../views/alqpel.php");
}

else{
    header("location: ../controllers/controller-session.php");
}
?>
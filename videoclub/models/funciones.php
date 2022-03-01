<?php

function conexion(){
    define('DB_SERVER', 'localhost');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', 'rootroot');
    define('DB_DATABASE', 'iesvideo');

    $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
	if (!$db) {
		die("Error conexión: ".mysqli_connect_error());
	}
    return $db;
}

function getCustomerId($db,$usuario, $clave){
    $sql= "SELECT CUSTOMER_ID, FIRST_NAME, LAST_NAME, EMAIL FROM CUSTOMER WHERE EMAIL='$usuario' AND concat(LAST_NAME,FIRST_NAME)='$clave' AND ACTIVE= 1;";
    if(mysqli_query($db, $sql)){
        $result= mysqli_query($db, $sql);
        return $result;
    }
    else{
        echo "Error: ".$sql."<br>".mysqli_error($db);
    }
}

function obtener_peliculas($db){
    $sql= "SELECT TITLE FROM FILM, INVENTORY WHERE FILM.FILM_ID=INVENTORY.FILM_ID AND QUANTITY>0;";
    if(mysqli_query($db, $sql)){
        $result= mysqli_query($db, $sql);
        return $result;
    }
    else {
        echo "Error: ".$sql."<br>".mysqli_error($db);
    }
}

function comprobarPelicula($cesta,$pelicula){
    if (in_array($pelicula, $cesta)) {
        return true;
    }
}

function comprobar_disponibilidad($db,$pelicula){
    $sql= "SELECT QUANTITY FROM INVENTORY, FILM WHERE TITLE='$pelicula' AND FILM.FILM_ID=INVENTORY.FILM_ID;";
    if(mysqli_query($db, $sql)){
        $result= mysqli_query($db, $sql);
        return $result;
    }
    else {
        echo "Error: ".$sql."<br>".mysqli_error($db);
    }
}

function alquilar($db,$numerosocio,$id_peli,$fecha){
    $sql= "INSERT INTO RENTAL(FILM_ID, RENTAL_DATE, CUSTOMER_ID, RETURN_DATE) VALUES ('$id_peli','$fecha',$numerosocio,NULL);";
    if(mysqli_query($db, $sql)){
        return true;
    }
    else{
        echo "Error: ".$sql."<br>".mysqli_error($db);
    }
}

function actualizar_cantidad($db,$id_peli){
    $sql= "UPDATE INVENTORY SET QUANTITY=(QUANTITY-1) WHERE FILM_ID='$id_peli';";
    if(!mysqli_query($db, $sql)){
        echo "Error: ".$sql."<br>".mysqli_error($db);
    }
}

function obtener_id_peli($db,$pelicula){
    $sql= "SELECT FILM_ID FROM FILM WHERE TITLE='$pelicula';";
    if(mysqli_query($db, $sql)){
        $result= mysqli_query($db, $sql);
        return $result;
    }
    else {
        echo "Error: ".$sql."<br>".mysqli_error($db);
    }
}

function obtener_tematicas($db,$id_cliente){
    $sql= "SELECT THEME FROM FILM, RENTAL WHERE CUSTOMER_ID='$id_cliente' AND RETURN_DATE IS NULL AND RENTAL.FILM_ID=FILM.FILM_ID GROUP BY THEME;";
    if(mysqli_query($db, $sql)){
        $result= mysqli_query($db, $sql);
        return $result;
    }
    else{
        echo "Error: ".$sql."<br>".mysqli_error($db);
    }
}

function consultar_alquiler($db,$tematica,$id_cliente){
    $sql= "SELECT TITLE, RELEASE_YEAR, RENTAL_DATE, RETURN_DATE FROM FILM, RENTAL WHERE THEME='$tematica' AND CUSTOMER_ID='$id_cliente' AND RENTAL.FILM_ID=FILM.FILM_ID ORDER BY RENTAL_DATE DESC;";
    if(mysqli_query($db, $sql)){
        $result= mysqli_query($db, $sql);
        return $result;
    }
    else{
        echo "Error: ".$sql."<br>".mysqli_error($db);
    }
}

function consultar_pelis($id_cliente,$db){
    $sql= "SELECT TITLE, RENTAL_DATE FROM FILM, RENTAL WHERE RENTAL.FILM_ID=FILM.FILM_ID AND CUSTOMER_ID='$id_cliente' AND RETURN_DATE IS NULL;";
    if(mysqli_query($db, $sql)){
        $result= mysqli_query($db, $sql);
        return $result;    
    }
    else{
        echo "Error: ".$sql."<br>".mysqli_error($db);
    }
}

function devolver($id_pel, $fecha_alquiler, $db, $id_cliente,$fecha){
    $sql= "UPDATE RENTAL SET RETURN_DATE='$fecha' WHERE CUSTOMER_ID='$id_cliente' AND FILM_ID='$id_pel' AND RENTAL_DATE='$fecha_alquiler';";
    if(mysqli_query($db, $sql)){ 
        return true;
    }
    else{
        echo "Error: ".$sql."<br>".mysqli_error($db);
    }
}

?>
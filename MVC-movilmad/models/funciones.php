<?php
$db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
if (!$db) {
    die("Error conexión: " . mysqli_connect_error());
}
function comprobar_login($usuario,$clave,$db){
    
    $sql = "SELECT IDCLIENTE, NOMBRE, APELLIDO FROM RCLIENTES WHERE EMAIL='$usuario' and APELLIDO='$clave' and FECHA_BAJA is NULL;";
    if(mysqli_query($db, $sql)){
        $result = mysqli_query($db,$sql);
        if(mysqli_num_rows($result)==1){
            session_start();
            $row = mysqli_fetch_assoc($result);
            $_SESSION['id_cliente'] = $row['IDCLIENTE'];
            $_SESSION['nombre_cliente'] = $row['NOMBRE'];
            $_SESSION['apellido_cliente'] = $row['APELLIDO'];
            return true;
        }
        else{
            return false;
        }
    }
    else{
        echo "Error: ".$sql."<br>".mysqli_error($db);
    }
}



?>
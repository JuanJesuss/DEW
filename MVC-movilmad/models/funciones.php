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

function obtenerfila($usuario,$clave,$db){
    $sql = "SELECT IDCLIENTE, NOMBRE, APELLIDO FROM RCLIENTES WHERE EMAIL='$usuario' and APELLIDO='$clave' and FECHA_BAJA is NULL;";
    if(mysqli_query($db, $sql)){
        $result = mysqli_query($db,$sql);
        //if(mysqli_num_rows($result)==1){
            $row = mysqli_fetch_assoc($result);
            return $row;
        //}
    }
    else{
        echo "Error: ".$sql."<br>".mysqli_error($db);
    }
}

function fechaActual(){
    $date = getdate();
    $fecha_actual= $date['year']."-".$date['mon']."-".$date['mday']." ".$date['hours'].":".$date['minutes'].":".$date['seconds'];
    return $fecha_actual;
}

function cochesDisponibles($db){
    $coches= array();
    $sql= "SELECT MATRICULA FROM RVEHICULOS WHERE DISPONIBLE='S';";
    if(mysqli_query($db, $sql)){
        $result = mysqli_query($db, $sql);
        if(mysqli_num_rows($result)>0){
            while($row = mysqli_fetch_assoc($result)) {
                $matricula= $row['MATRICULA'];
                array_push($coches, $matricula);
            }
            return $coches;    
        }
    }
    else{
        echo "Error: ".$sql."<br>".mysqli_error($db);
    }
}

function comprobarMatricula($cesta,$matricula){
    if (in_array($matricula, $cesta)) {
        return true;
    }
}

function obtener_saldo($db, $id_cliente){
    $sql= "SELECT SALDO FROM RCLIENTES WHERE IDCLIENTE='$id_cliente';";
    if(mysqli_query($db, $sql)){
        $result= mysqli_query($db, $sql);
        $row = mysqli_fetch_assoc($result);
        $saldo= $row['SALDO'];
        return $saldo; 
    }
    else{
        echo "Error: ".$sql."<br>".mysqli_error($db);
    }
}

function efectuar_alquiler($cesta,$id_cliente,$db){
    $cont=0;
    $fecha= fechaActual();
    while($cont<count($cesta)){
        $matricula=$cesta[$cont];
        insertar_alquiler($id_cliente,$matricula,$fecha,$db);
        $cont++;
    }
}

function insertar_alquiler($id,$matricula,$fecha,$db){
    $sql= "INSERT INTO RALQUILERES (IDCLIENTE, MATRICULA, FECHA_ALQUILER, FECHA_DEVOLUCION, PRECIOTOTAL) VALUES ('$id','$matricula','$fecha',NULL,NULL);";
    if(mysqli_query($db, $sql)){
        actualizar_disponibilidad($matricula,$db);
    }
    else{
        echo "Error: ".$sql."<br>".mysqli_error($db);
    }
}

function actualizar_disponibilidad($matricula,$db){
    $sql= "UPDATE RVEHICULOS SET DISPONIBLE='N' WHERE MATRICULA='$matricula';";
    if(!mysqli_query($db, $sql)){
        echo "Error: ".$sql."<br>".mysqli_error($db);    
    }
}



?>
<?php

//obtenemos los dptos
Function obtener_dptos($conn){
    $dptos= array();
    $sql= "SELECT nombre_dpto FROM departamento;";//obtenemos los nombres de los departamentos
    $result = mysqli_query($conn, $sql);//consultamos si hay datos
    if($result){
        while($row = mysqli_fetch_assoc($result)) {
        array_push($dptos, $row['nombre_dpto']);
        }
    }
    return $dptos;
}

//obtenemos cod_dpto
Function obtener_cod_dpto($nom_dpto, $conn){
    $sql= "SELECT cod_dpto FROM departamento WHERE nombre_dpto='$nom_dpto';";
    $result = mysqli_query($conn, $sql);//consultamos si hay datos
    if($result){
        $row = mysqli_fetch_assoc($result);
        $cod_dpto=$row['cod_dpto'];
    }
    return $cod_dpto;
}

//obtenemos los dni
Function obtener_dni($conn){
    $dni= array();
    $sql= "SELECT dni FROM empleado;";//obtenemos los dni de los empleados
    $result = mysqli_query($conn, $sql);//consultamos si hay datos
    if($result){
        while($row = mysqli_fetch_assoc($result)) {
        array_push($dni, $row['dni']);
        }
    }
    return $dni;
}

Function obtener_relacion($dni, $cod_dpto, $conn){
    $sql= "SELECT nombre_dpto, nombre, apellidos FROM departamento, empleado, emple_depart WHERE empleado.dni='$dni' and departamento.cod_dpto='$cod_dpto' GROUP BY nombre_dpto;";
    if(mysqli_query($conn, $sql)){
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    echo "
    <tr>
    <td>".$row['nombre_dpto']."</td>
    <td>".$row['nombre']."</td>
    <td>".$row['apellidos']."</td>
    </tr>";
    }
    else{
        echo "Error: ".$sql."<br>".mysqli_error($conn);
    }
}

?>
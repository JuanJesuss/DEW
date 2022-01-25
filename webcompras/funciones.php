<?php

Function insertarfila($conn, $nom_cat){

    $sql= "SELECT ID_CATEGORIA FROM CATEGORIA;";//hacemos select de todos los ID_CATEGORIA de la tabla CATEGORIA
    $resultado = mysqli_query($conn, $sql);
    if(mysqli_num_rows($resultado)==0){//si el numero de filas del resultado es cero
        $sql .= "INSERT INTO CATEGORIA (ID_CATEGORIA, NOMBRE) VALUES ('C-001','$nom_cat');";
    }
    else{
        $letra= "C-";
        $num= mysqli_num_rows($resultado);//guardamos el número de filas en la variable num
        $num++;//sumamos 1 a la variable num
            if($num>1 && $num<10){//si el numero es mayor a 1 y menor a 10
                $id_cat= $letra.str_repeat("0", 2).$num;//ID_CAT es C-00num
                $sql .= "INSERT INTO CATEGORIA (ID_CATEGORIA, NOMBRE) VALUES ('$id_cat','$nom_cat');";
            }

            if($num>9 && $num<100){//si el numero es mayor a 9 y menor a 100
                $id_cat= $letra.str_repeat("0", 1).$num;//ID_CAT es C-0num
                $sql .= "INSERT INTO CATEGORIA (ID_CATEGORIA, NOMBRE) VALUES ('$id_cat','$nom_cat');";
            }

            if($num>99 && $num <1000){//si el numero es mayor a 99 y menor a 1000
                $id_cat= $letra.$num;//ID_CAT es C-num
                $sql .= "INSERT INTO CATEGORIA (ID_CATEGORIA, NOMBRE) VALUES ('$id_cat','$nom_cat');";
            }
    }

    if(mysqli_multi_query($conn, $sql)){
        echo "Alta correcta";
    }
    else{
        echo "Error: ".$sql."<br>".mysqli_error($conn);
    }
}

//obtenemos categorías
Function obtenercat($conn){
    $cat= array();
    $sql= "SELECT NOMBRE FROM CATEGORIA;";//obtenemos los nombres de los departamentos
    if(mysqli_query($conn, $sql)){//si la consulta se hizo correctamente
        $result = mysqli_query($conn, $sql);//guardamos el resultado
        if(mysqli_num_rows($result)>0){//si el número de filas es mayor a cero
            while($row = mysqli_fetch_assoc($result)) {//mientras que haya filas
                array_push($cat, $row['NOMBRE']);//almacenamos los nombres en el array
            }
            return $cat;    
        }
    }
    else{
        echo "Error: ".$sql."<br>".mysqli_error($conn);
    }
}

//obtenemos id_categoria
Function obteneridcat($nomcat, $conn){
    $sql= "SELECT ID_CATEGORIA FROM CATEGORIA WHERE NOMBRE='$nomcat';";
    if(mysqli_query($conn, $sql)){//si la consulta se hizo correctamente
        $result= mysqli_query($conn, $sql);//guardamos el resultado
        if(mysqli_num_rows($result)==1){
            $row= mysqli_fetch_assoc($result);
            $id_cat= $row["ID_CATEGORIA"];
        }
        return $id_cat;
    }
    else{
        echo "Error: ".$sql."<br>".mysqli_error($conn);
    }
}

//obtenemos id producto
Function obteneridpro($conn){

    $sql= "SELECT ID_PRODUCTO FROM PRODUCTO;";//hacemos select de todos los ID_PRODUCTO de la tabla PRODUCTO
    if(mysqli_query($conn, $sql)){//si la consulta se hizo correctamente
        $resultado = mysqli_query($conn, $sql);//guardamos resultado
        if(mysqli_num_rows($resultado)==0){//si el numero de filas del resultado es cero
            $idpro= "P0001";
        }
        else{
            $letra= "P";
            $num= mysqli_num_rows($resultado);//guardamos el numero de filas en la variable num
            $num++;//sumamos 1 a la variable num
                if($num>1 && $num<10){//si num es mayor a 1 y menor a 10
                    $idpro= $letra.str_repeat("0", 3).$num;//idpro es P000num
                }

                if($num>9 && $num<100){//si num es mayor a 9 y menor a 100
                    $idpro= $letra.str_repeat("0", 2).$num;//idpro es P00num
                }

                if($num>99 && $num <1000){//si num es mayor a 99 y menor a 1000
                    $idpro= $letra.str_repeat("0",1).$num;//idpro es P0num
                }

                if($num>999 && $num <10000){//si num es mayor a 999 y menor a 10000
                    $idpro= $letra.$num;//idpro es Pnum
                }
        }
        return $idpro;
    }
    else{
        echo "Error: ".$sql."<br>".mysqli_error($conn);
    }

}

//alta producto
Function altapro($idcat, $nompro, $precio, $idpro, $conn){
    $sql= "INSERT INTO PRODUCTO (ID_PRODUCTO, NOMBRE, PRECIO, ID_CATEGORIA) VALUES ('$idpro','$nompro', '$precio', '$idcat');";
    if(mysqli_query($conn, $sql)){
        echo "Alta correcta";
    }
    else{
        echo "Error: ".$sql."<br>".mysqli_error($conn);
    }
}

Function obtener_cantidad_almacenes($conn){
    $sql= "SELECT NUM_ALMACEN FROM ALMACEN;";
    if(mysqli_query($conn, $sql)){
        $resultado= mysqli_query($conn, $sql);
        $num_filas= mysqli_num_rows($resultado);//obtenemos numero filas
        return $num_filas;//devolvemos numero filas
    }
    else{
        echo "Error: ".$sql."<br>".mysqli_error($conn);
    }
}

//obtenemos nombres productos
Function nom_pro($conn){
    $nom_pro= array();
    $sql= "SELECT NOMBRE FROM PRODUCTO;";
    if(mysqli_query($conn, $sql)){
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result)>0){
            while($row = mysqli_fetch_assoc($result)) {
                array_push($nom_pro, $row['NOMBRE']);
            }
            return $nom_pro;    
        }
    }
    else{
        echo "Error: ".$sql."<br>".mysqli_error($conn);
    }
}

//obtenemos numeros almacenes
Function num_alm($conn){
    $num_alm= array();
    $sql= "SELECT NUM_ALMACEN FROM ALMACEN;";
    if(mysqli_query($conn, $sql)){
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result)>0){
            while($row = mysqli_fetch_assoc($result)) {
                array_push($num_alm, $row['NUM_ALMACEN']);
            }
            return $num_alm;    
        }
    }
    else{
        echo "Error: ".$sql."<br>".mysqli_error($conn);
    }
}

Function obtener_idpro($conn, $nompro){
    $sql= "SELECT ID_PRODUCTO FROM PRODUCTO WHERE NOMBRE='$nompro';";
    if(mysqli_query($conn, $sql)){
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $idpro= $row['ID_PRODUCTO'];
        return $idpro;
    }
    else{
        echo "Error: ".$sql."<br>".mysqli_error($conn);
    }
}

Function almacenar($idpro, $num_alm, $cant, $conn){
    $sql= "INSERT INTO ALMACENA (NUM_ALMACEN, ID_PRODUCTO, CANTIDAD) VALUES ('$num_alm', '$idpro', '$cant');";
    if(mysqli_query($conn, $sql)){
        echo "El producto se ha aprovisionado correctamente";
    }
    else{
        echo "Error: ".$sql."<br>".mysqli_error($conn);
    }
}

Function constock($nom_prod, $idpro, $conn){
    $sql= "SELECT NOMBRE, NUM_ALMACEN, CANTIDAD 
    FROM PRODUCTO, ALMACENA 
    WHERE NOMBRE= '$nom_prod' AND ALMACENA.ID_PRODUCTO='$idpro';";
    if(mysqli_query($conn, $sql)){
        $result= mysqli_query($conn, $sql);
        if(mysqli_num_rows($result)>0){
            echo"
            <table>
            <tr>
            <th>N&uacute;mero Almac&eacute;n</th>
            <th>Cantidad</th>
            </tr>";
            while($row = mysqli_fetch_assoc($result)){
                $num_alm= $row['NUM_ALMACEN'];
                $cant= $row['CANTIDAD'];
                echo "
                <tr>
                <td>$num_alm</td>
                <td>$cant</td>
                </tr>";
            }
            echo "</table>";
        }
        else{
            echo "No hay resultado";
        }
    }
    else{
        echo "Error: ".$sql."<br>".mysqli_error($conn);
    }
}

Function con_alm($conn, $num_alm){
    $sql= "SELECT PRODUCTO.ID_PRODUCTO, NOMBRE, PRECIO, ID_CATEGORIA FROM PRODUCTO, ALMACENA WHERE NUM_ALMACEN='$num_alm' AND PRODUCTO.ID_PRODUCTO=ALMACENA.ID_PRODUCTO;";
        if(mysqli_query($conn, $sql)){
            $result= mysqli_query($conn, $sql);
            echo"
            <table>
            <tr>
            <td>ID_PRODUCTO</td>
            <td>NOMBRE</td>
            <td>PRECIO</td>
            <td>ID_CATEGORIA</td>
            </tr>";
            while($row= mysqli_fetch_assoc($result)){
                $idpro= $row['ID_PRODUCTO'];
                $nom= $row['NOMBRE'];
                $pre= $row['PRECIO'];
                $idcat= $row['ID_CATEGORIA'];
                echo"
                <tr>
                <td>$idpro</td>
                <td>$nom</td>
                <td>$pre</td>
                <td>$idcat</td>
                </tr>";
            }
            echo "</table>";
        }
        else{
            echo "Error: ".$sql."<br>".mysqli_error($conn);
        }
}

Function obtenerdni($conn){
    $sql= "SELECT NIF FROM CLIENTE;";
    if(mysqli_query($conn, $sql)){
        $result= mysqli_query($conn, $sql);
        $dni= array();
        while($row= mysqli_fetch_assoc($result)){
            $nif= $row['NIF'];
            array_push($dni, $nif);
        }
        return $dni;
    }
    else{
        echo "Error: ".$sql."<br>".mysqli_error($conn);
    }
}

Function con_compra($conn, $dni, $desde, $hasta){
    $sql= "SELECT PRODUCTO.ID_PRODUCTO, PRODUCTO.NOMBRE, PRODUCTO.PRECIO 
     FROM PRODUCTO, COMPRA, CLIENTE 
     WHERE CLIENTE.NIF='$dni' 
     AND COMPRA.NIF='$dni' 
     AND (FECHA_COMPRA>='$desde' AND FECHA_COMPRA<='$hasta')
     AND COMPRA.ID_PRODUCTO= PRODUCTO.ID_PRODUCTO;";

     if(mysqli_query($conn, $sql)){
         $result= mysqli_query($conn, $sql);
         if(mysqli_num_rows($result)>0){
            echo"
            <table>
            <tr>
            <td>ID_PRODUCTO</td>
            <td>NOMBRE</td>
            <td>PRECIO</td>
            </tr>";
            while($row= mysqli_fetch_assoc($result)){
                $idpro= $row['ID_PRODUCTO'];
                $nom= $row['NOMBRE'];
                $pre= $row['PRECIO'];
                echo "
                <tr>
                <td>$idpro</td>
                <td>$nom</td>
                <td>$pre</td>
                </tr>";
            }
            echo "</table>";
        }
        else{
            echo "No hay resultados";
        }
     }
     else{
        echo "Error: ".$sql."<br>".mysqli_error($conn);
     }
}

Function tot_com($conn, $dni, $desde, $hasta){
    $sql= "SELECT UNIDADES, PRECIO FROM PRODUCTO, COMPRA, CLIENTE
    WHERE CLIENTE.NIF='$dni' 
    AND COMPRA.NIF='$dni'
    AND (FECHA_COMPRA>='$desde' AND FECHA_COMPRA<='$hasta')
    AND COMPRA.ID_PRODUCTO= PRODUCTO.ID_PRODUCTO;";

    if(mysqli_query($conn, $sql)){
        $result=(mysqli_query($conn, $sql));
        if(mysqli_num_rows($result)>0){
            $suma=0;
            while($row= mysqli_fetch_assoc($result)){
                $uni= $row['UNIDADES'];
                $pre= $row['PRECIO'];
                $tot= $uni*$pre;
                $suma= $suma+$tot;
            }
            echo "Total compras:" .$suma;
        }
    }
    else{
        echo "Error: ".$sql."<br>".mysqli_error($conn);
    }
}

//comprobamos si nif esta vacio
Function comprobar_vacio($valido, $nif){
    if(empty($nif)){
        $valido=false;
    }
    else{
        $valido=true;
    }
    return $valido;
}

//comprobamos longitud nif
Function comprobar_longitud($valido, $nif){
    if(strlen($nif)==9){//si la longitud del NIF es 9
        $valido=true;
    }
    else{
        $valido=false;
    }
    return $valido;
}

//comprobamos digitos
Function comprobar_digitos($valido, $nif){
    $numeros = substr($nif, 0, -1);//obtenemos todos los caracteres menos el ultimo
    if(strlen($numeros)==8){//si la longitud es 8
        if(ctype_digit($numeros)){//si todos los caracteres son numeros
            $valido= true;
        }
        else{
            $valido= false;
        }
    }
    else{
        $valido= false;
    }
    return $valido;
}

//comprobamos letra
Function comprobar_letra($valido, $nif){
    $letra = substr($nif, -1);//obtenemos ultimo caracter
    if(ctype_alpha($letra)){//si el ultimo caracter es letra
        $valido=true;
    }
    else{
        $valido= false;
    }
    return $valido;
}

Function altacliente($conn, $nif, $nom, $ape, $cp, $dir, $ciu){
    $sql= "INSERT INTO CLIENTE (NIF, NOMBRE, APELLIDO, CP, DIRECCION, CIUDAD) VALUES ('$nif','$nom','$ape','$cp','$dir','$ciu');";
    if(mysqli_query($conn, $sql)){
        echo "Alta correcta";
    }
    else{
        echo "Error: ".$sql."<br>".mysqli_error($conn);
    }
}

Function comprobar_compra($conn, $nif, $idpro){
    $sql= "SELECT UNIDADES FROM COMPRA WHERE NIF='$nif' AND ID_PRODUCTO='$idpro';";
    if(mysqli_query($conn, $sql)){
        $result= mysqli_query($conn, $sql);
        $row= mysqli_fetch_assoc($result);
        return $row['UNIDADES'];
    }
    else{
        echo "Error: ".$sql."<br>".mysqli_error($conn);
    }
}

Function obtener_cant_prod($conn, $idpro){
    $sql= "SELECT SUM(CANTIDAD) FROM ALMACENA WHERE ID_PRODUCTO='$idpro';";
    if(mysqli_query($conn, $sql)){
        $result= mysqli_query($conn, $sql);
        if(mysqli_num_rows($result)>0){
            $row= mysqli_fetch_assoc($result);
            return $row["SUM(CANTIDAD)"];
        }
        else{
            echo "No hay registro";
        }
    }
    else{
        echo "Error: ".$sql."<br>".mysqli_error($conn);    
    }
}

Function insertar_compra($conn, $nif, $idpro, $fecha){
    $sql= "INSERT INTO COMPRA (NIF, ID_PRODUCTO, FECHA_COMPRA, UNIDADES) VALUES ('$nif','$idpro','$fecha','1');";
    if(mysqli_query($conn, $sql)){
        echo "Compra realizada correctamente";
    }
    else{
        echo "Error: ".$sql."<br>".mysqli_error($conn);
    }
}

Function insertarRegistro($conn, $nif, $nom, $ape, $cp, $dir, $ciu, $pass){
    $sql= "INSERT INTO CLIENTE (NIF, NOMBRE, APELLIDO, CP, DIRECCION, CIUDAD, clave) VALUES ('$nif','$nom','$ape','$cp','$dir','$ciu','$pass');";
    if(mysqli_query($conn, $sql)){
        echo "Se ha registrado al cliente";
    }
    else{
        echo "Error: ".$sql."<br>".mysqli_error($conn);
    }
}

Function comprar($cesta, $db, $nif){
    //var_dump($cesta);
    //echo count($cesta);
    for($i=0; $i<count($cesta); $i++){
        $nombre_producto= $cesta[$i][0];
        $cantidad_elegida= $cesta[$i][1];
        $idpro= obtener_idpro($db, $nombre_producto);
        $cantidad_disponible= obtener_cant_prod($db, $idpro);
        
        if($cantidad_disponible==0){
            echo "No hay stock de ".$nombre_producto."<br>";
        }
        else if($cantidad_disponible<$cantidad_elegida && $cantidad_disponible!=0){
            echo "Solo hay ".$cantidad_disponible." ".$nombre_producto." en stock<br>";
        }
        else{
            $date = getdate();
            $fecha_compra= $date['year']."-".$date['mon']."-".$date['mday'];
            insertarCompra($db, $nif, $idpro, $fecha_compra, $cantidad_elegida, $nombre_producto);
        }

    }


}

Function insertarCompra($conn, $nif, $idpro, $fecha, $cantidad, $producto){
    $sql= "INSERT INTO COMPRA (NIF, ID_PRODUCTO, FECHA_COMPRA, UNIDADES) VALUES ('$nif','$idpro','$fecha','$cantidad');";
    if(mysqli_query($conn, $sql)){
        echo "Se compr&oacute; ".$cantidad." ".$producto."<br>";
    }
    else{
        echo "Error: ".$sql."<br>".mysqli_error($conn);
    }
}

Function consultar_compra($fechaini, $fechafin, $nif, $db){
    $sql= "SELECT NIF, NOMBRE, FECHA_COMPRA, UNIDADES FROM PRODUCTO, COMPRA WHERE NIF='$nif' AND COMPRA.ID_PRODUCTO=PRODUCTO.ID_PRODUCTO AND (FECHA_COMPRA<='$fechafin' AND FECHA_COMPRA>='$fechaini');";
    if(mysqli_query($db, $sql)){
        $result= mysqli_query($db, $sql);
        if(mysqli_num_rows($result)>0){
           echo"
           <table>
           <tr>
           <th>NIF</th>
           <th>NOMBRE</th>
           <th>FECHA_COMPRA</th>
           <th>UNIDADES</th>
           </tr>";
           while($row= mysqli_fetch_assoc($result)){
               $vnif= $row['NIF'];
               $nom= $row['NOMBRE'];
               $fecha= $row['FECHA_COMPRA'];
               $unidades= $row['UNIDADES'];
               echo "
               <tr>
               <td>$vnif</td>
               <td>$nom</td>
               <td>$fecha</td>
               <td>$unidades</td>
               </tr>";
           }
           echo "</table>";
       }
       else{
           echo "No hay resultados.";
       }
    }
    else{
       echo "Error: ".$sql."<br>".mysqli_error($db);
    }
}


?>
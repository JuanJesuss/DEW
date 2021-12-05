<?php

Function leer_datos_fichero($fich){
    echo "<table>";
    $fichero = fopen($fich, "r") or die("No se puede abrir el fichero!");//abrimos fichero ibex35.txt
    while(!feof($fichero)) {//mientras que el fichero no acabe
        $linea= fgets($fichero);//obtenemos una línea
        $dividir_linea= explode("  ", $linea);//dividimos la línea cada vez que encontremos dos espacios. La última posición la ocupará el campo hora, el cual no deseamos leer
        $longitud= count($dividir_linea);//obtenemos el número de posiciones
        echo "<tr>";
        for($i=0; $i<($longitud-1); $i++){//recorremos las posiciones, menos la última
            if($dividir_linea[$i]!=""){//si la posición no está vacía
            echo "<td>".$dividir_linea[$i]."</td>";//mostramos posición
            }
        }       
        echo "<tr>";
    }
    fclose($fichero);
    echo "</table>";
}

Function mostrar_datos_valor_bursatil($fich, $valor_bursatil){
    $cont=0;
    echo "<table>";
    $fichero = fopen($fich, "r") or die("No se puede abrir el fichero!");//abrimos fichero ibex35.txt
    while(!feof($fichero)) {//mientras que el fichero no acabe
        if($cont==0){//para saber que es primera línea
        $linea= fgets($fichero);//obtenemos línea  
        $dividir_linea= explode("  ", $linea);//dividimos la línea cada vez que encontremos dos espacios
        $numero_posiciones= count($dividir_linea);///obtenemos el número de posiciones
        echo "<tr>";
            for($i=0; $i<$numero_posiciones; $i++){//recorremos las posiciones
                if($dividir_linea[$i]!=""){//si la posición no está vacía
                    echo "<td>".$dividir_linea[$i]."</td>";//la mostramos
                }
            }
        echo "</tr>";
        }
        else{
            $linea= fgets($fichero);//obtenemos línea
            $dividir_linea= explode("  ", $linea);//dividimos la línea cada vez que encontremos dos espacios
            $numero_posiciones= count($dividir_linea);///obtenemos el número de posiciones
            if($dividir_linea[0]==$valor_bursatil){//si la primera posición es igual al valor bursatil
                echo "<tr>";
                for($i=0; $i<$numero_posiciones; $i++){//recorremos las posiciones
                    if($dividir_linea[$i]!=""){//si la posición no está vacía
                        echo "<td>".$dividir_linea[$i]."</td>";//la mostramos
                    }
                }
                echo "</tr>";
            }          
        }
        $cont++;
    }
    fclose($fichero);
    echo "</table>";
}

Function mostrar_datos_dos_valores_bursatiles($fich, $valor_bursatil_1, $valor_bursatil_2){
    $cont=0;
    $valores= array();//creamos array para los valores de la primera fila
    $valores_bursatiles_1= array();//creamos array para valor_bursatil_1
    $valores_bursatiles_2= array();//creamos array para valor_bursatil_2
    echo "<table>";
    $fichero = fopen($fich, "r") or die("No se puede abrir el fichero!");//abrimos fichero ibex35.txt
    while(!feof($fichero)) {//mientras que el fichero no acabe
        if($cont==0){//para saber que es primera línea
        $linea= fgets($fichero);//obtenemos línea  
        $dividir_linea= explode("  ", $linea);//dividimos la línea cada vez que encontremos dos espacios
        $numero_posiciones= count($dividir_linea);///obtenemos el número de posiciones
        echo "<tr>";
            for($i=0; $i<$numero_posiciones; $i++){//recorremos las posiciones
                if($dividir_linea[$i]!=""){//si la posición no está vacía
                    array_push($valores, $dividir_linea[$i]);//la añadimos al array valores
                }
            }
            echo "<td>".$valores[0]."</td>";//mostramos la posición que corresponde a valor
            echo "<td>".$valores[1]."</td>";//mostramos la posición que corresponde a último
            echo "<td>".$valores[5]."</td>";//mostramos la posición que corresponde a máximo
            echo "<td>".$valores[6]."</td>";//mostramos la posición que corresponde a mínimo
        echo "</tr>";
        }
        else{
            $linea= fgets($fichero);//obtenemos línea
            $dividir_linea= explode("  ", $linea);//dividimos la línea cada vez que encontremos dos espacios
            $numero_posiciones= count($dividir_linea);///obtenemos el número de posiciones
            if($dividir_linea[0]==$valor_bursatil_1){//si la primera posición es igual al valor bursatil 1
                echo "<tr>";
                for($i=0; $i<$numero_posiciones; $i++){//recorremos las posiciones
                    if($dividir_linea[$i]!=""){//si la posición no está vacía
                        array_push($valores_bursatiles_1, $dividir_linea[$i]);//la añadimos al array valores_bursatiles_1
                    }
                }
                echo "<td>".$valores_bursatiles_1[0]."</td>";//mostramos la posición que corresponde a valor
                echo "<td>".$valores_bursatiles_1[1]."</td>";//mostramos la posición que corresponde a último
                echo "<td>".$valores_bursatiles_1[5]."</td>";//mostramos la posición que corresponde a máximo
                echo "<td>".$valores_bursatiles_1[6]."</td>";//mostramos la posición que corresponde a mínimo
                echo "</tr>";
            }
            if($dividir_linea[0]==$valor_bursatil_2){//si la primera posición es igual al valor bursatil 2
                echo "<tr>";
                for($i=0; $i<$numero_posiciones; $i++){//recorremos las posiciones
                    if($dividir_linea[$i]!=""){//si la posición no está vacía
                        array_push($valores_bursatiles_2, $dividir_linea[$i]);//la añadimos al array valores_bursatiles_2
                    }
                }
                echo "<td>".$valores_bursatiles_2[0]."</td>";//mostramos la posición que corresponde a valor
                echo "<td>".$valores_bursatiles_2[1]."</td>";//mostramos la posición que corresponde a último
                echo "<td>".$valores_bursatiles_2[5]."</td>";//mostramos la posición que corresponde a máximo
                echo "<td>".$valores_bursatiles_2[6]."</td>";//mostramos la posición que corresponde a mínimo
                echo "</tr>";
            }          
        }
        $cont++;
    }
    fclose($fichero);
    echo "</table>";
}

Function mostrar_valor_bursatil_maxima_cotizacion($fich, $valor_bursatil_1, $valor_bursatil_2){
    $cont=0;
    $valores= array();//creamos array para los valores de la primera fila
    $valores_bursatiles_1= array();//creamos array para valor_bursatil_1
    $valores_bursatiles_2= array();//creamos array para valor_bursatil_2
    echo "<table>";
    $fichero = fopen($fich, "r") or die("No se puede abrir el fichero!");//abrimos fichero ibex35.txt
    while(!feof($fichero)) {//mientras que el fichero no acabe
        if($cont==0){//para saber que es primera línea
        $linea= fgets($fichero);//obtenemos línea  
        $dividir_linea= explode("  ", $linea);//dividimos la línea cada vez que encontremos dos espacios
        $numero_posiciones= count($dividir_linea);///obtenemos el número de posiciones
        echo "<tr>";
            for($i=0; $i<$numero_posiciones; $i++){//recorremos las posiciones
                if($dividir_linea[$i]!=""){//si la posición no está vacía
                    array_push($valores, $dividir_linea[$i]);//la añadimos al array valores
                }
            }
            echo "<td>".$valores[0]."</td>";//mostramos la posición que corresponde a valor
            echo "<td>".$valores[1]."</td>";//mostramos la posición que corresponde a último
            echo "<td>".$valores[5]."</td>";//mostramos la posición que corresponde a máximo
            echo "<td>".$valores[6]."</td>";//mostramos la posición que corresponde a mínimo
            echo "<td>".$valores[8]."</td>";//mostramos la posición que corresponde a capitalización
        echo "</tr>";
        }
        else{
            $linea= fgets($fichero);//obtenemos línea
            $dividir_linea= explode("  ", $linea);//dividimos la línea cada vez que encontremos dos espacios
            $numero_posiciones= count($dividir_linea);///obtenemos el número de posiciones
            if($dividir_linea[0]==$valor_bursatil_1){//si la primera posición es igual al valor bursatil 1
                for($i=0; $i<$numero_posiciones; $i++){//recorremos las posiciones
                    if($dividir_linea[$i]!=""){//si la posición no está vacía
                        array_push($valores_bursatiles_1, $dividir_linea[$i]);//la añadimos al array valores_bursatiles_1
                    }
                }
            }
            if($dividir_linea[0]==$valor_bursatil_2){//si la primera posición es igual al valor bursatil 2
                for($i=0; $i<$numero_posiciones; $i++){//recorremos las posiciones
                    if($dividir_linea[$i]!=""){//si la posición no está vacía
                        array_push($valores_bursatiles_2, $dividir_linea[$i]);//la añadimos al array valores_bursatiles_2
                    }
                }
            }    
        }
        $cont++;
    }
    fclose($fichero);//cerramos fichero
    $maxima_cotización_valor_bursatil_1= $valores_bursatiles_1[1];//almacenamos la maxima cotización del valor bursatil 1 en la variable $maxima_cotización_valor_bursatil_1
    $maxima_cotización_valor_bursatil_2= $valores_bursatiles_2[1];//almacenamos la maxima cotización del valor bursatil 2 en la variable $maxima_cotización_valor_bursatil_2
    $maxima_cotización_valor_bursatil_1= str_replace(',', '.', $maxima_cotización_valor_bursatil_1);//si se encuentra una coma, se pasa a punto
    $maxima_cotización_valor_bursatil_2= str_replace(',', '.', $maxima_cotización_valor_bursatil_2);
    if($maxima_cotización_valor_bursatil_1>$maxima_cotización_valor_bursatil_2){//si la maxíma cotización del valor bursatil 1 es mayor a la maxima cotización del valor bursatil 2
        echo "<tr>";
        echo "<td>".$valores_bursatiles_1[0]."</td>";//mostramos la posición que corresponde a valor
        echo "<td>".$valores_bursatiles_1[1]."</td>";//mostramos la posición que corresponde a último
        echo "<td>".$valores_bursatiles_1[5]."</td>";//mostramos la posición que corresponde a máximo
        echo "<td>".$valores_bursatiles_1[6]."</td>";//mostramos la posición que corresponde a mínimo
        echo "<td>".$valores_bursatiles_1[8]."</td>";//mostramos la posición que corresponde a capitalización
        echo "</tr>";
        echo "</table>";
    }
    if($maxima_cotización_valor_bursatil_2>$maxima_cotización_valor_bursatil_1){//si la maxíma cotización del valor bursatil 2 es mayor a la maxima cotización del valor bursatil 1
        echo "<tr>";
        echo "<td>".$valores_bursatiles_2[0]."</td>";//mostramos la posición que corresponde a valor
        echo "<td>".$valores_bursatiles_2[1]."</td>";//mostramos la posición que corresponde a último
        echo "<td>".$valores_bursatiles_2[5]."</td>";//mostramos la posición que corresponde a máximo
        echo "<td>".$valores_bursatiles_2[6]."</td>";//mostramos la posición que corresponde a mínimo
        echo "<td>".$valores_bursatiles_2[8]."</td>";//mostramos la posición que corresponde a capitalización
        echo "</tr>";
        echo "</table>";
    }
    if($maxima_cotización_valor_bursatil_1==$maxima_cotización_valor_bursatil_2){//si la maxíma cotización del valor bursatil 1 es igual a la maxima cotización del valor bursatil 2
        echo "</table>";
        echo "Ambas cotizaciones máximas son iguales.";
    }
}

Function mostrar_porcentaje_variacion_y_acumulado($fich, $valor_bursatil_1, $valor_bursatil_2){
    $cont=0;
    $valores= array();//creamos array para los valores de la primera fila
    $valores_bursatiles_1= array();//creamos array para valor_bursatil_1
    $valores_bursatiles_2= array();//creamos array para valor_bursatil_2
    echo "<table>";
    $fichero = fopen($fich, "r") or die("No se puede abrir el fichero!");//abrimos fichero ibex35.txt
    while(!feof($fichero)) {//mientras que el fichero no acabe
        if($cont==0){//para saber que es primera línea
        $linea= fgets($fichero);//obtenemos línea  
        $dividir_linea= explode("  ", $linea);//dividimos la línea cada vez que encontremos dos espacios
        $numero_posiciones= count($dividir_linea);///obtenemos el número de posiciones
            for($i=0; $i<$numero_posiciones; $i++){//recorremos las posiciones
                if($dividir_linea[$i]!=""){//si la posición no está vacía
                    array_push($valores, $dividir_linea[$i]);//la añadimos al array valores
                }
            }
            echo "<tr>
            <td>".$valores[0]."</td><!--mostramos la posición que corresponde a valor-->
            <td>".$valores[2]."</td><!--mostramos la posición que corresponde a porcentaje variación-->
            <td>".$valores[4]."</td><!--mostramos la posición que corresponde a porcentaje acumulado-->
            </tr>";
        }
        else{
            $linea= fgets($fichero);//obtenemos línea
            $dividir_linea= explode("  ", $linea);//dividimos la línea cada vez que encontremos dos espacios
            $numero_posiciones= count($dividir_linea);///obtenemos el número de posiciones
            if($dividir_linea[0]==$valor_bursatil_1){//si la primera posición es igual al valor bursatil 1
                for($i=0; $i<$numero_posiciones; $i++){//recorremos las posiciones
                    if($dividir_linea[$i]!=""){//si la posición no está vacía
                        array_push($valores_bursatiles_1, $dividir_linea[$i]);//la añadimos al array valores_bursatiles_1
                    }
                }
                echo "<tr>
                <td>".$valores_bursatiles_1[0]."</td><!--mostramos el nombre del valor bursatil-->
                <td>".$valores_bursatiles_1[2]."</td><!--mostramos el porcentaje de variación del valor bursatil-->
                <td>".$valores_bursatiles_1[4]."</td><!--mostramos el porcentaje acumulado del valor bursatil-->
                </tr>";
            }
            if($dividir_linea[0]==$valor_bursatil_2){//si la primera posición es igual al valor bursatil 2
                for($i=0; $i<$numero_posiciones; $i++){//recorremos las posiciones
                    if($dividir_linea[$i]!=""){//si la posición no está vacía
                        array_push($valores_bursatiles_2, $dividir_linea[$i]);//la añadimos al array valores_bursatiles_2
                    }
                }
                echo "<tr>
                <td>".$valores_bursatiles_2[0]."</td><!--mostramos el nombre del valor bursatil-->
                <td>".$valores_bursatiles_2[2]."</td><!--mostramos el porcentaje de variación del valor bursatil-->
                <td>".$valores_bursatiles_2[4]."</td><!--mostramos el porcentaje acumulado del valor bursatil-->
                </tr>
                </table>";
            }        
        }
        $cont++;
    }
    fclose($fichero);//cerramos fichero
}

Function mostrar_minima_cotizacion_y_media_volumen($fich, $valor_bursatil_1, $valor_bursatil_2){
    $cont=0;
    $valores= array();//creamos array para los valores de la primera fila
    $valores_bursatiles_1= array();//creamos array para valor_bursatil_1
    $valores_bursatiles_2= array();//creamos array para valor_bursatil_2
    echo "<table>";
    $fichero = fopen($fich, "r") or die("No se puede abrir el fichero!");//abrimos fichero ibex35.txt
    while(!feof($fichero)) {//mientras que el fichero no acabe
        if($cont==0){//para saber que es primera línea
        $linea= fgets($fichero);//obtenemos línea  
        $dividir_linea= explode("  ", $linea);//dividimos la línea cada vez que encontremos dos espacios
        $numero_posiciones= count($dividir_linea);///obtenemos el número de posiciones
            for($i=0; $i<$numero_posiciones; $i++){//recorremos las posiciones
                if($dividir_linea[$i]!=""){//si la posición no está vacía
                    array_push($valores, $dividir_linea[$i]);//la añadimos al array valores
                }
            }
            echo "<tr>
            <td>".$valores[0]."</td><!--mostramos la posición que corresponde a valor-->
            <td>".$valores[6]."</td><!--mostramos la posición que corresponde a minima-->
            <td>".$valores[7]."</td><!--mostramos la posición que corresponde a volumen-->
            </tr>";
        }
        else{
            $linea= fgets($fichero);//obtenemos línea
            $dividir_linea= explode("  ", $linea);//dividimos la línea cada vez que encontremos dos espacios
            $numero_posiciones= count($dividir_linea);///obtenemos el número de posiciones
            if($dividir_linea[0]==$valor_bursatil_1){//si la primera posición es igual al valor bursatil 1
                for($i=0; $i<$numero_posiciones; $i++){//recorremos las posiciones
                    if($dividir_linea[$i]!=""){//si la posición no está vacía
                        array_push($valores_bursatiles_1, $dividir_linea[$i]);//la añadimos al array valores_bursatiles_1
                    }
                }
                echo "<tr>
                <td>".$valores_bursatiles_1[0]."</td><!--mostramos el nombre del valor bursatil-->
                <td>".$valores_bursatiles_1[6]."</td><!--mostramos la minima cotización del valor bursatil-->
                <td>".$valores_bursatiles_1[7]."</td><!--mostramos el volumen negociado del valor bursatil-->
                </tr>";
            }
            if($dividir_linea[0]==$valor_bursatil_2){//si la primera posición es igual al valor bursatil 2
                for($i=0; $i<$numero_posiciones; $i++){//recorremos las posiciones
                    if($dividir_linea[$i]!=""){//si la posición no está vacía
                        array_push($valores_bursatiles_2, $dividir_linea[$i]);//la añadimos al array valores_bursatiles_2
                    }
                }
                echo "<tr>
                <td>".$valores_bursatiles_2[0]."</td><!--mostramos el nombre del valor bursatil-->
                <td>".$valores_bursatiles_2[6]."</td><!--mostramos la minima cotización del valor bursatil-->
                <td>".$valores_bursatiles_2[7]."</td><!--mostramos el volumen negociado del valor bursatil-->
                </tr>
                </table>";
            }        
        }
        $cont++;
    }
    fclose($fichero);//cerramos fichero
    $volumen_valor_bursatil_1= $valores_bursatiles_1[7];
    $volumen_valor_bursatil_1= str_replace('.', '', $volumen_valor_bursatil_1);
    $volumen_valor_bursatil_2= $valores_bursatiles_2[7];
    $volumen_valor_bursatil_2= str_replace('.', '', $volumen_valor_bursatil_2);
    $media_volumen= ($volumen_valor_bursatil_1+$volumen_valor_bursatil_2)/2;
    echo "Media volumen negociado valor bursatil 1 y 2: ".$media_volumen;
}

Function mostrar_total_volumen_negociado_capitalizado($fich, $valor_bursatil_1, $valor_bursatil_2){
    $cont=0;
    $valores= array();//creamos array para los valores de la primera fila
    $valores_bursatiles_1= array();//creamos array para valor_bursatil_1
    $valores_bursatiles_2= array();//creamos array para valor_bursatil_2
    echo "<table>";
    $fichero = fopen($fich, "r") or die("No se puede abrir el fichero!");//abrimos fichero ibex35.txt
    while(!feof($fichero)) {//mientras que el fichero no acabe
        if($cont==0){//para saber que es primera línea
        $linea= fgets($fichero);//obtenemos línea  
        $dividir_linea= explode("  ", $linea);//dividimos la línea cada vez que encontremos dos espacios
        $numero_posiciones= count($dividir_linea);///obtenemos el número de posiciones
            for($i=0; $i<$numero_posiciones; $i++){//recorremos las posiciones
                if($dividir_linea[$i]!=""){//si la posición no está vacía
                    array_push($valores, $dividir_linea[$i]);//la añadimos al array valores
                }
            }
            echo "<tr>
            <td>".$valores[0]."</td><!--mostramos la posición que corresponde a valor-->
            <td>".$valores[7]."</td><!--mostramos la posición que corresponde a volumen-->
            <td>".$valores[8]."</td><!--mostramos la posición que corresponde a capitalización-->
            </tr>";
        }
        else{
            $linea= fgets($fichero);//obtenemos línea
            $dividir_linea= explode("  ", $linea);//dividimos la línea cada vez que encontremos dos espacios
            $numero_posiciones= count($dividir_linea);///obtenemos el número de posiciones
            if($dividir_linea[0]==$valor_bursatil_1){//si la primera posición es igual al valor bursatil 1
                for($i=0; $i<$numero_posiciones; $i++){//recorremos las posiciones
                    if($dividir_linea[$i]!=""){//si la posición no está vacía
                        array_push($valores_bursatiles_1, $dividir_linea[$i]);//la añadimos al array valores_bursatiles_1
                    }
                }
                echo "<tr>
                <td>".$valores_bursatiles_1[0]."</td><!--mostramos el nombre del valor bursatil-->
                <td>".$valores_bursatiles_1[7]."</td><!--mostramos el volumen negociado del valor bursatil-->
                <td>".$valores_bursatiles_1[8]."</td><!--mostramos la capitalización del valor bursatil-->
                </tr>";
            }
            if($dividir_linea[0]==$valor_bursatil_2){//si la primera posición es igual al valor bursatil 2
                for($i=0; $i<$numero_posiciones; $i++){//recorremos las posiciones
                    if($dividir_linea[$i]!=""){//si la posición no está vacía
                        array_push($valores_bursatiles_2, $dividir_linea[$i]);//la añadimos al array valores_bursatiles_2
                    }
                }
                echo "<tr>
                <td>".$valores_bursatiles_2[0]."</td><!--mostramos el nombre del valor bursatil-->
                <td>".$valores_bursatiles_2[7]."</td><!--mostramos el volumen negociado del valor bursatil-->
                <td>".$valores_bursatiles_2[8]."</td><!--mostramos la capitalización del valor bursatil-->
                </tr>
                </table>";
            }        
        }
        $cont++;
    }
    fclose($fichero);//cerramos fichero
    $volumen_valor_bursatil_1= $valores_bursatiles_1[7];
    $volumen_valor_bursatil_1= str_replace('.', '', $volumen_valor_bursatil_1);

    $capitalizacion_valor_bursatil_1= $valores_bursatiles_1[8];
    $capitalizacion_valor_bursatil_1= str_replace('.', '', $capitalizacion_valor_bursatil_1);

    $volumen_valor_bursatil_2= $valores_bursatiles_2[7];
    $volumen_valor_bursatil_2= str_replace('.', '', $volumen_valor_bursatil_2);

    $capitalizacion_valor_bursatil_2= $valores_bursatiles_2[8];
    $capitalizacion_valor_bursatil_2= str_replace('.', '', $capitalizacion_valor_bursatil_2);
        
    $total_volumen_negociado= $volumen_valor_bursatil_1+$volumen_valor_bursatil_2;
    $total_capitalizado= $capitalizacion_valor_bursatil_1+$capitalizacion_valor_bursatil_2;
    echo "Total volumen negociado: ".$total_volumen_negociado."<br>";
    echo "Total capitalizado: ".$total_capitalizado;
}

Function consultar_bolsa($fich, $valor_bursatil, $campo){
    $cont=0;
    $valores= array();//creamos array $valores
    $fichero = fopen($fich, "r") or die("No se puede abrir el fichero!");//abrimos fichero ibex35.txt
    while(!feof($fichero)) {//mientras que el fichero no acabe
        $linea= fgets($fichero);//obtenemos línea
        if($cont>0){//para empezar desde la segunda línea
            $dividir_linea= explode("  ", $linea);//dividimos la línea cada vez que encontremos dos espacios
            $numero_posiciones= count($dividir_linea);///obtenemos el número de posiciones
            if($dividir_linea[0]==$valor_bursatil){//si la primera posición es igual al valor bursatil
                for($i=0; $i<$numero_posiciones; $i++){//recorremos las posiciones
                    if($dividir_linea[$i]!=""){//si la posición no está vacía
                        array_push($valores, $dividir_linea[$i]);//la añadimos al array valores
                    }
                }
            }   
        }
        $cont++;
    }
    fclose($fichero);//cerramos fichero
    //creamos un array al que le vamos a indexar el campo que le corresponde a cada valor
    $valores_asociativo= array("Valor"=>$valores[0], "Ultimo"=>$valores[1], "Var. %"=>$valores[2], "Var."=>$valores[3], 
    "Ac.% año"=>$valores[4], "MAx."=>$valores[5], "MIn."=>$valores[6], "Vol."=>$valores[7], "Capit."=>$valores[8]);
    
    echo "Valor: ".$valor_bursatil."<br>";//mostramos el valor bursatil
    
    foreach($valores_asociativo as $indice => $valor){
        if($indice==$campo){//si el indice es igual al campo
            echo $indice.": ".$valor;//mostramos el indice y su valor
        }
    }
    echo "<br><br><a href=http://localhost/bolsa/bolsa8.html>Realizar otra búsqueda</a>";//creamos un enlace, el cual nos va a pemitir que cuando pulsemos sobre él, podamos hacer una nueva consulta
}

Function total_valores($fich, $campo){
    $cont=0;//inicializamos contador a cero
    $suma=0;//inicializamos suma a cero
    $fichero = fopen($fich, "r") or die("No se puede abrir el fichero!");//abrimos fichero ibex35.txt
    while(!feof($fichero)) {//mientras que el fichero no acabe
    $linea= fgets($fichero);//obtenemos línea
    $valores= array();//creamos array $valores
        if($cont>0){//para empezar desde la segunda línea
            $dividir_linea= explode("  ", $linea);//dividimos la línea cada vez que encontremos dos espacios
            $numero_posiciones= count($dividir_linea);///obtenemos el número de posiciones
                for($i=0; $i<$numero_posiciones; $i++){//recorremos las posiciones
                    if($dividir_linea[$i]!=""){//si la posición no está vacía
                        array_push($valores, $dividir_linea[$i]);//la añadimos al array valores
                    }
                }
                if($campo=="Vol."){//si el campo es igual a Vol.
                    $valor= $valores[7];//almacenamos el valor de Vol. en la variable valor
                    $valor= str_replace('.', '', $valor);//si encontramos un punto, lo dejamos vacío
                    $suma= $suma+$valor;//sumamos todos los valores de Vol. y lo almacenamos en la variable suma
                }
                else{//el campo es igual a Capit.
                    $valor=$valores[8];//almacenamos el valor de Capit. en la variable valor
                    $valor= str_replace('.', '', $valor);//si encontramos un punto, lo dejamos vacío
                    $suma= $suma+$valor;//sumamos todos los valores de Capit. y lo almacenamos en la variable suma
                }
        }
        $cont++;
    }
    fclose($fichero);//cerramos fichero
    if($campo=="Vol."){
        echo "Total Volumen: ".$suma;
    }
    else{
        echo "Total Capitalización: ".$suma;
    }
    echo "<br><br><a href=http://localhost/bolsa/bolsa9.html>Realizar otra búsqueda</a>";//creamos un enlace, el cual nos va a pemitir que cuando pulsemos sobre él, podamos hacer una nueva consulta
}

Function maxcot_mincot_mayorvol_menorvol_maxcapi_menorcapi($fich){
    $cont=0;//inicializamos contador a cero
    $numero_mayor=0;
    $numero_menor= primer_numero_MIn($fich);//obtenemos el primer número MIn del fichero
    $num_mayor=0;
    $num_menor= primer_numero_Vol($fich);//obtenemos el primer número Vol del fichero
    $n_mayor=0;
    $n_menor= primer_numero_Capit($fich);//obtenemos el primer número Capit del fichero

    $fichero = fopen($fich, "r") or die("No se puede abrir el fichero!");//abrimos fichero ibex35.txt
    while(!feof($fichero)) {//mientras que el fichero no acabe
    $linea= fgets($fichero);//obtenemos línea
    $valores= array();//creamos array $valores
        if($cont>0){//para empezar desde la segunda línea
            $dividir_linea= explode("  ", $linea);//dividimos la línea cada vez que encontremos dos espacios
            $numero_posiciones= count($dividir_linea);///obtenemos el número de posiciones
            for($i=0; $i<$numero_posiciones; $i++){//recorremos las posiciones
                if($dividir_linea[$i]!=""){//si la posición no está vacía
                    array_push($valores, $dividir_linea[$i]);//la añadimos al array valores
                }
            }
            $max= $valores[5];//almacenamos el valor de MAx. en la variable max
            $max= str_replace(',', '.', $max);//si encontramos una coma, lo convertimos en punto
            if($max>$numero_mayor){
                $numero_mayor= $max;//almacenamos el número mayor
            }

            $min= $valores[6];//almacenamos el valor de MIn. en la variable min
            $min= str_replace(',', '.', $min);//si encontramos una coma, lo convertimos en punto
            if($numero_menor>$min){
                $numero_menor=$min;//almacenamos el número menor
            }

            $mayor_vol= $valores[7];//almacenamos el valor de Vol. en la variable mayor_vol
            $mayor_vol= str_replace('.', '', $mayor_vol);//si encontramos un punto lo dejamos vacío
            if($mayor_vol>$num_mayor){
                $num_mayor= $mayor_vol;//almacenamos el número mayor
            }

            $menor_vol= $valores[7];//almacenamos el valor de Vol. en la variable menor_vol
            $menor_vol= str_replace('.', '', $menor_vol);//si encontramos un punto, lo dejamos vacío
            if($num_menor>$menor_vol){
                $num_menor=$menor_vol;//almacenamos el número menor
            }

            $mayor_capit= $valores[8];//almacenamos el valor de Capit. en la variable mayor_capit
            $mayor_capit= str_replace('.', '', $mayor_capit);//si encontramos un punto lo dejamos vacío
            if($mayor_capit>$n_mayor){
                $n_mayor= $mayor_capit;//almacenamos el número mayor
            }

            $menor_capit= $valores[8];//almacenamos el valor de Capit. en la variable menor_capit
            $menor_capit= str_replace('.', '', $menor_capit);//si encontramos un punto, lo dejamos vacío
            if($n_menor>$menor_capit){
                $n_menor=$menor_capit;//almacenamos el número menor
            }

        }       
    $cont++;
    }
    fclose($fichero);//cerramos fichero
    echo "Máxima cotizacón: ".$numero_mayor."<br>";
    echo "Mínima cotización: ".$numero_menor."<br>";
    echo "Mayor volumen negociado: ".$num_mayor."<br>";
    echo "Menor volumen negociado: ".$num_menor."<br>";
    echo "Mayor capitalización: ".$n_mayor."<br>";
    echo "Menor capitalización: ".$n_menor;
}

Function primer_numero_MIn($fich){
    $cont=0;
    $valores= array();//creamos array $valores
    $fichero = fopen($fich, "r") or die("No se puede abrir el fichero!");//abrimos fichero ibex35.txt
    while(!feof($fichero)) {//mientras que el fichero no acabe
        $linea= fgets($fichero);//obtenemos línea
        if($cont==1){//nos situamos en la segunda línea
            $dividir_linea= explode("  ", $linea);//dividimos la línea cada vez que encontremos dos espacios
            $numero_posiciones= count($dividir_linea);///obtenemos el número de posiciones
            for($i=0; $i<$numero_posiciones; $i++){//recorremos las posiciones
                if($dividir_linea[$i]!=""){//si la posición no está vacía
                        array_push($valores, $dividir_linea[$i]);//la añadimos al array valores
                }
            }
        }
    $cont++;
    }
    fclose($fichero);//cerramos fichero
    $primer_numero_MIn= $valores[6];
    $primer_numero_MIn= str_replace(',', '.', $primer_numero_MIn);//si encontramos una coma, lo convertimos en punto
    return $primer_numero_MIn;
}

Function primer_numero_Vol($fich){
    $cont=0;
    $valores= array();//creamos array $valores
    $fichero = fopen($fich, "r") or die("No se puede abrir el fichero!");//abrimos fichero ibex35.txt
    while(!feof($fichero)) {//mientras que el fichero no acabe
        $linea= fgets($fichero);//obtenemos línea
        if($cont==1){//nos situamos en la segunda línea
            $dividir_linea= explode("  ", $linea);//dividimos la línea cada vez que encontremos dos espacios
            $numero_posiciones= count($dividir_linea);///obtenemos el número de posiciones
            for($i=0; $i<$numero_posiciones; $i++){//recorremos las posiciones
                if($dividir_linea[$i]!=""){//si la posición no está vacía
                        array_push($valores, $dividir_linea[$i]);//la añadimos al array valores
                }
            }
        }
    $cont++;
    }
    fclose($fichero);//cerramos fichero
    $primer_numero_Vol= $valores[7];
    $primer_numero_Vol= str_replace('.', '', $primer_numero_Vol);//si encontramos un punto, lo dejamos vacío
    return $primer_numero_Vol;
}

Function primer_numero_Capit($fich){
    $cont=0;
    $valores= array();//creamos array $valores
    $fichero = fopen($fich, "r") or die("No se puede abrir el fichero!");//abrimos fichero ibex35.txt
    while(!feof($fichero)) {//mientras que el fichero no acabe
        $linea= fgets($fichero);//obtenemos línea
        if($cont==1){//nos situamos en la segunda línea
            $dividir_linea= explode("  ", $linea);//dividimos la línea cada vez que encontremos dos espacios
            $numero_posiciones= count($dividir_linea);///obtenemos el número de posiciones
            for($i=0; $i<$numero_posiciones; $i++){//recorremos las posiciones
                if($dividir_linea[$i]!=""){//si la posición no está vacía
                        array_push($valores, $dividir_linea[$i]);//la añadimos al array valores
                }
            }
        }
    $cont++;
    }
    fclose($fichero);//cerramos fichero
    $primer_numero_Capit= $valores[8];
    $primer_numero_Capit= str_replace('.', '', $primer_numero_Capit);//si encontramos un punto, lo dejamos vacío
    return $primer_numero_Capit; 
}

?>
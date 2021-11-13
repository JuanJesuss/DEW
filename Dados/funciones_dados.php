<?php
Function numero_dados_1($jugador1, $jugador2, $jugador3, $jugador4, $dados_jugador1, $dados_jugador2, $dados_jugador3, $dados_jugador4){
    $dado= rand(1,6);//obtenemos un dado cuyo valor esta comprendido entre 1 y 6
    array_push($dados_jugador1, $dado);//lo almacenamos en los dados del jugador 1
    $dado= rand(1,6);
    array_push($dados_jugador2, $dado);
    $dado= rand(1,6);
    array_push($dados_jugador3, $dado);
    $dado= rand(1,6);
    array_push($dados_jugador4, $dado);

    $date = getdate();//obtenemos los valores de fecha y hora y los almacenamos en la variable date
    echo "<p>",$date["mday"],"/",$date["mon"],"/",$date["year"]," ",$date["hours"]+1,":",$date["minutes"],":",$date["seconds"],"</p>";//imprimimos fecha y hora
    
    //imprimimos el nombre de los jugadores junto a sus respectivos dados
    echo "
    <table>
    <tr>
    <td>".$jugador1."</td>
    <td><img src=Images/".$dados_jugador1[0].".png alt=Bola ".$dados_jugador1[0]." width=50 height=50></td>
    </tr>
    <tr>
    <td>".$jugador2."</td>
    <td><img src=Images/".$dados_jugador2[0].".png alt=Bola ".$dados_jugador2[0]." width=50 height=50></td>
    </tr>
    <tr>
    <td>".$jugador3."</td>
    <td><img src=Images/".$dados_jugador3[0].".png alt=Bola ".$dados_jugador3[0]." width=50 height=50></td>
    </tr>
    <tr>
    <td>".$jugador4."</td>
    <td><img src=Images/".$dados_jugador4[0].".png alt=Bola ".$dados_jugador4[0]." width=50 height=50></td>
    </tr>
    </table>";

    //almacenamos los dados de cada jugador en un array
    $resultados= array($jugador1=>$dados_jugador1[0], $jugador2=>$dados_jugador2[0], $jugador3=>$dados_jugador3[0], $jugador4=>$dados_jugador4[0]);

    //imprimimos los resultados de cada jugador
    foreach($resultados as $clave => $valor){
        echo "<p>".$clave."= ".$valor."</p>";
    }

    //obtenemos el resultado mayor
    $resultado_mayor=0;
    foreach($resultados as $clave => $valor){
        if($valor>$resultado_mayor){
            $resultado_mayor=$valor;
        }
    }

    //vemos a quien o quienes pertenece el resultado mayor
    $cont=0;
    foreach($resultados as $clave => $valor){
        if($valor==$resultado_mayor){//si alguno de los resultados es igual al resultado mayor
            $cont++;//el contador suma 1
            $ganador=$clave;//almacenamos el nombre en la variable ganador
            echo "<p>Ganador: ".$ganador."</p>";//mostramos el nombre del ganador
        }
    }

    //mostramos el número de ganadores
    echo "<p>Número de ganadores: ".$cont."</p>";

}

Function numero_dados_2($jugador1, $jugador2, $jugador3, $jugador4, $dados_jugador1, $dados_jugador2, $dados_jugador3, $dados_jugador4){
    while(count($dados_jugador1)!=2){//mientras que la cantidad de dados del jugador 1 no sea 2
        $dado= rand(1,6);//obtenemos un dado comprendido entre 1 y 6
        array_push($dados_jugador1, $dado);//lo almacenamos en los dados del jugador 1
    }    
    while(count($dados_jugador2)!=2){
        $dado= rand(1,6);
        array_push($dados_jugador2, $dado);
    }
    while(count($dados_jugador3)!=2){
        $dado= rand(1,6);
        array_push($dados_jugador3, $dado);
    }
    while(count($dados_jugador4)!=2){
        $dado= rand(1,6);
        array_push($dados_jugador4, $dado);
    }

    $date = getdate();//obtenemos los valores de fecha y hora y los almacenamos en la variable date
    echo "<p>",$date["mday"],"/",$date["mon"],"/",$date["year"]," ",$date["hours"]+1,":",$date["minutes"],":",$date["seconds"],"</p>";//imprimimos fecha y hora
    
    //imprimimos el nombre de los jugadores junto a sus respectivos dados
    echo "
    <table>
    <tr>
    <td>".$jugador1."</td>
    <td><img src=Images/".$dados_jugador1[0].".png alt=Bola ".$dados_jugador1[0]." width=50 height=50></td>
    <td><img src=Images/".$dados_jugador1[1].".png alt=Bola ".$dados_jugador1[1]." width=50 height=50></td>
    </tr>
    <tr>
    <td>".$jugador2."</td>
    <td><img src=Images/".$dados_jugador2[0].".png alt=Bola ".$dados_jugador2[0]." width=50 height=50></td>
    <td><img src=Images/".$dados_jugador2[1].".png alt=Bola ".$dados_jugador2[1]." width=50 height=50></td>
    </tr>
    <tr>
    <td>".$jugador3."</td>
    <td><img src=Images/".$dados_jugador3[0].".png alt=Bola ".$dados_jugador3[0]." width=50 height=50></td>
    <td><img src=Images/".$dados_jugador3[1].".png alt=Bola ".$dados_jugador3[1]." width=50 height=50></td>
    </tr>
    <tr>
    <td>".$jugador4."</td>
    <td><img src=Images/".$dados_jugador4[0].".png alt=Bola ".$dados_jugador4[0]." width=50 height=50></td>
    <td><img src=Images/".$dados_jugador4[1].".png alt=Bola ".$dados_jugador4[1]." width=50 height=50></td>
    </tr>
    </table>";

    $resultado_tirada_jugador1= $dados_jugador1[0]+$dados_jugador1[1];//obtenemos la suma de los dados del jugador 1
    $resultado_tirada_jugador2= $dados_jugador2[0]+$dados_jugador2[1];//obtenemos la suma de los dados del jugador 2
    $resultado_tirada_jugador3= $dados_jugador3[0]+$dados_jugador3[1];//obtenemos la suma de los dados del jugador 3
    $resultado_tirada_jugador4= $dados_jugador4[0]+$dados_jugador4[1];//obtenemos la suma de los dados del jugador 4

    //almacenamos los resultados de cada jugador en un array
    $resultados= array($jugador1=>$resultado_tirada_jugador1, $jugador2=>$resultado_tirada_jugador2, $jugador3=>$resultado_tirada_jugador3, $jugador4=>$resultado_tirada_jugador4);

    //imprimimos los resultados de cada jugador
    foreach($resultados as $clave => $valor){
        echo "<p>".$clave."= ".$valor."</p>";
    }

    //obtenemos el resultado mayor
    $resultado_mayor=0;
    foreach($resultados as $clave => $valor){
        if($valor>$resultado_mayor){
            $resultado_mayor=$valor;
        }
    }

    //vemos a quien o quienes pertenece el resultado mayor
    $cont=0;
    foreach($resultados as $clave => $valor){
        if($valor==$resultado_mayor){//si alguno de los resultados es igual al resultado mayor
            $cont++;//el contador suma 1
            $ganador=$clave;//almacenamos el nombre en la variable ganador
            echo "<p>Ganador: ".$ganador."</p>";//mostramos el nombre del ganador
        }
    }

    //mostramos el número de ganadores
    echo "<p>Número de ganadores: ".$cont."</p>";

}

Function numero_dados_3($jugador1, $jugador2, $jugador3, $jugador4, $dados_jugador1, $dados_jugador2, $dados_jugador3, $dados_jugador4){
    while(count($dados_jugador1)!=3){//mientras que la cantidad de dados del jugador 1 no sea 3
        $dado= rand(1,6);//obtenemos un dado comprendido entre 1 y 6
        array_push($dados_jugador1, $dado);//lo almacenamos en los dados del jugador 1
    }    
    while(count($dados_jugador2)!=3){
        $dado= rand(1,6);
        array_push($dados_jugador2, $dado);
    }
    while(count($dados_jugador3)!=3){
        $dado= rand(1,6);
        array_push($dados_jugador3, $dado);
    }
    while(count($dados_jugador4)!=3){
        $dado= rand(1,6);
        array_push($dados_jugador4, $dado);
    }

    $date = getdate();//obtenemos los valores de fecha y hora y los almacenamos en la variable date
    echo "<p>",$date["mday"],"/",$date["mon"],"/",$date["year"]," ",$date["hours"]+1,":",$date["minutes"],":",$date["seconds"],"</p>";//imprimimos fecha y hora
    
    //imprimimos el nombre de los jugadores junto a sus respectivos dados
    echo "
    <table>
    <tr>
    <td>".$jugador1."</td>
    <td><img src=Images/".$dados_jugador1[0].".png alt=Bola ".$dados_jugador1[0]." width=50 height=50></td>
    <td><img src=Images/".$dados_jugador1[1].".png alt=Bola ".$dados_jugador1[1]." width=50 height=50></td>
    <td><img src=Images/".$dados_jugador1[2].".png alt=Bola ".$dados_jugador1[2]." width=50 height=50></td>
    </tr>
    <tr>
    <td>".$jugador2."</td>
    <td><img src=Images/".$dados_jugador2[0].".png alt=Bola ".$dados_jugador2[0]." width=50 height=50></td>
    <td><img src=Images/".$dados_jugador2[1].".png alt=Bola ".$dados_jugador2[1]." width=50 height=50></td>
    <td><img src=Images/".$dados_jugador2[2].".png alt=Bola ".$dados_jugador2[2]." width=50 height=50></td>
    </tr>
    <tr>
    <td>".$jugador3."</td>
    <td><img src=Images/".$dados_jugador3[0].".png alt=Bola ".$dados_jugador3[0]." width=50 height=50></td>
    <td><img src=Images/".$dados_jugador3[1].".png alt=Bola ".$dados_jugador3[1]." width=50 height=50></td>
    <td><img src=Images/".$dados_jugador3[2].".png alt=Bola ".$dados_jugador3[2]." width=50 height=50></td>
    </tr>
    <tr>
    <td>".$jugador4."</td>
    <td><img src=Images/".$dados_jugador4[0].".png alt=Bola ".$dados_jugador4[0]." width=50 height=50></td>
    <td><img src=Images/".$dados_jugador4[1].".png alt=Bola ".$dados_jugador4[1]." width=50 height=50></td>
    <td><img src=Images/".$dados_jugador4[2].".png alt=Bola ".$dados_jugador4[2]." width=50 height=50></td>
    </tr>
    </table>";

    if($dados_jugador1[0]==$dados_jugador1[1] && $dados_jugador1[1]== $dados_jugador1[2]){//si todos los dados del jugador 1 son iguales
        $resultado_tirada_jugador1=100;//su puntuación es 100    
    }
    else{
        $resultado_tirada_jugador1= $dados_jugador1[0]+$dados_jugador1[1]+$dados_jugador1[2];//obtenemos la suma de los dados del jugador 1
    }
    

    if($dados_jugador2[0]==$dados_jugador2[1] && $dados_jugador2[1]== $dados_jugador2[2]){
        $resultado_tirada_jugador2=100;    
    }
    else{
        $resultado_tirada_jugador2= $dados_jugador2[0]+$dados_jugador2[1]+$dados_jugador2[2];
    }


    if($dados_jugador3[0]==$dados_jugador3[1] && $dados_jugador3[1]== $dados_jugador3[2]){
        $resultado_tirada_jugador3=100;    
    }
    else{
        $resultado_tirada_jugador3= $dados_jugador3[0]+$dados_jugador3[1]+$dados_jugador3[2];
    }


    if($dados_jugador4[0]==$dados_jugador4[1] && $dados_jugador4[1]== $dados_jugador4[2]){
        $resultado_tirada_jugador4=100;    
    }
    else{
        $resultado_tirada_jugador4= $dados_jugador4[0]+$dados_jugador4[1]+$dados_jugador4[2];
    }

    //almacenamos los resultados de cada jugador en un array
    $resultados= array($jugador1=>$resultado_tirada_jugador1, $jugador2=>$resultado_tirada_jugador2, $jugador3=>$resultado_tirada_jugador3, $jugador4=>$resultado_tirada_jugador4);

    //imprimimos los resultados de cada jugador
    foreach($resultados as $clave => $valor){
        echo "<p>".$clave."= ".$valor."</p>";
    }

    //obtenemos el resultado mayor
    $resultado_mayor=0;
    foreach($resultados as $clave => $valor){
        if($valor>$resultado_mayor){
            $resultado_mayor=$valor;
        }
    }

    //vemos a quien o quienes pertenece el resultado mayor
    $cont=0;
    foreach($resultados as $clave => $valor){
        if($valor==$resultado_mayor){//si alguno de los resultados es igual al resultado mayor
            $cont++;//el contador suma 1
            $ganador=$clave;//almacenamos el nombre en la variable ganador
            echo "<p>Ganador: ".$ganador."</p>";//mostramos el nombre del ganador
        }
    }

    //mostramos el número de ganadores
    echo "<p>Número de ganadores: ".$cont."</p>";

}

Function numero_dados_4($jugador1, $jugador2, $jugador3, $jugador4, $dados_jugador1, $dados_jugador2, $dados_jugador3, $dados_jugador4){
    while(count($dados_jugador1)!=4){//mientras que la cantidad de dados del jugador 1 no sea 4
        $dado= rand(1,6);//obtenemos un dado comprendido entre 1 y 6
        array_push($dados_jugador1, $dado);//lo almacenamos en los dados del jugador 1
    }    
    while(count($dados_jugador2)!=4){
        $dado= rand(1,6);
        array_push($dados_jugador2, $dado);
    }
    while(count($dados_jugador3)!=4){
        $dado= rand(1,6);
        array_push($dados_jugador3, $dado);
    }
    while(count($dados_jugador4)!=4){
        $dado= rand(1,6);
        array_push($dados_jugador4, $dado);
    }

    $date = getdate();//obtenemos los valores de fecha y hora y los almacenamos en la variable date
    echo "<p>",$date["mday"],"/",$date["mon"],"/",$date["year"]," ",$date["hours"]+1,":",$date["minutes"],":",$date["seconds"],"</p>";//imprimimos fecha y hora
    
    //imprimimos el nombre de los jugadores junto a sus respectivos dados
    echo "
    <table>
    <tr>
    <td>".$jugador1."</td>
    <td><img src=Images/".$dados_jugador1[0].".png alt=Bola ".$dados_jugador1[0]." width=50 height=50></td>
    <td><img src=Images/".$dados_jugador1[1].".png alt=Bola ".$dados_jugador1[1]." width=50 height=50></td>
    <td><img src=Images/".$dados_jugador1[2].".png alt=Bola ".$dados_jugador1[2]." width=50 height=50></td>
    <td><img src=Images/".$dados_jugador1[3].".png alt=Bola ".$dados_jugador1[3]." width=50 height=50></td>
    </tr>
    <tr>
    <td>".$jugador2."</td>
    <td><img src=Images/".$dados_jugador2[0].".png alt=Bola ".$dados_jugador2[0]." width=50 height=50></td>
    <td><img src=Images/".$dados_jugador2[1].".png alt=Bola ".$dados_jugador2[1]." width=50 height=50></td>
    <td><img src=Images/".$dados_jugador2[2].".png alt=Bola ".$dados_jugador2[2]." width=50 height=50></td>
    <td><img src=Images/".$dados_jugador2[3].".png alt=Bola ".$dados_jugador2[3]." width=50 height=50></td>
    </tr>
    <tr>
    <td>".$jugador3."</td>
    <td><img src=Images/".$dados_jugador3[0].".png alt=Bola ".$dados_jugador3[0]." width=50 height=50></td>
    <td><img src=Images/".$dados_jugador3[1].".png alt=Bola ".$dados_jugador3[1]." width=50 height=50></td>
    <td><img src=Images/".$dados_jugador3[2].".png alt=Bola ".$dados_jugador3[2]." width=50 height=50></td>
    <td><img src=Images/".$dados_jugador3[3].".png alt=Bola ".$dados_jugador3[3]." width=50 height=50></td>
    </tr>
    <tr>
    <td>".$jugador4."</td>
    <td><img src=Images/".$dados_jugador4[0].".png alt=Bola ".$dados_jugador4[0]." width=50 height=50></td>
    <td><img src=Images/".$dados_jugador4[1].".png alt=Bola ".$dados_jugador4[1]." width=50 height=50></td>
    <td><img src=Images/".$dados_jugador4[2].".png alt=Bola ".$dados_jugador4[2]." width=50 height=50></td>
    <td><img src=Images/".$dados_jugador4[3].".png alt=Bola ".$dados_jugador4[3]." width=50 height=50></td>
    </tr>
    </table>";
    
    if($dados_jugador1[0]==$dados_jugador1[1] && $dados_jugador1[1]== $dados_jugador1[2] && $dados_jugador1[2]==$dados_jugador1[3]){//si todos los dados del jugador 1 son iguales
        $resultado_tirada_jugador1=100;//su puntuación es 100    
    }
    else{
        $resultado_tirada_jugador1= $dados_jugador1[0]+$dados_jugador1[1]+$dados_jugador1[2]+$dados_jugador1[3];//obtenemos la suma de los dados del jugador 1
    }
    

    if($dados_jugador2[0]==$dados_jugador2[1] && $dados_jugador2[1]== $dados_jugador2[2] && $dados_jugador2[2]==$dados_jugador2[3]){
        $resultado_tirada_jugador2=100;    
    }
    else{
        $resultado_tirada_jugador2= $dados_jugador2[0]+$dados_jugador2[1]+$dados_jugador2[2]+$dados_jugador2[3];
    }


    if($dados_jugador3[0]==$dados_jugador3[1] && $dados_jugador3[1]== $dados_jugador3[2] && $dados_jugador3[2]==$dados_jugador3[3]){
        $resultado_tirada_jugador3=100;    
    }
    else{
        $resultado_tirada_jugador3= $dados_jugador3[0]+$dados_jugador3[1]+$dados_jugador3[2]+$dados_jugador3[3];
    }

    
    if($dados_jugador4[0]==$dados_jugador4[1] && $dados_jugador4[1]== $dados_jugador4[2] && $dados_jugador4[2]== $dados_jugador4[3]){
        $resultado_tirada_jugador4=100;    
    }
    else{
        $resultado_tirada_jugador4= $dados_jugador4[0]+$dados_jugador4[1]+$dados_jugador4[2]+$dados_jugador4[3];
    }

    //almacenamos los resultados de cada jugador en un array
    $resultados= array($jugador1=>$resultado_tirada_jugador1, $jugador2=>$resultado_tirada_jugador2, $jugador3=>$resultado_tirada_jugador3, $jugador4=>$resultado_tirada_jugador4);

    //imprimimos los resultados de cada jugador
    foreach($resultados as $clave => $valor){
        echo "<p>".$clave."= ".$valor."</p>";
    }

    //obtenemos el resultado mayor
    $resultado_mayor=0;
    foreach($resultados as $clave => $valor){
        if($valor>$resultado_mayor){
            $resultado_mayor=$valor;
        }
    }

    //vemos a quien o quienes pertenece el resultado mayor
    $cont=0;
    foreach($resultados as $clave => $valor){
        if($valor==$resultado_mayor){//si alguno de los resultados es igual al resultado mayor
            $cont++;//el contador suma 1
            $ganador=$clave;//almacenamos el nombre en la variable ganador
            echo "<p>Ganador: ".$ganador."</p>";//mostramos el nombre del ganador
        }
    }

    //mostramos el número de ganadores
    echo "<p>Número de ganadores: ".$cont."</p>";

}

Function numero_dados_5($jugador1, $jugador2, $jugador3, $jugador4, $dados_jugador1, $dados_jugador2, $dados_jugador3, $dados_jugador4){
    while(count($dados_jugador1)!=5){//mientras que la cantidad de dados del jugador 1 no sea 5
        $dado= rand(1,6);//obtenemos un dado comprendido entre 1 y 6
        array_push($dados_jugador1, $dado);//lo almacenamos en los dados del jugador 1
    }    
    while(count($dados_jugador2)!=5){
        $dado= rand(1,6);
        array_push($dados_jugador2, $dado);
    }
    while(count($dados_jugador3)!=5){
        $dado= rand(1,6);
        array_push($dados_jugador3, $dado);
    }
    while(count($dados_jugador4)!=5){
        $dado= rand(1,6);
        array_push($dados_jugador4, $dado);
    }

    $date = getdate();//obtenemos los valores de fecha y hora y los almacenamos en la variable date
    echo "<p>",$date["mday"],"/",$date["mon"],"/",$date["year"]," ",$date["hours"]+1,":",$date["minutes"],":",$date["seconds"],"</p>";//imprimimos fecha y hora
    
    //imprimimos el nombre de los jugadores junto a sus respectivos dados
    echo "
    <table>
    <tr>
    <td>".$jugador1."</td>
    <td><img src=Images/".$dados_jugador1[0].".png alt=Bola ".$dados_jugador1[0]." width=50 height=50></td>
    <td><img src=Images/".$dados_jugador1[1].".png alt=Bola ".$dados_jugador1[1]." width=50 height=50></td>
    <td><img src=Images/".$dados_jugador1[2].".png alt=Bola ".$dados_jugador1[2]." width=50 height=50></td>
    <td><img src=Images/".$dados_jugador1[3].".png alt=Bola ".$dados_jugador1[3]." width=50 height=50></td>
    <td><img src=Images/".$dados_jugador1[4].".png alt=Bola ".$dados_jugador1[4]." width=50 height=50></td>
    </tr>
    <tr>
    <td>".$jugador2."</td>
    <td><img src=Images/".$dados_jugador2[0].".png alt=Bola ".$dados_jugador2[0]." width=50 height=50></td>
    <td><img src=Images/".$dados_jugador2[1].".png alt=Bola ".$dados_jugador2[1]." width=50 height=50></td>
    <td><img src=Images/".$dados_jugador2[2].".png alt=Bola ".$dados_jugador2[2]." width=50 height=50></td>
    <td><img src=Images/".$dados_jugador2[3].".png alt=Bola ".$dados_jugador2[3]." width=50 height=50></td>
    <td><img src=Images/".$dados_jugador2[4].".png alt=Bola ".$dados_jugador2[4]." width=50 height=50></td>
    </tr>
    <tr>
    <td>".$jugador3."</td>
    <td><img src=Images/".$dados_jugador3[0].".png alt=Bola ".$dados_jugador3[0]." width=50 height=50></td>
    <td><img src=Images/".$dados_jugador3[1].".png alt=Bola ".$dados_jugador3[1]." width=50 height=50></td>
    <td><img src=Images/".$dados_jugador3[2].".png alt=Bola ".$dados_jugador3[2]." width=50 height=50></td>
    <td><img src=Images/".$dados_jugador3[3].".png alt=Bola ".$dados_jugador3[3]." width=50 height=50></td>
    <td><img src=Images/".$dados_jugador3[4].".png alt=Bola ".$dados_jugador3[4]." width=50 height=50></td>
    </tr>
    <tr>
    <td>".$jugador4."</td>
    <td><img src=Images/".$dados_jugador4[0].".png alt=Bola ".$dados_jugador4[0]." width=50 height=50></td>
    <td><img src=Images/".$dados_jugador4[1].".png alt=Bola ".$dados_jugador4[1]." width=50 height=50></td>
    <td><img src=Images/".$dados_jugador4[2].".png alt=Bola ".$dados_jugador4[2]." width=50 height=50></td>
    <td><img src=Images/".$dados_jugador4[3].".png alt=Bola ".$dados_jugador4[3]." width=50 height=50></td>
    <td><img src=Images/".$dados_jugador4[4].".png alt=Bola ".$dados_jugador4[4]." width=50 height=50></td>
    </tr>
    </table>";

    if($dados_jugador1[0]==$dados_jugador1[1] && $dados_jugador1[1]== $dados_jugador1[2] && $dados_jugador1[2]==$dados_jugador1[3] && $dados_jugador1[3]==$dados_jugador1[4]){//si todos los dados del jugador 1 son iguales
        $resultado_tirada_jugador1=100;//su puntuación es 100    
    }
    else{
        $resultado_tirada_jugador1= $dados_jugador1[0]+$dados_jugador1[1]+$dados_jugador1[2]+$dados_jugador1[3]+$dados_jugador1[4];//obtenemos la suma de los dados del jugador 1
    }
    

    if($dados_jugador2[0]==$dados_jugador2[1] && $dados_jugador2[1]== $dados_jugador2[2] && $dados_jugador2[2]==$dados_jugador2[3] && $dados_jugador2[3]==$dados_jugador2[4]){
        $resultado_tirada_jugador2=100;    
    }
    else{
        $resultado_tirada_jugador2= $dados_jugador2[0]+$dados_jugador2[1]+$dados_jugador2[2]+$dados_jugador2[3]+$dados_jugador2[4];
    }


    if($dados_jugador3[0]==$dados_jugador3[1] && $dados_jugador3[1]== $dados_jugador3[2] && $dados_jugador3[2]==$dados_jugador3[3] && $dados_jugador3[3]==$dados_jugador3[4]){
        $resultado_tirada_jugador3=100;    
    }
    else{
        $resultado_tirada_jugador3= $dados_jugador3[0]+$dados_jugador3[1]+$dados_jugador3[2]+$dados_jugador3[3]+$dados_jugador3[4];
    }

    
    if($dados_jugador4[0]==$dados_jugador4[1] && $dados_jugador4[1]== $dados_jugador4[2] && $dados_jugador4[2]== $dados_jugador4[3] && $dados_jugador4[3]==$dados_jugador4[4]){
        $resultado_tirada_jugador4=100;    
    }
    else{
        $resultado_tirada_jugador4= $dados_jugador4[0]+$dados_jugador4[1]+$dados_jugador4[2]+$dados_jugador4[3]+$dados_jugador4[4];
    }

    //almacenamos los resultados de cada jugador en un array
    $resultados= array($jugador1=>$resultado_tirada_jugador1, $jugador2=>$resultado_tirada_jugador2, $jugador3=>$resultado_tirada_jugador3, $jugador4=>$resultado_tirada_jugador4);

    //imprimimos los resultados de cada jugador
    foreach($resultados as $clave => $valor){
        echo "<p>".$clave."= ".$valor."</p>";
    }

    //obtenemos el resultado mayor
    $resultado_mayor=0;
    foreach($resultados as $clave => $valor){
        if($valor>$resultado_mayor){
            $resultado_mayor=$valor;
        }
    }

    //vemos a quien o quienes pertenece el resultado mayor
    $cont=0;
    foreach($resultados as $clave => $valor){
        if($valor==$resultado_mayor){//si alguno de los resultados es igual al resultado mayor
            $cont++;//el contador suma 1
            $ganador=$clave;//almacenamos el nombre en la variable ganador
            echo "<p>Ganador: ".$ganador."</p>";//mostramos el nombre del ganador
        }
    }

    //mostramos el número de ganadores
    echo "<p>Número de ganadores: ".$cont."</p>";

}

Function numero_dados_6($jugador1, $jugador2, $jugador3, $jugador4, $dados_jugador1, $dados_jugador2, $dados_jugador3, $dados_jugador4){
    while(count($dados_jugador1)!=6){//mientras que la cantidad de dados del jugador 1 no sea 6
        $dado= rand(1,6);//obtenemos un dado comprendido entre 1 y 6
        array_push($dados_jugador1, $dado);//lo almacenamos en los dados del jugador 1
    }    
    while(count($dados_jugador2)!=6){
        $dado= rand(1,6);
        array_push($dados_jugador2, $dado);
    }
    while(count($dados_jugador3)!=6){
        $dado= rand(1,6);
        array_push($dados_jugador3, $dado);
    }
    while(count($dados_jugador4)!=6){
        $dado= rand(1,6);
        array_push($dados_jugador4, $dado);
    }

    $date = getdate();//obtenemos los valores de fecha y hora y los almacenamos en la variable date
    echo "<p>",$date["mday"],"/",$date["mon"],"/",$date["year"]," ",$date["hours"]+1,":",$date["minutes"],":",$date["seconds"],"</p>";//imprimimos fecha y hora
    
    //imprimimos el nombre de los jugadores junto a sus respectivos dados
    echo "
    <table>
    <tr>
    <td>".$jugador1."</td>
    <td><img src=Images/".$dados_jugador1[0].".png alt=Bola ".$dados_jugador1[0]." width=50 height=50></td>
    <td><img src=Images/".$dados_jugador1[1].".png alt=Bola ".$dados_jugador1[1]." width=50 height=50></td>
    <td><img src=Images/".$dados_jugador1[2].".png alt=Bola ".$dados_jugador1[2]." width=50 height=50></td>
    <td><img src=Images/".$dados_jugador1[3].".png alt=Bola ".$dados_jugador1[3]." width=50 height=50></td>
    <td><img src=Images/".$dados_jugador1[4].".png alt=Bola ".$dados_jugador1[4]." width=50 height=50></td>
    <td><img src=Images/".$dados_jugador1[5].".png alt=Bola ".$dados_jugador1[5]." width=50 height=50></td>
    </tr>
    <tr>
    <td>".$jugador2."</td>
    <td><img src=Images/".$dados_jugador2[0].".png alt=Bola ".$dados_jugador2[0]." width=50 height=50></td>
    <td><img src=Images/".$dados_jugador2[1].".png alt=Bola ".$dados_jugador2[1]." width=50 height=50></td>
    <td><img src=Images/".$dados_jugador2[2].".png alt=Bola ".$dados_jugador2[2]." width=50 height=50></td>
    <td><img src=Images/".$dados_jugador2[3].".png alt=Bola ".$dados_jugador2[3]." width=50 height=50></td>
    <td><img src=Images/".$dados_jugador2[4].".png alt=Bola ".$dados_jugador2[4]." width=50 height=50></td>
    <td><img src=Images/".$dados_jugador2[5].".png alt=Bola ".$dados_jugador2[5]." width=50 height=50></td>
    </tr>
    <tr>
    <td>".$jugador3."</td>
    <td><img src=Images/".$dados_jugador3[0].".png alt=Bola ".$dados_jugador3[0]." width=50 height=50></td>
    <td><img src=Images/".$dados_jugador3[1].".png alt=Bola ".$dados_jugador3[1]." width=50 height=50></td>
    <td><img src=Images/".$dados_jugador3[2].".png alt=Bola ".$dados_jugador3[2]." width=50 height=50></td>
    <td><img src=Images/".$dados_jugador3[3].".png alt=Bola ".$dados_jugador3[3]." width=50 height=50></td>
    <td><img src=Images/".$dados_jugador3[4].".png alt=Bola ".$dados_jugador3[4]." width=50 height=50></td>
    <td><img src=Images/".$dados_jugador3[5].".png alt=Bola ".$dados_jugador3[5]." width=50 height=50></td>
    </tr>
    <tr>
    <td>".$jugador4."</td>
    <td><img src=Images/".$dados_jugador4[0].".png alt=Bola ".$dados_jugador4[0]." width=50 height=50></td>
    <td><img src=Images/".$dados_jugador4[1].".png alt=Bola ".$dados_jugador4[1]." width=50 height=50></td>
    <td><img src=Images/".$dados_jugador4[2].".png alt=Bola ".$dados_jugador4[2]." width=50 height=50></td>
    <td><img src=Images/".$dados_jugador4[3].".png alt=Bola ".$dados_jugador4[3]." width=50 height=50></td>
    <td><img src=Images/".$dados_jugador4[4].".png alt=Bola ".$dados_jugador4[4]." width=50 height=50></td>
    <td><img src=Images/".$dados_jugador4[5].".png alt=Bola ".$dados_jugador4[5]." width=50 height=50></td>
    </tr>
    </table>";

    if($dados_jugador1[0]==$dados_jugador1[1] && $dados_jugador1[1]== $dados_jugador1[2] && $dados_jugador1[2]==$dados_jugador1[3] && $dados_jugador1[3]==$dados_jugador1[4] && $dados_jugador1[4]==$dados_jugador1[5]){//si todos los dados del jugador 1 son iguales
        $resultado_tirada_jugador1=100;//su puntuación es 100    
    }
    else{
        $resultado_tirada_jugador1= $dados_jugador1[0]+$dados_jugador1[1]+$dados_jugador1[2]+$dados_jugador1[3]+$dados_jugador1[4]+$dados_jugador1[5];//obtenemos la suma de los dados del jugador 1
    }
    

    if($dados_jugador2[0]==$dados_jugador2[1] && $dados_jugador2[1]== $dados_jugador2[2] && $dados_jugador2[2]==$dados_jugador2[3] && $dados_jugador2[3]==$dados_jugador2[4] && $dados_jugador2[4]==$dados_jugador2[5]){
        $resultado_tirada_jugador2=100;    
    }
    else{
        $resultado_tirada_jugador2= $dados_jugador2[0]+$dados_jugador2[1]+$dados_jugador2[2]+$dados_jugador2[3]+$dados_jugador2[4]+$dados_jugador2[5];
    }


    if($dados_jugador3[0]==$dados_jugador3[1] && $dados_jugador3[1]== $dados_jugador3[2] && $dados_jugador3[2]==$dados_jugador3[3] && $dados_jugador3[3]==$dados_jugador3[4] && $dados_jugador3[4]==$dados_jugador3[5]){
        $resultado_tirada_jugador3=100;    
    }
    else{
        $resultado_tirada_jugador3= $dados_jugador3[0]+$dados_jugador3[1]+$dados_jugador3[2]+$dados_jugador3[3]+$dados_jugador3[4]+$dados_jugador3[5];
    }

    
    if($dados_jugador4[0]==$dados_jugador4[1] && $dados_jugador4[1]== $dados_jugador4[2] && $dados_jugador4[2]== $dados_jugador4[3] && $dados_jugador4[3]==$dados_jugador4[4] && $dados_jugador4[4]==$dados_jugador4[5]){
        $resultado_tirada_jugador4=100;    
    }
    else{
        $resultado_tirada_jugador4= $dados_jugador4[0]+$dados_jugador4[1]+$dados_jugador4[2]+$dados_jugador4[3]+$dados_jugador4[4]+$dados_jugador4[5];
    }

    //almacenamos los resultados de cada jugador en un array
    $resultados= array($jugador1=>$resultado_tirada_jugador1, $jugador2=>$resultado_tirada_jugador2, $jugador3=>$resultado_tirada_jugador3, $jugador4=>$resultado_tirada_jugador4);

    //imprimimos los resultados de cada jugador
    foreach($resultados as $clave => $valor){
        echo "<p>".$clave."= ".$valor."</p>";
    }

    //obtenemos el resultado mayor
    $resultado_mayor=0;
    foreach($resultados as $clave => $valor){
        if($valor>$resultado_mayor){
            $resultado_mayor=$valor;
        }
    }

    //vemos a quien o quienes pertenece el resultado mayor
    $cont=0;
    foreach($resultados as $clave => $valor){
        if($valor==$resultado_mayor){//si alguno de los resultados es igual al resultado mayor
            $cont++;//el contador suma 1
            $ganador=$clave;//almacenamos el nombre en la variable ganador
            echo "<p>Ganador: ".$ganador."</p>";//mostramos el nombre del ganador
        }
    }

    //mostramos el número de ganadores
    echo "<p>Número de ganadores: ".$cont."</p>";

}

Function numero_dados_7($jugador1, $jugador2, $jugador3, $jugador4, $dados_jugador1, $dados_jugador2, $dados_jugador3, $dados_jugador4){
    while(count($dados_jugador1)!=7){//mientras que la cantidad de dados del jugador 1 no sea 7
        $dado= rand(1,6);//obtenemos un dado comprendido entre 1 y 6
        array_push($dados_jugador1, $dado);//lo almacenamos en los dados del jugador 1
    }    
    while(count($dados_jugador2)!=7){
        $dado= rand(1,6);
        array_push($dados_jugador2, $dado);
    }
    while(count($dados_jugador3)!=7){
        $dado= rand(1,6);
        array_push($dados_jugador3, $dado);
    }
    while(count($dados_jugador4)!=7){
        $dado= rand(1,6);
        array_push($dados_jugador4, $dado);
    }

    $date = getdate();//obtenemos los valores de fecha y hora y los almacenamos en la variable date
    echo "<p>",$date["mday"],"/",$date["mon"],"/",$date["year"]," ",$date["hours"]+1,":",$date["minutes"],":",$date["seconds"],"</p>";//imprimimos fecha y hora
    
    //imprimimos el nombre de los jugadores junto a sus respectivos dados
    echo "
    <table>
    <tr>
    <td>".$jugador1."</td>
    <td><img src=Images/".$dados_jugador1[0].".png alt=Bola ".$dados_jugador1[0]." width=50 height=50></td>
    <td><img src=Images/".$dados_jugador1[1].".png alt=Bola ".$dados_jugador1[1]." width=50 height=50></td>
    <td><img src=Images/".$dados_jugador1[2].".png alt=Bola ".$dados_jugador1[2]." width=50 height=50></td>
    <td><img src=Images/".$dados_jugador1[3].".png alt=Bola ".$dados_jugador1[3]." width=50 height=50></td>
    <td><img src=Images/".$dados_jugador1[4].".png alt=Bola ".$dados_jugador1[4]." width=50 height=50></td>
    <td><img src=Images/".$dados_jugador1[5].".png alt=Bola ".$dados_jugador1[5]." width=50 height=50></td>
    <td><img src=Images/".$dados_jugador1[6].".png alt=Bola ".$dados_jugador1[6]." width=50 height=50></td>
    </tr>
    <tr>
    <td>".$jugador2."</td>
    <td><img src=Images/".$dados_jugador2[0].".png alt=Bola ".$dados_jugador2[0]." width=50 height=50></td>
    <td><img src=Images/".$dados_jugador2[1].".png alt=Bola ".$dados_jugador2[1]." width=50 height=50></td>
    <td><img src=Images/".$dados_jugador2[2].".png alt=Bola ".$dados_jugador2[2]." width=50 height=50></td>
    <td><img src=Images/".$dados_jugador2[3].".png alt=Bola ".$dados_jugador2[3]." width=50 height=50></td>
    <td><img src=Images/".$dados_jugador2[4].".png alt=Bola ".$dados_jugador2[4]." width=50 height=50></td>
    <td><img src=Images/".$dados_jugador2[5].".png alt=Bola ".$dados_jugador2[5]." width=50 height=50></td>
    <td><img src=Images/".$dados_jugador2[6].".png alt=Bola ".$dados_jugador2[6]." width=50 height=50></td>
    </tr>
    <tr>
    <td>".$jugador3."</td>
    <td><img src=Images/".$dados_jugador3[0].".png alt=Bola ".$dados_jugador3[0]." width=50 height=50></td>
    <td><img src=Images/".$dados_jugador3[1].".png alt=Bola ".$dados_jugador3[1]." width=50 height=50></td>
    <td><img src=Images/".$dados_jugador3[2].".png alt=Bola ".$dados_jugador3[2]." width=50 height=50></td>
    <td><img src=Images/".$dados_jugador3[3].".png alt=Bola ".$dados_jugador3[3]." width=50 height=50></td>
    <td><img src=Images/".$dados_jugador3[4].".png alt=Bola ".$dados_jugador3[4]." width=50 height=50></td>
    <td><img src=Images/".$dados_jugador3[5].".png alt=Bola ".$dados_jugador3[5]." width=50 height=50></td>
    <td><img src=Images/".$dados_jugador3[6].".png alt=Bola ".$dados_jugador3[6]." width=50 height=50></td>
    </tr>
    <tr>
    <td>".$jugador4."</td>
    <td><img src=Images/".$dados_jugador4[0].".png alt=Bola ".$dados_jugador4[0]." width=50 height=50></td>
    <td><img src=Images/".$dados_jugador4[1].".png alt=Bola ".$dados_jugador4[1]." width=50 height=50></td>
    <td><img src=Images/".$dados_jugador4[2].".png alt=Bola ".$dados_jugador4[2]." width=50 height=50></td>
    <td><img src=Images/".$dados_jugador4[3].".png alt=Bola ".$dados_jugador4[3]." width=50 height=50></td>
    <td><img src=Images/".$dados_jugador4[4].".png alt=Bola ".$dados_jugador4[4]." width=50 height=50></td>
    <td><img src=Images/".$dados_jugador4[5].".png alt=Bola ".$dados_jugador4[5]." width=50 height=50></td>
    <td><img src=Images/".$dados_jugador4[6].".png alt=Bola ".$dados_jugador4[6]." width=50 height=50></td>
    </tr>
    </table>";

    if($dados_jugador1[0]==$dados_jugador1[1] && $dados_jugador1[1]== $dados_jugador1[2] && $dados_jugador1[2]==$dados_jugador1[3] && $dados_jugador1[3]==$dados_jugador1[4] && $dados_jugador1[4]==$dados_jugador1[5] && $dados_jugador1[5]==$dados_jugador1[6]){//si todos los dados del jugador 1 son iguales
        $resultado_tirada_jugador1=100;//su puntuación es 100    
    }
    else{
        $resultado_tirada_jugador1= $dados_jugador1[0]+$dados_jugador1[1]+$dados_jugador1[2]+$dados_jugador1[3]+$dados_jugador1[4]+$dados_jugador1[5]+$dados_jugador1[6];//obtenemos la suma de los dados del jugador 1
    }
    

    if($dados_jugador2[0]==$dados_jugador2[1] && $dados_jugador2[1]== $dados_jugador2[2] && $dados_jugador2[2]==$dados_jugador2[3] && $dados_jugador2[3]==$dados_jugador2[4] && $dados_jugador2[4]==$dados_jugador2[5] && $dados_jugador2[5]==$dados_jugador2[6]){
        $resultado_tirada_jugador2=100;    
    }
    else{
        $resultado_tirada_jugador2= $dados_jugador2[0]+$dados_jugador2[1]+$dados_jugador2[2]+$dados_jugador2[3]+$dados_jugador2[4]+$dados_jugador2[5]+$dados_jugador2[6];
    }


    if($dados_jugador3[0]==$dados_jugador3[1] && $dados_jugador3[1]== $dados_jugador3[2] && $dados_jugador3[2]==$dados_jugador3[3] && $dados_jugador3[3]==$dados_jugador3[4] && $dados_jugador3[4]==$dados_jugador3[5] && $dados_jugador3[5]==$dados_jugador3[6]){
        $resultado_tirada_jugador3=100;    
    }
    else{
        $resultado_tirada_jugador3= $dados_jugador3[0]+$dados_jugador3[1]+$dados_jugador3[2]+$dados_jugador3[3]+$dados_jugador3[4]+$dados_jugador3[5]+$dados_jugador3[6];
    }

    
    if($dados_jugador4[0]==$dados_jugador4[1] && $dados_jugador4[1]== $dados_jugador4[2] && $dados_jugador4[2]== $dados_jugador4[3] && $dados_jugador4[3]==$dados_jugador4[4] && $dados_jugador4[4]==$dados_jugador4[5] && $dados_jugador4[5]==$dados_jugador4[6]){
        $resultado_tirada_jugador4=100;    
    }
    else{
        $resultado_tirada_jugador4= $dados_jugador4[0]+$dados_jugador4[1]+$dados_jugador4[2]+$dados_jugador4[3]+$dados_jugador4[4]+$dados_jugador4[5]+$dados_jugador4[6];
    }

    //almacenamos los resultados de cada jugador en un array
    $resultados= array($jugador1=>$resultado_tirada_jugador1, $jugador2=>$resultado_tirada_jugador2, $jugador3=>$resultado_tirada_jugador3, $jugador4=>$resultado_tirada_jugador4);

    //imprimimos los resultados de cada jugador
    foreach($resultados as $clave => $valor){
        echo "<p>".$clave."= ".$valor."</p>";
    }

    //obtenemos el resultado mayor
    $resultado_mayor=0;
    foreach($resultados as $clave => $valor){
        if($valor>$resultado_mayor){
            $resultado_mayor=$valor;
        }
    }

    //vemos a quien o quienes pertenece el resultado mayor
    $cont=0;
    foreach($resultados as $clave => $valor){
        if($valor==$resultado_mayor){//si alguno de los resultados es igual al resultado mayor
            $cont++;//el contador suma 1
            $ganador=$clave;//almacenamos el nombre en la variable ganador
            echo "<p>Ganador: ".$ganador."</p>";//mostramos el nombre del ganador
        }
    }

    //mostramos el número de ganadores
    echo "<p>Número de ganadores: ".$cont."</p>";

}

Function numero_dados_8($jugador1, $jugador2, $jugador3, $jugador4, $dados_jugador1, $dados_jugador2, $dados_jugador3, $dados_jugador4){
    while(count($dados_jugador1)!=8){//mientras que la cantidad de dados del jugador 1 no sea 8
        $dado= rand(1,6);//obtenemos un dado comprendido entre 1 y 6
        array_push($dados_jugador1, $dado);//lo almacenamos en los dados del jugador 1
    }    
    while(count($dados_jugador2)!=8){
        $dado= rand(1,6);
        array_push($dados_jugador2, $dado);
    }
    while(count($dados_jugador3)!=8){
        $dado= rand(1,6);
        array_push($dados_jugador3, $dado);
    }
    while(count($dados_jugador4)!=8){
        $dado= rand(1,6);
        array_push($dados_jugador4, $dado);
    }

    $date = getdate();//obtenemos los valores de fecha y hora y los almacenamos en la variable date
    echo "<p>",$date["mday"],"/",$date["mon"],"/",$date["year"]," ",$date["hours"]+1,":",$date["minutes"],":",$date["seconds"],"</p>";//imprimimos fecha y hora
    
    //imprimimos el nombre de los jugadores junto a sus respectivos dados
    echo "
    <table>
    <tr>
    <td>".$jugador1."</td>
    <td><img src=Images/".$dados_jugador1[0].".png alt=Bola ".$dados_jugador1[0]." width=50 height=50></td>
    <td><img src=Images/".$dados_jugador1[1].".png alt=Bola ".$dados_jugador1[1]." width=50 height=50></td>
    <td><img src=Images/".$dados_jugador1[2].".png alt=Bola ".$dados_jugador1[2]." width=50 height=50></td>
    <td><img src=Images/".$dados_jugador1[3].".png alt=Bola ".$dados_jugador1[3]." width=50 height=50></td>
    <td><img src=Images/".$dados_jugador1[4].".png alt=Bola ".$dados_jugador1[4]." width=50 height=50></td>
    <td><img src=Images/".$dados_jugador1[5].".png alt=Bola ".$dados_jugador1[5]." width=50 height=50></td>
    <td><img src=Images/".$dados_jugador1[6].".png alt=Bola ".$dados_jugador1[6]." width=50 height=50></td>
    <td><img src=Images/".$dados_jugador1[7].".png alt=Bola ".$dados_jugador1[7]." width=50 height=50></td>
    </tr>
    <tr>
    <td>".$jugador2."</td>
    <td><img src=Images/".$dados_jugador2[0].".png alt=Bola ".$dados_jugador2[0]." width=50 height=50></td>
    <td><img src=Images/".$dados_jugador2[1].".png alt=Bola ".$dados_jugador2[1]." width=50 height=50></td>
    <td><img src=Images/".$dados_jugador2[2].".png alt=Bola ".$dados_jugador2[2]." width=50 height=50></td>
    <td><img src=Images/".$dados_jugador2[3].".png alt=Bola ".$dados_jugador2[3]." width=50 height=50></td>
    <td><img src=Images/".$dados_jugador2[4].".png alt=Bola ".$dados_jugador2[4]." width=50 height=50></td>
    <td><img src=Images/".$dados_jugador2[5].".png alt=Bola ".$dados_jugador2[5]." width=50 height=50></td>
    <td><img src=Images/".$dados_jugador2[6].".png alt=Bola ".$dados_jugador2[6]." width=50 height=50></td>
    <td><img src=Images/".$dados_jugador2[7].".png alt=Bola ".$dados_jugador2[7]." width=50 height=50></td>
    </tr>
    <tr>
    <td>".$jugador3."</td>
    <td><img src=Images/".$dados_jugador3[0].".png alt=Bola ".$dados_jugador3[0]." width=50 height=50></td>
    <td><img src=Images/".$dados_jugador3[1].".png alt=Bola ".$dados_jugador3[1]." width=50 height=50></td>
    <td><img src=Images/".$dados_jugador3[2].".png alt=Bola ".$dados_jugador3[2]." width=50 height=50></td>
    <td><img src=Images/".$dados_jugador3[3].".png alt=Bola ".$dados_jugador3[3]." width=50 height=50></td>
    <td><img src=Images/".$dados_jugador3[4].".png alt=Bola ".$dados_jugador3[4]." width=50 height=50></td>
    <td><img src=Images/".$dados_jugador3[5].".png alt=Bola ".$dados_jugador3[5]." width=50 height=50></td>
    <td><img src=Images/".$dados_jugador3[6].".png alt=Bola ".$dados_jugador3[6]." width=50 height=50></td>
    <td><img src=Images/".$dados_jugador3[7].".png alt=Bola ".$dados_jugador3[7]." width=50 height=50></td>
    </tr>
    <tr>
    <td>".$jugador4."</td>
    <td><img src=Images/".$dados_jugador4[0].".png alt=Bola ".$dados_jugador4[0]." width=50 height=50></td>
    <td><img src=Images/".$dados_jugador4[1].".png alt=Bola ".$dados_jugador4[1]." width=50 height=50></td>
    <td><img src=Images/".$dados_jugador4[2].".png alt=Bola ".$dados_jugador4[2]." width=50 height=50></td>
    <td><img src=Images/".$dados_jugador4[3].".png alt=Bola ".$dados_jugador4[3]." width=50 height=50></td>
    <td><img src=Images/".$dados_jugador4[4].".png alt=Bola ".$dados_jugador4[4]." width=50 height=50></td>
    <td><img src=Images/".$dados_jugador4[5].".png alt=Bola ".$dados_jugador4[5]." width=50 height=50></td>
    <td><img src=Images/".$dados_jugador4[6].".png alt=Bola ".$dados_jugador4[6]." width=50 height=50></td>
    <td><img src=Images/".$dados_jugador4[7].".png alt=Bola ".$dados_jugador4[7]." width=50 height=50></td>
    </tr>
    </table>";

    if($dados_jugador1[0]==$dados_jugador1[1] && $dados_jugador1[1]== $dados_jugador1[2] && $dados_jugador1[2]==$dados_jugador1[3] && $dados_jugador1[3]==$dados_jugador1[4] && $dados_jugador1[4]==$dados_jugador1[5] && $dados_jugador1[5]==$dados_jugador1[6] && $dados_jugador1[6]==$dados_jugador1[7]){//si todos los dados del jugador 1 son iguales
        $resultado_tirada_jugador1=100;//su puntuación es 100    
    }
    else{
        $resultado_tirada_jugador1= $dados_jugador1[0]+$dados_jugador1[1]+$dados_jugador1[2]+$dados_jugador1[3]+$dados_jugador1[4]+$dados_jugador1[5]+$dados_jugador1[6]+$dados_jugador1[7];//obtenemos la suma de los dados del jugador 1
    }
    

    if($dados_jugador2[0]==$dados_jugador2[1] && $dados_jugador2[1]== $dados_jugador2[2] && $dados_jugador2[2]==$dados_jugador2[3] && $dados_jugador2[3]==$dados_jugador2[4] && $dados_jugador2[4]==$dados_jugador2[5] && $dados_jugador2[5]==$dados_jugador2[6] && $dados_jugador2[6]==$dados_jugador2[7]){
        $resultado_tirada_jugador2=100;    
    }
    else{
        $resultado_tirada_jugador2= $dados_jugador2[0]+$dados_jugador2[1]+$dados_jugador2[2]+$dados_jugador2[3]+$dados_jugador2[4]+$dados_jugador2[5]+$dados_jugador2[6]+$dados_jugador2[7];
    }


    if($dados_jugador3[0]==$dados_jugador3[1] && $dados_jugador3[1]== $dados_jugador3[2] && $dados_jugador3[2]==$dados_jugador3[3] && $dados_jugador3[3]==$dados_jugador3[4] && $dados_jugador3[4]==$dados_jugador3[5] && $dados_jugador3[5]==$dados_jugador3[6] && $dados_jugador3[6]==$dados_jugador3[7]){
        $resultado_tirada_jugador3=100;    
    }
    else{
        $resultado_tirada_jugador3= $dados_jugador3[0]+$dados_jugador3[1]+$dados_jugador3[2]+$dados_jugador3[3]+$dados_jugador3[4]+$dados_jugador3[5]+$dados_jugador3[6]+$dados_jugador3[7];
    }

    
    if($dados_jugador4[0]==$dados_jugador4[1] && $dados_jugador4[1]== $dados_jugador4[2] && $dados_jugador4[2]== $dados_jugador4[3] && $dados_jugador4[3]==$dados_jugador4[4] && $dados_jugador4[4]==$dados_jugador4[5] && $dados_jugador4[5]==$dados_jugador4[6] && $dados_jugador4[6]==$dados_jugador4[7]){
        $resultado_tirada_jugador4=100;    
    }
    else{
        $resultado_tirada_jugador4= $dados_jugador4[0]+$dados_jugador4[1]+$dados_jugador4[2]+$dados_jugador4[3]+$dados_jugador4[4]+$dados_jugador4[5]+$dados_jugador4[6]+$dados_jugador4[7];
    }

    //almacenamos los resultados de cada jugador en un array
    $resultados= array($jugador1=>$resultado_tirada_jugador1, $jugador2=>$resultado_tirada_jugador2, $jugador3=>$resultado_tirada_jugador3, $jugador4=>$resultado_tirada_jugador4);

    //imprimimos los resultados de cada jugador
    foreach($resultados as $clave => $valor){
        echo "<p>".$clave."= ".$valor."</p>";
    }

    //obtenemos el resultado mayor
    $resultado_mayor=0;
    foreach($resultados as $clave => $valor){
        if($valor>$resultado_mayor){
            $resultado_mayor=$valor;
        }
    }

    //vemos a quien o quienes pertenece el resultado mayor
    $cont=0;
    foreach($resultados as $clave => $valor){
        if($valor==$resultado_mayor){//si alguno de los resultados es igual al resultado mayor
            $cont++;//el contador suma 1
            $ganador=$clave;//almacenamos el nombre en la variable ganador
            echo "<p>Ganador: ".$ganador."</p>";//mostramos el nombre del ganador
        }
    }

    //mostramos el número de ganadores
    echo "<p>Número de ganadores: ".$cont."</p>";

}

Function numero_dados_9($jugador1, $jugador2, $jugador3, $jugador4, $dados_jugador1, $dados_jugador2, $dados_jugador3, $dados_jugador4){
    while(count($dados_jugador1)!=9){//mientras que la cantidad de dados del jugador 1 no sea 9
        $dado= rand(1,6);//obtenemos un dado comprendido entre 1 y 6
        array_push($dados_jugador1, $dado);//lo almacenamos en los dados del jugador 1
    }    
    while(count($dados_jugador2)!=9){
        $dado= rand(1,6);
        array_push($dados_jugador2, $dado);
    }
    while(count($dados_jugador3)!=9){
        $dado= rand(1,6);
        array_push($dados_jugador3, $dado);
    }
    while(count($dados_jugador4)!=9){
        $dado= rand(1,6);
        array_push($dados_jugador4, $dado);
    }

    $date = getdate();//obtenemos los valores de fecha y hora y los almacenamos en la variable date
    echo "<p>",$date["mday"],"/",$date["mon"],"/",$date["year"]," ",$date["hours"]+1,":",$date["minutes"],":",$date["seconds"],"</p>";//imprimimos fecha y hora
    
    //imprimimos el nombre de los jugadores junto a sus respectivos dados
    echo "
    <table>
    <tr>
    <td>".$jugador1."</td>
    <td><img src=Images/".$dados_jugador1[0].".png alt=Bola ".$dados_jugador1[0]." width=50 height=50></td>
    <td><img src=Images/".$dados_jugador1[1].".png alt=Bola ".$dados_jugador1[1]." width=50 height=50></td>
    <td><img src=Images/".$dados_jugador1[2].".png alt=Bola ".$dados_jugador1[2]." width=50 height=50></td>
    <td><img src=Images/".$dados_jugador1[3].".png alt=Bola ".$dados_jugador1[3]." width=50 height=50></td>
    <td><img src=Images/".$dados_jugador1[4].".png alt=Bola ".$dados_jugador1[4]." width=50 height=50></td>
    <td><img src=Images/".$dados_jugador1[5].".png alt=Bola ".$dados_jugador1[5]." width=50 height=50></td>
    <td><img src=Images/".$dados_jugador1[6].".png alt=Bola ".$dados_jugador1[6]." width=50 height=50></td>
    <td><img src=Images/".$dados_jugador1[7].".png alt=Bola ".$dados_jugador1[7]." width=50 height=50></td>
    <td><img src=Images/".$dados_jugador1[8].".png alt=Bola ".$dados_jugador1[8]." width=50 height=50></td>
    </tr>
    <tr>
    <td>".$jugador2."</td>
    <td><img src=Images/".$dados_jugador2[0].".png alt=Bola ".$dados_jugador2[0]." width=50 height=50></td>
    <td><img src=Images/".$dados_jugador2[1].".png alt=Bola ".$dados_jugador2[1]." width=50 height=50></td>
    <td><img src=Images/".$dados_jugador2[2].".png alt=Bola ".$dados_jugador2[2]." width=50 height=50></td>
    <td><img src=Images/".$dados_jugador2[3].".png alt=Bola ".$dados_jugador2[3]." width=50 height=50></td>
    <td><img src=Images/".$dados_jugador2[4].".png alt=Bola ".$dados_jugador2[4]." width=50 height=50></td>
    <td><img src=Images/".$dados_jugador2[5].".png alt=Bola ".$dados_jugador2[5]." width=50 height=50></td>
    <td><img src=Images/".$dados_jugador2[6].".png alt=Bola ".$dados_jugador2[6]." width=50 height=50></td>
    <td><img src=Images/".$dados_jugador2[7].".png alt=Bola ".$dados_jugador2[7]." width=50 height=50></td>
    <td><img src=Images/".$dados_jugador2[8].".png alt=Bola ".$dados_jugador2[8]." width=50 height=50></td>
    </tr>
    <tr>
    <td>".$jugador3."</td>
    <td><img src=Images/".$dados_jugador3[0].".png alt=Bola ".$dados_jugador3[0]." width=50 height=50></td>
    <td><img src=Images/".$dados_jugador3[1].".png alt=Bola ".$dados_jugador3[1]." width=50 height=50></td>
    <td><img src=Images/".$dados_jugador3[2].".png alt=Bola ".$dados_jugador3[2]." width=50 height=50></td>
    <td><img src=Images/".$dados_jugador3[3].".png alt=Bola ".$dados_jugador3[3]." width=50 height=50></td>
    <td><img src=Images/".$dados_jugador3[4].".png alt=Bola ".$dados_jugador3[4]." width=50 height=50></td>
    <td><img src=Images/".$dados_jugador3[5].".png alt=Bola ".$dados_jugador3[5]." width=50 height=50></td>
    <td><img src=Images/".$dados_jugador3[6].".png alt=Bola ".$dados_jugador3[6]." width=50 height=50></td>
    <td><img src=Images/".$dados_jugador3[7].".png alt=Bola ".$dados_jugador3[7]." width=50 height=50></td>
    <td><img src=Images/".$dados_jugador3[8].".png alt=Bola ".$dados_jugador3[8]." width=50 height=50></td>
    </tr>
    <tr>
    <td>".$jugador4."</td>
    <td><img src=Images/".$dados_jugador4[0].".png alt=Bola ".$dados_jugador4[0]." width=50 height=50></td>
    <td><img src=Images/".$dados_jugador4[1].".png alt=Bola ".$dados_jugador4[1]." width=50 height=50></td>
    <td><img src=Images/".$dados_jugador4[2].".png alt=Bola ".$dados_jugador4[2]." width=50 height=50></td>
    <td><img src=Images/".$dados_jugador4[3].".png alt=Bola ".$dados_jugador4[3]." width=50 height=50></td>
    <td><img src=Images/".$dados_jugador4[4].".png alt=Bola ".$dados_jugador4[4]." width=50 height=50></td>
    <td><img src=Images/".$dados_jugador4[5].".png alt=Bola ".$dados_jugador4[5]." width=50 height=50></td>
    <td><img src=Images/".$dados_jugador4[6].".png alt=Bola ".$dados_jugador4[6]." width=50 height=50></td>
    <td><img src=Images/".$dados_jugador4[7].".png alt=Bola ".$dados_jugador4[7]." width=50 height=50></td>
    <td><img src=Images/".$dados_jugador4[8].".png alt=Bola ".$dados_jugador4[8]." width=50 height=50></td>
    </tr>
    </table>";

    if($dados_jugador1[0]==$dados_jugador1[1] && $dados_jugador1[1]== $dados_jugador1[2] && $dados_jugador1[2]==$dados_jugador1[3] && $dados_jugador1[3]==$dados_jugador1[4] && $dados_jugador1[4]==$dados_jugador1[5] && $dados_jugador1[5]==$dados_jugador1[6] && $dados_jugador1[6]==$dados_jugador1[7] && $dados_jugador1[7]==$dados_jugador1[8]){//si todos los dados del jugador 1 son iguales
        $resultado_tirada_jugador1=100;//su puntuación es 100    
    }
    else{
        $resultado_tirada_jugador1= $dados_jugador1[0]+$dados_jugador1[1]+$dados_jugador1[2]+$dados_jugador1[3]+$dados_jugador1[4]+$dados_jugador1[5]+$dados_jugador1[6]+$dados_jugador1[7]+$dados_jugador1[8];//obtenemos la suma de los dados del jugador 1
    }
    

    if($dados_jugador2[0]==$dados_jugador2[1] && $dados_jugador2[1]== $dados_jugador2[2] && $dados_jugador2[2]==$dados_jugador2[3] && $dados_jugador2[3]==$dados_jugador2[4] && $dados_jugador2[4]==$dados_jugador2[5] && $dados_jugador2[5]==$dados_jugador2[6] && $dados_jugador2[6]==$dados_jugador2[7] && $dados_jugador2[7]==$dados_jugador2[8]){
        $resultado_tirada_jugador2=100;    
    }
    else{
        $resultado_tirada_jugador2= $dados_jugador2[0]+$dados_jugador2[1]+$dados_jugador2[2]+$dados_jugador2[3]+$dados_jugador2[4]+$dados_jugador2[5]+$dados_jugador2[6]+$dados_jugador2[7]+$dados_jugador2[8];
    }


    if($dados_jugador3[0]==$dados_jugador3[1] && $dados_jugador3[1]== $dados_jugador3[2] && $dados_jugador3[2]==$dados_jugador3[3] && $dados_jugador3[3]==$dados_jugador3[4] && $dados_jugador3[4]==$dados_jugador3[5] && $dados_jugador3[5]==$dados_jugador3[6] && $dados_jugador3[6]==$dados_jugador3[7] && $dados_jugador3[7]==$dados_jugador3[8]){
        $resultado_tirada_jugador3=100;    
    }
    else{
        $resultado_tirada_jugador3= $dados_jugador3[0]+$dados_jugador3[1]+$dados_jugador3[2]+$dados_jugador3[3]+$dados_jugador3[4]+$dados_jugador3[5]+$dados_jugador3[6]+$dados_jugador3[7]+$dados_jugador3[8];
    }

    
    if($dados_jugador4[0]==$dados_jugador4[1] && $dados_jugador4[1]== $dados_jugador4[2] && $dados_jugador4[2]== $dados_jugador4[3] && $dados_jugador4[3]==$dados_jugador4[4] && $dados_jugador4[4]==$dados_jugador4[5] && $dados_jugador4[5]==$dados_jugador4[6] && $dados_jugador4[6]==$dados_jugador4[7] && $dados_jugador4[7]==$dados_jugador4[8]){
        $resultado_tirada_jugador4=100;    
    }
    else{
        $resultado_tirada_jugador4= $dados_jugador4[0]+$dados_jugador4[1]+$dados_jugador4[2]+$dados_jugador4[3]+$dados_jugador4[4]+$dados_jugador4[5]+$dados_jugador4[6]+$dados_jugador4[7]+$dados_jugador4[8];
    }

    //almacenamos los resultados de cada jugador en un array
    $resultados= array($jugador1=>$resultado_tirada_jugador1, $jugador2=>$resultado_tirada_jugador2, $jugador3=>$resultado_tirada_jugador3, $jugador4=>$resultado_tirada_jugador4);

    //imprimimos los resultados de cada jugador
    foreach($resultados as $clave => $valor){
        echo "<p>".$clave."= ".$valor."</p>";
    }

    //obtenemos el resultado mayor
    $resultado_mayor=0;
    foreach($resultados as $clave => $valor){
        if($valor>$resultado_mayor){
            $resultado_mayor=$valor;
        }
    }

    //vemos a quien o quienes pertenece el resultado mayor
    $cont=0;
    foreach($resultados as $clave => $valor){
        if($valor==$resultado_mayor){//si alguno de los resultados es igual al resultado mayor
            $cont++;//el contador suma 1
            $ganador=$clave;//almacenamos el nombre en la variable ganador
            echo "<p>Ganador: ".$ganador."</p>";//mostramos el nombre del ganador
        }
    }

    //mostramos el número de ganadores
    echo "<p>Número de ganadores: ".$cont."</p>";

}

Function numero_dados_10($jugador1, $jugador2, $jugador3, $jugador4, $dados_jugador1, $dados_jugador2, $dados_jugador3, $dados_jugador4){
    while(count($dados_jugador1)!=10){//mientras que la cantidad de dados del jugador 1 no sea 10
        $dado= rand(1,6);//obtenemos un dado comprendido entre 1 y 6
        array_push($dados_jugador1, $dado);//lo almacenamos en los dados del jugador 1
    }    
    while(count($dados_jugador2)!=10){
        $dado= rand(1,6);
        array_push($dados_jugador2, $dado);
    }
    while(count($dados_jugador3)!=10){
        $dado= rand(1,6);
        array_push($dados_jugador3, $dado);
    }
    while(count($dados_jugador4)!=10){
        $dado= rand(1,6);
        array_push($dados_jugador4, $dado);
    }

    $date = getdate();//obtenemos los valores de fecha y hora y los almacenamos en la variable date
    echo "<p>",$date["mday"],"/",$date["mon"],"/",$date["year"]," ",$date["hours"]+1,":",$date["minutes"],":",$date["seconds"],"</p>";//imprimimos fecha y hora
    
    //imprimimos el nombre de los jugadores junto a sus respectivos dados
    echo "
    <table>
    <tr>
    <td>".$jugador1."</td>
    <td><img src=Images/".$dados_jugador1[0].".png alt=Bola ".$dados_jugador1[0]." width=50 height=50></td>
    <td><img src=Images/".$dados_jugador1[1].".png alt=Bola ".$dados_jugador1[1]." width=50 height=50></td>
    <td><img src=Images/".$dados_jugador1[2].".png alt=Bola ".$dados_jugador1[2]." width=50 height=50></td>
    <td><img src=Images/".$dados_jugador1[3].".png alt=Bola ".$dados_jugador1[3]." width=50 height=50></td>
    <td><img src=Images/".$dados_jugador1[4].".png alt=Bola ".$dados_jugador1[4]." width=50 height=50></td>
    <td><img src=Images/".$dados_jugador1[5].".png alt=Bola ".$dados_jugador1[5]." width=50 height=50></td>
    <td><img src=Images/".$dados_jugador1[6].".png alt=Bola ".$dados_jugador1[6]." width=50 height=50></td>
    <td><img src=Images/".$dados_jugador1[7].".png alt=Bola ".$dados_jugador1[7]." width=50 height=50></td>
    <td><img src=Images/".$dados_jugador1[8].".png alt=Bola ".$dados_jugador1[8]." width=50 height=50></td>
    <td><img src=Images/".$dados_jugador1[9].".png alt=Bola ".$dados_jugador1[9]." width=50 height=50></td>
    </tr>
    <tr>
    <td>".$jugador2."</td>
    <td><img src=Images/".$dados_jugador2[0].".png alt=Bola ".$dados_jugador2[0]." width=50 height=50></td>
    <td><img src=Images/".$dados_jugador2[1].".png alt=Bola ".$dados_jugador2[1]." width=50 height=50></td>
    <td><img src=Images/".$dados_jugador2[2].".png alt=Bola ".$dados_jugador2[2]." width=50 height=50></td>
    <td><img src=Images/".$dados_jugador2[3].".png alt=Bola ".$dados_jugador2[3]." width=50 height=50></td>
    <td><img src=Images/".$dados_jugador2[4].".png alt=Bola ".$dados_jugador2[4]." width=50 height=50></td>
    <td><img src=Images/".$dados_jugador2[5].".png alt=Bola ".$dados_jugador2[5]." width=50 height=50></td>
    <td><img src=Images/".$dados_jugador2[6].".png alt=Bola ".$dados_jugador2[6]." width=50 height=50></td>
    <td><img src=Images/".$dados_jugador2[7].".png alt=Bola ".$dados_jugador2[7]." width=50 height=50></td>
    <td><img src=Images/".$dados_jugador2[8].".png alt=Bola ".$dados_jugador2[8]." width=50 height=50></td>
    <td><img src=Images/".$dados_jugador2[9].".png alt=Bola ".$dados_jugador2[9]." width=50 height=50></td>
    </tr>
    <tr>
    <td>".$jugador3."</td>
    <td><img src=Images/".$dados_jugador3[0].".png alt=Bola ".$dados_jugador3[0]." width=50 height=50></td>
    <td><img src=Images/".$dados_jugador3[1].".png alt=Bola ".$dados_jugador3[1]." width=50 height=50></td>
    <td><img src=Images/".$dados_jugador3[2].".png alt=Bola ".$dados_jugador3[2]." width=50 height=50></td>
    <td><img src=Images/".$dados_jugador3[3].".png alt=Bola ".$dados_jugador3[3]." width=50 height=50></td>
    <td><img src=Images/".$dados_jugador3[4].".png alt=Bola ".$dados_jugador3[4]." width=50 height=50></td>
    <td><img src=Images/".$dados_jugador3[5].".png alt=Bola ".$dados_jugador3[5]." width=50 height=50></td>
    <td><img src=Images/".$dados_jugador3[6].".png alt=Bola ".$dados_jugador3[6]." width=50 height=50></td>
    <td><img src=Images/".$dados_jugador3[7].".png alt=Bola ".$dados_jugador3[7]." width=50 height=50></td>
    <td><img src=Images/".$dados_jugador3[8].".png alt=Bola ".$dados_jugador3[8]." width=50 height=50></td>
    <td><img src=Images/".$dados_jugador3[9].".png alt=Bola ".$dados_jugador3[9]." width=50 height=50></td>
    </tr>
    <tr>
    <td>".$jugador4."</td>
    <td><img src=Images/".$dados_jugador4[0].".png alt=Bola ".$dados_jugador4[0]." width=50 height=50></td>
    <td><img src=Images/".$dados_jugador4[1].".png alt=Bola ".$dados_jugador4[1]." width=50 height=50></td>
    <td><img src=Images/".$dados_jugador4[2].".png alt=Bola ".$dados_jugador4[2]." width=50 height=50></td>
    <td><img src=Images/".$dados_jugador4[3].".png alt=Bola ".$dados_jugador4[3]." width=50 height=50></td>
    <td><img src=Images/".$dados_jugador4[4].".png alt=Bola ".$dados_jugador4[4]." width=50 height=50></td>
    <td><img src=Images/".$dados_jugador4[5].".png alt=Bola ".$dados_jugador4[5]." width=50 height=50></td>
    <td><img src=Images/".$dados_jugador4[6].".png alt=Bola ".$dados_jugador4[6]." width=50 height=50></td>
    <td><img src=Images/".$dados_jugador4[7].".png alt=Bola ".$dados_jugador4[7]." width=50 height=50></td>
    <td><img src=Images/".$dados_jugador4[8].".png alt=Bola ".$dados_jugador4[8]." width=50 height=50></td>
    <td><img src=Images/".$dados_jugador4[9].".png alt=Bola ".$dados_jugador4[9]." width=50 height=50></td>
    </tr>
    </table>";

    if($dados_jugador1[0]==$dados_jugador1[1] && $dados_jugador1[1]== $dados_jugador1[2] && $dados_jugador1[2]==$dados_jugador1[3] && $dados_jugador1[3]==$dados_jugador1[4] && $dados_jugador1[4]==$dados_jugador1[5] && $dados_jugador1[5]==$dados_jugador1[6] && $dados_jugador1[6]==$dados_jugador1[7] && $dados_jugador1[7]==$dados_jugador1[8] && $dados_jugador1[8]==$dados_jugador1[9]){//si todos los dados del jugador 1 son iguales
        $resultado_tirada_jugador1=100;//su puntuación es 100    
    }
    else{
        $resultado_tirada_jugador1= $dados_jugador1[0]+$dados_jugador1[1]+$dados_jugador1[2]+$dados_jugador1[3]+$dados_jugador1[4]+$dados_jugador1[5]+$dados_jugador1[6]+$dados_jugador1[7]+$dados_jugador1[8]+$dados_jugador1[9];//obtenemos la suma de los dados del jugador 1
    }
    

    if($dados_jugador2[0]==$dados_jugador2[1] && $dados_jugador2[1]== $dados_jugador2[2] && $dados_jugador2[2]==$dados_jugador2[3] && $dados_jugador2[3]==$dados_jugador2[4] && $dados_jugador2[4]==$dados_jugador2[5] && $dados_jugador2[5]==$dados_jugador2[6] && $dados_jugador2[6]==$dados_jugador2[7] && $dados_jugador2[7]==$dados_jugador2[8] && $dados_jugador2[8]==$dados_jugador2[9]){
        $resultado_tirada_jugador2=100;    
    }
    else{
        $resultado_tirada_jugador2= $dados_jugador2[0]+$dados_jugador2[1]+$dados_jugador2[2]+$dados_jugador2[3]+$dados_jugador2[4]+$dados_jugador2[5]+$dados_jugador2[6]+$dados_jugador2[7]+$dados_jugador2[8]+$dados_jugador2[9];
    }


    if($dados_jugador3[0]==$dados_jugador3[1] && $dados_jugador3[1]== $dados_jugador3[2] && $dados_jugador3[2]==$dados_jugador3[3] && $dados_jugador3[3]==$dados_jugador3[4] && $dados_jugador3[4]==$dados_jugador3[5] && $dados_jugador3[5]==$dados_jugador3[6] && $dados_jugador3[6]==$dados_jugador3[7] && $dados_jugador3[7]==$dados_jugador3[8] && $dados_jugador3[8]==$dados_jugador3[9]){
        $resultado_tirada_jugador3=100;    
    }
    else{
        $resultado_tirada_jugador3= $dados_jugador3[0]+$dados_jugador3[1]+$dados_jugador3[2]+$dados_jugador3[3]+$dados_jugador3[4]+$dados_jugador3[5]+$dados_jugador3[6]+$dados_jugador3[7]+$dados_jugador3[8]+$dados_jugador3[9];
    }

    
    if($dados_jugador4[0]==$dados_jugador4[1] && $dados_jugador4[1]== $dados_jugador4[2] && $dados_jugador4[2]== $dados_jugador4[3] && $dados_jugador4[3]==$dados_jugador4[4] && $dados_jugador4[4]==$dados_jugador4[5] && $dados_jugador4[5]==$dados_jugador4[6] && $dados_jugador4[6]==$dados_jugador4[7] && $dados_jugador4[7]==$dados_jugador4[8] && $dados_jugador4[8]==$dados_jugador4[9]){
        $resultado_tirada_jugador4=100;    
    }
    else{
        $resultado_tirada_jugador4= $dados_jugador4[0]+$dados_jugador4[1]+$dados_jugador4[2]+$dados_jugador4[3]+$dados_jugador4[4]+$dados_jugador4[5]+$dados_jugador4[6]+$dados_jugador4[7]+$dados_jugador4[8]+$dados_jugador4[9];
    }

    //almacenamos los resultados de cada jugador en un array
    $resultados= array($jugador1=>$resultado_tirada_jugador1, $jugador2=>$resultado_tirada_jugador2, $jugador3=>$resultado_tirada_jugador3, $jugador4=>$resultado_tirada_jugador4);

    //imprimimos los resultados de cada jugador
    foreach($resultados as $clave => $valor){
        echo "<p>".$clave."= ".$valor."</p>";
    }

    //obtenemos el resultado mayor
    $resultado_mayor=0;
    foreach($resultados as $clave => $valor){
        if($valor>$resultado_mayor){
            $resultado_mayor=$valor;
        }
    }

    //vemos a quien o quienes pertenece el resultado mayor
    $cont=0;
    foreach($resultados as $clave => $valor){
        if($valor==$resultado_mayor){//si alguno de los resultados es igual al resultado mayor
            $cont++;//el contador suma 1
            $ganador=$clave;//almacenamos el nombre en la variable ganador
            echo "<p>Ganador: ".$ganador."</p>";//mostramos el nombre del ganador
        }
    }

    //mostramos el número de ganadores
    echo "<p>Número de ganadores: ".$cont."</p>";

}

?>
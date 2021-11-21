<?php
Function mostrar_cartas($jugador1, $jugador2, $jugador3, $jugador4, $banca, $numero_cartas, $valores_cartas_j1, $valores_cartas_j2, $valores_cartas_j3, $valores_cartas_j4, $valores_cartas_banca){
    echo "
    <table>
    <tr>
    <td>".$jugador1."</td>";
    for($i=0; $i<$numero_cartas; $i++){
    echo "<td><img src=Images/".$valores_cartas_j1[$i].".png alt=Carta ".$valores_cartas_j1[$i]." width=50 height=50></td>";
    }
    echo "</tr>
    <tr>
    <td>".$jugador2."</td>";
    for($i=0; $i<$numero_cartas; $i++){
        echo "<td><img src=Images/".$valores_cartas_j2[$i].".png alt=Carta ".$valores_cartas_j2[$i]." width=50 height=50></td>";
    }
    echo "</tr>
    <tr>
    <td>".$jugador3."</td>";
    for($i=0; $i<$numero_cartas; $i++){
        echo "<td><img src=Images/".$valores_cartas_j3[$i].".png alt=Carta ".$valores_cartas_j3[$i]." width=50 height=50></td>";
    }
    echo "</tr>
    <tr>
    <td>".$jugador4."</td>";
    for($i=0; $i<$numero_cartas; $i++){
        echo "<td><img src=Images/".$valores_cartas_j4[$i].".png alt=Carta ".$valores_cartas_j4[$i]." width=50 height=50></td>";
    }
    echo "</tr>
    <tr>
    <td>".$banca."</td>";
    for($i=0; $i<$numero_cartas; $i++){
        echo "<td><img src=Images/".$valores_cartas_banca[$i].".png alt=Carta ".$valores_cartas_banca[$i]." width=50 height=50></td>";
    }
    echo "</tr>
    </table>";
    
}

Function mostrar_puntuaciones($puntuacion, $puntuacion_banca, $jugador1, $jugador2, $jugador3, $jugador4, $banca){
    echo "Puntuaciones:<br>";
    for($i=0; $i<4; $i++){
        echo ${"jugador".($i+1)}.": ".$puntuacion[$i]."<br>";
    }
    echo $banca.": ".$puntuacion_banca."<br>";
}

Function mostrarGanadorPuntuacion_crearFichero($puntuacion, $puntuacion_j1, $puntuacion_j2, $puntuacion_j3, $puntuacion_j4, $puntuacion_banca, $jugador1, $jugador2, $jugador3, $jugador4, $banca, $cantidad_apostada){

    $contador=0;//inicializamos el contador a cero
    
    //si la puntuación de un jugador y de la banca es menor a 21, Y la puntuación del jugador es mayor o igual al de la banca, EL JUGADOR GANA
    for($i=0; $i<4; $i++){
        if($puntuacion[$i]<21 && $puntuacion_banca<21 && $puntuacion[$i]>=$puntuacion_banca){
            $contador++;
        }
    }
    
    //si la puntuacion de un jugador y de la banca es 21, EL JUGADOR GANA
    for($i=0; $i<4; $i++){
        if($puntuacion[$i]==21 && $puntuacion_banca==21){
            $contador++;
        }
    }
    
    //si la puntuación de todos los jugadores y de la banca es 21, la banca tambien gana
    if($puntuacion_j1==21 && $puntuacion_j2==21 && $puntuacion_j3==21 && $puntuacion_j4==21 && $puntuacion_banca==21){
        $contador++;
    }
    
    //si la puntuacion de un jugador es 21 y mayor al de la banca, EL JUGADOR GANA
    for($i=0; $i<4; $i++){
        if($puntuacion[$i]==21 && $puntuacion[$i]>$puntuacion_banca){
            $contador++;
        }
    }
    
    //si la puntuación de un jugador es menor o igual a 21, Y la puntuación de la banca es mayor a 21. EL JUGADOR GANA
    for($i=0; $i<4; $i++){
        if($puntuacion[$i]<=21 && $puntuacion_banca>21){
            $contador++;
        }
    }
    
    //si todas las puntuaciones son mayores a 21, NADIE GANA
    if($puntuacion_j1>21 && $puntuacion_j2>21 && $puntuacion_j3>21 && $puntuacion_j4>21 && $puntuacion_banca>21){
        echo "La puntuación de todos es mayor a 21. NADIE GANA";
    }
    
    //Vemos las distintas maneras en que la banca puede ganar
    if($puntuacion_banca<=21 && $puntuacion_j1<=21 && $puntuacion_j2<=21 && $puntuacion_j3<=21 && $puntuacion_j4<=21 && $puntuacion_banca>$puntuacion_j1 && $puntuacion_banca>$puntuacion_j2 && $puntuacion_banca>$puntuacion_j3 && $puntuacion_banca>$puntuacion_j4){
        $contador++;
    }
    if($puntuacion_j1>21 && $puntuacion_j2>21 && $puntuacion_j3>21 && $puntuacion_j4>21 && $puntuacion_banca<=21){
        $contador++;
    }
    //pj4>21
    if($puntuacion_banca<=21 && $puntuacion_j4>21 && $puntuacion_banca>$puntuacion_j1 && $puntuacion_banca>$puntuacion_j2 && $puntuacion_banca>$puntuacion_j3){
        $contador++;
    }
    //pj3>21
    if($puntuacion_banca<=21 && $puntuacion_j3>21 && $puntuacion_banca>$puntuacion_j1 && $puntuacion_banca>$puntuacion_j2 && $puntuacion_banca>$puntuacion_j4){
        $contador++;
    }
    //pj2>21
    if($puntuacion_banca<=21 && $puntuacion_j2>21 && $puntuacion_banca>$puntuacion_j1 && $puntuacion_banca>$puntuacion_j3 && $puntuacion_banca>$puntuacion_j4){
        $contador++;
    }
    //pj1>21
    if($puntuacion_banca<=21 && $puntuacion_j1>21 && $puntuacion_banca>$puntuacion_j2 && $puntuacion_banca>$puntuacion_j3 && $puntuacion_banca>$puntuacion_j4){
        $contador++;
    }
    //pj1>21,pj2>21
    if($puntuacion_banca<=21 && $puntuacion_j1>21 && $puntuacion_j2>21 && $puntuacion_banca>$puntuacion_j3 && $puntuacion_banca>$puntuacion_j4){
        $contador++;
    }
    //pj1>21,pj3>21
    if($puntuacion_banca<=21 && $puntuacion_j1>21 && $puntuacion_j3>21 && $puntuacion_banca>$puntuacion_j2 && $puntuacion_banca>$puntuacion_j4){
        $contador++;
    }
    //pj1>21,pj4>21
    if($puntuacion_banca<=21 && $puntuacion_j1>21 && $puntuacion_j4>21 && $puntuacion_banca>$puntuacion_j2 && $puntuacion_banca>$puntuacion_j3){
        $contador++;
    }
    //pj2>21,pj3>21
    if($puntuacion_banca<=21 && $puntuacion_j2>21 && $puntuacion_j3>21 && $puntuacion_banca>$puntuacion_j1 && $puntuacion_banca>$puntuacion_j4){
        $contador++;
    }
    //pj2>21,pj4>21
    if($puntuacion_banca<=21 && $puntuacion_j4>21 && $puntuacion_j2>21 && $puntuacion_banca>$puntuacion_j1 && $puntuacion_banca>$puntuacion_j3){
        $contador++;
    }
    //pj3>21,pj4>21
    if($puntuacion_banca<=21 && $puntuacion_j3>21 && $puntuacion_j4>21 && $puntuacion_banca>$puntuacion_j1 && $puntuacion_banca>$puntuacion_j2){
        $contador++;
    }
    //pj1>21,pj2>21,pj3>21
    if($puntuacion_banca<=21 && $puntuacion_j1>21 && $puntuacion_j2>21 && $puntuacion_j3>21 && $puntuacion_banca>$puntuacion_j4){
        $contador++;
    }
    //pj1>21,pj3>21,pj4>21
    if($puntuacion_banca<=21 && $puntuacion_j4>21 && $puntuacion_j3>21 && $puntuacion_j1>21 && $puntuacion_banca>$puntuacion_j2){
        $contador++;
    }
    //pj1>21,pj2>21,pj4>21
    if($puntuacion_banca<=21 && $puntuacion_j4>21 && $puntuacion_j2>21 && $puntuacion_j1>21 && $puntuacion_banca>$puntuacion_j3){
        $contador++;
    }
    //pj2>21,pj3>21,pj4>21
    if($puntuacion_banca<=21 && $puntuacion_j2>21 && $puntuacion_j3>21 && $puntuacion_j4>21 && $puntuacion_banca>$puntuacion_j1){
        $contador++;
    }

    $date = getdate();//obtenemos los valores de fecha y hora y los almacenamos en la variable date

    //abrimos fichero
    $fichero = fopen("premios_".($date["mday"]).($date["mon"]).($date["year"]).($date["hours"]+1).($date["minutes"]).($date["seconds"]).".txt", "w") or die("No se puede abrir el archivo!");
    
    //si la puntuación de un jugador y de la banca es 21, EL JUGADOR GANA
    for($i=0; $i<4; $i++){
        if($puntuacion[$i]==21 && $puntuacion_banca==21){
            $cantidad_apostada_jugador= $cantidad_apostada/2;
            echo ${"jugador".($i+1)}." tiene ".$puntuacion[$i]." y gana: ".($cantidad_apostada_jugador/$contador)."<br>";
            fwrite($fichero, ${"jugador".($i+1)}."#".$puntuacion[$i]."#".($cantidad_apostada_jugador/$contador)."\n");
        }
    }
    
    //si la puntuación de un jugador es 21 y mayor al de la banca, EL JUGADOR GANA
    for($i=0; $i<4; $i++){
        if($puntuacion[$i]==21 && $puntuacion[$i]>$puntuacion_banca){
            echo ${"jugador".($i+1)}." tiene ".$puntuacion[$i]." y gana: ".($cantidad_apostada/$contador)."<br>";
            fwrite($fichero, ${"jugador".($i+1)}."#".$puntuacion[$i]."#".($cantidad_apostada/$contador)."\n");
        }
    }
    
    //si la puntuación de un jugador es menor o igual a 21, Y la puntuación de la banca es mayor a 21. EL JUGADOR GANA
    for($i=0; $i<4; $i++){
        if($puntuacion[$i]<=21 && $puntuacion_banca>21){
            echo ${"jugador".($i+1)}." tiene ".$puntuacion[$i]." y gana: ".($cantidad_apostada/$contador)."<br>";
            fwrite($fichero, ${"jugador".($i+1)}."#".$puntuacion[$i]."#".($cantidad_apostada/$contador)."\n");
        }
    }
    
    //si la puntuación de un jugador y de la banca es menor a 21, Y la puntuación del jugador es mayor o igual al de la banca, EL JUGADOR GANA
    for($i=0; $i<4; $i++){
        if($puntuacion[$i]<21 && $puntuacion_banca<21 && $puntuacion[$i]>=$puntuacion_banca){
            echo ${"jugador".($i+1)}." tiene ".$puntuacion[$i]." y gana: ".($cantidad_apostada/$contador)."<br>";
            fwrite($fichero, ${"jugador".($i+1)}."#".$puntuacion[$i]."#".($cantidad_apostada/$contador)."\n");
        }
    }
    
    //si la puntuacion de todos los jugadores y de la banca es 21, LA BANCA TAMBIÉN GANA
    if($puntuacion_j1==21 && $puntuacion_j2==21 && $puntuacion_j3==21 && $puntuacion_j4==21 && $puntuacion_banca==21){
        $cantidad_apostada_banca= $cantidad_apostada/2;
        echo $banca. "tiene ".$puntuacion_banca." y gana: ".($cantidad_apostada_banca/$contador)."<br>";
        fwrite($fichero, $banca."#".$puntuacion_banca."#".($cantidad_apostada_banca/$contador)."\n");
    }
    
    //vemos las distintas maneras en las que la banca puede ganar
    if($puntuacion_banca<=21 && $puntuacion_j1<=21 && $puntuacion_j2<=21 && $puntuacion_j3<=21 && $puntuacion_j4<=21 && $puntuacion_banca>$puntuacion_j1 && $puntuacion_banca>$puntuacion_j2 && $puntuacion_banca>$puntuacion_j3 && $puntuacion_banca>$puntuacion_j4){
        echo $banca." tiene ".$puntuacion_banca." y gana: ".($cantidad_apostada/$contador)."<br>";
        fwrite($fichero, $banca."#".$puntuacion_banca."#".($cantidad_apostada/$contador)."\n");
    }
    if($puntuacion_j1>21 && $puntuacion_j2>21 && $puntuacion_j3>21 && $puntuacion_j4>21 && $puntuacion_banca<=21){
        echo $banca." tiene ".$puntuacion_banca." y gana: ".($cantidad_apostada/$contador)."<br>";
        fwrite($fichero, $banca."#".$puntuacion_banca."#".($cantidad_apostada/$contador)."\n");
    }
    //pj4>21
    if($puntuacion_banca<=21 && $puntuacion_j4>21 && $puntuacion_banca>$puntuacion_j1 && $puntuacion_banca>$puntuacion_j2 && $puntuacion_banca>$puntuacion_j3){
        echo $banca." tiene ".$puntuacion_banca." y gana: ".($cantidad_apostada/$contador)."<br>";
        fwrite($fichero, $banca."#".$puntuacion_banca."#".($cantidad_apostada/$contador)."\n");
    }
    //pj3>21
    if($puntuacion_banca<=21 && $puntuacion_j3>21 && $puntuacion_banca>$puntuacion_j1 && $puntuacion_banca>$puntuacion_j2 && $puntuacion_banca>$puntuacion_j4){
        echo $banca." tiene ".$puntuacion_banca." y gana: ".($cantidad_apostada/$contador)."<br>";
        fwrite($fichero, $banca."#".$puntuacion_banca."#".($cantidad_apostada/$contador)."\n");
    }
    //pj2>21
    if($puntuacion_banca<=21 && $puntuacion_j2>21 && $puntuacion_banca>$puntuacion_j1 && $puntuacion_banca>$puntuacion_j3 && $puntuacion_banca>$puntuacion_j4){
        echo $banca." tiene ".$puntuacion_banca." y gana: ".($cantidad_apostada/$contador)."<br>";
        fwrite($fichero, $banca."#".$puntuacion_banca."#".($cantidad_apostada/$contador)."\n");
    }
    //pj1>21
    if($puntuacion_banca<=21 && $puntuacion_j1>21 && $puntuacion_banca>$puntuacion_j2 && $puntuacion_banca>$puntuacion_j3 && $puntuacion_banca>$puntuacion_j4){
        echo $banca." tiene ".$puntuacion_banca." y gana: ".($cantidad_apostada/$contador)."<br>";
        fwrite($fichero, $banca."#".$puntuacion_banca."#".($cantidad_apostada/$contador)."\n");
    }
    //pj1>21,pj2>21
    if($puntuacion_banca<=21 && $puntuacion_j1>21 && $puntuacion_j2>21 && $puntuacion_banca>$puntuacion_j3 && $puntuacion_banca>$puntuacion_j4){
        echo $banca." tiene ".$puntuacion_banca." y gana: ".($cantidad_apostada/$contador)."<br>";
        fwrite($fichero, $banca."#".$puntuacion_banca."#".($cantidad_apostada/$contador)."\n");
    }
    //pj1>21,pj3>21
    if($puntuacion_banca<=21 && $puntuacion_j1>21 && $puntuacion_j3>21 && $puntuacion_banca>$puntuacion_j2 && $puntuacion_banca>$puntuacion_j4){
        echo $banca." tiene ".$puntuacion_banca." y gana: ".($cantidad_apostada/$contador)."<br>";
        fwrite($fichero, $banca."#".$puntuacion_banca."#".($cantidad_apostada/$contador)."\n");
    }
    //pj1>21,pj4>21
    if($puntuacion_banca<=21 && $puntuacion_j1>21 && $puntuacion_j4>21 && $puntuacion_banca>$puntuacion_j2 && $puntuacion_banca>$puntuacion_j3){
        echo $banca." tiene ".$puntuacion_banca." y gana: ".($cantidad_apostada/$contador)."<br>";
        fwrite($fichero, $banca."#".$puntuacion_banca."#".($cantidad_apostada/$contador)."\n");
    }
    //pj2>21,pj3>21
    if($puntuacion_banca<=21 && $puntuacion_j2>21 && $puntuacion_j3>21 && $puntuacion_banca>$puntuacion_j1 && $puntuacion_banca>$puntuacion_j4){
        echo $banca." tiene ".$puntuacion_banca." y gana: ".($cantidad_apostada/$contador)."<br>";
        fwrite($fichero, $banca."#".$puntuacion_banca."#".($cantidad_apostada/$contador)."\n");
    }
    //pj2>21,pj4>21
    if($puntuacion_banca<=21 && $puntuacion_j4>21 && $puntuacion_j2>21 && $puntuacion_banca>$puntuacion_j1 && $puntuacion_banca>$puntuacion_j3){
        echo $banca." tiene ".$puntuacion_banca." y gana: ".($cantidad_apostada/$contador)."<br>";
        fwrite($fichero, $banca."#".$puntuacion_banca."#".($cantidad_apostada/$contador)."\n");
    }
    //pj3>21,pj4>21
    if($puntuacion_banca<=21 && $puntuacion_j3>21 && $puntuacion_j4>21 && $puntuacion_banca>$puntuacion_j1 && $puntuacion_banca>$puntuacion_j2){
        echo $banca." tiene ".$puntuacion_banca." y gana: ".($cantidad_apostada/$contador)."<br>";
        fwrite($fichero, $banca."#".$puntuacion_banca."#".($cantidad_apostada/$contador)."\n");
    }
    //pj1>21,pj2>21,pj3>21
    if($puntuacion_banca<=21 && $puntuacion_j1>21 && $puntuacion_j2>21 && $puntuacion_j3>21 && $puntuacion_banca>$puntuacion_j4){
        echo $banca." tiene ".$puntuacion_banca." y gana: ".($cantidad_apostada/$contador)."<br>";
        fwrite($fichero, $banca."#".$puntuacion_banca."#".($cantidad_apostada/$contador)."\n");
    }
    //pj1>21,pj3>21,pj4>21
    if($puntuacion_banca<=21 && $puntuacion_j4>21 && $puntuacion_j3>21 && $puntuacion_j1>21 && $puntuacion_banca>$puntuacion_j2){
        echo $banca." tiene ".$puntuacion_banca." y gana: ".($cantidad_apostada/$contador)."<br>";
        fwrite($fichero, $banca."#".$puntuacion_banca."#".($cantidad_apostada/$contador)."\n");
    }
    //pj1>21,pj2>21,pj4>21
    if($puntuacion_banca<=21 && $puntuacion_j4>21 && $puntuacion_j2>21 && $puntuacion_j1>21 && $puntuacion_banca>$puntuacion_j3){
        echo $banca." tiene ".$puntuacion_banca." y gana: ".($cantidad_apostada/$contador)."<br>";
        fwrite($fichero, $banca."#".$puntuacion_banca."#".($cantidad_apostada/$contador)."\n");
    }
    //pj2>21,pj3>21,pj4>21
    if($puntuacion_banca<=21 && $puntuacion_j2>21 && $puntuacion_j3>21 && $puntuacion_j4>21 && $puntuacion_banca>$puntuacion_j1){
        echo $banca." tiene ".$puntuacion_banca." y gana: ".($cantidad_apostada/$contador)."<br>";
        fwrite($fichero, $banca."#".$puntuacion_banca."#".($cantidad_apostada/$contador)."\n");
    }
    fclose($fichero);//cerramos fichero
}
?>

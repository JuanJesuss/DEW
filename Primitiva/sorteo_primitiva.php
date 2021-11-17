<!DOCTYPE html>

<html>

<head>
<title>Sorteo La Primitiva</title>
<meta charset="utf-8">
<link rel="stylesheet" href="Css/estilos.css">
</head>

<body>

<?php

$fecha=$_POST["fechasorteo"];//almacenamos la fecha de sorteo
$fecha_sor= explode("-", $fecha);//dividimos la cadena cada vez que se encuentre un guión
$dia= $fecha_sor[2];//la posicion 2 corresponde al día
$mes= $fecha_sor[1];//la posicion 1 corresponde al mes
$anio= $fecha_sor[0];////la posicion 0 corresponde al año
$fecha_sorteo= $dia."/".$mes."/".$anio;//ordenamos la fecha al formato dd/mm/aaaa
echo "<h3><span class=uno>Lotería Primitiva de España</span> / Sorteo&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$fecha_sorteo."</h3>";

$siete_numeros= array();//creamos el array donde se almacenará la combinación ganadora más el número complementario
while(count($siete_numeros)!=7){//mientras que el array no tenga una longitud de 7
    $numero= rand(1,49);//generamos un número comprendido entre 1 y 49
    if(!in_array($numero, $siete_numeros)){//si el número no está en el array
        array_push($siete_numeros, $numero);//lo añadimos
    }
}

$combinacion_ganadora= array();//creamos el array combinación ganadora
for($i=0; $i<6; $i++){
    array_push($combinacion_ganadora, $siete_numeros[$i]);//almacenamos las 6 primeras posiciones del array siete_numeros
}

//mostramos los números de la combinación ganadora
echo "<span class=uno>Combinación ganadora:</span> ";
$longitud= count($combinacion_ganadora);
for($i=0; $i<$longitud; $i++){
    echo "<img src=r22_bolasprimitiva/".$combinacion_ganadora[$i].".png alt=Bola ".$combinacion_ganadora[$i]." width=50 height=50> ";
}

$numero_complementario= $siete_numeros[6];//creamos la variable numero_complementario, la cual será igual a la séptima posición del array siete_numeros
echo "<p><span class=uno>Complementario:</span> <img src=r22_bolasprimitiva/".$numero_complementario.".png alt=Bola ".$numero_complementario." width=50 height=50></p>";//mostramos complementario

$reintegro= rand(0,9);//generamos un número comprendido entre 0 y 9, el cual será el reintegro
echo "<p><span class=uno>Reintegro:</span> <img src=r22_bolasprimitiva/rbola".$reintegro.".png alt=Bola ".$reintegro." width=50 height=50></p>";//mostramos el reintegro

$cero_aciertos=0;
$un_acierto=0;
$dos_aciertos=0;
$tres_aciertos=0;
$cuatro_aciertos=0;
$cinco_aciertos=0;
$cinco_aciertos_mas_complementario=0;
$seis_aciertos=0;
$reintegro_apuesta=0;

$contador=0;//inicializamos contador a cero
$numero_apuestas=0;//inicializamos el número de apuestas a cero
$fichero_apostadores = fopen("r22_primitiva.txt", "r") or die("No se puede abrir el fichero!");//abrimos fichero_apostadores
while(!feof($fichero_apostadores)) {//mientras fichero_apostadores no se acabe
$aciertos=0;
$linea= fgets($fichero_apostadores);//obtenemos una línea
$contador++;//el contador suma 1
    if($contador>1){//hacemos esto para empezar desde la segunda línea
        $numero_apuestas++;//el número de apuestas suma 1
        $numero= explode("-", $linea);//separamos la línea cada vez que se encuentre un guión
        
        //comprobamos cuantos aciertos hay en la línea
        for($i=0; $i<6; $i++){
            if($combinacion_ganadora[$i]==$numero[1] || $combinacion_ganadora[$i]==$numero[2] || $combinacion_ganadora[$i]==$numero[3] || $combinacion_ganadora[$i]==$numero[4] || $combinacion_ganadora[$i]==$numero[5] || $combinacion_ganadora[$i]==$numero[6] ){
                $aciertos++;
            }
        }
        
        if($aciertos==0){
            $cero_aciertos++;
        }
        if($aciertos==1){
            $un_acierto++;
        }
        if($aciertos==2){
            $dos_aciertos++;
        }
        if($aciertos<3 && $reintegro==$numero[8]){//si aciertos es menor a 3 y el número de reintegro coincide con el número de reintegro jugado
            $reintegro_apuesta++;//reintegro_apuesta suma uno
        }
        if($aciertos==3){
            $tres_aciertos++;
        }
        if($aciertos==4){
            $cuatro_aciertos++;
        }
        if($aciertos==5 && $numero_complementario!=$numero[7]){//si aciertos es igual a cinco y el número complementario no coincide con el número complementario jugado
            $cinco_aciertos++;
        }
        if($aciertos==5 && $numero_complementario==$numero[7]){//si aciertos es igual a cinco y el número complementario coincide con el número complementario jugado
            $cinco_aciertos_mas_complementario++;//la variable cinco_aciertos_mas_complementario suma uno
        }
        if($aciertos==6){
            $seis_aciertos++;
        }
    
        }
    
    }
    fclose($fichero_apostadores);//cerramos fichero

    //mostramos aciertos
    echo "<p>Apuestas jugadas: <b>".$numero_apuestas."</b></p>";
    echo "<ul>
    <li>Acertantes 6 números: <b>".$seis_aciertos."</b></li>
    <li>Acertantes 5 números + Complementario: <b>".$cinco_aciertos_mas_complementario."</b></li>
    <li>Acertantes 5 números: <b>".$cinco_aciertos."</b></li>
    <li>Acertantes 4 números: <b>".$cuatro_aciertos."</b></li>
    <li>Acertantes 3 números: <b>".$tres_aciertos."</b></li>
    <li>Acertantes Reintegros: <b>".$reintegro_apuesta."</b></li>
    <li>Sin premio 2 números: <b>".$dos_aciertos."</b></li>
    <li>Sin premio 1 número: <b>".$un_acierto."</b></li>
    <li>Sin premio 0 números: <b>".$cero_aciertos."</b></li>
    </ul>";

    $recaudacion= $_POST["recaudacion"];
    echo "Recaudación: ".$recaudacion."<br>";//mostramos recaudación

    $recaudacion_para_premios= $recaudacion*(80/100);//la recaudación para premios es el 80% de la recaudación
    echo "Recaudación para premios: ".$recaudacion_para_premios."<br>";

    $premio_total_acertante_6_aciertos= $recaudacion_para_premios*(40/100);//el premio total para los acertantes de 6 aciertos es el 40% de la recaudación para premios
    echo "Premio total para acertantes de 6 aciertos: ".$premio_total_acertante_6_aciertos."<br>";

    $premio_total_acertante_5_aciertos_mas_complementario= $recaudacion_para_premios*(30/100);//el premio total para los acertantes de 5 aciertos más complementario, es el 30% de la recaudación para premios
    echo "Premio total para acertantes de 5 aciertos más complementario: ".$premio_total_acertante_5_aciertos_mas_complementario."<br>";

    $premio_total_acertante_5_aciertos= $recaudacion_para_premios*(15/100);//el premio total para los acertantes de 5 aciertos, es el 15% de la recaudación para premios
    echo "Premio total para acertantes de 5 aciertos: ".$premio_total_acertante_5_aciertos."<br>";

    $premio_total_acertante_4_aciertos= $recaudacion_para_premios*(5/100);//el premio total para los acertantes de 4 aciertos, es el 5% de la recaudación para premios
    echo "Premio total para acertantes de 4 aciertos: ".$premio_total_acertante_4_aciertos."<br>";

    $premio_total_acertante_3_aciertos= $recaudacion_para_premios*(8/100);//el premio total para los acertantes de 3 aciertos, es el 8% de la recaudación para premios
    echo "Premio total para acertantes de 3 aciertos: ".$premio_total_acertante_3_aciertos."<br>";

    $premio_total_acertante_reintegro= $recaudacion_para_premios*(2/100);//el premio total para los acertantes de reintegros, es el 2% de la recaudación para premios
    echo "Premio total para acertantes de reintegro: ".$premio_total_acertante_reintegro."<br>";


    if($seis_aciertos==0){//si no hay acertante de seis aciertos
        $premio_cada_acertante_6_aciertos= $seis_aciertos;
    }
    else{//sino
        $premio_cada_acertante_6_aciertos= $premio_total_acertante_6_aciertos/$seis_aciertos;//dividimos el premio total para acertantes de 6 aciertos sobre la cantidad de apostadores que tuvieron 6 aciertos
    }


    if($cinco_aciertos_mas_complementario==0){//si no hay acertantes de cinco aciertos más complementario
        $premio_cada_acertante_5_aciertos_mas_complementario= $cinco_aciertos_mas_complementario;
    }
    else{//sino
        $premio_cada_acertante_5_aciertos_mas_complementario= $premio_total_acertante_5_aciertos_mas_complementario/$cinco_aciertos_mas_complementario;//dividimos el premio total para acertantes de 5 aciertos más complementario sobre la cantidad de apostadores que tuvieron 5 aciertos más complementario
    }


    if($cinco_aciertos==0){//si no hay acertantes de cinco aciertos
        $premio_cada_acertante_5_aciertos= $cinco_aciertos;
    }
    else{//sino
        $premio_cada_acertante_5_aciertos= $premio_total_acertante_5_aciertos/$cinco_aciertos;//dividimos el premio total para acertantes de 5 aciertos sobre la cantidad de apostadores que tuvieron 5 aciertos
    }


    if($cuatro_aciertos==0){//si no hay acertantes de cuatro aciertos
        $premio_cada_acertante_4_aciertos= $cuatro_aciertos;
    }
    else{//sino
        $premio_cada_acertante_4_aciertos= $premio_total_acertante_4_aciertos/$cuatro_aciertos;//dividimos el premio total para acertantes de 4 aciertos sobre la cantidad de apostadores que tuvieron 4 aciertos
    }


    if($tres_aciertos==0){//si no hay acertantes de tres aciertos
        $premio_cada_acertante_3_aciertos= $tres_aciertos;
    }
    else{//sino
        $premio_cada_acertante_3_aciertos= $premio_total_acertante_3_aciertos/$tres_aciertos;//dividimos el premio total para acertantes de 3 aciertos sobre la cantidad de apostadores que tuvieron 3 aciertos
    }


    if($reintegro_apuesta==0){//si no hay acertantes de reintegro
        $premio_cada_acertante_reintegro= $reintegro_apuesta;
    }
    else{//sino
        $premio_cada_acertante_reintegro= $premio_total_acertante_reintegro/$reintegro_apuesta;//dividimos el premio total para acertantes de reintegros sobre la cantidad de apostadores que tuvieron reintegros
    }

    $fichero_premios= fopen("premiosorteo_".$dia.$mes.$anio.".txt", "w") or die("No se puede abrir el archivo!");//el modo 'w' borra el contenido del fichero o crea uno nuevo si éste no existe. El puntero empieza al comienzo del fichero
    fwrite($fichero_premios, "C6 # ".$premio_cada_acertante_6_aciertos."\n");//escribimos el premio a percibir por cada acertante de 6 aciertos
    fwrite($fichero_premios, "C5+ # ".$premio_cada_acertante_5_aciertos_mas_complementario."\n");//escribimos el premio a percibir por cada acertante de 5 aciertos más número complementario
    fwrite($fichero_premios, "C5 # ".$premio_cada_acertante_5_aciertos."\n");//escribimos el premio a percibir por cada acertante de 5 aciertos
    fwrite($fichero_premios, "C4 # ".$premio_cada_acertante_4_aciertos."\n");//escribimos el premio a percibir por cada acertante de 4 aciertos
    fwrite($fichero_premios, "C3 # ".$premio_cada_acertante_3_aciertos."\n");//escribimos el premio a percibir por cada acertante de 3 aciertos
    fwrite($fichero_premios, "CR # ".$premio_cada_acertante_reintegro);//escribimos el premio a percibir por cada acertante de reintegro
    fclose($fichero_premios);//cerramos fichero

?>

</body>

</html>
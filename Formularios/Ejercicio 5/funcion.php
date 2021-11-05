<?php
function convertir($numero, $base, $nueva_base){
    $longitud=strlen($numero);//obtenemos la longitud del número
    $decimal=0;
    $potencia=$longitud-1;

//covertimos el número a base 10
for($i=0; $i<$longitud; $i++){
    if($numero[$i]=="A"){//si la posicion ocupa una A, vale 10 
    $decimal+=10*pow($base,$potencia);
    $potencia--;
    }
    elseif($numero[$i]=="B"){//si la posicion ocupa una B, vale 11
        $decimal+=11*pow($base,$potencia);
        $potencia--;
    }
    elseif($numero[$i]=="C"){//si la posicion ocupa una C, vale 12
        $decimal+=12*pow($base,$potencia);
        $potencia--;
    }    
    elseif($numero[$i]=="D"){//si la posicion ocupa una D, vale 13
        $decimal+=13*pow($base,$potencia);
        $potencia--;
        }
    elseif($numero[$i]=="E"){//si la posicion ocupa una E, vale 14
        $decimal+=14*pow($base,$potencia);
        $potencia--;
        }
    elseif($numero[$i]=="F"){//si la posicion ocupa una F, vale 15
        $decimal+=15*pow($base,$potencia);
        $potencia--;
        }
    else{//si la posicina no ocupa una letra, es un número
        $decimal+=$numero[$i]*pow($base,$potencia);
        $potencia--;
    }    
}

//covertimos el decimal a la nueva base
$array= array();
for($i=0; $i<100; $i++){
    if($nueva_base==16){//si la nueva base es 16
        $resto= $decimal%$nueva_base;//obtenemos el resto
        if($resto==10){//si resto es 10, el valor es A
            $resto="A";
        }
        if($resto==11){//si resto es 11, el valor es B
            $resto="B";
        }
        if($resto==12){//si resto es 12, el valor es C
            $resto="C";
        }
        if($resto==13){//si resto es 13, el valor es D
            $resto="D";
        }
        if($resto==14){//si resto es 14, el valor es E
            $resto="E";
        }
        if($resto==15){//si resto es 15, el valor es F
            $resto="F";
        }
        $array[$i]=$resto;//almacenamos el restos en el array
        $decimal= intval($decimal/$nueva_base);//dividimos el decimal sobre la nueva base
        if($decimal==0) break;//cuando el decimal valga 0, salimos
    }
    else{//si la nueva base no es 16
        $resto= $decimal%$nueva_base;//obtenemos el resto
        $array[$i]=$resto;//almacenamos el resto en el array
        $decimal= intval($decimal/$nueva_base);//dividimos el decimal sobre la nueva base
        if($decimal==0) break;//cuando el decimal valga 0, salimos
    }
}

$length= sizeof($array)-1;
    for($i=$length; $i>=0; $i--){
        echo $array[$i];//imprimimos la nueva base
    }
}
?>
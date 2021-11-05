<HTML>

<HEAD>
<TITLE>EJ3-Conversion IP Decimal a Binario</TITLE>
</HEAD>

<BODY>

<?php

$ip= "192.168.16.100/16";
$mascara=substr($ip,15,2);
$ipSinMascara= substr($ip,0,14);

$numbers= explode(".",$ipSinMascara); //sirve para partir una cadena hasta el caracter especificado, y convertirla en un array.

if($mascara==16){
    for($i=2; $i<4; $i++ ){
        $numbers[$i]=0;
    }
}

$resultado= "";
for($i=0; $i<4; $i++){
$dirRed= $numbers[$i];
$resultado= $resultado.$dirRed.".";
}

printf("IP: $ip"."<br/>");
printf("Mascara: $mascara"."<br/>");
printf("Direcci&oacute;n red: ".rtrim($resultado,".")."<br/>");

$numbers2= explode(".",rtrim($resultado));

if($mascara==16){
    for($i=2; $i<4; $i++ ){
        $numbers2[$i]=255;
    }
}

$result= "";
for($i=0; $i<4; $i++){
$dirBroadcast= $numbers2[$i];
$result= $result.$dirBroadcast.".";
}

printf("Direcci&oacute;n Broadcast: ".rtrim($result,".")."<br/>");

$numbers3= explode(".",rtrim($resultado));

if($mascara==16){
    for($i=3; $i<4; $i++ ){
        $numbers3[$i]=1;
    }
}

$resul= "";
for($i=0; $i<4; $i++){
$rango= $numbers3[$i];
$resul= $resul.$rango.".";
}

printf("Rango: ".rtrim($resul,".")." a ");

$numbers4= explode(".",rtrim($resultado));

if($mascara==16){
    for($i=2; $i<3; $i++ ){
        $numbers4[$i]=255;
    }
    for($i=3; $i<4; $i++ ){
        $numbers4[$i]=254;
    }
}

$res= "";
for($i=0; $i<4; $i++){
$rang= $numbers4[$i];
$res= $res.$rang.".";
}

printf(rtrim($res,"."));

?>

</body>

</html>

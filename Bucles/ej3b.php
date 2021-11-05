<!DOCTYPE HTML>
<HTML>

<HEAD>
<TITLE>EJ3B – Conversor decimal a base 16</TITLE>
<META charset="utf-8"/>
</HEAD>

<BODY>

<?php

$d=128631;

echo "Número $d en base 16 = ";

$a= array();

for($i=0; $i<10; $i++){
    $b= $d%16;
    if($b==10){
        $b="A";
    }

    if($b==11){
        $b="B";
    }

    if($b==12){
        $b="C";
    }

    if($b==13){
        $b="D";
    }

    if($b==14){
        $b="E";
    }

    if($b==15){
        $b="F";
    }
    $a[$i]=$b;
    
    $d= intval($d/16);
    if($d==0) break;
}

$n= sizeof($a)-1;

for($i=$n; $i>=0; $i--){
  echo $a[$i];
}




?>

</body>

</html>

<!DOCTYPE HTML>
<HTML>

<HEAD>
<TITLE>EJ2B – Conversor decimal a base 8</TITLE>
<META charset="utf-8"/>
</HEAD>

<BODY>

<?php

$d=48;

echo "Número $d en base 8 = ";

$a= array();

for($i=0; $i<10; $i++){
    $b= $d%8;
    $a[$i]=$b;
    $d= intval($d/8);
    if($d==0) break;
}

$n= sizeof($a)-1;

for($i=$n; $i>=0; $i--){
  echo $a[$i];
}



?>

</body>

</html>

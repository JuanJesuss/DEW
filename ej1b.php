<!DOCTYPE HTML>
<HTML>

<HEAD>
<TITLE>EJ1B – Conversor decimal a binario</TITLE>
<META charset="utf-8"/>
</HEAD>

<BODY>

<?php

$d=168;

echo "Número $d en binario = ";

$a= array();

for($i=0; $i<10; $i++){
    $b= $d%2;
    $a[$i]=$b;
    $d= intval($d/2);
    if($d==0) break;
}

$n= sizeof($a)-1;

for($i=$n; $i>=0; $i--){
  echo $a[$i];
}



?>

</body>

</html>

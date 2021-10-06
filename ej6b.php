<!DOCTYPE HTML>
<HTML>

<HEAD>
<TITLE>EJ6B – Factorial</TITLE>
<META charset="utf-8"/>
</HEAD>

<BODY>

<?php
$num=5;
$valor=1;
echo $num."!=";
for($i=$num; $i>=2; $i--){
   echo $i."x";
}
echo $valor."=";
for ($i=$num; $i>=1; $i--){
			$valor*=$i;
}
    echo $valor;

?>

</body>

</html>
<HTML>

<HEAD>
<TITLE>EJ1-Conversion IP Decimal a Binario</TITLE>
</HEAD>

<BODY>

<?php
$ip= "192.18.16.204";
$numbers= explode(".",$ip); //sirve para partir una cadena hasta el caracter especificado, y convertirla en un array.
$cadena="";

for($i=0;$i<4;$i++) {
	$ipBinario= sprintf("%b",$numbers[$i]); //servirá para convertir el número de decimal a binario.

	while(strlen($ipBinario)<8) { //para que añada los ceros que faltan.
		$ipBinario= "0".$ipBinario;
	}
	$cadena= $cadena.$ipBinario."."; //concatenamos todos los resultados para formar la ip.
}

printf ("IP $ip en binario es: ".rtrim($cadena, "."));

?>

</body>

</html>

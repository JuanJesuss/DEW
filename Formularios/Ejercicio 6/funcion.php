<?php
function ipdecimal_ipbinario($ip_decimal, $numeros){
    $cadena="";
    for($i=0;$i<4;$i++) {
        $ipBinario= sprintf("%b",$numeros[$i]);//convertimos el número decimal a binario.
    
        while(strlen($ipBinario)<8)//mientras que la longitud del número sea menor a 8, se añadirán ceros al principio.
        { 
            $ipBinario= "0".$ipBinario;
        }
    $cadena= $cadena.$ipBinario."."; //concatenamos todos los resultados para formar la ip.
    }
    
//mostramos ip decimal y binaria
echo "<label>IP notaci&oacuten decimal: </label>
      <input type=text value=$ip_decimal><br><br>
      <label>IP Binario: </label>
      <input type=text size=40 value=".rtrim($cadena, ".").">";
}
?>
<!DOCTYPE HTML>
<HTML>

<HEAD>
<TITLE>EJ5B – Tabla de multiplicar del 9</TITLE>
<META charset="utf-8" />
<link href="ej5bEstilos.css" rel="stylesheet" type="text/css" />
</HEAD>

<BODY>

<?php

$num=9;

    echo "<table>";
    for($i=1; $i<=10; $i++){
    echo "<tr>";
    echo "<td>$num*$i</td>";
    echo "<td>".$num*$i."</td>";
    echo "<tr>";
    }
    echo"</table>";

?>

</body>

</html>

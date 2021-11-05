<?php
function decimalAbinario($numdec){
    $binario= sprintf("%b",$numdec);
    echo "<table>";
    echo "<tr>";
    echo "<td>Binario</td>";
    echo "<td>$binario</td>";
    echo "</tr>";
    echo "</table>";
}

function decimalAoctal($numdec){
    $octal= sprintf("%o",$numdec);
    echo "<table>";
    echo "<tr>";
    echo "<td>Octal</td>";
    echo "<td>$octal</td>";
    echo "</tr>";
    echo "</table>";
}

function decimalAhexadecimal($numdec){
    $hexadecimal= sprintf("%x",$numdec);
    echo "<table>";
    echo "<tr>";
    echo "<td>Hexadecimal</td>";
    echo "<td>$hexadecimal</td>";
    echo "</tr>";
    echo "</table>";
}

function decimalAtodos($numdec){
    $binario= sprintf("%b",$numdec);
    $octal= sprintf("%o",$numdec);
    $hexadecimal= sprintf("%x",$numdec);
    echo "<table>";
    echo "<tr>";
    echo "<td>Binario</td>";
    echo "<td>$binario</td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td>Octal</td>";
    echo "<td>$octal</td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td>Hexadecimal</td>";
    echo "<td>$hexadecimal</td>";
    echo "</tr>";
    echo "</table>";
}
?>
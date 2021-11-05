<!DOCTYPE html>

<html>

<head>
<title>Conversor númerico</title>
<link href="estilos.css" rel="stylesheet" type="text/css"/>    
</head>

<body>
<h1>CONVERSOR NUMERICO</h1>

<?php

$numdec=$_POST["decimal"];

echo "Número decimal: <input type=text value=$numdec><br><br>";

require "funciones.php";

if($_POST["r"]=="binario"){
    decimalAbinario($numdec);
}
elseif($_POST["r"]=="octal"){
    decimalAoctal($numdec);
}
elseif($_POST["r"]=="hexadecimal"){
    decimalAhexadecimal($numdec);
}
elseif($_POST["r"]=="todos"){
    decimalAtodos($numdec);
}

?>

</body>

</html>
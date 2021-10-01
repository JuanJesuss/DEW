<HTML>
<HEAD>
<TITLE>EJERCICIO DE CLASE</TITLE>
</HEAD>

<BODY>

<?php

$bolsa = array (
    array("Acciona", "143,10", "-0,07%", "-0,10,", "3.856.364,50", "0,00", "23,35", "2,79%", "12:07"),
    array("Acerinox", 0, 0, 0, 0, 0, 0, 0, 0),
    array("ACS", 0, 0, 0, 0, 0, 0, 0, 0),
    array("AENA", 0, 0, 0, 0, 0, 0, 0, 0),
    array("ALMIRALL", 0, 0, 0, 0, 0, 0, 0, 0),
    array("AMADEUS", 0, 0, 0, 0, 0, 0, 0, 0),
    array("ARCELORMITTAL", 0, 0, 0, 0, 0, 0, 0, 0),
    array("BANKINTER", 0, 0, 0, 0, 0, 0, 0, 0),
    array("BBVA", 0, 0, 0, 0, 0, 0, 0, 0),
    array("CAIXABANK", 0, 0, 0, 0, 0, 0, 0, 0),
    array("CELLNEX TELECOM", 0, 0, 0, 0, 0, 0, 0, 0),
    array("CIE AUTOMOTIVE", 0, 0, 0, 0, 0, 0, 0, 0),
    array("ENAGAS", 0, 0, 0, 0, 0, 0, 0, 0),
    array("ENDESA", 0, 0, 0, 0, 0, 0, 0, 0),
    array("FERROVIAL", 0, 0, 0, 0, 0, 0, 0, 0),
    array("FLUIDRA", 0, 0, 0, 0, 0, 0, 0, 0),
    array("GRIFOLS", 0, 0, 0, 0, 0, 0, 0, 0),
    array("IAG(IBERIA)", 0, 0, 0, 0, 0, 0, 0, 0),
    array("IBERDROLA", 0, 0, 0, 0, 0, 0, 0, 0),
    array("INDITEX", 0, 0, 0, 0, 0, 0, 0, 0),
    array("INDRA", 0, 0, 0, 0, 0, 0, 0, 0),
    array("INM. COLONIAL", 0, 0, 0, 0, 0, 0, 0, 0),
    array("MAPFRE", 0, 0, 0, 0, 0, 0, 0, 0),
    array("MELIA HOTELS INTL", 0, 0, 0, 0, 0, 0, 0, 0),
    array("MERLIN PROP.", 0, 0, 0, 0, 0, 0, 0, 0),
    array("NATURGY", 0, 0, 0, 0, 0, 0, 0, 0),
    array("PHARMA MAR R", 0, 0, 0, 0, 0, 0, 0, 0),
    array("REE", 0, 0, 0, 0, 0, 0, 0, 0),
    array("REPSOL", 0, 0, 0, 0, 0, 0, 0, 0),
    array("SABADELL", 0, 0, 0, 0, 0, 0, 0, 0),
    array("SANTANDER", 0, 0, 0, 0, 0, 0, 0, 0),
    array("SIEMENS GAMESA", 0, 0, 0, 0, 0, 0, 0, 0),
    array("SOLARIA ENERGIA", 0, 0, 0, 0, 0, 0, 0, 0),
    array("TELEFONICA", 0, 0, 0, 0, 0, 0, 0, 0),
    array("VISCOFAN", 0, 0, 0, 0, 0, 0, 0, 0));

$longitud=count($bolsa);
 
for ($fila=0; $fila<$longitud; $fila++) {
  echo "<p>Fila $fila</p>";
  echo "<ul>";
  for ($col=0; $col<9; $col++) {
    echo "<li>".$bolsa[$fila][$col]."</li>";
  }
  echo "</ul>";
}


?>

</BODY>

</HTML>

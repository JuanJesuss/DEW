<!DOCTYPE html>

<html>

<head>
<title>Alta Departamentos</title>
<meta charset="utf-8">
</head>

<body>
<h1>Alta Departamentos</h1>

<?php

$nom_dpto=$_POST["nom_dpto"];//guardamos nombre dpto en la variable nom_dpto

if(empty($nom_dpto)){//si no hay nombre dpto
    echo "Debe introducir el nombre del departamento.";
}
else{
$servername = "localhost";
$username = "root";
$password = "rootroot";
$dbname = "empleadosnn";

// creamos conexión
$conn = mysqli_connect($servername, $username, $password, $dbname);

// chequeamos conexión
if(!$conn){
    die("Connection failed: " . mysqli_connect_error());
}
else{
    $sql = "SELECT * FROM departamento;";//hacemos select de todas las filas de la tabla departamento
	$resultado = mysqli_query($conn, $sql);//guardamos el resultado en la variable resultado
	if(mysqli_num_rows($resultado)==0){//si el numero de filas del resultado es cero
        $sql .= "INSERT INTO departamento (cod_dpto, nombre_dpto) VALUES ('D001','$nom_dpto');";
    }
    else {
        $letra= "D";
        $num= mysqli_num_rows($resultado);//guardamos el número de filas en la variable num
        $num++;//sumamos 1 a la variable num
        if($num>1 && $num<10){//si el numero es mayor a 1 y menor a 10
            $cod_dpto= $letra.str_repeat("0", 2).$num;//el cod_dpto es D00num
            $sql .= "INSERT INTO departamento (cod_dpto, nombre_dpto) VALUES ('$cod_dpto','$nom_dpto');";
        }

        if($num>9 && $num<100){//si el numero es mayor a 9 y menor a 100
            $cod_dpto= $letra.str_repeat("0", 1).$num;//el cod_dpto es D0num
            $sql .= "INSERT INTO departamento (cod_dpto, nombre_dpto) VALUES ('$cod_dpto','$nom_dpto');";
        }

        if($num>99 && $num <1000){//si el numero es mayor a 99 y menor a 1000
            $cod_dpto= $letra.$num;//el cod_dpto es Dnum
            $sql .= "INSERT INTO departamento (cod_dpto, nombre_dpto) VALUES ('$cod_dpto','$nom_dpto');";
        }     
    }  
}

//comprobamos si las consultas se hicieron correctamente
if(mysqli_multi_query($conn, $sql)){
    echo "Alta creada correctamente";
}
else{
    echo "Error: ".$sql."<br>".mysqli_error($conn);
}

//cerramos conexión
mysqli_close($conn);

}//de else

?>

</body>

</html>
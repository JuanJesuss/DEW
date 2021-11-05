<!DOCTYPE html>

<html>

<head>
<title>Operaciones Sistemas Ficheros</title>
<meta charset="UTF-8"/>
</head>

<body>
<h1>Operaciones Sistemas Ficheros</h1>

<?php

$fichero_origen= $_POST["ficheroOrigen"];
$fichero_destino= $_POST["ficheroDestino"];

if (isset($_POST["r"])==false) {//si no hay un valor de radio
    echo "No ha indicado operación a realizar";
}
else{
    if($_POST["r"]=="copiar"){//si se elige copiar

        if(file_exists($fichero_origen) && file_exists($fichero_destino)){//si existe fichero origen y fichero destino 
            copy($fichero_origen,$fichero_destino);//copiamos de origen a destino
            echo "El fichero se ha copiado";
        }
    
        if(!file_exists($fichero_origen) && file_exists($fichero_destino)){//si no existe fichero origen, pero si fichero destino
            echo "El fichero origen no existe";
        }
        
        if(file_exists($fichero_origen) && !file_exists($fichero_destino)){//si fichero origen existe, pero no fichero destino
            $directorio_principal= dirname($fichero_destino);//obtenemos directorio principal de fichero destino
            if(file_exists($directorio_principal)){//si directorio principal fichero destino existe
                copy($fichero_origen,$fichero_destino);//copiamos fichero origen a fichero destino
            }
            else{//si no existe directorio principal fichero destino
                mkdir($directorio_principal, 0777, true);//creamos el directorio principal, indicando ruta, modo y recursive(true)
                copy($fichero_origen,$fichero_destino);//copiamos fichero origen a fichero destino
            }
            echo "El fichero se ha copiado";
        }
    
        if(!file_exists($fichero_origen) && !file_exists($fichero_destino)){
            echo "No existe fichero origen ni fichero destino";
        }
    
    }
    
    
    if($_POST["r"]=="renombrar"){//si se elige renombrar
    
        if(file_exists($fichero_origen)){//si archivo origen existe
            $directorio_principal_forigen= dirname($fichero_origen);//obtenemos directorio principal de archivo origen
            $directorio_principal_fdestino= dirname($fichero_destino);//obtenemos directorio principal de archivo destino
            
            if($directorio_principal_forigen==$directorio_principal_fdestino){//si directorio principal de archivo origen y de destino son iguales
                rename($fichero_origen,$fichero_destino);//renombramos archivo origen por de destino
                echo "Se ha renombrado el archivo";
            }
            else{
                echo "El directorio principal de archivo origen y de destino no son iguales";
            }
        }
        else{
            echo "El archivo origen no existe";
        }
    
    }
    
    
    if($_POST["r"]=="borrar"){//si se elige borrar
    
        if($fichero_destino!=""){//si se ha escrito en fichero destino
            echo "El archivo solo se debe introducir en fichero origen";
        }
        else{//si no se ha escrito en fichero destino
            if(file_exists($fichero_origen)){//si el archivo existe
                if(is_dir($fichero_origen)){//si es un directorio
                    echo "No tiene permiso para borrar un directorio";
                }
                else{
                    unlink($fichero_origen);//lo eliminamos
                    echo "El fichero se ha borrado";
                }    
            }
        else{
            echo "El archivo no existe";
        }
        
        }
    }
    
}



?>

</body>

</html>
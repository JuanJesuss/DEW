<?php
    session_start();

    if(!isset($_SESSION['nif_cliente'])){
        header("location: comlogincli.php");
    }
    else{
        session_unset();
		session_destroy();
        echo "Se ha cerrado la sesi&oacute;n.";
    }

  
?>
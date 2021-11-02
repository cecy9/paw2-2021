<?php

    session_start();
   
    include '../models/conexion.php';
    include '../models/login.php';
    include '../models/procesos.php';
    include 'procesos.php';

    if(isset($_POST['acclogin']))
    {
        $user = $_POST['user'];
        $passw = $_POST['passw'];
        
        AccesoLogin($user, $passw);
    }
    elseif(isset($_POST['olvide']))
    {
        header("Location: ../views/olvide_clave.php");
    }

    elseif(isset($_POST['cambioClave']))
    {
        $token = $_POST['token'];
        $passw1 = $_POST{'passw1'};
        $passw2 = $_POST{'passw2'};

        cambioClave($token, $passw1, $passw2);
    }
    
    else
    {
        header("Location: ../index.php");
    }

?>
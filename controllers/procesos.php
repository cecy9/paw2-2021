<?php
    function AccesoLogin($user,$passw)
    {
        $consulta = new login();
        $data = $consulta->GetDataUser($user);

        if($data)
        {
            foreach ($data AS $result)
            {
                $idusuario = $result['idusuario'];
                $hash = $result['passw'];
                $tipo = $result['tipo'];
                $estado = $result['estado'];                
            }

            if($estado == 1)
            {
                if(password_verify($passw,$hash))
                {
                    if($tipo == 1) //vista admin
                    {
                        $_SESSION["idusuario"] = $idusuario;
                        $_SESSION["user"] = $user;
                        $_SESSION["tipo"] = $tipo;
                        header("Location: ../views/admin/");
                    }
                    else
                    {
                        $_SESSION["idusuario"] = $idusuario;
                        $_SESSION["user"] = $user;
                        $_SESSION["tipo"] = $tipo;
                        header("Location: ../views/operador/");
                    }
                }
                else
                {
                    header("Location:../index.php?msj=".base64_encode("Contraseña incorrecta..."));
                }
            }
            else
            {
                header("Location:../index.php?msj=".base64_encode("El usuario no tiene permisos de acceso..."));
            }
        }
        else
            {
                header("Location:../index.php?msj=".base64_encode("El usuario no existe..."));
            }
    }
    /*funcion para realizar un CRUD*/
    function CRUD($query,$tipo)
    {
      $consultas = new Procesos();
      $data =$consultas->isdu($query,$tipo);
      return$data;
    }
    /*registra si exiten registro en la tabla*/
    function CountReg($query)
    {
        $consultas = new Procesos();
        $data =$consultas->row_data($query);
        return $data;   
    }
?>


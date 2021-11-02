<?php

    function AccesoLogin($user, $passw)
    {
        $consultas = new Login();
        $data = $consultas->getDataUser($user);

        if($data)
        {
            foreach ($data AS $result)
            {
                $idusuario = $result['idusuario'];
                $hash = $result['clave'];
                $tipo = $result['tipo'];
                $estado = $result['estado'];
            }

            if($estado == 1)
            {
                if(password_verify($passw,$hash))
                {
                    if($tipo == 1) //vista de Administrador
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
                    header("Location: ../index.php?msj=".base64_encode
                    ("Contraseña incorrecta ..."));
                }
            }
            else
            {
                header("Location: ../index.php?msj=".base64_encode
                ("El usuario no tiene permisos de acceso ..."));
            }
        }
        else
        {
            header("Location: ../index.php?msj=".base64_encode
            ("El usuario no existe ..."));
        }
        
    }

    /*Funcion para realizar un CRUD(Crear,leer,actualizar,borrar)*/
    function CRUD($query,$tipo)
    {
        $consultas = new Procesos();
        $data = $consultas->isdu($query,$tipo);
        return $data;
    }

    /*Funcion para contar registros*/
    function CountReg($query)
    {
        $consultas = new Procesos();
        $data = $consultas->row_data($query);
        return $data;
    }

    function buscavalor($tabla, $campo, $condicion)
    {
        $valor = NULL;
        $consultas = new Procesos();
        $datos = $consultas->BuscaValor($tabla, $campo, $condicion);

        if($datos)
        {
            foreach ($datos AS $result)
            {
                $valor = $result[0];
            }
            return $valor;
        }
    }

    function Token($length)
    {
        $key = '';
        $cadena = "0123456789abcdefghijklmnopqrstuvwxyz";

        for ($i=0;$i < $length;$i++)
        {
            $key .= $cadena{rand(0,35)};
        }
        return $key;
    }

    function Email($email, $token)
    {
        $desde = "paw@gmail.com";
        $cabecera = 'From: soporte <'.$desde.'>'."\r\n".'Reply-To'.$desde."\r\n";
        $cabecera .= 'Content-type: text/html; charset=utf-8'."\r\n";

        $sms = "<br>Token: </br>".$token;

        mail($email,"Solicitud de Token",$sms,$cabecera);
    }

    function CambioClave($token, $passw1, $passw2)
    {
        $buscaToken = buscavalor("usuarios","COUNT(token)","token='$token'");
        $idusuario = buscavalor("usuarios","idusuario","token='$token'");

        if($buscaToken != 0)
        {
            if($passw1 == $passw2)
            {
                $newpassw = password_hash($passw2,PASSWORD_DEFAULT);

                $update = CRUD("UPDATE usuarios SET clave='$newpassw',token='' WHERE idusuario='$idusuario'","u");

                if($update)
                {
                    header("Location: ../index.php?msj=".base64_encode("Contraseña actualizada ..."));
                }
                else
                {
                    header("Location: ../index.php?msj=".base64_encode("Error contraseña no actualizada ..."));
                }
            }
            else
            {
                header("Location: ../views/cambio_clave.php");
            }
        }
        else
        {
            header("Location: ../views/cambio_clave.php");
        }
    }

    //Funcion para cargar imagenes.
    function CargaIMG($tmp_dir,$newName,$path)
    {
        if(!is_dir($path))
        {
            mkdir($path, 0777, true);
        }
        
        if(is_uploaded_file($tmp_dir))
        {
            copy($tmp_dir,$path.$newName);
            return true;
        }
        else
        {
            return false;
        }
    }

?>
<?php
    include_once '../Models/usuarioModel.php';
    include_once 'utiles.php';

    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    if(isset($_POST["btnRegistro"]))
    {
        $Correo = $_POST["txtCorreo"];
        $Nombre = $_POST["txtNombre"];
        $Apellidos = $_POST["txtApellidos"];
        $Pais = $_POST["txtPais"];
        $Ciudad = $_POST["txtCiudad"];
        $Direccón = $_POST["txtDireccón"];
        $Contrasenna = $_POST["txtContrasenna"];
        
        RegistrarUsuario($Correo, $Nombre, $Apellidos, $Pais, $Ciudad, $Direccón, $Contrasenna);
        header("location: ../Views/login.php");
        
    }

    if (isset($_POST["btnUpdateUser"])) {
        $id = $_POST["id"];
        $nombre = $_POST["nombre_" . $id];
        $apellido = $_POST["apellido_" . $id];
        ActualizarUsuario($id, $nombre, $apellido);

        if ($result) {
            echo '<script>console.log("Usuario actualizado successfully.");</script>';
        } else {
            echo '<script>console.error("Error updating usuario.");</script>';
        }

        header("location: ../Views/login.php");
    }
    

    if(isset($_POST["btnInicio"]))
    {
        $Correo = $_POST["txtCorreo"];
        $Contrasenna = $_POST["txtContrasenna"];
    
        $respuesta = ValidarSesion($Correo, $Contrasenna);

        if($respuesta -> num_rows > 0)
        {
            $datos = mysqli_fetch_array($respuesta);

            if ($datos["contrasenna_temporal"] == 1)
            {
                header("location: ../Views/cambiarContrasenna.php?q=" . $Correo);
            }else 
            {
                $_SESSION["NombreUsuario"] = $datos["Nombre"];
                $_SESSION["ApellidoUsuario"] = $datos["apellido"];
                $_SESSION["IdUsuario"] = $datos["id"];
                $_SESSION["RolUsuario"] = $datos["IdRoles"];
                if ($_SESSION["RolUsuario" == 1]){
                    $_SESSION["NombreRolUsuario"] = "Administrador";
                }else{
                    $_SESSION["NombreRolUsuario"] = "Cliente";
                }
                

                header("location: ../Views/home.php");
            }

            
        }
        else
        {
            $_SESSION["ErrorLogin"] = "No se ha podido validar su información, intente nuevamente";
      
        } 
        
    }

    if(isset($_POST["btnRecuperar"]))
    {
        $Correo = $_POST["txtCorreo"];

        $respuesta = ConsultarDatos($Correo);

        if($respuesta -> num_rows > 0)
        {
            $datos = mysqli_fetch_array($respuesta);
            $codigoSeguridad = randomPassword();

            $mensaje = "<html><body>
                        Estimado(a) " . $datos["Nombre"] . "<br/>
                        Se ha generado la siguiente clave temporal: <b>" . $codigoSeguridad . "</b><br/>
                        Recuerde iniciar sesión con esta contraseña para realizar el debido cambio<br/><br/>
                        Muchas gracias.
                        </body></html>";

            EnviarCorreo($Correo, 'Recuperar Contraseña', $mensaje);
            $_SESSION["CorreoEnviado"] = "Por favor verificar su correo electrónico";
            ActualizarCodigo($datos["id"], $codigoSeguridad);
            header("location: ../Views/login.php");
        }
        else
        {
            $_SESSION["CorreoNoEnviado"] = "No se ha podido recuperar su información";
        }
    }

    if(isset($_POST["cerrarSesion"]))
    {
        session_destroy();
    }
    
    if(isset($_POST["btnCambiarContrasenna"]))
    {
        $correo = $_POST["txtCorreo"];
        $contrasenna = $_POST["txtContrasenna"];
        $respuesta = ConsultarDatos($correo);
        

        if($respuesta -> num_rows > 0)
        {
            $datos = mysqli_fetch_array($respuesta);
            
            ActualizarContrasenna($datos["id"], $contrasenna);
            $_SESSION["NombreUsuario"] = $datos["Nombre"];
            $_SESSION["ApellidoUsuario"] = $datos["apellido"];
            $_SESSION["IdUsuario"] = $datos["id"];
            $_SESSION["RolUsuario"] = $datos["IdRoles"];
            $_SESSION["NombreRolUsuario"] = $datos["NombreRol"];
            header("location: ../Views/home.php");
        }
        else
        {
            $_POST["MsjPantalla"] = "No se ha podido recuperar su información";
        }
    }


    function randomPassword() {
        $alphabet = '1234567890abcdefghijklmnopqrstuvwxyz';
        $pass = array();
        $alphaLength = strlen($alphabet) - 1;
        for ($i = 0; $i < 8; $i++) {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }
        return implode($pass);
    }

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

    if(isset($_POST["btnInicio"]))
    {
        $Correo = $_POST["txtCorreo"];
        $Contrasenna = $_POST["txtContrasenna"];
    
              $respuesta = ValidarSesion($Correo, $Contrasenna);

        if($respuesta -> num_rows > 0)
        {
            $datos = mysqli_fetch_array($respuesta);

            $_SESSION["NombreUsuario"] = $datos["nombre"];
            header("location: ../Views/home.php");
        }
        else
        {
            $_POST["MsjPantalla"] = "No se ha podido validar su información";
      
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
                        Estimado(a)" . $datos["Nombre"] . "<br/>
                        Se ha generado el siguente código de seguridad: <b>" . $codigoSeguridad . "</b><br/>
                        Recuerde realizar el cambio de contraseña una vez que ingrese al sistema<br/><br/>
                        Muchas gracias.
                        </body></html>";

            EnviarCorreo($Correo, 'Recuperar Contraseña', $mensaje);
            ActualizarCodigo($datos["id"], $codigoSeguridad);
            header("location: ../Views/confirmarClave.php");
        }
        else
        {
            $_POST["MsjPantalla"] = "No se ha podido recuperar su información";
        }
    }

    if(isset($_POST["btnCerrarSesion"]))
    {
        session_destroy();
        header("location: ../Views/login.php");
    }

    function randomPassword() {
        $alphabet = '1234567890';
        $pass = array();
        $alphaLength = strlen($alphabet) - 1;
        for ($i = 0; $i < 4; $i++) {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }
        return implode($pass);
    }

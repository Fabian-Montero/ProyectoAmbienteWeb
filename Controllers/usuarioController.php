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
                if ($_SESSION["RolUsuario"] == "1") {
                    $_SESSION["NombreRolUsuario"] = "Administrador";
                } else {
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
            if ($_SESSION["RolUsuario"] == "1") {
                $_SESSION["NombreRolUsuario"] = "Administrador";
            } else {
                $_SESSION["NombreRolUsuario"] = "Cliente";
            }
            
            header("location: ../Views/home.php");
        }
        else
        {
            $_POST["MsjPantalla"] = "No se ha podido recuperar su información";
        }
    }


    function cargarUsuariosMantenimiento(){
    
        $respuesta = cargarUsuariosMantenimientoM();
        $_SESSION["cantidadUsuariosMantenimiento"] = 0;
        //Hay que llamar a un procedimiento que haga el count de los usuarios
        if ($respuesta-> num_rows > 0)
        {
            while($usuario = mysqli_fetch_array($respuesta)){
                echo
                '
                <form role="form" class="text-start action="" method="post">
                <div class=" row mb-4 d-flex justify-content-between align-items-center">
                                                    
                    <div class="col-md-2 col-lg-2 col-xl-2">
                        <h6 class="text-muted">' . $usuario["nombre"] . '&nbsp; ' . $usuario["apellido"]. '</h6>
                    </div>
                    <div class="col-md-3 col-lg-3 col-xl-3 ml-3">
                        <h6 class="text-black mb-0">' . $usuario["correo"] . '</h6>
                    </div>
                    <div>
                        <h6 class="text-black mt-0">Activo</h6>
                        <input class="mb-3"type="text" disabled size="1" id="txtCantidadStock" value="' . $usuario["activo"] . '" name="txtCantidadStock" min="1" max="99" />
                        <input type="hidden"  name= "txtIdUsuario" id="txtIdUsuario" value= " '. $usuario["id"] . '  "/>
                        <button style="margin-left:100px ; border: none ; background: none;"type="submit" name="btnEliminarUsuario" id="btnEliminarUsuario"class="btn-icon">
                        <span class="material-symbols-outlined">
                            delete
                        </span>
                        </button>
                        <a style="margin-left: 15px; color: #3B3B3B" href="editarUsuario.php?usuario='.$usuario["id"].'"name="btnEditarUsuario" id="btnEditarUsuario">
                            <span class="material-symbols-outlined">
                                edit
                            </span>
                        </a>
                        </div>
                    <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1 mr-5">
                        <h6 class="text-black mt-0">Usuario</h6>
                        <h6 style="font-size: 15px"class="ml-4 mb-3 mt-2">' . $usuario["IdRoles"] . '</h6>
                    </div>
                </div>
                </form>
                <hr class="my-4">
                <style>
                .scrollCarrito {
                    width: 1400px; 
                    height: 800px; 
                    overflow: auto;
                }
                </style>
                '; }}
            }    
    



    function editarUsuario($idUsuario){
    
        $respuesta = cargarEditarUsuarioM($idUsuario);
        if ($respuesta-> num_rows > 0)
        {
            $usuario = mysqli_fetch_array($respuesta);
            
                echo
                '
                <form role="form" class="text-start action="" method="post">
                <div class=" row mb-4 d-flex justify-content-between align-items-center">
                                                    
                    <div class="col-md-2 col-lg-2 col-xl-2">
                        <input size="5" type="text" id="txtNombreUsuario" name="txtNombreUsuario" class="text-muted" value="' . $usuario["nombre"]. '"></input>
                        <input size="13" type="text" id="txtApellidoUsuario" name="txtApellidoUsuario" class="text-muted mt-2" value="' . $usuario["apellido"]. '"></input>
                    </div>
                    <div class="col-md-3 col-lg-3 col-xl-3 ml-2">
                        <input size="30" type="email" id="txtCorreoUsuario" name="txtCorreoUsuario" class="text-black mb-0" value="' . $usuario["correo"] . '"></input>
                    </div>
                    <div class="ml-5">
                        <h6 class="text-black mt-2 ml-4">Activo</h6>
                        <input class="mb-4 ml-4"type="text" size="1" id="txtActivoUsuario" value="' . $usuario["activo"] . '" name="txtActivoUsuario" min="1" max="99" />
                        <input type="hidden"  name= "txtIdUsuario" id="txtIdUsuario" value= " '. $usuario["id"] . '  "/>
                    

                        </div>
                    <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                        <h6 class="text-black mb-1">Usuario</h6>
                        <input class="mr-3 mb-3"type="text" size="1" id="txtRolUsuario" value="' . $usuario["IdRoles"] . '" name="txtRolUsuario" min="1" max="99" />
                    </div>

                    <button style="margin-right: 30px; color: #3B3B3B ; border: none ; background: none;" type="submit" name="btnEditarUsuario" id="btnEditarUsuario">
                        <span class="material-symbols-outlined">
                            done
                        </span>
                    </button>
                </div>
                </form>
                <hr class="my-4">
                <style>
                .scrollCarrito {
                    width: 1400px; 
                    height: 800px; 
                    overflow: auto;
                }
                </style>
                '; }}

    if(isset($_POST["btnEditarUsuario"]))
    {
        $nombreUsuario = $_POST["txtNombreUsuario"];
        $apellidoUsuario = $_POST["txtApellidoUsuario"];
        $correoUsuario = $_POST["txtCorreoUsuario"];
        $activoUsuario = $_POST["txtActivoUsuario"];
        $rolUsuario = $_POST["txtRolUsuario"];
        $idUsuario = $_POST["txtIdUsuario"];

        editarUsuarioMantenimientoM($nombreUsuario, $apellidoUsuario, $correoUsuario, $activoUsuario, $rolUsuario, $idUsuario);
    }

    if(isset($_POST["btnEliminarUsuario"]))
    {
        $idUsuario = $_POST["txtIdUsuario"];
        eliminarUsuarioMantenimientoM($idUsuario);
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

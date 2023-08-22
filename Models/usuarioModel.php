<?php
    include_once 'conection.php';

    function RegistrarUsuario($Correo, $Nombre, $Apellidos, $Pais, $Ciudad, $Direccón, $Contrasenna)
    {
        try
        {
            $enlace = OpenBD();
            $sentecia = "CALL RegistrarUsuario('$Nombre','$Apellidos','$Correo','$Direccón','$Ciudad','$Pais','$Contrasenna' )";
            $respuesta = $enlace->query($sentecia);
            CloseBD($enlace);
    

            return $respuesta;
        }
        catch(Exception $e)
        {
            return false;
        }
    }

    function ValidarSesion($Correo, $Contrasenna)
    {
        try{
            
        $enlace = OpenBD();
        $sentecia = "CALL ValidarSesion('$Correo','$Contrasenna')";
        $respuesta = $enlace->query($sentecia);
        CloseBD($enlace);

        return $respuesta;

        }
        catch(Exception $e)
        {
            return false;
        }

        
    }

    function ConsultarDatos($Correo)
    {
        try{
            $enlace = OpenBD();
            $sentecia = "CALL ConsultarDatos('$Correo')";
            $respuesta = $enlace -> query($sentecia);
            CloseBD($enlace);
    
            return $respuesta;
        }
        catch(Exception $e)
        {
            return 0;
        }

   
    }

    function ActualizarCodigo($id, $codigoSeguridad)
    {
        $enlace = OpenBD();
        $sentecia = "CALL ActualizarClaveCliente('$id', '$codigoSeguridad')";
        $enlace -> query($sentecia);
        CloseBD($enlace);
    }  
    
    function ActualizarContrasenna($id, $contrasenna)
    {
        $enlace = OpenBD();
        $sentecia = "CALL ActualizarContrasenna('$id', '$contrasenna')";
        $enlace -> query($sentecia);
        CloseBD($enlace);
    } 

    function cargarUsuarios()
    {
        $enlace = OpenBD();
        $sentencia = "CALL cargarUsuarios()";
        $respuesta = $enlace -> query($sentencia);
        CloseBD($enlace);
        return $respuesta;
    }   

    function ActualizarUsuario($id, $Nombre, $Apellidos)
    {
        try
        {
            $enlace = OpenBD();
            $sentecia = "CALL ActualizarUsuario('$id','$Nombre','$Apellidos')";
            $respuesta = $enlace->query($sentecia);
            CloseBD($enlace);
    

            return $respuesta;
        }
        catch(Exception $e)
        {
            return false;
        }
    }

?>
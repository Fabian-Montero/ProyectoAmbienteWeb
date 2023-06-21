<?php

include_once 'conection.php';

function RegistrarUsuario($Correo, $Nombre, $Apellidos, $Pais, $Ciudad, $Direccón, $Contrasenna)
{
    try {
        $enlace = OpenBD();
        $sentecia = "CALL RegistrarUsuario('$Correo','$Nombre','$Apellidos','$Pais','$Ciudad','$Direccón','$Contrasenna')";
        $respuesta = $enlace->query($sentecia);
        CloseBD($enlace);

        return $respuesta;
    } catch (Exception $e) {
        return false;
    }
}


function ValidarSesion($Correo, $Contrasenna)
{
    $enlace = OpenBD();
    $sentecia = "CALL ValidarSesion('$Correo','$Contrasenna')";
    $respuesta = $enlace->query($sentecia);
    CloseBD($enlace);

    return $respuesta;
}

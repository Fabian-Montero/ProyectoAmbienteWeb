<?php

include_once '../Models/usuarioModel.php';

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

    ValidarSesion($Correo, $Contrasenna);

    header("location: ../Views/home.php");
}

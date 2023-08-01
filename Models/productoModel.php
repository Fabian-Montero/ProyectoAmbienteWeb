<?php
    include_once 'conection.php';

    function cargarProductosM()
    {
        $enlace = OpenBD();
        $sentencia = "CALL cargarProductos()";
        $respuesta = $enlace -> query($sentencia);
        CloseBD($enlace);
        return $respuesta;
    }    

    function cargarProductoM($id){
        $enlace = OpenBD();
        $sentencia = "CALL cargarProductoM('$id')";
        $respuesta = $enlace -> query($sentencia);
        CloseBD($enlace);
        return $respuesta;
    }
    
    
    
    
    
?>
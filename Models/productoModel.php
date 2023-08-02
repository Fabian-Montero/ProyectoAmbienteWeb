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
        $sentencia = "CALL cargarProducto('$id')";
        $respuesta = $enlace -> query($sentencia);
        CloseBD($enlace);
        return $respuesta;
    }

    function cargarCategoriasM()
    {
        $enlace = OpenBD();
        $sentencia = "CALL cargarCategorias()";
        $respuesta = $enlace -> query($sentencia);
        CloseBD($enlace);
        return $respuesta;
    } 
    
    
    
    
    
?>
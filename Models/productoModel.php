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
    
    function cargarProductosCategoriasM($categoria)
    {
        $enlace = OpenBD();
        $sentencia = "CALL cargarProductosCategorias('$categoria')";
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

    function cargarProductoName($name){
        $enlace = OpenBD();
        $sentencia = "CALL cargarProductoName('$name')";
        $respuesta = $enlace -> query($sentencia);
        CloseBD($enlace);
        return $respuesta;
    }

    function agregarCarritoM($idProducto, $idUsuario, $cantidad, $total){
        $enlace = OpenBD();
        $sentencia = "CALL agregarCarrito('$idProducto', '$idUsuario', '$cantidad', '$total')";
        $enlace -> query($sentencia);
        CloseBD($enlace);
    }

    function eliminarProductoCarritoM($idProducto){
        $enlace = OpenBD();
        $sentencia = "CALL eliminarProductoCarrito('$idProducto')";
        $enlace -> query($sentencia);
        CloseBD($enlace);
    }

    function pagarCarritoM($idUsuario){
        $enlace = OpenBD();
        $sentencia = "CALL pagarCarrito('$idUsuario')";
        $enlace -> query($sentencia);
        CloseBD($enlace);
    }

    function consultarResumenCarritoM($idUsuario){
        $enlace = OpenBD();
        $sentencia = "CALL consultarResumenCarrito('$idUsuario')";
        $respuesta = $enlace -> query($sentencia);
        CloseBD($enlace);
        return $respuesta;
    }

    function consultarDetalleCarritoM($idUsuario){
        $enlace = OpenBD();
        $sentencia = "CALL consultarDetalleCarrito('$idUsuario')";
        $respuesta = $enlace -> query($sentencia);
        CloseBD($enlace);
        return $respuesta;
    }

    function consultarDetalleComprasM($idUsuario){
        $enlace = OpenBD();
        $sentencia = "CALL consultarDetalleCompras('$idUsuario')";
        $respuesta = $enlace -> query($sentencia);
        CloseBD($enlace);
        return $respuesta;
    }

    function consultarDetalleComprasCantidadM($idUsuario){
        $enlace = OpenBD();
        $sentencia = "CALL consultarDetalleComprasCantidad('$idUsuario')";
        $respuesta = $enlace -> query($sentencia);
        CloseBD($enlace);
        return $respuesta;
    }

    function cargarProductosMantenimientoM()
    {
        $enlace = OpenBD();
        $sentencia = "CALL cargarProductosMantenimiento()";
        $respuesta = $enlace -> query($sentencia);
        CloseBD($enlace);
        return $respuesta;
    }

    function cargarEditarProductoM($idProducto)
    {
        $enlace = OpenBD();
        $sentencia = "CALL cargarEditarProducto('$idProducto')";
        $respuesta = $enlace -> query($sentencia);
        CloseBD($enlace);
        return $respuesta;
    }

    function consultarProductosMantenimientoM(){
        $enlace = OpenBD();
        $sentencia = "CALL consultarProductosMantenimiento()";
        $respuesta = $enlace -> query($sentencia);
        CloseBD($enlace);
        return $respuesta;
    }

    function editarProductoMantenimientoM($nombreProducto, $idCategoria, $cantidadStock, $precioProducto, $idProducto)
    {
        $enlace = OpenBD();
        $sentecia = "CALL editarProductoMantenimiento('$nombreProducto', '$idCategoria', '$cantidadStock', '$precioProducto', '$idProducto')";
        $enlace -> query($sentecia);
        CloseBD($enlace);
    }  

    function eliminarProductoMantenimientoM($idProducto){
        $enlace = OpenBD();
        $sentencia = "CALL eliminarProductoMantenimiento('$idProducto')";
        $enlace -> query($sentencia);
        CloseBD($enlace);
    }
    
    
    
    
    
?>
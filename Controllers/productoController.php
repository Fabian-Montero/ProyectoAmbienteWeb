<?php

include_once '../Models/productoModel.php';
include_once 'utiles.php';

function cargarProductos($all){
    $categoria = $_GET["cat_id"];
    if ($categoria != $all){
        cargarProductosCategorias($categoria);
    }else{
    $respuesta = cargarProductosM();

    if ($respuesta-> num_rows > 0)
    {
        while($producto = mysqli_fetch_array($respuesta)){
    echo 
    '
    
    <div class="col-lg-4">
    <div class="item">
        <div class="thumb">
            <div class="hover-content">
            <form role="form" class="text-start action="" method="post">
                <ul>
                    <input type="hidden" id="txtId" name="txtId" value="'. $producto["id"] .'">
                    <input type="hidden" id="txtPrecio" name="txtPrecio" value="'. $producto["precio"] .'">
                    <input type="hidden" id="txtCantidad" name="txtCantidad" value="1">
                    <li><a href="product.php?q=' . $producto["id"] . '"><i  class="fa fa-eye"></i></a></li>
                    
                    <li><button style= "width: 50px;
                    height: 50px;
                    text-align: center;
                    line-height: 50px;
                    display: inline-block;
                    color: #2a2a2a;
                    background-color: #fff;
                    border: none;
                    "type="submit" value=""id="btnAgregar" name="btnAgregar"> <i class="fa fa-shopping-cart"></i> </button></li>
                </ul>
            </div>
            <img width="350" height="368" src="' . $producto["url_imagen"] . ' " alt="">
        </div>
        <div class="down-content">
            <h4>' . $producto["nombre"] . '</h4>
            <span>$' . $producto["precio"] . '&nbsp;IVI' . '</span>
            <ul style= "margin-top:35px" class="stars">
                <li><i class="fa fa-star"></i></li>
                <li><i class="fa fa-star"></i></li>
                <li><i class="fa fa-star"></i></li>
                <li><i class="fa fa-star"></i></li>
                <li><i class="fa fa-star"></i></li>
            </ul>
            </form>
        </div>
    </div>
</div>

'; }}
        }    
}

function cargarProductosMantenimiento(){
    
    $respuesta = cargarProductosMantenimientoM();
    $_SESSION["cantidadProductosMantenimiento"] = 0;
    if ($respuesta-> num_rows > 0)
    {
        while($producto = mysqli_fetch_array($respuesta)){
            echo
            '
            <form role="form" class="text-start action="" method="post">
            <div class=" row mb-4 d-flex justify-content-between align-items-center">
                                                <div class="col-md-2 col-lg-2 col-xl-2">
                                                    <img src=' . $producto["url_imagen"] . '
                                                        class="img-fluid rounded-3" alt="Cotton T-shirt">
                                                </div>
                                                <div class="col-md-3 col-lg-3 col-xl-3">
                                                    <h6 class="text-muted">' . $producto["nombreProducto"] . '</h6>
                                                    <h6 class="text-black mb-0">' . $producto["nombre_categoria"] . '</h6>
                                                </div>
                                                <div>
                                                    <input type="text" disabled size="1" id="txtCantidadStock" value="' . $producto["cantidad_stock"] . '" name="txtCantidadStock" min="1" max="99" />
                                                    <input type="hidden"  name= "txtIdProducto" id="txtIdProducto" value= " '. $producto["idProducto"] . '  "/>
                                                    <button style="margin-left:130px;"type="submit" name="btnEliminar" id="btnEliminar"class="btn-icon">
                                                    <span class="material-symbols-outlined">
                                                    delete
                                                    </span>
                                                    </button>
                                                    <button style="margin-left: 5px;" type="submit" name="btnEditarProducto" id="btnEditarProducto" class="btn-icon">
                                                        <span class="material-symbols-outlined">
                                                            edit
                                                        </span>
                                                    </button>
                                        
                                                    


                                                    </div>
                                                <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                                                    <h6 style="font-size: 15px"class="mb-0">$ ' . $producto["precio"] . '</h6>
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



function cargarProductosCategorias($categoria){
    $respuesta = cargarProductosCategoriasM($categoria);

    if ($respuesta-> num_rows > 0)
    {
        while($producto = mysqli_fetch_array($respuesta)){
    echo 
    '
    
    <div class="col-lg-4">
    <div class="item">
        <div class="thumb">
            <div class="hover-content">
            <form role="form" class="text-start action="" method="post">
                <ul>
                    <input type="hidden" id="txtId" name="txtId" value="'. $producto["id"] .'">
                    <input type="hidden" id="txtPrecio" name="txtPrecio" value="'. $producto["precio"] .'">
                    <input type="hidden" id="txtCantidad" name="txtCantidad" value="1">
                    <li><a href="product.php?q=' . $producto["id"] . '"><i  class="fa fa-eye"></i></a></li>
                    
                    <li><button style= "width: 50px;
                    height: 50px;
                    text-align: center;
                    line-height: 50px;
                    display: inline-block;
                    color: #2a2a2a;
                    background-color: #fff;
                    border: none;
                    "type="submit" value=""id="btnAgregar" name="btnAgregar"> <i class="fa fa-shopping-cart"></i> </button></li>
                </ul>
            </div>
            <img width="350" height="368" src="' . $producto["url_imagen"] . ' " alt="">
        </div>
        <div class="down-content">
            <h4>' . $producto["nombre"] . '</h4>
            <span>$' . $producto["precio"] . '&nbsp;IVI' . '</span>
            <ul style= "margin-top:35px" class="stars">
                <li><i class="fa fa-star"></i></li>
                <li><i class="fa fa-star"></i></li>
                <li><i class="fa fa-star"></i></li>
                <li><i class="fa fa-star"></i></li>
                <li><i class="fa fa-star"></i></li>
            </ul>
            </form>
        </div>
    </div>
</div>

'; }
    }   
}


function cargarProducto($id){

    $respuesta = cargarProductoM($id);
    if ($respuesta -> num_rows > 0)
    {
        $producto = mysqli_fetch_array($respuesta);
        echo
        '
        <section class="section" id="product">
            <div class="container">
            <form role="form" class="text-start action="" method="post">
                    <input type="hidden" id="txtId" name="txtId" value="'. $producto["id"] .'">
                    <input type="hidden" id="txtPrecio" name="txtPrecio" value="'. $producto["precio"] .'">
                <div class="row">
                    <div class="col-lg-8">
                    <div class="left-images">
                        <img width="350" height="368" src="' . $producto["url_imagen"] .'" alt="">
                
                    </div>
                </div>
                <div class="col-lg-4">
                
                    <div class="right-content">
                        <h4>' . $producto["nombre"] .' </h4>
                        <span class="price">$' . $producto["precio"] . '&nbsp;IVI' .'</span>
                        <br>
                        <ul style= "margin-top:33px ; margin-right:60px"  class="stars">
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                        </ul>
                        <span>' . $producto["descripcion"].'</span>
                        <div>
                            <p>Stock: ' . $producto["cantidad_stock"].'</p>
                        </div>
                        <div class="quantity-content">
                            <div class="left-content">
                                <h6>Cantidad</h6>
                            </div>
                            <div class="right-content">
                                <div class="quantity buttons_added">
                                    <input type="button" value="-" class="minus"><input type="number" step="1" min="1" max="" id="txtCantidad" name="txtCantidad" value="1" title="Qty" class="input-text qty text" size="4" pattern="" inputmode=""><input type="button" value="+" class="plus">
                                </div>
                            </div>
                        </div>
                        <div class="total">
                            <h4>Total: $' . $producto["precio"] . '&nbsp;IVI' .'</h4>

                            <button type="submit" value=""id="btnAgregar" name="btnAgregar" class= "btnComprar">Añadir al Carrito</button>
                            
                            <style>
                            .btnComprar {
                                margin-left: 20px;
                                border: 1px solid #fff;
                                border-color: #2a2a2a;
                                color: #2a2a2a;
                                font-size: 13px;
                                
                                padding: 12px 25px;
                                display: inline-block;
                                font-weight: 500;
                                transition: all .3s;
                                background-color: transparent;
                            }
                        
                            .btnComprar:hover {
                                color: #fff;
                                background: #2a2a2a;
                            }
                            </style>
                            
                        </div>
                    </div>
                </div>
                </div>
            </div>
            </form>
        </section>
        ';
    }
}

function cargarCategorias()
{
    $respuesta = cargarCategoriasM();
    
    if ($respuesta-> num_rows > 0)
    {
        while($categoria = mysqli_fetch_array($respuesta))
        {
            echo 
            '
            <div class="col-lg-3">
                <div class="right-first-image">
                    <div class="thumb">
                    <form role="form" class="text-start action="" method="post">
                        <div class="inner-content">
                            <h4 style= "text-shadow: 6px 6px 10px rgba(0, 0, 0, 10)" >'. $categoria["nombre"] . '</h4>
                        </div>
                        <div class="hover-content">
                            <div class="inner">
                                <h4>'. $categoria["nombre"] . '</h4>
                                <p>'. $categoria["descripcion"] . '</p>
                                <div class="main-border-button">
                                    <a href="../Views/products.php?cat_id='. $categoria["id"].'">Ver más</a>
                                </div>
                            </div>
                        </div>
                        <div class="image-with-text">
                            <img width="230" height="200" src="'. $categoria["url_imagen"] . '">
                        </div>
                    </form>
                    </div>
                </div>
            </div>
            ';
        }
    }
}

if(isset($_POST["search-button"]))
    {
        $nombre = $_POST["search-input"];
        $return = cargarProductoName($nombre);
    if ($return -> num_rows > 0)
    {
        $producto = mysqli_fetch_array($return);
        $id = $producto["id"];
        header("location: ../Views/products_individual.php?q=" . $id);
    }
        
    }
    
    function cargarProductoInd($id){

        $respuesta = cargarProductoM($id);
        if ($respuesta -> num_rows > 0)
        {
            $producto = mysqli_fetch_array($respuesta);
            echo
            '
    
            <div class="col-lg-4">
            <div class="item">
                <div class="thumb">
                    <div class="hover-content">
                    <form role="form" class="text-start action="" method="post">
                        <ul>
                            <input type="hidden" id="txtId" name="txtId" value="'. $producto["id"] .'">
                            <input type="hidden" id="txtPrecio" name="txtPrecio" value="'. $producto["precio"] .'">
                            <input type="hidden" id="txtCantidad" name="txtCantidad" value="1">
                            <li><a href="product.php?q=' . $producto["id"] . '"><i  class="fa fa-eye"></i></a></li>
                            
                            <li><button style= "width: 50px;
                            height: 50px;
                            text-align: center;
                            line-height: 50px;
                            display: inline-block;
                            color: #2a2a2a;
                            background-color: #fff;
                            border: none;
                            "type="submit" value=""id="btnAgregar" name="btnAgregar"> <i class="fa fa-shopping-cart"></i> </button></li>
                        </ul>
                    </div>
                    <img width="350" height="368" src="' . $producto["url_imagen"] . ' " alt="">
                </div>
                <div class="down-content">
                    <h4>' . $producto["nombre"] . '</h4>
                    <span>$' . $producto["precio"] . '&nbsp;IVI' . '</span>
                    <ul style= "margin-top:35px" class="stars">
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                    </ul>
                    </form>
                </div>
            </div>
        </div>

        ';
        }
    }

    if(isset($_POST["btnAgregar"]))
    {
        $idProducto = $_POST["txtId"];
        $idUsuario = $_SESSION["IdUsuario"];
        $cantidad = $_POST["txtCantidad"];
        $precioProducto = $_POST["txtPrecio"];
        $total = $cantidad * $precioProducto;

        agregarCarritoM($idProducto, $idUsuario, $cantidad, $total);
        
    }

    if(isset($_POST["btnEliminar"]))
    {
        $idProducto = $_POST["txtIdProducto"];
        eliminarProductoCarritoM($idProducto);
        
    }

    if(isset($_POST["btnPagar"]))
    {
        $idUsuario = $_SESSION["IdUsuario"];

        pagarCarritoM($idUsuario);
        
    }

    function consultarResumenCarrito(){

        $idUsuario = $_SESSION["IdUsuario"];
        $respuesta = consultarResumenCarritoM($idUsuario);
        
        $_SESSION["cantidadCarrito"] = 0;
        $_SESSION["totalCarrito"] = 0;
        if ($respuesta -> num_rows > 0){
            $datos = mysqli_fetch_array($respuesta);

            $_SESSION["cantidadCarrito"] = $datos["Cantidad"];
            $_SESSION["totalCarrito"] = $datos["Total"];


        }

    }
    function consultarDetalleComprasCantidad(){

        $idUsuario = $_SESSION["IdUsuario"];
        $respuesta = consultarDetalleComprasCantidadM($idUsuario);
        
        $_SESSION["cantidadCompras"] = 0;
        if ($respuesta -> num_rows > 0){
            $datos = mysqli_fetch_array($respuesta);

            $_SESSION["cantidadCompras"] = $datos["Cantidad"];
        }

    }

    function consultarProductosMantenimiento(){

        $respuesta = consultarProductosMantenimientoM();
    
        $_SESSION["cantidadProductosMantenimiento"] = 0;
        
        if ($respuesta -> num_rows > 0){
            $datos = mysqli_fetch_array($respuesta);

            $_SESSION["cantidadProductosMantenimiento"] = $datos["cantidadProductosMantenimiento"];
        }

    }
    

    function consultarDetalleCarrito(){
        $idUsuario = $_SESSION["IdUsuario"];
        $respuesta = consultarDetalleCarritoM($idUsuario);

        if ($respuesta -> num_rows > 0){
            
            while($producto = mysqli_fetch_array($respuesta)){

                echo
                '
                <form role="form" class="text-start action="" method="post">
                <div class=" row mb-4 d-flex justify-content-between align-items-center">
                                                    <div class="col-md-2 col-lg-2 col-xl-2">
                                                        <img src=' . $producto["url_imagen"] . '
                                                            class="img-fluid rounded-3" alt="Cotton T-shirt">
                                                    </div>
                                                    <div class="col-md-3 col-lg-3 col-xl-3">
                                                        <h6 class="text-muted">' . $producto["nombre"] . '</h6>
                                                        <h6 class="text-black mb-0">' . $producto["nombre_categoria"] . '</h6>
                                                    </div>
                                                    <div>
                                                        <input type="number" id="tentacles" value="' . $producto["cantidad_productos"] . '" name="tentacles" min="1" max="100" />
                                                        <input type="hidden" name= "txtIdProducto" id="txtIdProducto" value= " '. $producto["producto_id"] . '  "/>
                                                        <button style="margin-left:5px"type="submit" name="btnEliminar" id="btnEliminar"class="btn-icon">
                                                        <i class="fa fa-trash"></i> 
                                                        </button>

                                                        </div>
                                                    <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                                                        <h6 style="font-size: 15px"class="mb-0">$ ' . $producto["total"] . '</h6>
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
                ';
            }
        }
    }

    function consultarDetalleCompras(){
        $idUsuario = $_SESSION["IdUsuario"];
        $respuesta = consultarDetalleComprasM($idUsuario);
        

        if ($respuesta -> num_rows > 0){
            
            while($producto = mysqli_fetch_array($respuesta)){

                echo
                '
                <form role="form" class="text-start action="" method="post">
                <div class=" row mb-4 d-flex justify-content-between align-items-center">
                                                    <div class="col-md-2 col-lg-2 col-xl-2">
                                                        <img src=' . $producto["url_imagen"] . '
                                                            class="img-fluid rounded-3" alt="Cotton T-shirt">
                                                    </div>
                                                    <div class="col-md-3 col-lg-3 col-xl-3">
                                                        <h6 class="text-muted">' . $producto["nombre"] . '</h6>
                                                        <h6 class="text-black mb-0">' . $producto["nombre_categoria"] . '</h6>
                                                    </div>
                                                    <div>
                                                        <input type="text" disabled id="tentacles" value="' . $producto["cantidad_productos"] . '" name="tentacles" min="1" max="100" />
                                                        <input type="hidden" name= "txtIdProducto" id="txtIdProducto" value= " '. $producto["producto_id"] . '  "/>
                                                        

                                                        </div>
                                                    <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                                                        <h6 style="font-size: 15px"class="mb-0">$ ' . $producto["total"] . '</h6>
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
                ';
            }
        }
    }

?>
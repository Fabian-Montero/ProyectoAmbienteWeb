<?php

include_once '../Models/productoModel.php';
include_once 'utiles.php';

function cargarProductos(){
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
                <ul>
                    <li><a href="product.php?q=' . $producto["id"] . '"><i class="fa fa-eye"></i></a></li>
                    <li><a href="single-product.html"><i class="fa fa-star"></i></a></li>
                    <li><a href="single-product.html"><i class="fa fa-shopping-cart"></i></a></li>
                </ul>
            </div>
            <img width="350" height="368" src="' . $producto["url_imagen"] . ' " alt="">
        </div>
        <div class="down-content">
            <h4>' . $producto["nombre"] . '</h4>
            <span>$' . $producto["precio"] . '</span>
            <ul style= "margin-top:35px" class="stars">
                <li><i class="fa fa-star"></i></li>
                <li><i class="fa fa-star"></i></li>
                <li><i class="fa fa-star"></i></li>
                <li><i class="fa fa-star"></i></li>
                <li><i class="fa fa-star"></i></li>
            </ul>
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
                <div class="row">
                    <div class="col-lg-8">
                    <div class="left-images">
                        <img width="350" height="368" src="' . $producto["url_imagen"] .'" alt="">
                
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="right-content">
                        <h4>' . $producto["nombre"] .' </h4>
                        <span class="price">$' . $producto["precio"] .'</span>
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
                                    <input type="button" value="-" class="minus"><input type="number" step="1" min="1" max="" name="quantity" value="1" title="Qty" class="input-text qty text" size="4" pattern="" inputmode=""><input type="button" value="+" class="plus">
                                </div>
                            </div>
                        </div>
                        <div class="total">
                            <h4>Total: $' . $producto["precio"] .'</h4>
                            <div class="main-border-button"><a href="#">Añadir al carrito</a></div>
                        </div>
                    </div>
                </div>
                </div>
            </div>
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
                        <div class="inner-content">
                            <h4 style= "text-shadow: 6px 6px 10px rgba(0, 0, 0, 10)" >'. $categoria["nombre"] . '</h4>
                        </div>
                        <div class="hover-content">
                            <div class="inner">
                                <h4>'. $categoria["nombre"] . '</h4>
                                <p>'. $categoria["descripcion"] . '</p>
                                <div class="main-border-button">
                                    <a href="#">Ver más</a>
                                </div>
                            </div>
                        </div>
                        <div class="image-with-text">
                            <img width="230" height="200" src="'. $categoria["url_imagen"] . '">
                        </div>
                    </div>
                </div>
            </div>
            ';
        }
    }
}

    
    
    

?>
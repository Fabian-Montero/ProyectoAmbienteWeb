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
                    <li><a href="single-product.html"><i class="fa fa-eye"></i></a></li>
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

    
    
    

    ?>
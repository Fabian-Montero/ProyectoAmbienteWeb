<?php
    include_once "layout.php";
?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <title>Hexashop Ambiente Web</title>


    <!-- Additional CSS Files -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">

    <link rel="stylesheet" href="assets/css/templatemo-hexashop.css">

    <link rel="stylesheet" href="assets/css/owl-carousel.css">

    <link rel="stylesheet" href="assets/css/lightbox.css">

    

  

    
<!--

TemplateMo 571 Hexashop

https://templatemo.com/tm-571-hexashop

-->
    </head>
    
    <body>
    
    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>  
    <!-- ***** Preloader End ***** -->
    
    
    <!-- HEADER -->

    <?php
        mostrarHeader();

    ?>



    <!-- ***** Main Banner Area Start ***** -->
    <div class="main-banner" id="top">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <div class="left-content">
                        <div class="thumb">
                            <div class="inner-content">
                                <h4>Somos Hexashop</h4>
                                <span>La tienda en la que encontrará sus productos favoritos</span>
                                <div class="main-border-button">
                                    <a href="../Views/products.php?cat_id=150">Compra Ahora!</a>
                                </div>
                            </div>
                            <img src="assets/images/left-banner-image.jpg" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="right-content">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="right-first-image">
                                    <div class="thumb">
                                        <div class="inner-content">
                                            <h4 style= "text-shadow: 6px 6px 10px rgba(0, 0, 0, 10)">Muebles</h4>
                                            
                                        </div>
                                        <div class="hover-content">
                                            <div class="inner">
                                                <h4>Muebles</h4>
                                                <p>Lo necesario en muebles para su hogar</p>
                                                <div class="main-border-button">
                                                    <a href="../Views/products.php?cat_id=7">Ver más</a>
                                                </div>
                                            </div>
                                        </div>
                                        <img width="400" height="380"src="assets/images/cat7.jpg">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="right-first-image">
                                    <div class="thumb">
                                        <div class="inner-content">
                                            <h4 style= "text-shadow: 6px 6px 10px rgba(0, 0, 0, 10)">Vestidos de Mujer</h4>
                                        </div>
                                        <div class="hover-content">
                                            <div class="inner">
                                                <h4>Vestidos de Mujer</h4>
                                                <p>Variedad en vestidos para mujer</p>
                                                <div class="main-border-button">
                                                    <a href="../Views/products.php?cat_id=9">Ver más</a>
                                                </div>
                                            </div>
                                        </div>
                                        <img width="400" height="380"src="assets/images/cat9.jpeg">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="right-first-image">
                                    <div class="thumb">
                                        <div class="inner-content">
                                            <h4 style= "text-shadow: 6px 6px 10px rgba(0, 0, 0, 10)">Zapatos de Hombre</h4>
                                            
                                        </div>
                                        <div class="hover-content">
                                            <div class="inner">
                                                <h4 >Zapatos de Hombre</h4>
                                                <p>Variedad en zapatos para hombre</p>
                                                <div class="main-border-button">
                                                    <a href="../Views/products.php?cat_id=12">Ver más</a>>
                                                </div>
                                            </div>
                                        </div>
                                        <img width="400" height="380"src="assets/images/cat12.jpg">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="right-first-image">
                                    <div class="thumb">
                                        <div class="inner-content">
                                            <h4 style= "text-shadow: 6px 6px 10px rgba(0, 0, 0, 10)">Otras Categorías</h4>
                                            
                                        </div>
                                        <div class="hover-content">
                                            <div class="inner">
                                                <h4>Otras Categorías</h4>
                                                <p>Explore muchas más categorías</p>
                                                <div class="main-border-button">
                                                    <a href="categories.php">Ver más</a>
                                                </div>
                                            </div>
                                        </div>
                                        <img width="400" height="380"src="assets/images/baner-right-image-04.jpg">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Main Banner Area End ***** -->
    
    <!-- FOOTER -->
    <?php
    mostrarFooter();
    ?>
    
    <!-- <script src="usuario.js"></script> -->
    <!-- jQuery -->
    <script src="assets/js/jquery-2.1.0.min.js"></script>

    <!-- Bootstrap -->
    <script src="assets/js/popper.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!-- Plugins -->
    <script src="assets/js/owl-carousel.js"></script>
    <script src="assets/js/accordions.js"></script>
    <script src="assets/js/datepicker.js"></script>
    <script src="assets/js/scrollreveal.min.js"></script>
    <script src="assets/js/waypoints.min.js"></script>
    <script src="assets/js/jquery.counterup.min.js"></script>
    <script src="assets/js/imgfix.min.js"></script> 
    <script src="assets/js/slick.js"></script> 
    <script src="assets/js/lightbox.js"></script> 
    <script src="assets/js/isotope.js"></script> 
    
    <!-- Global Init -->
    <script src="assets/js/custom.js"></script>

    <script>

        $(function() {
            var selectedClass = "";
            $("p").click(function(){
            selectedClass = $(this).attr("data-rel");
            $("#portfolio").fadeTo(50, 0.1);
                $("#portfolio div").not("."+selectedClass).fadeOut();
            setTimeout(function() {
              $("."+selectedClass).fadeIn();
              $("#portfolio").fadeTo(50, 1);
            }, 500);
                
            });
        });

    </script>
    
  </body>
</html>
<?php
    include_once "layout.php";
    include_once "../Controllers/productoController.php";
?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <title>Hexashop Ecommerce HTML CSS Template</title>


    <!-- Additional CSS Files -->

    <link rel="stylesheet" href="assets/css/img.css">

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
<div class="page-heading about-page-heading" id="top">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="inner-content">
                        <h2>Categorías</h2>
                        <span>Sus categorías favoritas en Hexashop</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Main Banner Area End ***** -->

    
    <div style="padding-top: 0px" class="main-banner" id="top">
        <div class="container-fluid">
            <div class="right-content">
                <div class="row">

                        <!-- Lamada al controller -->
                        <?php
                            cargarCategorias();
                        ?>
                            <!-- <div class="col-lg-4">
                                <div class="right-first-image">
                                    <div class="thumb">
                                        <div class="inner-content">
                                            <h4>Mujeres</h4>
                                        </div>
                                        <div class="hover-content">
                                            <div class="inner">
                                                <h4>Mujeres</h4>
                                                <p>Aquí encontrará todo en ropa de mujer, para todos los gustos</p>
                                                <div class="main-border-button">
                                                    <a href="#">Ver más</a>
                                                </div>
                                            </div>
                                        </div>
                                        <img src="assets/images/baner-right-image-01.jpg">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="right-first-image">
                                    <div class="thumb">
                                        <div class="inner-content">
                                            <h4>Hombres</h4>
                                            
                                        </div>
                                        <div class="hover-content">
                                            <div class="inner">
                                                <h4>Hombres</h4>
                                                <p>Aquí encontrará todo en ropa de mujer, para todos los gustos</p>
                                                <div class="main-border-button">
                                                    <a href="#">Ver más</a>
                                                </div>
                                            </div>
                                        </div>
                                        <img src="assets/images/baner-right-image-02.jpg">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="right-first-image">
                                    <div class="thumb">
                                        <div class="inner-content">
                                            <h4>Niños</h4>
                                            
                                        </div>
                                        <div class="hover-content">
                                            <div class="inner">
                                                <h4>Kids</h4>
                                                <p>Aquí encontrará los juguetes y ropa necesaria para los niños de la casa</p>
                                                <div class="main-border-button">
                                                    <a href="#">Ver más</a>
                                                </div>
                                            </div>
                                        </div>
                                        <img src="assets/images/baner-right-image-03.jpg">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="right-first-image">
                                    <div class="thumb">
                                        <div class="inner-content">
                                            <h4>Otras Categorías</h4>
                                            
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
                                        <img src="assets/images/cat1.jpg">
                                    </div>
                                </div>
                            </div> -->
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
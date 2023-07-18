<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
function mostrarHeader()
{
?>
    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="home.php" class="logo">
                            <img src="assets/images/logo.png">
                        </a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li class="scroll-to-section"><a href="#top" class="active">Inicio</a></li>
                            <li class="submenu">
                                <a href="javascript:;">Páginas</a>
                                <ul>
                                    <li><a href="about.php">Sobre Nosotros</a></li>
                                    <li><a href="products.php">Productos</a></li>
                                    <li><a href="single-product.php">Producto</a></li>

                                </ul>
                            </li>
                            <li class="submenu">
                                <a href="javascript:;">Cuenta</a>
                                <ul>
                                    <form action="" method="post"> 
                                    <li><a onclick="cerrarSesion();" href="login.php" >Cerrar Sesión</a></li>
                                    <li><a href="single-product.php">Cambiar Contraseña</a></li>
                                    </form>
                                </ul>
                            </li>
                            </li>
                            <li class="scroll-to-section"><a href="#explore">Tipo de Perfil</a></li>
                            <li class="scroll-to-section"><a href="carrito.php">Carrito</a></li>
                        </ul>

                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
        <script src="usuario.js"></script>

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

    </header>
    <!-- ***** Header Area End ***** -->
<?php


}
?>


<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
function mostrarFooter()
{
?>
    <!-- ***** Footer Start ***** -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="first-item">
                        <div class="logo">
                            <img src="assets/images/white-logo.png" alt="hexashop ecommerce templatemo">
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <h4>Categorías</h4>
                    <ul>
                        <li><a href="#">Hombres</a></li>
                        <li><a href="#">Mujeres</a></li>
                        <li><a href="#">Niños</a></li>
                    </ul>
                </div>
                <div class="col-lg-3">
                    <h4>Links Útiles</h4>
                    <ul>
                        <li><a href="#">Inicio</a></li>
                        <li><a href="#">Sobre Nosotros</a></li>
                        <li><a href="#">Prodcutos</a></li>

                    </ul>
                </div>
                <div class="col-lg-3">
                    <h4>Ayuda e Información</h4>
                    <ul>
                        <li><a href="#">Cuenta</a></li>
                        <li><a href="#">Cambiar contraseña</a></li>
                        <li><a href="#">Carrito</a></li>
                    </ul>
                </div>
                <div class="col-lg-12">
                    <div class="under-footer">
                        <p>Universidad Fidélitas. Proyecto Ambiente Web / Cliente Servidor

                    </div>
                </div>
            </div>
        </div>

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

    </footer>

<?php
}
?>
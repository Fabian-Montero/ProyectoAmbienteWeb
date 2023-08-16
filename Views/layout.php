<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
function mostrarHeader()
{

    if($_SESSION["NombreUsuario"] == null)
    {
       header("location: login.php");
    }

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
                            
                            <li class="scroll-to-section"><a href="home.php">Inicio</a></li>
                            <li class="submenu">
                                <a href="javascript:;">Páginas</a>
                                <ul>
                                    <li><a href="about.php">Sobre Nosotros</a></li>
                                    <li><a href="products.php">Productos</a></li>
                                    <li><a href="categories.php">Categorías</a></li>

                                </ul>
                            </li>
                            <li class="submenu">
                                <a href="javascript:;">Cuenta</a>
                                <ul>
                                    <form action="" method="post"> 
                                    <li><a href="#"onclick="cerrarSesion();">Cerrar Sesión</a></li>
                                    <li><a href="single-product.php">Cambiar Contraseña</a></li>
                                    </form>
                                </ul>
                            </li>
                            </li>
                            <li class="scroll-to-section"><a href="carrito.php"> <i class="fa fa-cart-plus fa-lg"></i> </a></li>
                            <li style= "margin-left: 60px ; pointer-events: none;"class="scroll-to-section"><a href="#"><?php echo $_SESSION["NombreUsuario"] . " " .  $_SESSION["ApellidoUsuario"] . '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' . $_SESSION["NombreRolUsuario"];?></a></li>
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
                        <li><a href="#">Muebles</a></li>
                        <li><a href="#">Vestidos de Mujer</a></li>
                        <li><a href="#">Zapatos de Hombre</a></li>
                    </ul>
                </div>
                <div class="col-lg-3">
                    <h4>Links Útiles</h4>
                    <ul>
                        <li><a href="home.php">Inicio</a></li>
                        <li><a href="about.php">Sobre Nosotros</a></li>
                        <li><a href="products.php">Productos</a></li>

                    </ul>
                </div>
                <div class="col-lg-3">
                    <h4>Ayuda e Información</h4>
                    <ul>
                        <li><a href="#"onclick="cerrarSesion();">Cerrar Sesión</a></li>
                        <li><a href="#">Cambiar contraseña</a></li>
                        <li><a href="carrito.php">Carrito</a></li>
                    </ul>
                </div>
                <div class="col-lg-12">
                    <div class="under-footer">
                        <p>Universidad Fidélitas. Proyecto Ambiente Web / Cliente Servidor

                    </div>
                </div>
            </div>
        </div>

        jQuery
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
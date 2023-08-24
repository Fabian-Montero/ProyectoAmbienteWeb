<?php

include_once '../Controllers/usuarioController.php';
include_once '../Controllers/productoController.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}


function ConsultarUsuarios()
{
    $respuesta = cargarUsuarios();

    if ($respuesta->num_rows > 0) {
        while ($fila = mysqli_fetch_array($respuesta)) {
            echo    '        
            <tr>
                <form id="form_' . $fila["id"] . '" method="post">
                    <td><input type="text" name="nombre_' . $fila["id"] . '" value="' . $fila["nombre"] . '"></td>
                    <td><input type="text" name="apellido_' . $fila["id"] . '" value="' . $fila["apellido"] . '"></td>
                    <td>' . $fila["correo"] . '</td>
                    <td>
                        <input type="hidden" name="id_" value="' . $fila["id"] . '">
                        <button type="submit" name="btnUpdateUser_' . $fila["id"] . '" class="btn btn-success">Actualizar</button>
                    </td>
                </form>
            </tr>';
        }
    }
}




function mostrarHeader()
{
    consultarResumenCarrito();
    if($_SESSION["NombreUsuario"] == null)
    {
       header("location: login.php");
    }
    
    if ($_SESSION["RolUsuario"] == 0) {
        echo ' 
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
                                        <li><a href="products.php?cat_id=150"">Productos</a></li>
                                        <li><a href="categories.php">Categorías</a></li>
                                        <li><a href="compras.php">Mis Compras</a></li>
                                    </ul>
                                </li>
                                <li class="submenu">
                                    <a href="javascript:;">Cuenta</a>
                                    <ul>
                                        <form action="" method="post"> 
                                        <li><a href="#" onclick="cerrarSesion();">Cerrar Sesión</a></li>
                                        <li><a href="single-product.php">Cambiar Contraseña</a></li>
                                        </form>
                                    </ul>
                                </li>
                                
                                '?>
                                <?php
                                    if ($_SESSION["cantidadCarrito"] > 0) {
                                        echo '<li style="margin-right: 0px;"><a href="carrito.php"><i class="fa fa-cart-plus fa-lg"></i> ' . $_SESSION["cantidadCarrito"] . '&nbsp;&nbsp;$' . $_SESSION["totalCarrito"] . '</a></li>';
                                    }

                                    echo '<li style="margin-left: 60px; pointer-events: none;"><a href="#">' . $_SESSION["NombreUsuario"] .  " " .  $_SESSION["ApellidoUsuario"] . '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' . $_SESSION["NombreRolUsuario"]  .'</a></li>';
                                ?>

                                </ul>
                            <a class="menu-trigger">
                                <span>Menu</span>
                            </a>
                            <!-- ***** Menu End ***** -->
                        </nav>
                    </div>
                </div>
            </div>
            <script src="usuario.js"></script>';

    <?php }?>
    
    <?php
    if ($_SESSION["RolUsuario"] == 1) {
        echo '
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
                                        <li><a href="products.php?cat_id=150">Productos</a></li>
                                        <li><a href="categories.php">Categorías</a></li>
                                        <li><a href="compras.php">Mis Compras</a></li>
                                    </ul>
                                </li>
                                <li class="submenu">
                                    <a href="javascript:;">Cuenta</a>
                                    <ul>
                                        <form action="" method="post"> 
                                        <li><a href="#" onclick="cerrarSesion();">Cerrar Sesión</a></li>
                                        <li><a href="single-product.php">Cambiar Contraseña</a></li>
                                        </form>
                                    </ul>
                                </li>
                                <li class="submenu">
                                    <a href="javascript:;">Gestionar</a>
                                    <ul>
                                        <li><a href="Gestionar_usuarios.php">Usuario</a></li>
                                        <li><a href="mantenimientoProductos.php">Productos</a></li>
                                    </ul>
                                </li>
                                '?>
                                <?php
                                    if ($_SESSION["cantidadCarrito"] > 0) {
                                        echo '<li style="margin-right: 0px;"><a href="carrito.php"><i class="fa fa-cart-plus fa-lg"></i> ' . $_SESSION["cantidadCarrito"] . '&nbsp;&nbsp;$' . $_SESSION["totalCarrito"] . '</a></li>';
                                    }

                                    echo '<li style="margin-left: 60px; pointer-events: none;"><a href="#">' . $_SESSION["NombreUsuario"] .  " " .  $_SESSION["ApellidoUsuario"] . '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' . $_SESSION["NombreRolUsuario"]  .'</a></li>';
                                ?>
                                </ul>
                            <a class="menu-trigger">
                                <span>Menu</span>
                            </a>
                            <!-- ***** Menu End ***** -->
                        </nav>
                    </div>
                </div>
            </div>
            <script src="usuario.js"></script>
        </header>';
    
    <?php }?>


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
                        <li><a href="../Views/products.php?cat_id=7">Muebles</a></li>
                        <li><a href="../Views/products.php?cat_id=9">Vestidos de Mujer</a></li>
                        <li><a href="../Views/products.php?cat_id=12">Zapatos de Hombre</a></li>
                        <li><a href="categories.php">Más categorías</a></li>
                    </ul>
                </div>
                <div class="col-lg-3">
                    <h4>Links Útiles</h4>
                    <ul>
                        <li><a href="home.php">Inicio</a></li>
                        <li><a href="../Views/products.php?cat_id=150">Productos</a></li>
                        <li><a href="compras.php">Mis Compras</a></li>

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
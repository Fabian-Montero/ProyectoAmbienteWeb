<?php
    function mostrarHeader(){
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
                                <a href="javascript:;">Categorías</a>
                                <ul>
                                <li class="scroll-to-section"><a href="#men">Hombres</a></li>
                            <li class="scroll-to-section"><a href="#women">Mujeres</a></li>
                            <li class="scroll-to-section"><a href="#kids">Niños</a></li>
                                    
                                </ul>
                            </li>
                            <li class="scroll-to-section"><a href="#explore">Cuenta</a></li>
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
    </header>
    <!-- ***** Header Area End ***** -->
<?php


}
?>


<?php
    function mostrarFooter(){
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
                        <li><a href="#">Ayuda</a></li>
                        
                    </ul>
                </div>
                <div class="col-lg-3">
                    <h4>Ayuda e Información</h4>
                    <ul>
                        <li><a href="#">Cuenta</a></li>
                        <li><a href="#">Cambiar contraseña</a></li>
                    </ul>
                </div>
                <div class="col-lg-12">
                    <div class="under-footer">
                        <p>Universidad Fidélitas. Proyecto Ambiente Web / Cliente Servidor 
                        
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <?php
    }
?>
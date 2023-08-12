<?php

include_once '../Controllers/usuarioController.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login V18</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="login/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="login/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="login/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/css/util.css">
	<link rel="stylesheet" type="text/css" href="login/css/main.css">
<!--===============================================================================================-->
</head>
<body style="background-color: #666666;">
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">

           
				<form id = "formConfirmarContrasenna" class="login100-form validate-form" action="" method="post">
					<span class="login100-form-title p-b-43">
						Recuperar Cuenta
					</span>
					
					

					<?php 
   				 		echo '<input type="hidden" name="txtCorreo" id="txtCorreo" value="' . $_GET["q"] . '">';
					?>
					
					<div class="wrap-input100">
						<input class="input100" id="txtContrasenna" name="txtContrasenna" type="password" onblur="ValidarClaves();">
						<span class="focus-input100"></span>
						<span class="label-input100">Contraseña</span>
					</div>

					<div class="wrap-input100">
						<input class="input100" id="txtConfirmarContrasenna" name="txtConfirmarContrasenna" type="password" onblur="ValidarClaves();">
						<span class="focus-input100"></span>
						<span class="label-input100">Confirmar Contraseña</span>
					</div>

					

					<div class="container-login100-form-btn">
						<button id="btnCambiarContrasenna" name="btnCambiarContrasenna" type="submit" class="login100-form-btn" >
							Cambiar Contraseña
						</button>
					</div>
					
                    <?php
                    if(isset($_POST["MsjPantalla"]))
                    {
                      echo '<div style="text-align:center" class="alert alert-light" role="alert">' . $_POST["MsjPantalla"] . '</div>';
                    }
                    ?>

				</form>

				<div class="login100-more" style="background-image: url('login/images/bg-01.jpg');">
				</div>
			</div>
		</div>
	</div>

<!--===============================================================================================-->
	<script src="login/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="login/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="login/vendor/bootstrap/js/popper.js"></script>
	<script src="login/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="login/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="login/vendor/daterangepicker/moment.min.js"></script>
	<script src="login/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="login/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="login/js/main.js"></script>

	<script src="usuario.js"></script>



</body>
</html>
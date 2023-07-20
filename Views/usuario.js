function cerrarSesion() {
    $.ajax({
        type: 'POST',
        url: '../Controllers/usuarioController.php',
        data: {
            'cerrarSesion': 'cerrarSesion'
        },
        success: function(response) {
            // Manejar la respuesta del servidor
            console.log(response);
            window.location.href='login.php';
          },
          error: function(error) {
            // Manejar errores
            console.log(error);
          }
    });
}

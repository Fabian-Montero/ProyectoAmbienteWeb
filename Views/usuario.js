function cerrarSesion() {
    $.ajax({
        type: 'POST',
        url: '../Controllers/usuarioController.php',
        data: {
            funcion: 'cerrarSesion'
        },
        success: function(response) {
            // Manejar la respuesta del servidor
            console.log(response);
          },
          error: function(error) {
            // Manejar errores
            console.log(error);
          }
    });
}

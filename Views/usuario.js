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


function ValidarClaves() {

  let contrasenna = $("#txtContrasenna").val(); 
  let confirmarContrasenna = $("#txtConfirmarContrasenna").val();
  $('#btnCambiarContrasenna').prop('disabled', true);
  $('#btnCambiarContrasenna').css('background-color','grey');
  
  if (contrasenna != confirmarContrasenna) {
      //Esta variable es para que no muestre el mensaje de error multiples veces
    let errorDiv = $('#errorContrasenna');
    if (errorDiv.length === 0) {
      errorDiv = $('<div>', {
        id: 'errorContrasenna', 
        class: 'alert alert-danger'
      }).prependTo('#formConfirmarContrasenna'); 

      errorDiv.attr('role', 'alert');
      errorDiv.text('Recuerde que las contraseñas deben coincidir');
    }
  }
  else {
    $('#btnCambiarContrasenna').prop('disabled', false);
    $('#btnCambiarContrasenna').css('background-color','#6675df');
    if ($('#errorContrasenna')){
      $('#errorContrasenna').remove();
    }
  }
}

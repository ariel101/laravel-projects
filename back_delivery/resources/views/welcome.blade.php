<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <!-- CSS de Bootstrap -->

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <style>
        .gradient-custom {
            /* fallback for old browsers */
            background: #6a11cb;

            /* Chrome 10-25, Safari 5.1-6 */
            background: -webkit-linear-gradient(to right, rgba(106, 17, 203, 1), rgba(37, 117, 252, 1));

            /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
            background: linear-gradient(to right, rgba(106, 17, 203, 1), rgba(37, 117, 252, 1))
            }
    </style>
</head>
<body>
  <div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header text-center">
                    <h2>Login</h2>
                </div>
                <div class="card-body">
                    <form id="loginForm" method="POST" action="">
                        @csrf

                        <div class="mb-3">
                            <label for="email" class="form-label">email</label>
                            <input type="email" id="email" name="email" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" id="password" name="password" class="form-control" required>
                        </div>

                        <div id="errorMessage" class="alert alert-danger" style="display:none;"></div>

                        <button type="button" class="btn btn-primary" onclick="login()">Login</button>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
      <!-- Scripts de Bootstrap (jQuery y Popper.js son requeridos) -->
      <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
      <script>
          function login() {
              var formData = $('#loginForm').serialize();
      
              $.ajax({
                  url: 'http://localhost:8000/api/login',
                  type: 'POST',
                  data: formData,
                  dataType: 'json',
                  success: function (response) {
                      // La autenticación fue exitosa
                      console.log('Login successful');
                      console.log(response);
                      window.location.href = '{{ route('panel') }}';                  
                    // Puedes redirigir al usuario a otra página, manipular la interfaz, etc.
                  },
                  error: function (error) {
                      // La autenticación falló
                      console.error('Login failed');
                      console.error(error.responseJSON);
                      console.log(error);
                      // Puedes mostrar mensajes de error, reiniciar el formulario, etc.
                      $('#errorMessage').text('Credenciales incorrectas. Inténtalo de nuevo.').show();
                  }
              });
          }
      </script>

</body>
</html>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Cuenta - Amazon</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
    <div class="container">
        <div class="card-header2 text-center">
            <img src="https://upload.wikimedia.org/wikipedia/commons/a/a9/Amazon_logo.svg" alt="Amazon Logo">
        </div>
        <div class="card">
            <div class="card-body">
                <form id="crearCuentaForm">
                    @csrf
                    <h3>Crear cuenta</h3>
                    <div class="form-group">
                        <label for="nombre">Tu nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" required>
                    </div>
                    <div class="form-group">
                        <label for="correo">Correo electrónico</label>
                        <input type="email" class="form-control" id="correo" name="correo" required>
                    </div>
                    <div class="form-group">
                        <label for="contrasena">Contraseña</label>
                        <input placeholder="Debe tener al menos 6 caracteres" type="password" class="form-control" id="contrasena" name="contrasena" required>
                        <small class="form-text">La contraseña debe contener al menos seis caracteres.</small>
                    </div>
                    <div class="form-group">
                        <label for="confirmarContrasena">Vuelve a escribir la contraseña</label>
                        <input type="password" class="form-control" id="confirmarContrasena" name="contrasena_confirmation" required>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Crear tu cuenta de Amazon</button>
                    <br>
                   <p>Al crear una cuenta, aceptas las <a href="#">Condiciones de Uso</a> y el <a href="#">Aviso de Privacidad</a> de amazon.com.</p>
                </form>
            </div>
            <div class="card-footer text-center">
                ¿Ya tienes una cuenta? <a href="#">Iniciar sesión</a>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#crearCuentaForm').on('submit', function(e) {
                e.preventDefault();
    
                $.ajax({
                    url: '{{ url('/crear-cuenta') }}',
                    method: 'POST',
                    data: $(this).serialize(), // Incluye automáticamente el token CSRF si usas @csrf en el formulario
                    success: function(response) {
                        alert('Cuenta creada con éxito.\nNombre: ' + response.nombre + '\nCorreo: ' + response.correo);
                        $('#crearCuentaForm')[0].reset(); // Limpiar el formulario después del envío
                    },
                    error: function(xhr) {
                        if (xhr.status === 419) {
                            alert('Token CSRF inválido. Intenta de nuevo.');
                        } else {
                            let errors = xhr.responseJSON.errors;
                            let errorMsg = '';
                            for (let key in errors) {
                                errorMsg += errors[key][0] + '\n';
                            }
                            alert(errorMsg);
                        }
                    }
                });
            });
        });
    </script>
    
    
</body>
</html>

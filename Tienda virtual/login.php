<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda en Línea - Iniciar Sesión</title>
    <!-- Enlaces a los archivos CSS de Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <!-- Encabezado (Header) -->
    <header>
        <!-- Código del encabezado que tienes en el archivo actual -->
    </header>

    <div class="container mt-5">
        <h1>Iniciar Sesión</h1>
        <form action="procesar_login.php" method="post"> <!-- Corregido el atributo 'action' -->
            <div class="mb-3">
                <label for="email" class="form-label">Correo Electrónico</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Contraseña</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary">Iniciar Sesión</button>
        </form>
        <p>No tienes una cuenta? <a href="registro.php">Regístrate aquí.</a></p>
    </div>

    <!-- Enlaces a los archivos JS de Bootstrap y el código del pie de página -->
</body>
</html>

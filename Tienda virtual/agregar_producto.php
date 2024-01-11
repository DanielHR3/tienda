<?php
// Incluir el archivo de conexión a la base de datos
require_once "conexion.php";

// Verificar si se ha enviado el formulario de agregar producto
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $descripcion = $_POST["descripcion"];
    $precio = $_POST["precio"];

    // Verificar si se ha enviado la imagen correctamente
    if (isset($_FILES["imagen"]) && $_FILES["imagen"]["error"] === UPLOAD_ERR_OK) {
        $nombreImagen = $_FILES["imagen"]["name"];
        $rutaTemporal = $_FILES["imagen"]["tmp_name"];
        $rutaDestino = "images/" . $nombreImagen;

        // Procesar la imagen
        if (move_uploaded_file($rutaTemporal, $rutaDestino)) {
            // La imagen se ha cargado correctamente, ahora se puede agregar el producto a la base de datos

            // Preparar la consulta SQL para insertar el producto en la tabla "productos"
            $sql = "INSERT INTO productos (nombre, descripcion, precio, ruta_imagen) VALUES (?, ?, ?, ?)";
            
            // Preparar el statement y verificar si se ejecutó correctamente
            if ($stmt = $conn->prepare($sql)) {
                // Vincular los parámetros con los valores
                $stmt->bind_param("ssds", $nombre, $descripcion, $precio, $rutaDestino);
                
                if ($stmt->execute()) {
                    // Producto agregado con éxito
                    $mensaje = "Producto agregado correctamente.";
                } else {
                    // Error al agregar el producto
                    $error = "Error al agregar el producto: " . $stmt->error;
                }
                
                // Cerrar el statement
                $stmt->close();
                
            } else {
                // Error en la consulta SQL
                $error = "Error en la consulta SQL: " . $conn->error;
            }
        } else {
            // Hubo un error al cargar la imagen
            $error = "Error al cargar la imagen.";
        }
    } else {
        // No se ha enviado la imagen correctamente
        $error = "Error al cargar la imagen.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda en Línea - Agregar Producto</title>
    <!-- Enlaces a los archivos CSS de Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <!-- Encabezado (Header) -->
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <!-- Logo -->
                <a class="navbar-brand" href="logo/logo.jpg">
                    <img src="logo/logo.jpg" alt="Logo de la tienda">
                </a>

                <!-- Botón para el menú en dispositivos móviles -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- Menú -->
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php">Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="productos.php">Productos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="contacto.php">Contacto</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <div class="container mt-5">
    <h1>Agregar Producto</h1>
    <form action="procesar_agregar_producto.php" method="post" enctype="multipart/form-data">
      <div class="mb-3">
        <label for="nombre" class="form-label">Nombre</label>
        <input type="text" class="form-control" id="nombre" name="nombre" required>
      </div>
      <div class="mb-3">
        <label for="descripcion" class="form-label">Descripción</label>
        <textarea class="form-control" id="descripcion" name="descripcion" rows="3" required></textarea>
      </div>
      <div class="mb-3">
        <label for="precio" class="form-label">Precio</label>
        <input type="number" class="form-control" id="precio" name="precio" required>
      </div>
      <div class="mb-3">
        <label for="imagen" class="form-label">Imagen</label>
        <input type="file" class="form-control" id="imagen" name="imagen" accept="image/*" required>
      </div>
      <div class="mb-3">
  <a href="agregar_producto.php" class="btn btn-primary">Agregar Producto</a>
</div>
    </form>
  </div>

  <!-- Agregar el enlace al archivo de Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KyZXEAg3QhqLMpG8r+6r8D7Lm+MHPpwpeViH6dwzOp6aP9Ll+NCLc4IT5u5BpXtB" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script> 
 <!-- Pie de página (Footer) -->
 <footer class="footer mt-5">
        <div class="container text-center">
            <img src="logo/logo2.png" alt="Logo de la tienda">
            <p>&copy; 2023 Tienda en Línea. Todos los derechos reservados.</p>
        </div>
    </footer>
</body>
</html>
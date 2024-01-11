<?php
// Iniciar la sesión
session_start();

// Realizar la conexión a la base de datos (usando el mismo código que tienes en "conexion.php")
require_once "conexion.php";

// Consulta SQL para obtener todos los productos
$sql = "SELECT * FROM productos";
$result = $conn->query($sql);

// Obtener el número de productos en el carrito
$numProductosCarrito = isset($_SESSION["carrito"]) ? count($_SESSION["carrito"]) : 0;

// Cerrar la conexión a la base de datos
$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda en Línea - Productos</title>
    <!-- Enlaces a los archivos CSS de Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <!-- Encabezado (Header) -->
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <!-- Logo (Puedes reemplazar ruta_del_logo.jpg con la ruta de tu logo) -->
                <a class="navbar-brand" href="#">
                    <img src="ruta_del_logo.jpg" alt="Logo de la tienda" width="100">
                </a>

                <!-- Botón para el menú en dispositivos móviles -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- Menú -->
                <nav class="navbar navbar-expand-lg navbar-light">
                    <div class="container">
                        <!-- Menú -->
                        <div class="menu-section">
                            <div class="collapse navbar-collapse" id="navbarNav">
                                <ul class="navbar-nav">
                                    <li class="nav-item">
                                        <a class="nav-link" href="index.php">Inicio</a>
                                    </li>
                                    <li class="nav-item active">
                                        <a class="nav-link" href="carrito.php">Carrito (<?php echo $numProductosCarrito; ?>)</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </nav>
    </header>

    <div class="container mt-3">
        <h1>Lista de Productos</h1>
        <?php if ($result->num_rows > 0) : ?>
            <!-- Mostrar los productos en una tabla utilizando Bootstrap -->
            <table class="table table-striped mt-3">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Precio</th>
                        <th>Imagen</th>
                        <th>Acción</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $result->fetch_assoc()) : ?>
                        <tr>
                            <td><?php echo $row["nombre"]; ?></td>
                            <td><?php echo $row["descripcion"]; ?></td>
                            <td>$<?php echo $row["precio"]; ?></td>
                            <td><img src="<?php echo $row["ruta_imagen"]; ?>" alt="Imagen del producto" width="100"></td>
                            <td>
                                <form method="post" action="carrito.php">
                                    <input type="hidden" name="id" value="<?php echo $row["id"]; ?>">
                                    <button type="submit" class="btn btn-success btn-agregar-carrito">Agregar al Carrito</button>
                                </form>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        <?php else : ?>
            <div class="alert alert-info mt-3">No hay productos disponibles.</div>
        <?php endif; ?>
    </div>

    <!-- Enlaces a los archivos JS de Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>

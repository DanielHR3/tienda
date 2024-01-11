<?php
// Iniciar la sesión
session_start();

// Verificar si se ha enviado el formulario para actualizar la cantidad de productos
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["idproducto"]) && isset($_POST["cantidad"])) {
    $idProducto = $_POST["idproducto"];
    $cantidad = $_POST["cantidad"];

    // Obtener el carrito actual de la sesión
    $carrito = isset($_SESSION["carrito"]) ? $_SESSION["carrito"] : array();

    // Verificar si el producto ya está en el carrito
    $productoIndex = -1;
    foreach ($carrito as $index => $item) {
        if ($item["id"] == $idProducto) {
            $productoIndex = $index;
            break;
        }
    }

    if ($productoIndex !== -1) {
        // Actualizar la cantidad del producto en el carrito
        $carrito[$productoIndex]["cantidad"] = $cantidad;

        // Actualizar el carrito en la sesión
        $_SESSION["carrito"] = $carrito;
    }

    // Redirigir a la página del carrito después de actualizar la cantidad
    header("Location: carrito.php");
    exit();
}

// Obtener el número de productos en el carrito
$numProductosCarrito = isset($_SESSION["carrito"]) ? count($_SESSION["carrito"]) : 0;

// Obtener el total del carrito
$totalCarrito = 0;
if (isset($_SESSION["carrito"]) && is_array($_SESSION["carrito"]) && count($_SESSION["carrito"]) > 0) {
    foreach ($_SESSION["carrito"] as $producto) {
        $totalCarrito += ($producto["precio"] * $producto["cantidad"]);
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda en Línea - Carrito de Compras</title>
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

    <div class="container mt-5">
        <h1>Carrito de Compras</h1>
        <table class="table table-striped mt-3">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                    <th>Subtotal</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody>
            <?php
            if (isset($_SESSION["carrito"]) && is_array($_SESSION["carrito"]) && count($_SESSION["carrito"]) > 0) {
                foreach ($_SESSION["carrito"] as $producto) {
                    echo '<tr>';
                    echo '<td>' . $producto["nombre"] . '</td>';
                    echo '<td>' . $producto["descripcion"] . '</td>';
                    echo '<td>$' . $producto["precio"] . '</td>';
                    echo '<td>';
                    echo '<form method="post" action="carrito_actualizar.php">';
                    echo '<input type="hidden" name="idproducto" value="' . $producto["id"] . '">';
                    echo '<input type="number" name="cantidad" value="' . $producto["cantidad"] . '" min="1">';
                    echo '<button type="submit" class="btn btn-primary">Actualizar</button>';
                    echo '</form>';
                    echo '</td>';
                    echo '<td>$' . ($producto["precio"] * $producto["cantidad"]) . '</td>';
                    echo '<td>';
                    echo '<form method="post" action="eliminar_producto.php">';
                    echo '<input type="hidden" name="idproducto" value="' . $producto["id"] . '">';
                    echo '<button type="submit" class="btn btn-danger">Eliminar</button>';
                    echo '</form>';
                    echo '</td>';
                    echo '</tr>';
                }
            } else {
                echo '<tr><td colspan="6">No hay productos en el carrito.</td></tr>';
            }
            ?>
            </tbody>
        </table>

        <?php if ($totalCarrito > 0) : ?>
            <div class="text-end">
                <h3>Total a Pagar: $<?php echo $totalCarrito; ?></h3>
                <a href="confirmar_compra.php" class="btn btn-success">Confirmar Compra</a>
            </div>
        <?php endif; ?>
    </div>


    <!-- Enlaces a los archivos JS de Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>
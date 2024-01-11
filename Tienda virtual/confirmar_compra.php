<?php
session_start();

// Verificar si el formulario de confirmación de compra ha sido enviado
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["direccion_envio"])) {
    // Aquí puedes procesar la información del formulario y guardarla en la base de datos
    // También puedes realizar acciones como enviar un correo electrónico de confirmación, etc.
    // Por simplicidad, en este ejemplo solo mostraremos un mensaje de confirmación.
    $direccionEnvio = $_POST["direccion_envio"];
    $totalAPagar = calcularTotalAPagar(); // Implementa esta función según tus necesidades
    // Aquí puedes realizar el proceso de pago con algún servicio de pago externo si lo deseas

    // Después de completar la compra, puedes vaciar el carrito
    unset($_SESSION["carrito"]);

    // Redirigir a una página de confirmación o agradecimiento
    header("Location: confirmacion_compra.php");
    exit();
}

// Función para calcular el total a pagar (incluidos los gastos de envío u otros cargos)
function calcularTotalAPagar() {
    // Implementa la lógica para calcular el total a pagar según los productos en el carrito
    // Puedes incluir gastos de envío, impuestos, descuentos, etc. según tus necesidades
    // En este ejemplo, simplemente sumaremos los precios de los productos en el carrito
    $total = 0;
    if (isset($_SESSION["carrito"]) && is_array($_SESSION["carrito"]) && count($_SESSION["carrito"]) > 0) {
        foreach ($_SESSION["carrito"] as $producto) {
            $total += ($producto["precio"] * $producto["cantidad"]);
        }
    }
    return $total;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmar Compra - Tienda en Línea</title>
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
            </div>
        </nav>
    </header>

    <div class="container mt-5">
        <h1>Confirmar Compra</h1>
        <div class="row">
            <div class="col-md-6">
                <h3>Productos en el Carrito</h3>
                <table class="table table-striped mt-3">
                    <!-- Mostrar los productos en el carrito, similar a cómo se muestra en carrito.php -->
                </table>
            </div>
            <div class="col-md-6">
                <h3>Dirección de Envío</h3>
                <form method="post" action="confirmar_compra.php">
                    <div class="mb-3">
                        <label for="direccion_envio" class="form-label">Dirección de Envío</label>
                        <textarea class="form-control" id="direccion_envio" name="direccion_envio" rows="4" required></textarea>
                    </div>
                    <div class="text-end">
                        <h4>Total a Pagar: $<?php echo calcularTotalAPagar(); ?></h4>
                        <button type="submit" class="btn btn-success">Confirmar Compra</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Enlaces a los archivos JS de Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>

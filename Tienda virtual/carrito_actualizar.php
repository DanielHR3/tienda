<?php
session_start();

// Verificar si se ha enviado el formulario para actualizar la cantidad de productos
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["idproducto"]) && isset($_POST["cantidad"]) && isset($_POST["actualizar_cantidad"])) {
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
}

// Redirigir a la página del carrito después de actualizar la cantidad
header("Location: carrito.php");
exit();
?>

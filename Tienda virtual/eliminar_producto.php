<?php
session_start();

// Verificar si se ha enviado el formulario para eliminar un producto del carrito
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["idproducto"])) {
    $idProducto = $_POST["idproducto"];

    // Obtener el carrito actual de la sesión
    $carrito = isset($_SESSION["carrito"]) ? $_SESSION["carrito"] : array();

    // Buscar el índice del producto a eliminar en el carrito
    $productoIndex = -1;
    foreach ($carrito as $index => $item) {
        if ($item["id"] == $idProducto) {
            $productoIndex = $index;
            break;
        }
    }

    // Si se encontró el producto en el carrito, eliminarlo
    if ($productoIndex !== -1) {
        unset($carrito[$productoIndex]);

        // Reindexar el array para eliminar el espacio vacío dejado por unset()
        $carrito = array_values($carrito);

        // Actualizar el carrito en la sesión
        $_SESSION["carrito"] = $carrito;
    }
}

// Redirigir de regreso a la página del carrito después de eliminar el producto
header("Location: carrito.php");
exit();
?>

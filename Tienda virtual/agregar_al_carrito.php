<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["id"]) && is_numeric($_POST["id"])) {
    $idProducto = $_POST["id"];

    require_once "conexion.php";

    // Verificar si el producto ya está en el carrito
    $carrito = isset($_SESSION["carrito"]) ? $_SESSION["carrito"] : array();
    foreach ($carrito as $index => $producto) {
        if ($producto["id"] == $idProducto) {
            $_SESSION["carrito"][$index]["cantidad"]++;
            header("Location: index.php");
            exit();
        }
    }

    // Obtener el producto de la base de datos
    $sql = "SELECT * FROM productos WHERE id = $idProducto";
    $result = $conn->query($sql);
    if ($result->num_rows == 1) {
        $producto = $result->fetch_assoc();
        $producto["cantidad"] = 1;
        $_SESSION["carrito"][] = $producto;
        header("Location: index.php");
    }

    $conn->close();
}
?>

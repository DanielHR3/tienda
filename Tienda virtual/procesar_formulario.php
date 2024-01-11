<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$db_hosting = 'localhost';
$db_name = 'root';
$db_pass = 'Mocashi0356!';
$db_database = 'tienda';

$con = mysqli_connect($db_hosting, $db_name, $db_pass, $db_database);
if (mysqli_connect_errno()) {
    echo 'No se pudo conectar a la base de datos: ' . mysqli_connect_error();
} else {
    echo 'Conectado a la base de datos1';
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Aquí se definen las variables para almacenar los datos del formulario
    $nombre = "";
    $email = "";
    $mensaje = "";

    // Verificamos si las variables del formulario están definidas antes de usarlas
    if (isset($_POST["nombre"])) {
        $nombre = $_POST["nombre"];
    }
    if (isset($_POST["email"])) {
        $email = $_POST["email"];
    }
    if (isset($_POST["mensaje"])) {
        $mensaje = $_POST["mensaje"];
    }

    // Consulta de inserción
    $sql = "INSERT INTO contactos (nombre, email, mensaje) VALUES ('$nombre', '$email', '$mensaje')";

    if ($con->query($sql) === TRUE) {
        echo "El mensaje ha sido enviado correctamente.";

        // Consulta para mostrar los datos almacenados en la tabla 'contactos'
        $query = "SELECT * FROM contactos";
        $result = $con->query($query);
        if ($result->num_rows > 0) {
            echo "<br><br>Datos almacenados en la tabla 'contactos':<br>";
            while ($row = $result->fetch_assoc()) {
                echo "Nombre: " . $row["nombre"] . ", Email: " . $row["email"] . ", Mensaje: " . $row["mensaje"] . "<br>";
            }
        } else {
            echo "No hay datos almacenados en la tabla 'contactos'.";
        }
    } else {
        echo "Error al insertar en la base de datos: " . $con->error;
    }
}
?>

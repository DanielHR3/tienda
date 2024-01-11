<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    echo "Formulario enviado correctamente. Datos recibidos:<br>";
    var_dump($_POST);

    // Aquí es donde puedes usar la variable $conn para realizar consultas a la base de datos
    // Por ejemplo, para insertar los datos del formulario en la tabla 'contactos'
    $nombre = $_POST["nombre"];
    $email = $_POST["email"];
    $mensaje = $_POST["mensaje"];

    $sql = "INSERT INTO contactos (nombre, email, mensaje) VALUES ('$nombre', '$email', '$mensaje')";

    if ($conn->query($sql) === TRUE) {
        echo "El mensaje ha sido enviado correctamente.";

        // Consulta para mostrar los datos almacenados en la tabla 'contactos'
        $query = "SELECT * FROM contactos";
        $result = $conn->query($query);
        if ($result->num_rows > 0) {
            echo "<br><br>Datos almacenados en la tabla 'contactos':<br>";
            while ($row = $result->fetch_assoc()) {
                echo "Nombre: " . $row["nombre"] . ", Email: " . $row["email"] . ", Mensaje: " . $row["mensaje"] . "<br>";
            }
        } else {
            echo "No hay datos almacenados en la tabla 'contactos'.";
        }
    } else {
        echo "Error al insertar en la base de datos: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tienda en Línea</title>
  
  <!-- Enlaces a los archivos CSS de Bootstrap -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  
  <style>
     /* Estilos personalizados para el menú */
     .menu-section {
        text-align: center;     
        font-size: xxx-large; /* Tamaño de fuente del menú */
      background-color: #256d7b; /* Color de fondo del menú */
      padding: 10px 0; /* Espacio interno del menú */
      
    }
    
    .menu-section .navbar-nav .nav-link {

      color: #800000; /* Color del texto del menú */
    }

    .menu-section .navbar-nav .nav-link:hover {
      color: #fff; /* Color del texto del menú al pasar el mouse */
    }
    /* Estilos personalizados para el formulario de contacto */
    .contact-section {
      padding: 50px 0;
      background-color: #f8f9fa;
    }
  </style>
</head>
<body>
  
  <!-- Contenido de la página -->
 
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
         <nav class="navbar navbar-expand-lg navbar-light">
      <div class="container">
        
        <!-- Menú -->
        <div class="menu-section">
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
                <li class="nav-item">
                    <a class="nav-link" href="carrito.php">Carrito</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </nav>
  </header>


  <!-- Sección de Contacto -->
  <section class="contact-section">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <h2>Contacto</h2>
          <p>Si tienes alguna pregunta o consulta, no dudes en ponerte en contacto con nosotros. Rellena el siguiente formulario y te responderemos a la brevedad.</p>
          <form action="procesar_formulario.php" method="POST">
            <div class="form-group">
              <label for="name">Nombre:</label>
              <input type="text" id="nombre" name="nombre" class="form-control" required>
            </div>
            <div class="form-group">
              <label for="email">Email:</label>
              <input type="email" id="email" name="email" class="form-control" required>
            </div>
            <div class="form-group">
              <label for="message">Mensaje:</label>
              <textarea id="mensaje" name="mensaje" class="form-control" rows="5" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Enviar</button>
          </form>
        </div>
      </div>
    </div>
  </section>
  
  <!-- Enlaces a los archivos JavaScript de Bootstrap (jQuery y Bootstrap) -->
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>

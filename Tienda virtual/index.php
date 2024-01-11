<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tienda en Línea</title>

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

  <!-- Contenido de la página -->

  <!-- Sección del Título de la Tienda -->
  <div class="titulo-tienda">
    <div class="container">
      <h1>Bienvenido a nuestra Tienda en Línea</h1>
      <p>Encuentra los mejores productos para ti</p>
    </div>
  </div>
  <!-- Sección de Banner -->
  <section class="banner">
    <div class="container">
      <div class="row">
        <div class="col-md-4">
          <img src="banner/banner1.jpg" alt="Imagen 1">
        </div>
        <div class="col-md-4">
          <img src="banner/banner2.jpg" alt="Imagen 2">
        </div>
        <div class="col-md-4">
          <img src="banner/banner3.jpg" alt="Imagen 3">
        </div>
      </div>
    </div>
  </section>
  <!-- Enlaces a los archivos CSS de Bootstrap -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

  <style>
    /* Estilos personalizados para el menú */
    .menu-section {
      text-align: center;
      font-size: xxx-large;
      /* Tamaño de fuente del menú */
      background-color: #256d7b;
      /* Color de fondo del menú */
      padding: 10px 0;
      /* Espacio interno del menú */

    }

    .menu-section .navbar-nav .nav-link {

      color: #800000;
      /* Color del texto del menú */
    }

    .menu-section .navbar-nav .nav-link:hover {
      color: #fff;
      /* Color del texto del menú al pasar el mouse */
    }

    .titulo-tienda {
      text-align: center;
      padding: 20px 0;
      background-color: #808080;
      color: #333;
    }

    .titulo-tienda h1 {
      font-size: 36px;
      font-weight: bold;
      margin-bottom: 20px;
    }

    .titulo-tienda p {
      font-size: 18px;
    }

    /* Estilos personalizados para la sección del banner */
    .banner {
      background-image: url('banner/banner.jpg');
      background-size: cover;
      background-position: center;
      height: 400px;
      display: flex;
      align-items: center;
      justify-content: center;
      color: white;
      text-align: center;
    }

    .banner h1 {
      font-size: 40px;
      font-weight: bold;
      margin-bottom: 20px;
    }

    .banner p {
      font-size: 18px;
      margin-bottom: 20px;
    }

    /* Estilos personalizados para la sección de video */
    .video {
      max-width: 600px;
      /* Ajusta el ancho máximo del video */
      margin: 0 auto;
      /* Centra el video horizontalmente */
    }

    .video video {
      width: 100%;
      /* Ajusta el ancho del video al 100% del contenedor */
      height: auto;
      /* Ajusta la altura automáticamente según la relación de aspecto */
    }
  </style>
  </head>

  <body>

    <!-- Sección de Banner -->
    <section class="banner">
      <div class="container">
        <h1>Bienvenido a la Tienda en Línea</h1>
        <p>Encuentra los mejores productos para ti</p>
      </div>
    </section>
    <!-- Sección de Video -->
    <section class="video">
      <div class="container">
        <div class="embed-responsive embed-responsive-16by9">
          <video class="embed-responsive-item" controls>
            <source src="video.mp4" type="video/mp4">
            Tu navegador no admite el elemento de video.
          </video>
        </div>
      </div>
    </section>

    <!-- Sección de Audio -->

    <section class="audio">
      <div class="container text-center">
        <h2>Audio de muestra</h2>
        <audio controls>
          <source src="moksbikes.mp3" type="audio/mp3">
          Tu navegador no soporta el elemento de audio.
        </audio>
      </div>
    </section>
    <!-- Enlaces a los archivos JavaScript de Bootstrap (jQuery y Bootstrap) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <footer class="footer">


      <div class="container text-center">

        <img src="logo/logo2.png">



        <p>&copy; 2023 Tienda en Línea. Todos los derechos reservados.</p>


      </div>


    </footer>

  </body>

</html>
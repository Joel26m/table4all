<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/css/app.scss', 'resources/js/app.js'])
    <script src='https://api.mapbox.com/mapbox-gl-js/v2.9.1/mapbox-gl.js'></script>
    <link href='https://api.mapbox.com/mapbox-gl-js/v2.9.1/mapbox-gl.css' rel='stylesheet' />
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
  />
</head>
<body>

<nav class="animate__animated animate__fadeInDown navbar navbar-expand-lg bg-primary">
  <div class="container-fluid">
    <a class="logo navbar-brand" href="#"></a>
    <!-- Botón para abrir el offcanvas -->
    <!-- Contenido de la barra de navegación -->
    <div class="desplegable collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav ml-auto">
    </div>
    <button class="custom-toggler bg-primary navbar-toggler d-block" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
      <span class="bg-primary navbar-toggler-icon custom-white"></span>
    </button>
  </div>
  
</nav>

<!-- Offcanvas -->
<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Navbar</h5>
    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">
    <!-- Contenido del navbar -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="#">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Features</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Pricing</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          Dropdown link
        </a>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="#">Action</a></li>
          <li><a class="dropdown-item" href="#">Another action</a></li>
          <li><a class="dropdown-item" href="#">Something else here</a></li>
        </ul>
      </li>
    </ul>
  </div>
</div>
<div id='map'></div>

<div class="animate__animated animate__bounceInUp submenu container fixed-bottom mb-3">
    <div class="row justify-content-center">
        <button id="prov" class=" subop col bg-white p-3" ">
            <div class="logoprov"></div> <!-- Div que contiene la imagen de los proveedores -->
            <div class="text-center">
                <p class="subtext">Proveedores</p>
            </div>
        </button>
        <button id="bene" class="subop col bg-white p-3" >
            <div class="logobene"></div> <!-- Div que contiene la imagen de los beneficiarios -->
            <div class="text-center">
                <p class="subtext">Beneficiarios</p>
            </div>
        </button>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<!-- Mapbox JS -->

</body>
</html>

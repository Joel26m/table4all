<template>
<nav class="animate__animated animate__fadeInDown navbar navbar-expand-lg bg-primary">
  <div class="container-fluid">
    <a class="logo navbar-brand" href="#"></a>
    <!-- Botón para abrir el offcanvas -->
    <!-- Contenido de la barra de navegación -->
    <div class="desplegable collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav ml-auto"></ul>
    </div>
    <button class="custom-toggler bg-primary navbar-toggler d-block" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
      <span class="bg-primary navbar-toggler-icon custom-white"></span>
    </button>
  </div>
  
</nav>
<div class="animate__animated animate__fadeInDown content-wrapper" id="content-wrapper">

<div class="sticky-div">
            <p id="direcciongo"></p>
            <button id="complete" class="full-width-button">COMPLETAR</button>
        </div>
    </div>


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
</template>

<script>




export default {
  data() {
   return {
 
   

    };
  },
  methods: {
 
  },
 
   mounted() {


   }
  }
</script>
<style>
.navcont{
    color: rgb(255, 255, 255);
    height: 34px;
    z-index: 11111;
    font-size: 22px;
}
.navbar{
  top: 0;
  z-index: 111;
  height: 80px;
  border-bottom-left-radius: 15px;
  border-bottom-right-radius: 15px;
}

.offcanvas-body{
  background-color: #FF691F;
  color: rgb(255, 255, 255);
  z-index: 1111111;
}
          
.custom-toggler.navbar-toggler {
  border-color: rgba(255, 255, 255, 0);
  float: right;
}
/* Setting the stroke to green using rgb values (0, 128, 0) */

.custom-toggler .navbar-toggler-icon {
  background-image: url("user.svg");
  width: 60px;
  height: 60px;
}

.custom-toggler.navbar-toggler:focus,
.custom-toggler.navbar-toggler:active,
.custom-toggler.navbar-toggler:focus-visible {
  outline: none;
  box-shadow: none;
  border-color: transparent;
}

.desplegable{
    color: rgb(255, 255, 255);
    background-color: #FF691F;
    padding: 20px;
    border-radius: 20px;
    width: 100%;
    border-color: rgb(255, 255, 255);
}

.btn{
color: rgb(255, 255, 255);
}


.logo {
  width: 60px;
  height: 52px;
  background-image: url("logo.png");
  background-size: cover;
  cursor: pointer;
  margin-left: 10px;
}

/* Media query para dispositivos móviles */
@media (max-width: 768px) {
  .logo {
    width: 53px;
    height: 50px;
    /* Ajusta el tamaño del logo para dispositivos móviles */
  }
}


.custom-white {
  color: white; /* Cambia "white" al color deseado */
}
</style> 
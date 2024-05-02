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

  <div class="sticky-div" v-if="ruta">
  <div class="row contsticky">
    <div class="col">
      <p id="direcciongo">{{ direccion }}</p>
    </div>
    <div class="col">
      <button id="complete" class="full-width-button" @click="completar">COMPLETAR</button>
    </div>
  </div>
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
        <div  @click="cambiarRuta()">
          <a  class="nav-link active" aria-current="page" cursor="pointer">Logout</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Features</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Pricing</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          Dropdown Link
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
      ruta: true,
    };
  },
  methods: {
    cambiarRuta(){

      const protocol = window.location.protocol;
      const host = window.location.host;
      const pathname = '/logout';
      const logoutUrl = `${protocol}//${host}/table4all/public${pathname}${window.location.hash}`;

      window.location.href = logoutUrl;
    },
    completar() {
      const completeBtn = document.getElementById('complete');
      if (completeBtn.innerText === 'Añadir estado') {
        $('#exampleModal').modal('show');
      } else {
        if (confirm('¿Estás seguro de completar?')) {
          completeBtn.innerText = 'Añadir estado';
          completeBtn.style.backgroundColor = '#FF691F';
          completeBtn.style.width = '335px';
          completeBtn.style.marginLeft = '60px';
          completeBtn.style.marginRight = '80px';
          completeBtn.style.transition = 'background-color 0.5s, width 0.5s, margin 0.5s';
          document.getElementById('direcciongo').style.display = 'none';
        }
      }
    }
  },

  created(){

   
  },

  mounted() {

  }
}

</script>
<style>

#direcciongo{
z-index: 11111;
color: #fff;
}
.contsticky{
  margin-top: 90px;
}
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
  z-index: 1111;

}
/* Setting the stroke to green using rgb values (0, 128, 0) */

.custom-toggler .navbar-toggler-icon {
  background-image: url("user.svg");
  width: 60px;
  height: 60px;
  z-index: 11111;
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
    z-index: 1111;
}

.btn{
color: rgb(255, 255, 255);
}


.logo {
  width: 60px;
  height: 52px;
  background-image: url("logo.svg");
  background-size: cover;
  cursor: pointer;
  margin-left: 10px;
  z-index: 1111;
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


.sticky-div {
  
  height: 170px;
  position: sticky;
  top: 0;
  background-color: #001d38;
  padding: 10px;
  border-bottom-left-radius: 10px;
  border-bottom-right-radius: 10px;
}

.full-width-button {
  
  float: right;
  padding: 10px;
  background-color: #3d89e2;
  color: #fff;
  border-radius: 20px;
  cursor: pointer;
  border-color: #fff;
  border: solid;
}
</style> 
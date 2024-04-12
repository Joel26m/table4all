<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
     bitiby
    </title>
    @vite(['resources/css/app.css', 'resources/css/app.scss', 'resources/js/app.js'])

        <script src='https://api.mapbox.com/mapbox-gl-js/v2.9.1/mapbox-gl.js'></script>
    <link href='https://api.mapbox.com/mapbox-gl-js/v2.9.1/mapbox-gl.css' rel='stylesheet' />
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
  />
</head>
<body>



<div id="nav"></div>
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


<div class="modal animate__animated animate__fadeInTopLeft" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modificar Estado</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="estadoForm">
                        <div class="form-group">
                            <label for="nuevoEstado">Nuevo estado:</label>
                            <input type="text" class="form-control" id="nuevoEstado" placeholder="Ingrese el nuevo estado">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Salir</button>
                    <button type="button" class="btn btn-primary" id="guardarEstado">Guardar</button>
                </div>
            </div>
        </div>
    </div>

<!-- Modal para confirmar si se desea iniciar la ruta -->
<div class="modal animate__animated animate__fadeInTopLeft" id="confirmarModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">¿Deseas iniciar la ruta? </h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <p>Al iniciar la ruta se aplicarán los estilos necesarios.</p>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal" id="iniciarRutaBtn">Aceptar</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Reservar Menú</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Local: <span id="localNameModal"></span></p>
        <p>Cantidad de menús disponibles: <span id="cantidadMenusModal"></span></p>
        <div class="form-group">
          <label for="cantidadReserva">Cantidad a reservar:</label>
          <input type="number" class="form-control" id="cantidadReserva" min="1">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" id="salirreservar" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" id="reservarButton">Reservar</button>
      </div>
    </div>
  </div>
</div>



<!-- Bootstrap JS -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>




</body>
</html>

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
    <script src="{{ asset('../resources/js/loader.js') }}"></script>
    <link href="{{ asset('../resources/css/loader.css') }}" rel="stylesheet"> 
</head>

<body>
<div id="nav"></div> <!-- es un compoenente -->
<div id="loader-wrapper">
  <div class="container-fluid" id="logo-loader">
      <a href="#" style="text-decoration: none">
          <svg width="120" height="120" class="logo" viewBox="0 0 555 534" fill="none" xmlns="http://www.w3.org/2000/svg" >
              <path d="M433.129 23.3836C415.895 27.1189 402.569 38.4584 396.459 54.6242C394.222 60.6503 393.591 72.2884 395.16 78.5985C401.809 104.638 430.004 120.95 456.872 114.234C465.212 112.118 471.108 109.092 477.902 103.312C498.191 86.1248 499.493 57.4818 480.782 37.8705C471.664 28.2723 460.385 23.3037 446.128 22.6871C441.157 22.4178 436.323 22.7007 433.129 23.3836Z" fill="white"/>
              <path d="M268.706 23.3546C251.471 27.0899 238.145 38.4293 232.035 54.5951C229.798 60.6213 229.168 72.2593 230.737 78.5695C237.385 104.608 265.581 120.921 292.448 114.205C300.788 112.089 306.685 109.063 313.478 103.283C333.768 86.0958 335.07 57.4527 316.358 37.8414C307.241 28.2432 295.961 23.2746 281.704 22.658C276.734 22.3888 271.9 22.6716 268.706 23.3546Z" fill="white"/>
              <path d="M104.282 23.3246C87.0474 27.06 73.7215 38.3994 67.6116 54.5652C65.3742 60.5914 64.7438 72.2294 66.3129 78.5396C72.9615 104.579 101.157 120.891 128.024 114.175C136.364 112.059 142.261 109.033 149.054 103.253C169.344 86.0659 170.646 57.4228 151.934 37.8115C142.817 28.2133 131.537 23.2447 117.28 22.6281C112.31 22.3589 107.476 22.6417 104.282 23.3246Z" fill="white"/>
              <path d="M104.282 23.3246C87.0474 27.06 73.7215 38.3994 67.6116 54.5652C65.3742 60.5914 64.7438 72.2294 66.3129 78.5396C72.9615 104.579 101.157 120.891 128.024 114.175C136.364 112.059 142.261 109.033 149.054 103.253C169.344 86.0659 170.646 57.4228 151.934 37.8115C142.817 28.2133 131.537 23.2447 117.28 22.6281C112.31 22.3589 107.476 22.6417 104.282 23.3246Z" fill="white"/>
              <path d="M57.6547 166.769L57.6673 166.768L57.6799 166.767C57.7701 166.759 58.2577 166.75 59.01 166.737C59.801 166.723 60.9556 166.705 62.4547 166.682C65.4531 166.636 69.8318 166.572 75.4407 166.492C86.6586 166.332 102.799 166.107 122.662 165.833C162.388 165.285 217.006 164.541 276.925 163.725C334.826 162.936 387.728 162.223 426.992 161.694L431.047 161.639C450.866 161.372 466.954 161.156 478.113 161.004C483.693 160.928 488.041 160.868 491.007 160.827C492.49 160.806 493.627 160.79 494.401 160.779C494.965 160.77 495.314 160.765 495.469 160.762C495.534 160.761 495.565 160.761 495.564 160.761L495.586 160.759L495.608 160.759C495.811 160.756 495.962 160.814 496.02 160.838C496.093 160.868 496.148 160.901 496.181 160.922C496.247 160.963 496.3 161.005 496.331 161.032C496.399 161.088 496.468 161.153 496.53 161.215C496.659 161.344 496.827 161.522 497.025 161.739C497.423 162.177 497.981 162.812 498.671 163.612C500.053 165.215 501.986 167.504 504.284 170.249C508.881 175.741 514.946 183.075 520.998 190.445C527.051 197.814 533.092 205.221 537.64 210.859C539.914 213.678 541.817 216.057 543.162 217.768C543.834 218.624 544.37 219.317 544.745 219.817C544.932 220.066 545.084 220.275 545.195 220.435C545.25 220.514 545.301 220.591 545.343 220.661L545.346 220.666C545.369 220.702 545.449 220.833 545.496 220.99C545.499 220.998 545.501 221.007 545.504 221.016L545.5 221.018C545.532 221.314 545.443 221.703 545.387 221.805C545.355 221.854 545.3 221.925 545.277 221.951C545.239 221.993 545.204 222.024 545.193 222.034C545.18 222.046 545.167 222.057 545.155 222.067C545.14 222.08 545.125 222.091 545.115 222.1C545.073 222.133 545.018 222.174 544.956 222.22C544.83 222.313 544.646 222.447 544.408 222.618C543.93 222.962 543.219 223.466 542.29 224.123C540.431 225.436 537.689 227.363 534.159 229.836C527.099 234.783 516.884 241.918 504.278 250.709C479.064 268.291 444.279 292.5 406.018 319.085L405.447 318.264L406.018 319.085L267.779 415.108L269.249 416.914L269.257 416.924C270.402 418.368 280.299 430.64 291.255 444.164L291.256 444.166C296.708 450.927 301.658 457.117 305.238 461.643C307.027 463.905 308.476 465.753 309.475 467.05C309.974 467.697 310.364 468.212 310.63 468.574C310.761 468.753 310.869 468.905 310.946 469.02C310.982 469.075 311.024 469.139 311.059 469.201C311.074 469.229 311.104 469.284 311.131 469.351C311.144 469.384 311.168 469.448 311.185 469.53C311.196 469.583 311.239 469.796 311.155 470.051L311.133 470.119L311.101 470.184C311.027 470.332 310.93 470.431 310.921 470.44C310.905 470.457 310.89 470.472 310.876 470.485C310.862 470.5 310.848 470.512 310.837 470.522C310.813 470.544 310.786 470.567 310.759 470.589C310.739 470.606 310.719 470.623 310.699 470.639C310.603 470.717 310.473 470.817 310.317 470.934C310.002 471.171 309.551 471.501 308.982 471.912C307.841 472.735 306.209 473.896 304.207 475.308C300.203 478.133 294.711 481.973 288.695 486.155C282.149 490.73 276.14 494.917 271.937 497.844C268.43 500.288 266.181 501.855 265.927 502.04C265.765 502.163 265.558 502.267 265.306 502.307C265.053 502.347 264.817 502.312 264.614 502.247C264.24 502.128 263.884 501.876 263.541 501.587C262.836 500.991 261.809 499.897 260.235 498.074C257.065 494.401 251.498 487.558 241.5 475.209L241.5 475.208C235.424 467.697 229.872 460.872 225.819 455.93C223.792 453.459 222.142 451.461 220.99 450.084C220.47 449.463 220.054 448.972 219.752 448.622C219.669 448.679 219.578 448.741 219.481 448.808C218.849 449.243 217.922 449.883 216.733 450.705C214.355 452.349 210.928 454.722 206.707 457.648C198.266 463.5 186.65 471.564 173.896 480.433C161.168 489.305 149.509 497.393 140.984 503.273C136.722 506.213 133.242 508.601 130.803 510.261C129.584 511.09 128.623 511.739 127.953 512.184C127.619 512.406 127.353 512.58 127.163 512.701C127.068 512.761 126.985 512.812 126.918 512.852C126.886 512.871 126.847 512.893 126.808 512.913C126.789 512.922 126.761 512.937 126.727 512.951L126.726 512.952C126.711 512.958 126.666 512.978 126.604 512.996C126.276 513.096 126.007 512.997 125.945 512.974C125.838 512.934 125.756 512.884 125.714 512.857C125.623 512.798 125.541 512.731 125.482 512.679C125.356 512.568 125.204 512.418 125.037 512.246C124.699 511.896 124.234 511.385 123.669 510.744C122.534 509.459 120.956 507.614 119.089 505.396C115.353 500.958 110.441 495.007 105.55 489.012C100.66 483.017 95.789 476.975 92.1366 472.356C90.3111 470.047 88.7863 468.089 87.7148 466.668C87.1801 465.959 86.752 465.375 86.4542 464.945C86.3066 464.732 86.1818 464.544 86.0902 464.39C86.0452 464.315 85.9983 464.232 85.9592 464.149L85.9567 464.144C85.936 464.1 85.854 463.929 85.8368 463.713C85.8161 463.453 85.9018 463.26 85.9311 463.197C85.9702 463.114 86.0129 463.051 86.0377 463.017C86.0884 462.947 86.141 462.891 86.1736 462.857C86.2439 462.785 86.3293 462.708 86.4143 462.635C86.5897 462.484 86.8387 462.284 87.1488 462.043C87.7727 461.557 88.6876 460.871 89.858 460.01C92.201 458.285 95.5915 455.84 99.7804 452.852C108.159 446.875 119.744 438.72 132.556 429.803C145.281 420.933 156.86 412.782 165.251 406.806C169.448 403.817 172.845 401.374 175.189 399.658C176.362 398.799 177.266 398.126 177.874 397.659C177.943 397.605 178.008 397.555 178.069 397.508C177.799 397.156 177.428 396.68 176.961 396.084C175.873 394.697 174.267 392.673 172.2 390.08C168.067 384.894 162.091 377.442 154.717 368.275C139.969 349.941 119.628 324.753 97.2441 297.139L98.0209 296.509L97.244 297.139C74.8845 269.549 54.5526 244.422 39.8183 226.168C32.4513 217.041 26.4832 209.631 22.3605 204.491C20.2994 201.921 18.6985 199.917 17.6144 198.549C17.0727 197.866 16.658 197.338 16.3788 196.977C16.2399 196.798 16.1306 196.654 16.0549 196.552C16.0183 196.502 15.9824 196.452 15.9532 196.409C15.9405 196.39 15.917 196.355 15.8936 196.313C15.8836 196.296 15.858 196.25 15.8334 196.189C15.8206 196.156 15.7938 196.072 15.7811 196.019C15.771 195.959 15.7691 195.823 15.7805 195.689L15.7663 195.687C15.7921 195.476 15.8785 195.325 15.9088 195.274C15.9497 195.205 15.9919 195.151 16.0203 195.117C16.0777 195.047 16.1404 194.984 16.1915 194.935C16.2976 194.834 16.4354 194.717 16.5902 194.59C16.9042 194.334 17.3507 193.992 17.903 193.581C19.0109 192.756 20.5833 191.626 22.4637 190.296C26.2264 187.637 31.2434 184.165 36.2921 180.715C41.3409 177.265 46.4255 173.835 50.3235 171.257C52.2717 169.969 53.9281 168.89 55.1371 168.128C55.7403 167.748 56.24 167.442 56.6121 167.226C56.7967 167.119 56.9612 167.028 57.0966 166.96C57.1637 166.926 57.2358 166.892 57.3069 166.863C57.3529 166.844 57.4897 166.788 57.6547 166.769ZM336.324 291.728C386.447 257.003 437.257 221.727 447.94 214.173C447.923 214.173 447.902 214.173 447.876 214.173C447.815 214.173 447.733 214.173 447.629 214.174C447.422 214.176 447.137 214.18 446.774 214.185C446.049 214.196 445.022 214.215 443.711 214.24C441.091 214.291 437.344 214.369 432.631 214.47C423.205 214.673 409.917 214.971 394.061 215.332C362.348 216.055 320.359 217.032 278.432 218.021C236.504 219.01 194.638 220.01 163.169 220.777C147.435 221.161 134.301 221.486 125.058 221.722C120.436 221.84 116.788 221.936 114.275 222.006C113.415 222.03 112.689 222.051 112.102 222.068C112.136 222.114 112.171 222.162 112.207 222.21C113.007 223.281 114.216 224.854 115.78 226.859C118.906 230.867 123.434 236.586 128.904 243.446C139.844 257.166 154.545 275.442 169.317 293.712C184.089 311.982 198.93 330.245 210.152 343.936C215.763 350.783 220.467 356.484 223.804 360.472C225.474 362.466 226.797 364.028 227.721 365.089C228.092 365.515 228.394 365.855 228.625 366.108C229.042 365.83 229.649 365.419 230.436 364.883C232.033 363.796 234.362 362.2 237.32 360.167C243.237 356.101 251.668 350.287 261.795 343.294C282.049 329.307 309.08 310.602 336.324 291.728Z" fill="white" stroke="white" stroke-width="2"/>
          </svg>  
      </a>
  </div>
</div>

<div class="interactivo">
<div class="container-wrapper-genially" style="position: fixed; top: 0; left: 0; width: 100%; height: 100%; z-index: 0;">
<button id="btnDesaparecer" class="btn btn-primary ">¡Ya sé usar Bitiby!</button>
   
<video class="loader-genially" autoplay loop playsinline muted style=" top: 50%; left: 50%; transform: translate(-50%, -50%); width: 80px; height: 80px;">
        <source src="https://static.genial.ly/resources/loader-default.mp4" type="video/mp4" />
        Your browser does not support the video tag.
    </video>
    <div id="662281eb57c6e800147b41d7" class="genially-embed" style="margin: 0 auto; position: relative; width: 100%; height: 100%;"></div>

</div>

</div>


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
            <input type="hidden" id="proveedorId">
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
                        <input type="hidden" id="beneficiaryId" value="">
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
                    <button type="button" class="btn btn-primary" id="guardarEstado" data-id="id_beneficiario">Guardar</button>
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
                <h4 class="modal-title">¿Deseas iniciar la ruta?</h4>
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
    <input type="hidden" id="proveedorId">
    <input type="hidden" id="quantityReserve">
    <input type="hidden"id="localName">
    <input type="hidden"id="rider">

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

<!-- Chatbot botpress -->
<script src="https://cdn.botpress.cloud/webchat/v1/inject.js"></script>
<script src="https://mediafiles.botpress.cloud/66cd75cd-b9b4-4ea4-86b1-4f1bba368d3a/webchat/config.js" defer></script>

<!-- Bootstrap JS -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


</body>
</html>


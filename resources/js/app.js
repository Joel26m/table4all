import './bootstrap';
import * as bootstrap from 'bootstrap';
import {createApp} from 'vue'
import nav from './components/nav.vue'

createApp(nav).mount('#nav')

function setCookie(name, value, days) {
    var expires = "";
    if (days) {
        var date = new Date();
        date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
        expires = "; expires=" + date.toUTCString();
    }
    document.cookie = name + "=" + (value || "") + expires + "; path=/";
  }

  function getCookie(name) {
    var nameEQ = name + "=";
    var ca = document.cookie.split(';');
    for (var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') c = c.substring(1, c.length);
        if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
    }
    return null;
  }
  var btnDesaparecer = document.getElementById("btnDesaparecer");
  var divGenially = document.querySelector(".container-wrapper-genially")
  function esPantallaDeEscritorio() {
    return window   .matchMedia("(min-width: 768px)").matches;
  }
  
  // Ocultar elementos si no es una pantalla de escritorio
  if (esPantallaDeEscritorio()) {
    divGenially.style.display = "none";
    btnDesaparecer.style.display = "none";
  }

  document.addEventListener("DOMContentLoaded", function() {
    var btnDesaparecer = document.getElementById("btnDesaparecer");
    btnDesaparecer.addEventListener("click", function() {
      var divGenially = document.querySelector(".container-wrapper-genially");
      divGenially.style.display = "none";
      btnDesaparecer.style.display = "none"; 
      setCookie("visited", "true", 30); 
    });

    var visited = getCookie("visited");
    if (visited) {
      var divGenially = document.querySelector(".container-wrapper-genially");
      var btnDesaparecer = document.getElementById("btnDesaparecer");
      divGenially.style.display = "none";
      btnDesaparecer.style.display = "none"; // Oculta el botón si se ha visitado antes
    }
  });
(function(d) {
    var js, id = "genially-embed-js",
        ref = d.getElementsByTagName("script")[0];
    if (d.getElementById(id)) {
        return;
    }
    js = d.createElement("script");
    js.id = id;
    js.async = true;
    js.onload = function() {
        var iframe = document.getElementById("662281eb57c6e800147b41d7").querySelector("iframe");
        if (iframe) {
            iframe.setAttribute("allowfullscreen", "true");
            var genially = GeniallyIframePlayer.getGenially(iframe);
            genially.on("ready", function() {
                genially.fullscreen();
            });
        }
    };
    js.src = "https://view.genial.ly/static/embed/embed.js";
    ref.parentNode.insertBefore(js, ref);
}(document));


//Manejar datos proveedores


  let proveedores = []; 

  axios.get('http://localhost/M12/Proyecto2/table4all/public/api/user')
  .then(function (response) {
    proveedores = response.data; // Guarda los proveedores en el array
    console.log(proveedores);
  })
  .catch(function (error) {
    console.error('Error al obtener los proveedores:', error);
  });


  function obtenerProveedorPorId(id) {
    const proveedor = proveedores.find(prov => prov.id === id);
    return proveedor;
  }
    
  let proveedor = obtenerProveedorPorId(1);
  console.log(proveedor);

let primerClicBene = true;
let primerClicProv = true;
obtenerUbicacion();


function toggleBeneficiarios() {
    primerClicProv = true; 

    let proveedores = document.querySelectorAll('.proveedor-marker');
    let beneficiarios = document.querySelectorAll('.beneciciary-marker');

    if (primerClicBene) {
        proveedores.forEach(function(proveedor) {
            proveedor.style.display = 'none';
            botonprov.classList.remove('active');

        });

        beneficiarios.forEach(function(beneficiario) {
            beneficiario.style.display = 'block';
            botonbene.classList.toggle('active');
            botonprov.classList.remove('active');
            
        });

        primerClicBene = false; 
    } else {
        let marcadores = document.querySelectorAll('.proveedor-marker, .beneciciary-marker');
        marcadores.forEach(function(marcador) {
            marcador.style.display = 'block';
            botonbene.classList.remove('active');
        });

        primerClicBene = true; 
    }
}

function toggleProveedores() {
    let beneficiarios = document.querySelectorAll('.beneciciary-marker');
    let proveedores = document.querySelectorAll('.proveedor-marker');
    primerClicBene = true; 

    if (primerClicProv) {
        proveedores.forEach(function(proveedor) {
            proveedor.style.display = 'block';
            botonprov.classList.toggle('active');
            botonbene.classList.remove('active');

        });

        beneficiarios.forEach(function(beneficiario) {
            beneficiario.style.display = 'none';
            
        });

        primerClicProv = false; 
    } else {
        let marcadores = document.querySelectorAll('.proveedor-marker, .beneciciary-marker');
        marcadores.forEach(function(marcador) {
            marcador.style.display = 'block';
            botonprov.classList.remove('active');

        });

        primerClicProv = true; 
    }
}



let botonbene = document.getElementById('bene');
botonbene.addEventListener("click", toggleBeneficiarios);

let botonprov = document.getElementById('prov');
botonprov.addEventListener("click", toggleProveedores);


mapboxgl.accessToken = 'pk.eyJ1IjoidmVudHUwMCIsImEiOiJjbHN3MzY5cTkwbWU4MmttdHg2NnhvaDV2In0.4i_tTPy63h2OHahnuJsQpw';
const map = new mapboxgl.Map({
  container: 'map',
  style: 'mapbox://styles/ventu00/clsw58v7j007301qjfa3of8ut',
  center: [2.172850, 41.389280],
  zoom: 10.7
});


let clickEnabled = true;


document.addEventListener('DOMContentLoaded', function() {

let destinationCoordinates; // Variable para almacenar las coordenadas del destino

let currentPopup = null; // Variable para almacenar el popup actualmente abierto
let clickEnabled = true; 
let beneficiaryMarker;

map.on('click', (event) => {



    const lngLat = event.lngLat;
    destinationCoordinates = [lngLat.lng, lngLat.lat];
   
    if (!clickEnabled) {
        return;
    }
    
    if (!lngLat) {
        console.log("Event object does not have latlng properties.");
        return;
    }

    const latitude = lngLat.lat;
    const longitude = lngLat.lng;

    const features = map.queryRenderedFeatures(event.point);
    if (!features.length) {
        if (currentPopup) {
            currentPopup.remove();
        }

        
        const popup = new mapboxgl.Popup({ offset: [0, -15], className: 'popup-custom' })
        .setLngLat(lngLat)
            .setHTML('<h3><div class="add-container">' +
                '<h1>¿Deseas añadir un Beneficiario?</h1>' +
                '<form id="ubicacionForm" action="#">' +
                '<button type="submit" class="btn btn-primary add" id="aceptarBtn">Añadir</button>' +
                '<button type="button" class="btn btn-secondary add" id="cancelarBtn">Salir</button>' +
                '</form>' +
                '</h3>')
            .addTo(map);

            
            document.getElementById('aceptarBtn').addEventListener('click', function(event) {
                event.preventDefault();
            
                 beneficiaryMarker = new mapboxgl.Marker({ element: createCustomMarkerb(), className: 'beneficiary-marker' })
                    .setLngLat([longitude, latitude])
                    .setPopup(new mapboxgl.Popup().setHTML(`
                    <h2>Beneficiario</h2>
                    <h6>Información/Estado:</h6>
                    <div id="beneficiary-state">No se ha añadido ningún estado</div>
                    <br>
                    <div class="button-container">
                      <button type="button" class="btn-primary-modifyButton" id="modifyButton" data-toggle="modal" data-target="#exampleModal">
                      <div class="image"></div>
                      </button>
                      <button type="button" class="btn-with-image" id="takeFoodButton" data-toggle="modal" data-target="#confirmarModal">
                        <div class="image"></div>
                      </button>
                      </button>
                    </div>                    
                      
                    `))
                    .addTo(map);
           
                event.preventDefault();
           

          


            // Agregar evento de clic al botón "Aceptar" del modal
            document.getElementById('iniciarRutaBtn').addEventListener('click', function(event) {
                event.preventDefault();
                document.querySelector(".content-wrapper").style.display = "block";    
                console.log("Iniciando ruta...");
                crearRuta(usuarioCoordinates, destinationCoordinates);
            
                // Obtener la dirección del lugar al que se va
                obtenerDireccion(destinationCoordinates);
                clickEnabled = false;
                document.querySelectorAll('.button-container').forEach(container => {
                    container.classList.add('disabled');
                });
                $('#confirmarModal').modal('hide');
            });
            
function disableMarkerButtons(marker) {
    const popupContent = marker.getPopup().getContent();
    const popupElement = document.createElement('div');
    popupElement.innerHTML = popupContent;

    // Desactiva los botones en el contenido del popup
    const buttonContainer = popupElement.querySelector('.button-container');
    if (buttonContainer) {
        buttonContainer.classList.add('disabled');
    }

    // Actualiza el contenido del popup con los botones desactivados
    marker.getPopup().setContent(popupElement.innerHTML);
}

// Desactivar los botones en todos los markers con la clase 'beneficiary-marker'
document.querySelectorAll('.beneficiary-marker').forEach(markerElement => {
    const marker = markerElement._marker; 
    disableMarkerButtons(marker);
});



            function obtenerDireccion(coordinates) {
                const latitude = coordinates[1];    
                const longitude = coordinates[0];    
            
                fetch(`https://api.mapbox.com/geocoding/v5/mapbox.places/${longitude},${latitude}.json?access_token=pk.eyJ1IjoidmVudHUwMCIsImEiOiJjbHN3MzY5cTkwbWU4MmttdHg2NnhvaDV2In0.4i_tTPy63h2OHahnuJsQpw`)
                    .then(response => response.json())
                    .then(data => {
                        const place = data.features[0];
                        const address = place.place_name;
                        document.getElementById('direcciongo').textContent = address;
                    })
                    .catch(error => {
                        console.error('Error al obtener la dirección:', error);
                    });
            }
            


                document.getElementById('guardarEstado').addEventListener('click', function(event) {
                    event.preventDefault();
                    const nuevoEstado = document.getElementById('nuevoEstado').value;
                    document.getElementById('beneficiary-state').innerText = nuevoEstado;
                    $('#exampleModal').modal('hide');
                    document.querySelector('.sticky-div').style.display = 'none';
                });
            
                popup.remove();
            });
            

            
            document.getElementById('complete').addEventListener('click', function(event) {
                event.preventDefault();
                console.log("Iniciando ruta...");
                map.removeLayer('ruta');
        
                clickEnabled = false;
        
                $('#confirmarModal').modal('hide');
            });
    }
});





    
});





  
let proveedorMarker = new mapboxgl.Marker({ element: createCustomMarker() })
  .setLngLat([2.1734, 41.3851])
  .setPopup(new mapboxgl.Popup().setHTML(`
  <div class="<!-- proveedor-title -->" id="proveedor-popup"> <!-- Agregamos un ID único -->
    <h3>Proveedor</h3>
  </div>    
  <div class="<!--sticky-div-prov -->">
    <p id="localName"> nombre </p>
  </div>
 
  <button class="btn btn-primary d-block mx-auto mb-2" id="verButton">Ver</button>
`))




  
  .addTo(map);

  
const markerElement = proveedorMarker.getElement();
markerElement.classList.add('proveedor-marker');

function createCustomMarker() {
  const el = document.createElement('div');
  el.className = 'proveedor-marker';
  return el;
}



$(document).on('click', '#verButton', function(event) {
    event.preventDefault();

    const localName = "Nombre del local";
  
    $('#localNameModal').text(localName);
    $('#cantidadMenusModal').text(cantidadMenus);
  
    // Mostrar el modal
    $('#exampleModal2').modal('show');
});

$('#reservarButton').on('click', function() {
    
    $('#exampleModal2').modal('hide');
});
$('#salirreservar').on('click', function() {
    
    $('#exampleModal2').modal('hide');
});







let beneficiaryMarker = new mapboxgl.Marker({ element: createCustomMarkerb() })
  .setLngLat([2.0330500, 41.4922600])
  .setPopup(new mapboxgl.Popup().setHTML("<h3>Beneficiario</h3>"))
  .addTo(map);

const markerElementb = beneficiaryMarker.getElement();
markerElementb.classList.add('beneciciary-marker');

function createCustomMarkerb() {
  const el = document.createElement('div');
  el.className = 'beneciciary-marker';
  return el;
}



function obtenerUbicacion() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(mostrarUbicacion, errorUbicacion);
    } else {
        console.error("La geolocalización no está soportada por este navegador.");
    }
}

let usuarioCoordinates; // Variable global para almacenar las coordenadas del usuario

function mostrarUbicacion(position) {
    const latitude = position.coords.latitude;
    const longitude = position.coords.longitude;

    // Asignar las coordenadas del usuario a la variable global
    usuarioCoordinates = [longitude, latitude];

    // Crear un marcador circular en la ubicación actual del usuario
    const userMarker = new mapboxgl.Marker({
        element: createCustomUserMarker(),
        anchor: 'bottom'
    })
        .setLngLat(usuarioCoordinates)
        .addTo(map);

    map.flyTo({
        center: usuarioCoordinates,
        zoom: 15
    });
}


function createCustomUserMarker() {
    const el = document.createElement('div');
    el.className = 'user-marker';
    return el;
}


function errorUbicacion(error) {
    console.error('Error al obtener la ubicación del usuario:', error);
}




function crearRuta(origen, destino) {
    const url = `https://api.mapbox.com/directions/v5/mapbox/walking/${origen[0]},${origen[1]};${destino[0]},${destino[1]}?geometries=geojson&steps=true&access_token=${mapboxgl.accessToken}`;

    fetch(url)
        .then(response => response.json())
        .then(data => {
            const route = data.routes[0];
            const geometry = route.geometry;
            const duration = route.duration;

            // Convertir la duración a minutos
            const durationMinutes = Math.round(duration / 60);

            map.addLayer({
                'id': 'ruta',
                'type': 'line',
                'source': {
                    'type': 'geojson',
                    'data': {
                        'type': 'Feature',
                        'properties': {},
                        'geometry': geometry
                    }
                },
                'layout': {
                    'line-join': 'round',
                    'line-cap': 'round'
                },
                'paint': {
                    'line-color': '#FF691F', 
                    'line-width': 10, 
                    'line-opacity': 1, 
                    'line-blur': 10, 
                    'line-offset': 2 
                }
            });

            const popupContent = `<h3>Tiempo estimado de llegada</h3><p>${durationMinutes} minutos</p>`;

            new mapboxgl.Popup()
                .setLngLat(destino)
                .setHTML(popupContent)
                .addTo(map);
        });
}


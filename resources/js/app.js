import './bootstrap';
import * as bootstrap from 'bootstrap';
import {createApp} from 'vue'
import nav from './components/nav.vue'

createApp(nav).mount('#nav')

//Manejar datos proveedores


  let proveedores = []; // Array para almacenar los datos de los proveedores

  axios.get('http://localhost:8080/M12/table4all/public/api/provider')
  .then(response => {
    const proveedores = response.data.map(proveedor => ({
        ...proveedor,
        latitude: parseFloat(proveedor.latitude),
        longitude: parseFloat(proveedor.longitude)
    }));

    console.log(proveedores); 
})
.catch(error => {
    console.error('Error al obtener los datos de los proveedores:', error);
});





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




document.addEventListener('DOMContentLoaded', function() {

let destinationCoordinates; // Variable para almacenar las coordenadas del destino

let currentPopup = null; // Variable para almacenar el popup actualmente abierto

map.on('click', (event) => {
    const lngLat = event.lngLat;
    destinationCoordinates = [lngLat.lng, lngLat.lat];

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
            
                const beneficiaryMarker = new mapboxgl.Marker({ element: createCustomMarkerb(), className: 'beneficiary-marker' })
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
                
                // Ocultar el modal de confirmación
                $('#confirmarModal').modal('hide');
            });
            
            function obtenerDireccion(coordinates) {
                const latitude = coordinates[1]; // Latitud del lugar
                const longitude = coordinates[0]; // Longitud del lugar
            
                fetch(`https://api.mapbox.com/geocoding/v5/mapbox.places/${longitude},${latitude}.json?access_token=${accessToken}`)
                    .then(response => response.json())
                    .then(data => {
                        // La respuesta contiene una lista de lugares cercanos, la dirección del lugar se encuentra en la primera entrada
                        const place = data.features[0];
                        const address = place.place_name;
                        // Actualizar el contenido del elemento HTML con la dirección del lugar al que se va
                        document.getElementById('direcciongo').textContent = 'Dirección del lugar al que se va: ' + address;
                    })
                    .catch(error => {
                        console.error('Error al obtener la dirección:', error);
                    });
            }
            


                // Agregar evento de clic al botón de guardar fuera de DOMContentLoaded
                document.getElementById('guardarEstado').addEventListener('click', function(event) {
                    event.preventDefault();
                    const nuevoEstado = document.getElementById('nuevoEstado').value;
                    // Modificar el estado del beneficiario
                    document.getElementById('beneficiary-state').innerText = nuevoEstado;
                    // Cerrar modal
                    $('#exampleModal').modal('hide');
                });
            
                popup.remove();
            });
            

            
            document.getElementById('complete').addEventListener('click', function(event) {
                event.preventDefault();
                document.querySelector(".content-wrapper").style.display = "none";     
                           console.log("Iniciando ruta...");
                           map.removeLayer('ruta');

                // Ocultar modal
                $('#confirmarModal').modal('hide');
                
            });
    }
});
    
});


// const proveedores = [
//     { IDuser: 4, latitude: 41.3851, longitude: 2.1734, quantityMenus: 50, localName: 'Restaurante Sol' },
//     { IDuser: 5, latitude: 41.3858, longitude: 2.1735, quantityMenus: 60, localName: 'Restaurante Mar' },
//     { IDuser: 6, latitude: 41.3863, longitude: 2.1736, quantityMenus: 70, localName: 'Bistro Luna' },
//     { IDuser: 15, latitude: 41.3875, longitude: 2.1737, quantityMenus: 80, localName: 'Café Estrella' },
//     { IDuser: 16, latitude: 41.3883, longitude: 2.1738, quantityMenus: 90, localName: 'Taverna Oceano' }
// ];
  function crearMarcadoresDeProveedores(proveedores, map) {
    for (let i = 0; i < proveedores.length; i++) {
        let proveedor = proveedores[i];  // Acceder al proveedor en el índice actual

        let el = createCustomMarker();   // Crear el elemento de marcador personalizado

        let proveedorMarker = new mapboxgl.Marker({ element: el })
            .setLngLat([proveedor.longitude, proveedor.latitude])
            .setPopup(new mapboxgl.Popup().setHTML(`
                <div class="proveedor-popup">
                    <h3>${proveedor.localName}</h3> 
                    <div class="">
                        <p class="localName">${proveedor.IDuser}</p>  
                    </div>
                    <button class="btn btn-primary d-block mx-auto mb-2 verButton" data-id="${proveedor.IDuser}">Ver</button>
                </div>
            `))
            .addTo(map);

        proveedorMarker.getPopup().on('open', () => {
          // Asumiendo que 'id' es una propiedad del proveedor
        });
    }
}

crearMarcadoresDeProveedores(proveedores, map);


function createCustomMarker() {
    const el = document.createElement('div');
    el.className = 'proveedor-marker';
    return el;
}


// Adjuntar el evento de clic utilizando delegación de eventos
$(document).ready(function() {
    $(document).on('click', '.verButton', function(event) {
        event.preventDefault();
        console.log('Ver button clicado');

        // Obtener el ID del proveedor desde el atributo data-id del botón
        const proveedorId = $(this).data('id');

        // Obtener datos del proveedor (simulado aquí; podría ser una llamada AJAX)
        // Simulación: supongamos que tienes una función que devuelve datos basada en el ID
        const proveedor = obtenerDatosProveedor(proveedorId);

        // Actualizar el contenido del modal con el nombre del local y la cantidad de menús
        $('#localNameModal').text(proveedor.nombre);
        $('#cantidadMenusModal').text(proveedor.cantidadMenus);

        // Mostrar el modal
        $('#exampleModal2').modal('show');
    });
});

// Simulación de obtenerDatosProveedor
function obtenerDatosProveedor(id) {
    // Aquí iría una búsqueda en tus datos; ejemplo simulado:
    return {
        nombre: "Nombre del Proveedor " + id,
        cantidadMenus: 5 + id  // Simulación
    };
}


// Manejar el evento de clic en el botón "Reservar" dentro del modal
$('#reservarButton').on('click', function() {
    // Realizar la lógica de reserva aquí
    
    // Cerrar el modal después de realizar la reserva
    $('#exampleModal2').modal('hide');
});
$('#salirreservar').on('click', function() {
    // Realizar la lógica de reserva aquí
    
    // Cerrar el modal después de realizar la reserva
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

    // Centrar el mapa en la ubicación del usuario
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


// document.getElementById('aceptarBtn').addEventListener('click', function(event) {
//     event.preventDefault();

//     // Crear la ruta desde la posición del usuario hasta el destino
//     crearRuta(usuarioCoordinates, destinationCoordinates);

//     // Ocultar el modal
//     $('#confirmarModal').modal('hide');
// });

function crearRuta(origen, destino) {
    // Llamar al servicio de enrutamiento de Mapbox
    const url = `https://api.mapbox.com/directions/v5/mapbox/walking/${origen[0]},${origen[1]};${destino[0]},${destino[1]}?geometries=geojson&steps=true&access_token=${mapboxgl.accessToken}`;

    fetch(url)
        .then(response => response.json())
        .then(data => {
            const route = data.routes[0];
            const geometry = route.geometry;
            const duration = route.duration; // Duración estimada del viaje en segundos

            // Convertir la duración a minutos
            const durationMinutes = Math.round(duration / 60);

            // Mostrar la ruta en el mapa
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
                    'line-color': '#FF691F', // Cambia el color de la línea a naranja
                    'line-width': 10, // Ajusta el ancho de la línea según sea necesario
                    'line-opacity': 1, // Ajusta la opacidad de la línea si es necesario
                    'line-blur': 10, // Agrega un efecto de desenfoque para simular una sombra
                    'line-offset': 2 // Agrega un desplazamiento para simular una sombra
                }
            });

            // Crear el contenido del pop-up con la duración estimada del viaje
            const popupContent = `<h3>Tiempo estimado de llegada</h3><p>${durationMinutes} minutos</p>`;

            // Mostrar el pop-up en las coordenadas de destino
            new mapboxgl.Popup()
                .setLngLat(destino)
                .setHTML(popupContent)
                .addTo(map);
        });
}


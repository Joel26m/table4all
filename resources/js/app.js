import './bootstrap';
import * as bootstrap from 'bootstrap';
import {createApp} from 'vue'
import nav from './components/nav.vue'

createApp(nav).mount('#nav')














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

            axios.post('http://localhost:8080/table4all/public/api/beneficiary', {
                latitude: latitude,
                longitude: longitude,
                state: 'No se ha añadido ningún estado'
            })
            .then(response => {
                const beneficiary = response.data;
                const beneficiaryMarker = new mapboxgl.Marker({ element: createCustomMarkerb(), className: 'beneficiary-marker' })
                    .setLngLat([longitude, latitude])
                    .setPopup(new mapboxgl.Popup().setHTML(`
                    <h2>Beneficiario</h2>
                    <h6>Información/Estado:</h6>
                    <div id="beneficiary-state">${beneficiary.state}</div>
                    <br>
                    <div class="button-container">
                        <button type="button"  class="btn-primary-modifyButton" data-toggle="modal" data-target="#exampleModal" data-beneficiario-id="${beneficiary.ID}">
                        <div class="image"></div>
                        </button>
                        <button type="button" class="btn-with-image" id="takeFoodButton" data-toggle="modal" data-target="#confirmarModal">
                            <div class="image"></div>
                        </button>
                    </div>                    
                    `))
                    .addTo(map);
                console.log('Beneficiario creado con ID:', beneficiary.ID);
            })
            .catch(error => {
                console.error('Error al crear el beneficiario:', error);
            });
            popup.remove();

            // Evento para confirmar inicio de ruta
            document.getElementById('iniciarRutaBtn').addEventListener('click', function(event) {
                event.preventDefault();
                document.querySelector(".content-wrapper").style.display = "block";
                console.log("Iniciando ruta...");
                crearRuta(usuarioCoordinates, destinationCoordinates);

                // Ocultar el modal de confirmación
                $('#confirmarModal').modal('hide');
            });
        });
    }
});

$(document).on('click', '.btn-primary-modifyButton', function() {
    var beneficiarioId = $(this).data('beneficiario-id'); // Captura el ID desde el botón que abre el modal
    $('#beneficiaryId').val(beneficiarioId); // Establece el ID en el input oculto dentro del modal
    $('#exampleModal').modal('show');
});


// Manejador para el estado del beneficiario
// Agregar evento de clic al botón de guardar fuera de DOMContentLoaded
document.getElementById('guardarEstado').addEventListener('click', function(event) {
    event.preventDefault();
    let clase = document.querySelector('.modal-backdrop');
    const nuevoEstado = document.getElementById('nuevoEstado').value;
    const beneficiarioId = document.getElementById('beneficiaryId').value; // Asegúrate de que este input existe y tiene el valor correcto
    console.log(beneficiarioId);
    
     // Modificar el estado del beneficiario
    axios.put(`http://localhost:8080/table4all/public/api/beneficiary/${beneficiarioId}`, {
        state: nuevoEstado
        
    })
    
    .then(() => {
        document.getElementById('beneficiary-state').innerText = nuevoEstado;
        $('#exampleModal').modal('hide');
        clase.style.display= 'none';
    })
    .catch(error => {
        console.error('Error al actualizar el estado del beneficiario:', error);
    });

});

});
            

//Colocar las púas de los proveedores en el mapa

function obtenerDatosProveedores() {
    return axios.get('http://localhost:8080/table4all/public/api/provider')
        .then(response => response.data.map(proveedor => ({
            ...proveedor,
            lat: parseFloat(proveedor.latitude),
            lon: parseFloat(proveedor.longitude)
        })))
        .catch(error => {
            console.error('Error al obtener los datos de los proveedores:', error);
            throw error;  // Propaga el error para que los consumidores de la función lo manejen.
        });
}

function crearMarcadoresDeProveedores(proveedores, map) {
    proveedores.forEach(proveedor => {
        let el = createCustomMarker();   // Crear el elemento de marcador personalizado

        new mapboxgl.Marker({ element: el })
            .setLngLat([proveedor.lon, proveedor.lat])
            .setPopup(new mapboxgl.Popup().setHTML(`
                <div class="proveedor-popup">
                    <h3>${proveedor.localName}</h3>
                    <div class="">
                        <p class="localName">Proveedor Nº ${proveedor.IDuser}</p>
                    </div>
                    <button class="btn btn-primary d-block mx-auto mb-2 verButton"
                            data-id="${proveedor.IDuser}"
                            data-name="${proveedor.localName}"
                            data-menus="${proveedor.quantityMenus}">Ver</button>
                </div>
            `))
            .addTo(map);
    });
}

obtenerDatosProveedores().then(proveedores => {
    crearMarcadoresDeProveedores(proveedores, map);
    // Aquí también podrías hacer otras cosas con los datos de proveedores
});



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

       // Recuperar la información desde los atributos data del botón que fue clicado
    const proveedorId = $(this).data('id');
    const localName = $(this).data('name');
    const cantidadMenus = $(this).data('menus');

    // Asignar la información a los elementos del modal
    $('#exampleModal2').find('#proveedorId').val(proveedorId); 
    $('#exampleModal2').find('#localNameModal').text(localName);
    $('#exampleModal2').find('#quantityMenus').val(cantidadMenus);

    console.log(proveedorId, localName, cantidadMenus); 


    // Mostrar el modal
    $('#exampleModal2').modal('show');
    });
});




// Manejar el evento de clic en el botón "Reservar" dentro del modal
$('#reservarButton').on('click', function() {
    const proveedorId = $('#exampleModal2').find('#proveedorId').val();
    const quantityReserve = parseInt($('#exampleModal2').find('#quantityMenus').val(), 10);

    // Llamar a la API para hacer la reserva
    axios.post('http://localhost:8080/table4all/public/api/collection', {
        provider: proveedorId,
        quantityMenus: quantityReserve
    })
    .then(function(response) {
        console.log('Reserva realizada con éxito:', response.data);
        $('#exampleModal2').modal('hide');  // Cerrar el modal tras la reserva
        $('#exampleModal2').find('#quantityMenus').val('');  // Limpiar el campo de cantidad

        // Ahora, actualizar la cantidad de menús del proveedor
        return axios.patch(`http://localhost:8080/table4all/public/api/provider/${proveedorId}`, {
            quantityMenus: -quantityReserve  
        });
    })
    .then(function(response) {
        console.log('Cantidad de menús actualizada con éxito:', response.data);
    })
    .catch(function(error) {
        console.error('Error durante la operación:', error);
    });
});

$('#salirreservar').on('click', function() {
    $('#exampleModal2').modal('hide');  // Cerrar el modal después de realizar la reserva
});




//Colocar las púas de los beneficiarios en el mapa
function obtenerDatosBeneficiarios() {
    return axios.get('http://localhost:8080/table4all/public/api/beneficiary')
        .then(response => response.data.map(beneficiario => ({
            ...beneficiario,
            lat: parseFloat(beneficiario.latitude),
            lon: parseFloat(beneficiario.longitude)
        })))
        .catch(error => {
            console.error('Error al obtener los datos de los beneficiarios:', error);
            throw error;  // Propaga el error para que los consumidores de la función lo manejen.
        });
}

function crearMarcadoresDeBeneficiarios(beneficiarios, map) {
    beneficiarios.forEach(beneficiario => {
        let el = createCustomMarkerb();  // Crear el elemento de marcador personalizado

        new mapboxgl.Marker({ element: el })
            .setLngLat([beneficiario.lon, beneficiario.lat])
            .setPopup(new mapboxgl.Popup().setHTML(`
                <h2>Beneficiario ${beneficiario.ID}</h2>
                <h6>Información/Estado:</h6>
                <div id="beneficiary-state">${beneficiario.state}</div>
                <br>
                <div class="button-container">
                    <button type="button" class="btn-primary-modifyButton" data-toggle="modal" data-target="#exampleModal" data-beneficiario-id="${beneficiario.ID}">
                    <input type="hidden" id="beneficiaryId">
                        <div class="image"></div>
                    </button>
                    <button type="button" class="btn-with-image" data-toggle="modal" data-target="#confirmarModal">
                        <div class="image"></div>
                    </button>
                </div>
            `))
            .addTo(map);
    });
}

    
    obtenerDatosBeneficiarios().then(beneficiarios => {
        crearMarcadoresDeBeneficiarios(beneficiarios, map);
        // Aquí también podrías hacer otras cosas con los datos de beneficiarios
    });
    
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


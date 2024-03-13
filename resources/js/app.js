import './bootstrap';
import * as bootstrap from 'bootstrap';

let primerClicBene = true;
let primerClicProv = true;

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
map.on('click', (event) => {
    const features = map.queryRenderedFeatures(event.point);
    if (!features.length) { // Verificar si no hay características en la ubicación del clic
        const lngLat = event.lngLat;
        const popup = new mapboxgl.Popup({ offset: [0, -15] })
          .setLngLat(lngLat)
          .setHTML('<h3><div class="container">' +
            '<h1>¿Deseas añadir un Beneficiario?</h1>' +
            '<form id="ubicacionForm">' +
            '<div class="mb-3">' +
            '<button type="submit" class="btn btn-primary">Aceptar</button>' +
            '<button type="button" class="btn btn-secondary" id="cancelarBtn">Cancelar</button>' +
            '</form>' +
            '</div></h3>')
          .addTo(map);
    }
});

  

const proveedorMarker = new mapboxgl.Marker({ element: createCustomMarker() })
  .setLngLat([2.1734, 41.3851])
  .setPopup(new mapboxgl.Popup().setHTML("<h3>Proveedor</h3>"))
  .addTo(map);

const markerElement = proveedorMarker.getElement();
markerElement.classList.add('proveedor-marker');

function createCustomMarker() {
  const el = document.createElement('div');
  el.className = 'proveedor-marker';
  return el;
}

const beneficiaryMarker = new mapboxgl.Marker({ element: createCustomMarkerb() })
  .setLngLat([2.0330500, 41.4922600])
  .setPopup(new mapboxgl.Popup().setHTML("<h3>Beneficiario</h3>"))
  .addTo(map);

const markerElementb = beneficiaryMarker.getElement();
markerElementb.classList.add('beneciciary-marker', 'animate__animated', 'animate__bounceIn');

function createCustomMarkerb() {
  const el = document.createElement('div');
  el.className = 'beneciciary-marker animate__animated animate__bounceIn';
  return el;
}


  
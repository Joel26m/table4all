import './bootstrap';
import * as bootstrap from 'bootstrap';

mapboxgl.accessToken = 'pk.eyJ1IjoidmVudHUwMCIsImEiOiJjbHN3MzY5cTkwbWU4MmttdHg2NnhvaDV2In0.4i_tTPy63h2OHahnuJsQpw';
const map = new mapboxgl.Map({
  container: 'map',
  style: 'mapbox://styles/ventu00/clsw58v7j007301qjfa3of8ut',
  center: [2.172850, 41.389280],
  zoom: 10.7
});
map.on('click', (event) => {
  const popup = new mapboxgl.Popup({ offset: [0, -15] })
    .setLngLat(feature.geometry.coordinates)
    .setHTML(
      `<h3>${feature.properties.nombre}</h3><p>Dirección: ${feature.properties.direccion}</p>`
    )
    .addTo(map);
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

// Obtener el elemento DOM asociado al marcador
const markerElementb = beneficiaryMarker.getElement();

// Agregar la clase "proveedor-marker" al elemento DOM del marcador
markerElementb.classList.add('beneciciary-marker');

function createCustomMarkerb() {
  const el = document.createElement('div');
  el.className = 'beneciciary-marker';
  return el;
}
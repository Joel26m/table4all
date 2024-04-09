<template>
   <div id='map'></div>

</template>

<script>
import mapboxgl from 'mapbox-gl';

export default {
  data() {
   return {
      primerClicBene: true,
      primerClicProv: true,
      map: null,
      accessToken: 'pk.eyJ1IjoidmVudHUwMCIsImEiOiJjbHN3MzY5cTkwbWU4MmttdHg2NnhvaDV2In0.4i_tTPy63h2OHahnuJsQpw',
      usuarioCoordinates: null,
      destinationCoordinates: null,
      currentPopup: null,

    };
  },
  methods: {
  obtenerUbicacion() {
    if (navigator.geolocation) {
      navigator.geolocation.getCurrentPosition(this.mostrarUbicacion, this.errorUbicacion);
    } else {
      console.error("La geolocalización no está soportada por este navegador.");
    }
  },
  mostrarUbicacion(position) {
    const latitude = position.coords.latitude;
    const longitude = position.coords.longitude;

    this.usuarioCoordinates = [longitude, latitude];

    const userMarker = new mapboxgl.Marker({
      element: this.createCustomUserMarker(),
      anchor: 'bottom'
    })
    .setLngLat(this.usuarioCoordinates)
    .addTo(this.map);

    this.map.flyTo({
      center: this.usuarioCoordinates,
      zoom: 15
    });
  },
  errorUbicacion(error) {
    console.error('Error al obtener la ubicación del usuario:', error);
  },
  createCustomUserMarker() {
    const el = document.createElement('div');
    el.className = 'user-marker';
    return el;
  },
  toggleBeneficiarios() {
    let proveedores = document.querySelectorAll('.proveedor-marker');
    let beneficiarios = document.querySelectorAll('.beneficiary-marker');

    if (this.primerClicBene) {
      proveedores.forEach(proveedor => {
        proveedor.style.display = 'none';
      });

      beneficiarios.forEach(beneficiario => {
        beneficiario.style.display = 'block';
      });

      this.primerClicBene = false;
    } else {
      let marcadores = document.querySelectorAll('.proveedor-marker, .beneficiary-marker');
      marcadores.forEach(marcador => {
        marcador.style.display = 'block';
      });

      this.primerClicBene = true;
    }
  },
  toggleProveedores() {
    let beneficiarios = document.querySelectorAll('.beneficiary-marker');
    let proveedores = document.querySelectorAll('.proveedor-marker');

    if (this.primerClicProv) {
      proveedores.forEach(proveedor => {
        proveedor.style.display = 'block';
      });

      beneficiarios.forEach(beneficiario => {
        beneficiario.style.display = 'none';
      });

      this.primerClicProv = false;
    } else {
      let marcadores = document.querySelectorAll('.proveedor-marker, .beneficiary-marker');
      marcadores.forEach(marcador => {
        marcador.style.display = 'block';
      });

      this.primerClicProv = true;
    }
  },
  handleMapClick(event) {
    const lngLat = event.lngLat;
    this.destinationCoordinates = [lngLat.lng, lngLat.lat];

    if (!lngLat) {
      console.log("Event object does not have latlng properties.");
      return;
    }

    const latitude = lngLat.lat;
    const longitude = lngLat.lng;

    const features = this.map.queryRenderedFeatures(event.point);
    if (!features.length) {
      this.showPopup(lngLat);
    }
  },
  showPopup(lngLat) {
    if (this.currentPopup) {
      this.currentPopup.remove();
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
      .addTo(this.map);

    document.getElementById('aceptarBtn').addEventListener('click', event => {
      event.preventDefault();
      this.addBeneficiaryMarker(lngLat);
      popup.remove();
    });

    this.currentPopup = popup;
  },
  addBeneficiaryMarker(lngLat) {
    const latitude = lngLat.lat;
    const longitude = lngLat.lng;

    const beneficiaryMarker = new mapboxgl.Marker({ element: this.createCustomMarkerb(), className: 'beneficiary-marker' })
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
        </div>                    
      `))
      .addTo(this.map);

    document.getElementById('iniciarRutaBtn').addEventListener('click', event => {
      event.preventDefault();
      this.crearRuta(this.usuarioCoordinates, this.destinationCoordinates);
      this.obtenerDireccion(this.destinationCoordinates);
      $('#confirmarModal').modal('hide');
    });
  },
  createCustomMarkerb() {
    const el = document.createElement('div');
    el.className = 'beneficiary-marker';
    return el;
  },
  obtenerDireccion(coordinates) {
    const latitude = coordinates[1];
    const longitude = coordinates[0];
    fetch(`https://api.mapbox.com/geocoding/v5/mapbox.places/${longitude},${latitude}.json?access_token=${this.accessToken}`)
      .then(response => response.json())
      .then(data => {
        const place = data.features[0];
        const address = place.place_name;
        document.getElementById('direcciongo').textContent = 'Dirección del lugar al que se va: ' + address;
      })
      .catch(error => {
        console.error('Error al obtener la dirección:', error);
      });
  },
  crearRuta(origen, destino) {
    const url = `https://api.mapbox.com/directions/v5/mapbox/walking/${origen[0]},${origen[1]};${destino[0]},${destino[1]}?geometries=geojson&steps=true&access_token=${this.accessToken}`;

    fetch(url)
      .then(response => response.json())
      .then(data => {
        const route = data.routes[0];
        const geometry = route.geometry;
        const duration = route.duration;
        const durationMinutes = Math.round(duration / 60);

        this.map.addLayer({
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
          .addTo(this.map);
      });
  }
},
   mounted() {
      let primerClicBene = true;
      let primerClicProv = true;
      this.obtenerUbicacion();


   }}
</script>
<style>
#map { 
  z-index: -1;
  position: absolute; 
  top: 0; 
  bottom: 0; 
  width: 1000px; 
  height: 750px;
}
</style>
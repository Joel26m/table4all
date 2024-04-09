<template>
   <div id='map'></div>

</template>

<script>
import mapboxgl from 'mapbox-gl';

export default {
  data() {
   return {
 
      accessToken: 'pk.eyJ1IjoidmVudHUwMCIsImEiOiJjbHN3MzY5cTkwbWU4MmttdHg2NnhvaDV2In0.4i_tTPy63h2OHahnuJsQpw',
   

    };
  },
  methods: {
 
  },
 
   mounted() {
  
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
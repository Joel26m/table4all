import './bootstrap';
import * as bootstrap from 'bootstrap';
import {createApp} from 'vue'
import mapa from './components/mapa.vue'

createApp(mapa).mount('#mapa')



  let botonbene = document.getElementById('bene');
      botonbene.addEventListener("click", toggleBeneficiarios);

let botonprov = document.getElementById('prov');      botonprov.addEventListener("click", toggleProveedores);
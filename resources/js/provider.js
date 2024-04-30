// obtener el id del proveedor que está usando la app
let providerId = document.getElementById('providerId');
console.log(providerId.value);

// obtener las recogidas que tiene el proveedor
function getProviderCollections(providerId) {
    axios.get(`/table4all/public/api/provider/${providerId}/collections`)
        .then(response => {
            const collections = response.data;
            console.log('Collections del proveedor:', collections);
            collections.forEach(collection => {
                // Aquí llamamos a la función para procesar cada colección

                    agregarRegistro('NombreRider', collection.quantityMenus, collection.date);

            });
        })
        .catch(error => {
            console.error('Error al obtener las collections del proveedor:', error);
        });
}
// Llamar a la función con el ID del proveedor que desees
let recogidas = getProviderCollections(16); // Sustituye '1' con el ID real del proveedor

// Obtener el contenedor de los registros
const registrosContainer = document.querySelector('.registros');

// Función para agregar un nuevo registro de recogida
function agregarRegistro(nombreRider, numMenus, fecha) {
    // Crear un nuevo elemento de registro
    const nuevoRegistro = document.createElement('div');
    nuevoRegistro.classList.add('rider');

    // Contenido del nuevo registro
    nuevoRegistro.innerHTML = `
    <div class="registro">
    <div class="rider">
      <a href="#" style="text-decoration: none;">
        <svg width="69" height="69" viewBox="0 0 69 69" fill="none" xmlns="http://www.w3.org/2000/svg">
          <g filter="url(#filter0_d_318_104)">
          <circle cx="34.5" cy="30.5" r="30.5" fill="#001D38"/>
          </g>
          <path d="M39.351 19.9026C38.2035 18.7394 36.6006 18.0989 34.8315 18.0989C33.0529 18.0989 31.4448 18.7356 30.3025 19.8915C29.1479 21.0602 28.5853 22.6485 28.7174 24.3636C28.9792 27.7473 31.722 30.4999 34.8315 30.4999C37.941 30.4999 40.6791 27.7479 40.945 24.3647C41.0789 22.6651 40.5128 21.0801 39.351 19.9026ZM45.2104 42.901H24.4526C24.1809 42.9043 23.9118 42.8507 23.665 42.7441C23.4181 42.6375 23.1996 42.4806 23.0255 42.2848C22.6422 41.8546 22.4877 41.2672 22.6021 40.6732C23.0998 38.0812 24.6531 35.9038 27.0945 34.3752C29.2634 33.0183 32.0109 32.2715 34.8315 32.2715C37.6521 32.2715 40.3995 33.0189 42.5685 34.3752C45.0099 35.9032 46.5632 38.0806 47.0609 40.6726C47.1753 41.2667 47.0208 41.8541 46.6375 42.2842C46.4634 42.4801 46.245 42.6372 45.9981 42.7438C45.7512 42.8505 45.4821 42.9042 45.2104 42.901Z" fill="white"/>
          <defs>
          <filter id="filter0_d_318_104" x="0" y="0" width="69" height="69" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
          <feFlood flood-opacity="0" result="BackgroundImageFix"/>
          <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
          <feOffset dy="4"/>
          <feGaussianBlur stdDeviation="2"/>
          <feComposite in2="hardAlpha" operator="out"/>
          <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.25 0"/>
          <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_318_104"/>
          <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_318_104" result="shape"/>
          </filter>
          </defs>
        </svg>    
      </a>
<div class="info">
      <div class="nombre-info">
          <p class="nombre">Rider: ${nombreRider}</p>
      </div>
      <div class="datos">
          <p class="n-menus">Nº Menus:${numMenus}</p>
          <p class="fecha">FECHA: ${fecha}</p>
      </div>

</div>

<div class="entregado">
  <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
  <path d="M35.5195 13.2344C35.2878 13.001 35.0121 12.8159 34.7084 12.6899C34.4046 12.5638 34.0789 12.4993 33.75 12.5H28.75V11.25C28.75 8.92936 27.8281 6.70376 26.1872 5.06282C24.5462 3.42187 22.3206 2.5 20 2.5C17.6794 2.5 15.4538 3.42187 13.8128 5.06282C12.1719 6.70376 11.25 8.92936 11.25 11.25V12.5H6.25C5.58696 12.5 4.95107 12.7634 4.48223 13.2322C4.01339 13.7011 3.75 14.337 3.75 15V31.875C3.75 34.9219 6.32812 37.5 9.375 37.5H30.625C32.0988 37.5005 33.5143 36.9242 34.5688 35.8945C35.0994 35.3883 35.5219 34.7798 35.8109 34.1057C36.0999 33.4317 36.2492 32.706 36.25 31.9727V15C36.251 14.672 36.187 14.3471 36.0616 14.044C35.9362 13.741 35.752 13.4658 35.5195 13.2344ZM25.9758 21.4062L18.9758 30.1562C18.8608 30.2999 18.7156 30.4164 18.5504 30.4974C18.3853 30.5784 18.2043 30.622 18.0203 30.625H18C17.8194 30.625 17.641 30.5859 17.477 30.5104C17.313 30.4349 17.1674 30.3247 17.05 30.1875L14.05 26.6812C13.9433 26.5565 13.8622 26.4119 13.8114 26.2559C13.7605 26.0998 13.741 25.9352 13.7537 25.7715C13.7665 25.6079 13.8114 25.4483 13.8858 25.302C13.9602 25.1557 14.0627 25.0254 14.1875 24.9187C14.3123 24.812 14.4568 24.731 14.6129 24.6801C14.769 24.6293 14.9336 24.6097 15.0972 24.6225C15.2609 24.6352 15.4204 24.6801 15.5668 24.7545C15.7131 24.829 15.8433 24.9315 15.95 25.0562L17.9688 27.4148L24.0242 19.8438C24.2314 19.5847 24.533 19.4187 24.8627 19.382C25.1923 19.3454 25.523 19.4412 25.782 19.6484C26.041 19.8556 26.2071 20.1572 26.2437 20.4869C26.2804 20.8165 26.1845 21.1472 25.9773 21.4062H25.9758ZM26.25 12.5H13.75V11.25C13.75 9.5924 14.4085 8.00269 15.5806 6.83058C16.7527 5.65848 18.3424 5 20 5C21.6576 5 23.2473 5.65848 24.4194 6.83058C25.5915 8.00269 26.25 9.5924 26.25 11.25V12.5Z" fill="#3D89E2"/>
  </svg>
</div>
</div>

</div> 
    `;

    // Agregar el nuevo registro al contenedor
    registrosContainer.appendChild(nuevoRegistro);
}

// obtener los menus del proveedor
function getProviderMenus(providerId) {
    axios.get(`/table4all/public/api/providerMenus/${providerId}`)
        .then(response => {
            const menus = response.data;
            console.log('Menús del proveedor:', menus);
            countMenusByCategory(menus);
            console.log(desayunos);
            console.log(meriendas);
            console.log(cenas);
            console.log(total);


            // Aquí puedes procesar la lista de menús como necesites
            // Por ejemplo, podrías actualizar el DOM para mostrar los menús

        })
        .catch(error => {
            console.error('Error al obtener los menús del proveedor:', error);
        });
}
let menus = getProviderMenus(16);
console.log(menus);

let desayunos = 0;
let meriendas = 0;
let cenas = 0;
let total = 0;
//separar los menus por tipos
function countMenusByCategory(menus) {

    menus.forEach(menu => {
        switch(menu.IDMenu) {
            case 1:
                desayunos += menu.quantity; // Asegúrate de que `menu.quantity` exista y sea numérico
                break;
            case 2:
                meriendas += menu.quantity;
                break;
            case 3:
                cenas += menu.quantity;
                break;
            default:
                // Opcionalmente manejar categorías desconocidas
                break;
        }
        total = desayunos + meriendas + cenas;
    });
    return { desayunos, meriendas, cenas, total };
}


// ------------------ MODAL --------------------

// Obtener el modal
var modal = document.getElementById("myModal");

// Obtener el div #menus
var menusDiv = document.getElementById("menus");

// Al hacer clic en el div #menus, mostrar el modal
menusDiv.onclick = function() {
    modal.style.display = "block";
}

// Obtener el elemento span que cierra el modal
var span = document.getElementsByClassName("close")[0];

// Al hacer clic en el botón (x), ocultar el modal
span.onclick = function() {
    modal.style.display = "none";
}

// Al hacer clic en cualquier parte fuera del modal, ocultar el modal
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}


    // Obtener elementos del DOM
    const sumarBtn = document.getElementById('sumar');
    const restarBtn = document.getElementById('restar');
    const numeroCampo = document.getElementById('cantidadMenus');
    const alertSuccess = document.createElement('div');
    alertSuccess.classList.add('alert', 'alert-success');
    alertSuccess.setAttribute('role', 'alert');
    alertSuccess.style.display = 'none';
    alertSuccess.textContent = 'Menú agregado correctamente';
    formAgregarMenu.appendChild(alertSuccess);

    // Manejar clic en el botón de sumar
    sumarBtn.addEventListener('click', () => {
        // Obtener el valor actual y convertirlo a número
        let valorActual = parseInt(numeroCampo.textContent);
        // Incrementar el valor
        valorActual++;
        // Actualizar el valor en el campo de texto
        numeroCampo.textContent = valorActual;
    });

    // Manejar clic en el botón de restar
    restarBtn.addEventListener('click', () => {
        // Obtener el valor actual y convertirlo a número
        let valorActual = parseInt(numeroCampo.textContent);
        // Decrementar el valor si es mayor que cero
        if (valorActual > 0) {
            valorActual--;
        }
        // Actualizar el valor en el campo de texto
        numeroCampo.textContent = valorActual;
    });


    formAgregarMenu.addEventListener('submit', function(event) {
        // Evita que el formulario se envíe automáticamente
        event.preventDefault();
        alertSuccess.style.display = 'block';
        alertSuccess.style.marginTop = '5px';
        alertSuccess.style.backgroundColor = '#FF691F';
        alertSuccess.style.color = '#ffff';

        // Opcional: Agrega un temporizador para ocultar el mensaje después de cierto tiempo
        setTimeout(function() {
            alertSuccess.style.display = 'none';
        }, 3000); // 3000 milisegundos = 3 segundos
    });

  // Obtener todos los elementos div
  const divs = document.querySelectorAll('.col-sm-12.col-lg-3');

  // Iterar sobre cada div y agregar evento de click
  divs.forEach(div => {
      // Agregar evento de click a cada div
      div.addEventListener('click', () => {
          // Obtener el número correspondiente para mostrar
          const numero = obtenerNumeroParaDiv(div.id); // Esta función obtendrá el número de la base de datos

          // Mostrar SweetAlert con el número recuperado
          Swal.fire({
            html: `<span style="color:#FF691F; font-size: 80px;  font-family: var(--font-Family-3);"> ${numero} </span>`,  
            icon: 'info',
            confirmButtonText: 'Cerrar',
            confirmButtonColor: '#3D89E2',
        });
      });
  });

  // Función de ejemplo para obtener el número correspondiente
  function obtenerNumeroParaDiv(id) {
      // Aquí deberías recuperar el número correspondiente de tu base de datos
      // Por ahora, simplemente devolveremos un número aleatorio
      return Math.floor(Math.random() * 10) + 1;
  }




  function getProviderMenus(providerId) {
    axios.get(`/table4all/public/api/providerMenus/${providerId}`)
        .then(response => {
            const menus = response.data;
            console.log('Menús del proveedor:', menus);

            // Limpiar el contenedor de menús antes de añadir nuevos
            const menuContainer = document.getElementById('menus2');
            menuContainer.innerHTML = ''; // Limpiar menús existentes

            // Procesa y muestra cada menú en el DOM
            menus.forEach(menu => {
                agregarMenuAlDOM(menu, menuContainer);
            });
        })
        .catch(error => {
            console.error('Error al obtener los menús del proveedor:', error);
        });
}

// Función para agregar cada menú al DOM
function agregarMenuAlDOM(menu, container) {
    const menuElement = document.createElement('div');
    const tipoMenu = getTipoMenu(menu.IDMenu); // Obtener el nombre del tipo de menú basado en el ID

    menuElement.className = 'pack';
    menuElement.innerHTML = `
        <div class="info">
            <div class="nombre-info">
                <h4 class="nombre">PACK</h4>
                <form action="">
                    <button type="submit" class="btn btn-danger btn-rounded" style="margin-inline: 20px; background-color: #CB2A3A"> 
                        <i class="fa-solid fa-trash-can"></i>
                        Borrar
                    </button>
                </form>
                <form action="">
                    <button type="submit" class="btn btn-primary btn-rounded" style="background-color: #FF691F; border: none">
                        <i class="fa-solid fa-pencil"></i>
                        Editar
                    </button>
                </form>
            </div>
            <div class="datos-menu">

                <p class="t-menus">TIPO: <span>${tipoMenu}</span></p>
                <p class="n-menus">CANTIDAD: <span>${menu.quantity}</span></p>
            </div>
        </div>
    `;
    container.appendChild(menuElement);
}
function getTipoMenu(idMenu) {
    switch (idMenu) {
        case 1:
            return 'Desayuno';
        case 2:
            return 'Merienda';
        case 3:
            return 'Cena';
        default:
            return 'Tipo Desconocido'; // En caso de un ID no esperado
    }
}


// Llamar a la función con el ID real del proveedor
getProviderMenus(16); // Sustituye '16' con el ID real del proveedor





    

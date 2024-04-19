



// Obtener el contenedor del carrusel
const container = document.querySelector('.rider-content');

// Índice actual del carrusel
let currentIndex = 0;

// Función para mostrar la diapositiva del carrusel
function showSlide(direction) {
    // Obtener todas las diapositivas, contenedores de texto y puntos
    const slides = container.querySelectorAll(".carousel-slide");
    const textContainers = container.querySelectorAll(".text-container");
    const dots = container.querySelectorAll(".dot");

    // Calcular el nuevo índice de la diapositiva
    if (direction === "next") {
        currentIndex = (currentIndex + 1) % slides.length;
    } else if (direction === "prev") {
        currentIndex = (currentIndex - 1 + slides.length) % slides.length;
    }


    // Iterar sobre todas las diapositivas
    slides.forEach((slide, index) => {
        // Mostrar la diapositiva correspondiente y ocultar las demás
        if (index === currentIndex) {
            slide.style.display = 'block';
        } else {
            slide.style.display = 'none';
        }
    });

    // Iterar sobre todos los contenedores de texto
    textContainers.forEach((textContainer, index) => {
        // Mostrar el contenedor de texto correspondiente y ocultar los demás
        if (index === currentIndex) {
            textContainer.style.display = 'block';
        } else {
            textContainer.style.display = 'none';
        }
    });

    // Actualizar el estado de los puntos del carrusel
    dots.forEach((dot, index) => {
        // Marcar el punto correspondiente a la diapositiva actual y desmarcar los demás
        if (index === currentIndex) {
            dot.classList.add("active");
        } else {
            dot.classList.remove("active");
        }
    });
}







// Obtener el contenedor del carrusel
const container_negocio = document.querySelector('.negocio-content');

// Índice actual del carrusel
let Index = 0;

// Función para mostrar la diapositiva del carrusel
function showSlide2(direction) {
    // Obtener todas las diapositivas, contenedores de texto y puntos
    const slides = container_negocio.querySelectorAll(".carousel-slide2");
    const textContainers = container_negocio.querySelectorAll(".text-container2");
    const dots = container_negocio.querySelectorAll(".dot2");

    // Calcular el nuevo índice de la diapositiva
    if (direction === "next2") {
        Index = (Index + 1) % slides.length;
    } else if (direction === "prev2") {
        Index = (Index - 1 + slides.length) % slides.length;
    }


    // Iterar sobre todas las diapositivas
    slides.forEach((slide, index) => {
        // Mostrar la diapositiva correspondiente y ocultar las demás
        if (index === Index) {
            slide.style.display = 'block';
        } else {
            slide.style.display = 'none';
        }
    });

    // Iterar sobre todos los contenedores de texto
    textContainers.forEach((textContainer, index) => {
        // Mostrar el contenedor de texto correspondiente y ocultar los demás
        if (index === Index) {
            textContainer.style.display = 'block';
        } else {
            textContainer.style.display = 'none';
        }
    });

    // Actualizar el estado de los puntos del carrusel
    dots.forEach((dot, index) => {
        // Marcar el punto correspondiente a la diapositiva actual y desmarcar los demás
        if (index === Index) {
            dot.classList.add("active");
        } else {
            dot.classList.remove("active");
        }
    });
}

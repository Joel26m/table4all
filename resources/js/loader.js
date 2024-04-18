
document.onreadystatechange = function () {
    if (document.readyState === "complete") {
        // Cuando el documento se ha cargado completamente, ocultar el preloader después de 5 segundos
        setTimeout(function() {
            document.getElementById("loader-wrapper").style.display = "none";
        }, 1500); // Tiempo en milisegundos (en este caso, 5000 milisegundos = 5 segundos)
    }
};



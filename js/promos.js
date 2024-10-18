document.addEventListener("DOMContentLoaded", function () {
    let currentIndex = 0;
    const images = document.querySelectorAll('.promo-image');
    const totalImages = images.length;

    function showNextImage() {
        images[currentIndex].style.opacity = 0; // Ocultar la imagen actual
        currentIndex = (currentIndex + 1) % totalImages; // Incrementar el índice
        images[currentIndex].style.opacity = 1; // Mostrar la siguiente imagen
    }

    // Cambiar imagen cada 3 segundos
    setInterval(showNextImage, 3000);
});


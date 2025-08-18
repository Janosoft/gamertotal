// Lazy loading avanzado con Intersection Observer
document.addEventListener('DOMContentLoaded', function () {
    const lazyImages = document.querySelectorAll('.lazy-img');

    // Configuración del observer
    const imageObserver = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const img = entry.target;
                const skeleton = img.parentElement.querySelector('.img-skeleton');

                // Cargar la imagen
                img.src = img.dataset.src;

                // Cuando la imagen se carga completamente
                img.onload = () => {
                    img.classList.add('loaded');
                    if (skeleton) {
                        skeleton.style.display = 'none';
                    }
                };

                // Manejo de errores
                img.onerror = () => {
                    if (skeleton) {
                        skeleton.innerHTML = '<div class="d-flex align-items-center justify-content-center h-100 text-muted"><i class="fas fa-image fa-2x"></i></div>';
                        skeleton.style.background = '#f8f9fa';
                        skeleton.style.animation = 'none';
                    }
                };

                // Dejar de observar esta imagen
                observer.unobserve(img);
            }
        });
    }, {
        root: null,
        rootMargin: '50px', // Cargar 50px antes de que sea visible
        threshold: 0.1
    });

    // Observar todas las imágenes lazy
    lazyImages.forEach(img => imageObserver.observe(img));
});

// Barra de Progreso
window.onscroll = function () {
    progress_compu()
};

function progress_compu() {
    var winScroll = document.body.scrollTop || document.documentElement.scrollTop;
    var height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
    var scrolled = (winScroll / height) * 100;
    document.getElementById("myBar").style.width = scrolled + "%";
    document.getElementById("myBar2").style.width = scrolled + "%";
}
// Barra de Progreso

//boton_scroll_top
var btn = $('#button_top');
$(window).scroll(function () {
    if ($(window).scrollTop() > 300) {
        btn.addClass('show');
    } else {
        btn.removeClass('show');
    }
});
btn.on('click', function () {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
});
//boton_scroll_top
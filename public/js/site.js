document.addEventListener('DOMContentLoaded', function () {

    /* =========================================
       MENU MOBILE
    ========================================= */

    const toggle = document.querySelector('.menu-toggle');
    const nav = document.querySelector('.main-nav');

    if (toggle && nav) {
        toggle.addEventListener('click', function () {
            nav.classList.toggle('open');
        });
    }


    /* =========================================
       SLIDER DES TERRAINS
    ========================================= */

    const sliders = document.querySelectorAll('.terrain-slider');

    sliders.forEach(function (slider) {

        const slides = slider.querySelectorAll('.terrain-slide');
        const prevButton = slider.querySelector('.slider-prev');
        const nextButton = slider.querySelector('.slider-next');

        console.log('Slider trouvé :', slides.length, 'images');

        // Pas besoin de slider avec une seule image
        if (slides.length <= 1) {
            return;
        }

        // Vérification des boutons
        if (!prevButton || !nextButton) {
            console.error('Boutons du slider introuvables');
            return;
        }

        let currentIndex = 0;


        /* Afficher une image */
        function showSlide(index) {

            slides.forEach(function (slide, i) {

                slide.classList.remove('active');

                if (i === index) {
                    slide.classList.add('active');
                }

            });

        }


        /* =====================================
           BOUTON SUIVANT
        ===================================== */

        nextButton.addEventListener('click', function (event) {

            event.preventDefault();
            event.stopPropagation();

            currentIndex++;

            if (currentIndex >= slides.length) {
                currentIndex = 0;
            }

            console.log('Image suivante :', currentIndex);

            showSlide(currentIndex);

        });


        /* =====================================
           BOUTON PRÉCÉDENT
        ===================================== */

        prevButton.addEventListener('click', function (event) {

            event.preventDefault();
            event.stopPropagation();

            currentIndex--;

            if (currentIndex < 0) {
                currentIndex = slides.length - 1;
            }

            console.log('Image précédente :', currentIndex);

            showSlide(currentIndex);

        });


        /* Première image */
        showSlide(0);

    });

});

/* =========================================
   GALERIE PHOTO PLEIN ÉCRAN
========================================= */

document.addEventListener('DOMContentLoaded', function () {

    let galleryImages = [];
    let galleryIndex = 0;

    /* Création de la galerie */

    const modal = document.createElement('div');

    modal.className = 'gallery-modal';

    modal.innerHTML = `
        <button
            type="button"
            class="gallery-close"
            aria-label="Fermer"
        >
            ×
        </button>

        <div class="gallery-title"></div>

        <button
            type="button"
            class="gallery-nav gallery-prev"
            aria-label="Image précédente"
        >
            ❮
        </button>

        <img
            class="gallery-modal-image"
            src=""
            alt=""
        >

        <button
            type="button"
            class="gallery-nav gallery-next"
            aria-label="Image suivante"
        >
            ❯
        </button>

        <div class="gallery-counter"></div>
    `;

    document.body.appendChild(modal);


    const modalImage = modal.querySelector('.gallery-modal-image');
    const modalTitle = modal.querySelector('.gallery-title');
    const counter = modal.querySelector('.gallery-counter');

    const closeButton = modal.querySelector('.gallery-close');
    const prevButton = modal.querySelector('.gallery-prev');
    const nextButton = modal.querySelector('.gallery-next');


    /* Afficher une image */

    function showGalleryImage(index) {

        if (!galleryImages.length) {
            return;
        }

        galleryIndex = index;

        if (galleryIndex < 0) {
            galleryIndex = galleryImages.length - 1;
        }

        if (galleryIndex >= galleryImages.length) {
            galleryIndex = 0;
        }

        const image = galleryImages[galleryIndex];

        modalImage.src = image.src;
        modalImage.alt = image.alt;

        modalTitle.textContent =
            image.terrain + ' — Photo ' + (galleryIndex + 1);

        counter.textContent =
            (galleryIndex + 1) + ' / ' + galleryImages.length;
    }


    /* Ouvrir la galerie */

    document.querySelectorAll('[data-gallery-image]').forEach(function (image) {

        image.addEventListener('click', function (event) {

            event.preventDefault();
            event.stopPropagation();

            const slider = image.closest('.terrain-slider');

            if (!slider) {
                return;
            }

            const images = slider.querySelectorAll('[data-gallery-image]');

            galleryImages = Array.from(images).map(function (img) {

                return {
                    src: img.src,
                    alt: img.alt,
                    terrain: img.closest('.terrain-card')
                        ?.querySelector('h3')
                        ?.textContent
                        ?.trim() || 'Terrain'
                };

            });

            galleryIndex = Array.from(images).indexOf(image);

            showGalleryImage(galleryIndex);

            modal.classList.add('open');

            document.body.style.overflow = 'hidden';

        });

    });


    /* Fermer */

    function closeGallery() {

        modal.classList.remove('open');

        document.body.style.overflow = '';

    }


    closeButton.addEventListener('click', function () {

        closeGallery();

    });


    /* Image suivante */

    nextButton.addEventListener('click', function (event) {

        event.stopPropagation();

        showGalleryImage(galleryIndex + 1);

    });


    /* Image précédente */

    prevButton.addEventListener('click', function (event) {

        event.stopPropagation();

        showGalleryImage(galleryIndex - 1);

    });


    /* Cliquer en dehors de l'image */

    modal.addEventListener('click', function (event) {

        if (event.target === modal) {

            closeGallery();

        }

    });


    /* Touche Échap */

    document.addEventListener('keydown', function (event) {

        if (!modal.classList.contains('open')) {
            return;
        }

        if (event.key === 'Escape') {

            closeGallery();

        }

        if (event.key === 'ArrowRight') {

            showGalleryImage(galleryIndex + 1);

        }

        if (event.key === 'ArrowLeft') {

            showGalleryImage(galleryIndex - 1);

        }

    });

});


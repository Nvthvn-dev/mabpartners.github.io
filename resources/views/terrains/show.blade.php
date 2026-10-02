@extends('layouts.app')

@section('title', $terrain->titre . ' — Mab Partners')

@section('content')

<style>
    /* =========================
       GALERIE PAGE TERRAIN
    ========================= */

    .detail-gallery {
        width: 100%;
    }

    .detail-slider {
        position: relative;
        width: 100%;
        height: 480px;
        overflow: hidden;
        border-radius: 14px;
        background: #f1f1f1;
    }

    .detail-slide {
        position: absolute;
        inset: 0;

        width: 100%;
        height: 100%;

        object-fit: cover;

        opacity: 0;
        visibility: hidden;
        pointer-events: none;

        transition: opacity .3s ease;
    }

    .detail-slide.active {
        opacity: 1;
        visibility: visible;
        pointer-events: auto;
    }

    .detail-slider-btn {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);

        z-index: 10;

        width: 48px;
        height: 48px;

        border: none;
        border-radius: 50%;

        background: rgba(0, 0, 0, .65);
        color: white;

        font-size: 25px;
        cursor: pointer;

        display: flex;
        align-items: center;
        justify-content: center;

        transition: background .2s ease, transform .2s ease;
    }

    .detail-slider-btn:hover {
        background: rgba(0, 0, 0, .9);
    }

    .detail-slider-prev {
        left: 18px;
    }

    .detail-slider-next {
        right: 18px;
    }

    .detail-photo-counter {
        position: absolute;
        bottom: 15px;
        left: 50%;
        transform: translateX(-50%);

        z-index: 10;

        padding: 7px 14px;

        border-radius: 20px;

        background: rgba(0, 0, 0, .65);
        color: white;

        font-size: 13px;
        font-weight: 600;
    }

    /* =========================
       WHATSAPP
    ========================= */

    .detail-whatsapp {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;

        width: 100%;
        margin-top: 12px;
        padding: 13px 18px;

        box-sizing: border-box;

        border-radius: 8px;

        background: #25D366;
        color: white;

        font-size: 14px;
        font-weight: 700;

        text-decoration: none;

        transition: .2s ease;
    }

    .detail-whatsapp:hover {
        background: #1ebe5d;
        color: white;
        transform: translateY(-2px);
    }

    /* =========================
       RETOUR
    ========================= */

    .back-link {
        display: inline-block;
        margin-bottom: 25px;

        color: #333;
        font-size: 14px;
        font-weight: 600;
        text-decoration: none;
    }

    .back-link:hover {
        color: #25D366;
    }

    /* =========================
       RESPONSIVE
    ========================= */

    @media (max-width: 768px) {

        .detail-slider {
            height: 300px;
            border-radius: 10px;
        }

        .detail-slider-btn {
            width: 40px;
            height: 40px;
            font-size: 20px;
        }

        .detail-slider-prev {
            left: 10px;
        }

        .detail-slider-next {
            right: 10px;
        }
    }
</style>


<section class="section detail">

    <div class="container">

        {{-- RETOUR --}}
        <a href="{{ route('terrains.index') }}" class="back-link">
            ← Retour aux terrains
        </a>


        <div class="detail-grid">


            {{-- =========================
                 GAUCHE : PHOTOS + VIDEO
            ========================= --}}

            <div>

                <div class="detail-gallery">

                    @if($terrain->images->isNotEmpty())

                        <div class="detail-slider">

                            @foreach($terrain->images as $index => $image)

                                <img
                                    src="{{ asset('storage/' . $image->image) }}"
                                    alt="{{ $terrain->titre }} - Photo {{ $index + 1 }}"
                                    class="detail-slide {{ $index === 0 ? 'active' : '' }}"
                                >

                            @endforeach


                            @if($terrain->images->count() > 1)

                                <button
                                    type="button"
                                    class="detail-slider-btn detail-slider-prev"
                                    aria-label="Image précédente"
                                >
                                    ❮
                                </button>

                                <button
                                    type="button"
                                    class="detail-slider-btn detail-slider-next"
                                    aria-label="Image suivante"
                                >
                                    ❯
                                </button>

                                <div class="detail-photo-counter">
                                    <span id="detailCurrentPhoto">1</span>
                                    /
                                    {{ $terrain->images->count() }}
                                </div>

                            @endif

                        </div>


                    @elseif($terrain->image)

                        <div class="detail-slider">

                            <img
                                src="{{ asset('storage/' . $terrain->image) }}"
                                alt="{{ $terrain->titre }}"
                                class="detail-slide active"
                            >

                        </div>


                    @else

                        <div class="media-placeholder large">
                            <span>PHOTO DU TERRAIN</span>
                        </div>

                    @endif

                </div>


                {{-- =========================
                     VIDEO
                ========================= --}}

                @if($terrain->video)

                    <div class="video-wrap">

                        <video controls width="100%">

                            <source
                                src="{{ asset('storage/' . $terrain->video) }}"
                                type="video/mp4"
                            >

                            Votre navigateur ne prend pas en charge
                            la lecture vidéo.

                        </video>

                    </div>

                @endif

            </div>


            {{-- =========================
                 DROITE : INFORMATIONS
            ========================= --}}

            <div class="detail-copy">

                <span class="reference">
                    {{ $terrain->reference }}
                </span>


                <h1>
                    {{ $terrain->titre }}
                </h1>


                <p class="location">
                    {{ $terrain->quartier }}, {{ $terrain->ville }}
                </p>


                <div class="price">

                    {{ $terrain->prix
                        ? number_format($terrain->prix, 0, ',', ' ') . ' FCFA'
                        : 'Prix sur demande'
                    }}

                </div>


                {{-- CARACTÉRISTIQUES PRINCIPALES --}}

                <div class="facts">

                    <div>
                        <small>Superficie</small>

                        <strong>
                            {{ $terrain->surface
                                ? number_format($terrain->surface, 0, ',', ' ') . ' m²'
                                : 'À préciser'
                            }}
                        </strong>
                    </div>


                    <div>
                        <small>Statut</small>

                        <strong>
                            {{ $terrain->statut }}
                        </strong>
                    </div>

                </div>


                {{-- DESCRIPTION --}}

                @if($terrain->description)

                    <p class="description">
                        {{ $terrain->description }}
                    </p>

                @endif


                {{-- CARACTÉRISTIQUES --}}

                @if($terrain->caracteristiques)

                    <ul class="features">

                        @foreach($terrain->caracteristiques as $feature)

                            <li>
                                ✓ {{ $feature }}
                            </li>

                        @endforeach

                    </ul>

                @endif


                {{-- RENDEZ-VOUS --}}

                <a
                    href="{{ route('rendezvous.create', $terrain) }}"
                    class="btn btn-primary btn-full"
                >
                    Je suis intéressé — prendre rendez-vous
                </a>


                {{-- WHATSAPP --}}

                <a
                    href="https://wa.me/2250778613612?text={{ urlencode('Bonjour MAB Partners, je suis intéressé par le terrain ' . $terrain->reference . ' — ' . $terrain->titre . '. Je souhaiterais avoir plus d’informations et éventuellement organiser une visite.') }}"
                    class="detail-whatsapp"
                    target="_blank"
                    rel="noopener"
                >
                    <span>💬</span>
                    Contacter MAB Partners sur WhatsApp
                </a>

            </div>

        </div>

    </div>

</section>


{{-- =========================
     JAVASCRIPT SLIDER
========================= --}}

<script>
document.addEventListener('DOMContentLoaded', function () {

    const slider = document.querySelector('.detail-slider');

    if (!slider) {
        return;
    }

    const slides = slider.querySelectorAll('.detail-slide');
    const prevButton = slider.querySelector('.detail-slider-prev');
    const nextButton = slider.querySelector('.detail-slider-next');
    const counter = document.getElementById('detailCurrentPhoto');

    if (slides.length <= 1) {
        return;
    }

    let currentIndex = 0;


    function showSlide(index) {

        if (index < 0) {
            index = slides.length - 1;
        }

        if (index >= slides.length) {
            index = 0;
        }

        currentIndex = index;

        slides.forEach(function (slide, i) {

            slide.classList.toggle(
                'active',
                i === currentIndex
            );

        });

        if (counter) {
            counter.textContent = currentIndex + 1;
        }
    }


    if (nextButton) {

        nextButton.addEventListener('click', function (event) {

            event.preventDefault();
            event.stopPropagation();

            showSlide(currentIndex + 1);

        });

    }


    if (prevButton) {

        prevButton.addEventListener('click', function (event) {

            event.preventDefault();
            event.stopPropagation();

            showSlide(currentIndex - 1);

        });

    }


    showSlide(0);

});
</script>

@endsection
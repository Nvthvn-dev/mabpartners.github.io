<style>
    /* =========================
       SLIDER TERRAIN
    ========================= */

    .terrain-card .terrain-media {
        position: relative !important;
        width: 100% !important;
        height: 260px !important;
        overflow: hidden !important;
        background: #f1f1f1;
    }

    .terrain-card .terrain-slider {
        position: relative !important;
        width: 100% !important;
        height: 100% !important;
        overflow: hidden !important;
    }

    .terrain-card .terrain-slide {
        position: absolute !important;
        top: 0 !important;
        left: 0 !important;

        display: block !important;

        width: 100% !important;
        height: 100% !important;

        object-fit: cover !important;

        opacity: 0 !important;
        visibility: hidden !important;

        pointer-events: none !important;

        z-index: 1 !important;

        transition: opacity 0.3s ease;
    }

    .terrain-card .terrain-slide.active {
        opacity: 1 !important;
        visibility: visible !important;
        pointer-events: auto !important;
        z-index: 2 !important;
    }

    /* =========================
       BOUTONS SLIDER
    ========================= */

    .terrain-card .slider-btn {
        position: absolute !important;

        top: 50% !important;
        transform: translateY(-50%) !important;

        z-index: 10 !important;

        width: 42px !important;
        height: 42px !important;

        border: none !important;
        border-radius: 50% !important;

        background: rgba(0, 0, 0, 0.65) !important;
        color: white !important;

        font-size: 24px !important;

        cursor: pointer !important;

        display: flex !important;
        align-items: center !important;
        justify-content: center !important;
    }

    .terrain-card .slider-prev {
        left: 12px !important;
    }

    .terrain-card .slider-next {
        right: 12px !important;
    }

    .terrain-card .slider-btn:hover {
        background: rgba(0, 0, 0, 0.9) !important;
    }

    /* =========================
       STATUT
    ========================= */

    .terrain-card .terrain-media .status {
        position: absolute !important;
        top: 12px !important;
        left: 12px !important;

        z-index: 20 !important;
    }

    /* =========================
       WHATSAPP
    ========================= */

    .whatsapp-terrain {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;

        width: 100%;
        margin-top: 18px;
        padding: 12px 16px;

        box-sizing: border-box;

        border-radius: 8px;

        background: #25D366;
        color: white;

        font-size: 14px;
        font-weight: 700;

        text-decoration: none;

        transition: transform 0.2s ease, background 0.2s ease;
    }

    .whatsapp-terrain:hover {
        background: #1ebe5d;
        color: white;
        transform: translateY(-2px);
    }

    .whatsapp-terrain span {
        font-size: 18px;
    }

    @media (max-width: 768px) {
        .terrain-card .terrain-media {
            height: 230px !important;
        }
    }
</style>


<div class="terrain-card">

    {{-- =========================
         IMAGE / SLIDER
    ========================= --}}

    <div class="terrain-media">

        @if($terrain->images->isNotEmpty())

            <div class="terrain-slider">

                @foreach($terrain->images as $index => $image)

                    <img
                        src="{{ asset('storage/' . $image->image) }}"
                        alt="{{ $terrain->titre }} - Photo {{ $index + 1 }}"
                        class="terrain-slide {{ $index === 0 ? 'active' : '' }}"
                        data-gallery-image
                    >

                @endforeach

                @if($terrain->images->count() > 1)

                    <button
                        type="button"
                        class="slider-btn slider-prev"
                        aria-label="Image précédente"
                    >
                        &#10094;
                    </button>

                    <button
                        type="button"
                        class="slider-btn slider-next"
                        aria-label="Image suivante"
                    >
                        &#10095;
                    </button>

                @endif

            </div>

        @elseif($terrain->image)

            <img
                src="{{ asset('storage/' . $terrain->image) }}"
                alt="{{ $terrain->titre }}"
                style="width:100%;height:100%;object-fit:cover;"
            >

        @else

            <div class="media-placeholder">
                <span>PHOTO DU TERRAIN</span>
            </div>

        @endif


        <span class="status">
            {{ $terrain->statut }}
        </span>

    </div>


    {{-- =========================
         INFORMATIONS TERRAIN
    ========================= --}}

    <div class="terrain-body">

        <span class="reference">
            {{ $terrain->reference }}
        </span>

        <h3>
            <a href="{{ route('terrains.show', $terrain) }}">
                {{ $terrain->titre }}
            </a>
        </h3>

        <p class="location">
            {{ $terrain->quartier }}, {{ $terrain->ville }}
        </p>


        <div class="terrain-meta">

            <span>
                @if($terrain->surface)
                    {{ number_format($terrain->surface, 0, ',', ' ') }} m²
                @else
                    Surface à préciser
                @endif
            </span>

            <strong>
                @if($terrain->prix)
                    {{ number_format($terrain->prix, 0, ',', ' ') }} FCFA
                @else
                    Prix sur demande
                @endif
            </strong>

        </div>


        {{-- =========================
             WHATSAPP
        ========================= --}}

        <a
            href="https://wa.me/2250778613612?text={{ urlencode('Bonjour MAB Partners, je suis intéressé par le terrain ' . $terrain->reference . ' — ' . $terrain->titre . '. Je souhaiterais avoir plus d’informations.') }}"
            class="whatsapp-terrain"
            target="_blank"
            rel="noopener"
        >
            <span>💬</span>
            WhatsApp
        </a>

    </div>

</div>
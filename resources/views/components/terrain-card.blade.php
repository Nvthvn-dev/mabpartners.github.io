<div class="terrain-card">
    <a href="{{ route('terrains.show', $terrain) }}" class="terrain-media">
        @if($terrain->image)<img src="{{ asset($terrain->image) }}" alt="{{ $terrain->titre }}">@else<div class="media-placeholder"><span>PHOTO DU TERRAIN</span></div>@endif
        <span class="status">{{ $terrain->statut }}</span>
    </a>
    <div class="terrain-body"><span class="reference">{{ $terrain->reference }}</span><h3><a href="{{ route('terrains.show', $terrain) }}">{{ $terrain->titre }}</a></h3><p class="location">{{ $terrain->quartier }}, {{ $terrain->ville }}</p><div class="terrain-meta"><span>{{ $terrain->surface ? number_format($terrain->surface, 0, ',', ' ') . ' m²' : 'Surface à préciser' }}</span><strong>{{ $terrain->prix ? number_format($terrain->prix, 0, ',', ' ') . ' FCFA' : 'Prix sur demande' }}</strong></div></div>
</div>

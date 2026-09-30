@extends('layouts.app')
@section('title', $terrain->titre . ' — Mab Partners')
@section('content')
<section class="section detail"><div class="container detail-grid"><div>
<div class="detail-media">
    @if($terrain->image) 
        <img src="{{ asset('storage/' . $terrain->image) }}" 
            alt="{{ $terrain->titre }}"
            class="img-fluid">
        @else<div class="media-placeholder large"><span>PHOTO DU TERRAIN</span></div>@endif</div>
    @if($terrain->video)<div class="video-wrap"><video controls width="100%">
        <source src="{{ asset('storage/' . $terrain->video) }}" type="video/mp4">
            Votre navigateur ne prend pas en charge la lecture vidéo.
        </video>
    </div>@endif
</div>
<div class="detail-copy"><span class="reference">{{ $terrain->reference }}</span><h1>{{ $terrain->titre }}</h1><p class="location">{{ $terrain->quartier }}, {{ $terrain->ville }}</p><div class="price">{{ $terrain->prix ? number_format($terrain->prix, 0, ',', ' ') . ' FCFA' : 'Prix sur demande' }}</div><div class="facts"><div><small>Superficie</small><strong>{{ $terrain->surface ? number_format($terrain->surface, 0, ',', ' ') . ' m²' : 'À préciser' }}</strong></div><div><small>Statut</small><strong>{{ $terrain->statut }}</strong></div></div><p class="description">{{ $terrain->description }}</p>@if($terrain->caracteristiques)<ul class="features">@foreach($terrain->caracteristiques as $feature)<li>✓ {{ $feature }}</li>@endforeach</ul>@endif<a href="{{ route('rendezvous.create', $terrain) }}" class="btn btn-primary btn-full">Je suis intéressé — prendre rendez-vous</a></div></div></section>
@endsection

@extends('layouts.app')
@section('title', 'Mab Partners — Trouvez votre terrain')
@section('content')
<section class="hero">
    <div class="container hero-grid">
        <div class="hero-copy">
            <span class="eyebrow">MAB PARTNERS · IMMOBILIER</span>
            <h1>Le terrain qui donne vie à votre projet.</h1>
            <p>Découvrez nos parcelles disponibles, consultez leurs informations et prenez rendez-vous simplement pour une visite.</p>
            <div class="hero-actions"><a href="{{ route('terrains.index') }}" class="btn btn-primary">Voir les terrains</a><a href="{{ route('rendezvous.create') }}" class="btn btn-light">Prendre rendez-vous</a></div>
        </div>
        <div class="hero-card"><img src="{{ asset('images/logo.png') }}" alt="Mab Partners"><div><strong>Des opportunités sélectionnées</strong><span>Présentées clairement, au même endroit.</span></div></div>
    </div>
</section>
<section class="section">
    <div class="container">
        <div class="section-head"><div><span class="eyebrow">À LA UNE</span><h2>Terrains disponibles</h2></div><a href="{{ route('terrains.index') }}" class="text-link">Tout voir →</a></div>
        <div class="cards">@forelse($terrains as $terrain)<x-terrain-card :terrain="$terrain" />@empty<p>Aucun terrain n'est encore publié. Ajoutez vos terrains dans la base de données.</p>@endforelse</div>
    </div>
</section>
<section class="process section-soft"><div class="container"><div class="section-head"><div><span class="eyebrow">COMMENT ÇA MARCHE ?</span><h2>Simple, rapide et transparent.</h2></div></div><div class="steps"><div><b>01</b><h3>Choisissez</h3><p>Parcourez les terrains et consultez leurs détails.</p></div><div><b>02</b><h3>Regardez</h3><p>Ajoutez vos photos et vidéos pour mieux présenter chaque parcelle.</p></div><div><b>03</b><h3>Rencontrez-nous</h3><p>Réservez un créneau pour échanger et organiser une visite.</p></div></div></div></section>
@endsection

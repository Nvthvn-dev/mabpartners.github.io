@extends('layouts.app')
@section('title', 'Demande enregistrée — Mab Partners')
@section('content')
<section class="section confirmation"><div class="container"><div class="confirmation-card"><div class="check">✓</div><span class="eyebrow">DEMANDE ENREGISTRÉE</span><h1>Merci {{ $rendezVous->nom }}.</h1><p>Votre demande de rendez-vous a bien été reçue. Nous reviendrons vers vous pour confirmer le créneau.</p><div class="summary"><div><small>Terrain</small><strong>{{ $rendezVous->terrain->titre }}</strong></div><div><small>Date</small><strong>{{ $rendezVous->date_rendez_vous->format('d/m/Y') }}</strong></div><div><small>Heure souhaitée</small><strong>{{ substr($rendezVous->heure_rendez_vous,0,5) }}</strong></div></div><a href="{{ route('terrains.index') }}" class="btn btn-primary">Continuer à découvrir</a></div></div></section>
@endsection

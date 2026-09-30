@extends('layouts.app')
@section('title', 'Nos terrains — Mab Partners')
@section('content')
<section class="page-hero"><div class="container"><span class="eyebrow">CATALOGUE</span><h1>Nos terrains</h1><p>Trouvez la parcelle correspondant à votre projet.</p></div></section>
<section class="section"><div class="container">
<form class="filters" method="GET" action="{{ route('terrains.index') }}"><input name="ville" value="{{ request('ville') }}" placeholder="Ville ou zone"><input type="number" name="min_surface" value="{{ request('min_surface') }}" placeholder="Surface min. (m²)"><button class="btn btn-primary" type="submit">Rechercher</button></form>
<div class="cards">@forelse($terrains as $terrain)<x-terrain-card :terrain="$terrain" />@empty<div class="empty"><h3>Aucun résultat</h3><p>Essayez d'autres critères de recherche.</p></div>@endforelse</div>
<div class="pagination">{{ $terrains->links() }}</div>
</div></section>
@endsection

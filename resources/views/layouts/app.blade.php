<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Mab Partners — Terrains à vendre')</title>
    <meta name="description" content="Mab Partners — découvrez nos terrains à vendre et prenez rendez-vous pour une visite.">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800&family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/site.css') }}">
</head>
<body>
<header class="site-header">
    <div class="container nav-wrap">
        <a href="{{ route('home') }}" class="brand"><img src="{{ asset('images/logo.png') }}" alt="Mab Partners"><span>Mab Partners Immobilier</span></a>
        <button class="menu-toggle" aria-label="Menu">☰</button>
        <nav class="main-nav">
            <a href="{{ route('home') }}">Accueil</a>
            <a href="{{ route('terrains.index') }}">Nos terrains</a>
            <a href="{{ route('rendezvous.create') }}" class="nav-cta">Prendre rendez-vous</a>
        </nav>
    </div>
</header>
<main>@yield('content')</main>
<footer class="footer">
    <div class="container footer-grid">
        <div><img src="{{ asset('images/logo.png') }}" class="footer-logo" alt="Mab Partners"><p>Votre partenaire pour trouver un terrain adapté à votre projet.</p></div>
        <div><h4>Navigation</h4><a href="{{ route('home') }}">Accueil</a><a href="{{ route('terrains.index') }}">Terrains</a><a href="{{ route('rendezvous.create') }}">Rendez-vous</a></div>
        <div><h4>Contact</h4><p>Abidjan, Côte d'Ivoire</p><p>Ajoutez ici vos coordonnées.</p></div>
    </div>
    <div class="footer-bottom">© {{ date('Y') }} Mab Partners. Tous droits réservés.</div>
</footer>
<script src="{{ asset('js/site.js') }}"></script>
</body>
</html>

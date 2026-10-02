<?php

namespace App\Http\Controllers;

use App\Models\Terrain;
use Illuminate\Http\Request;

class TerrainController extends Controller
{
    public function home()
    {
        $terrains = Terrain::with('images')
            ->where('statut', 'Disponible')
            ->latest()
            ->take(6)
            ->get();

        return view('terrains.home', compact('terrains'));
    }

    public function index(Request $request)
    {
        $query = Terrain::with('images')
            ->where('statut', 'Disponible');

        if ($request->filled('ville')) {
            $query->where('ville', 'like', '%' . $request->ville . '%');
        }

        if ($request->filled('min_surface')) {
            $query->where('surface', '>=', (int) $request->min_surface);
        }

        $terrains = $query
            ->latest()
            ->paginate(9)
            ->withQueryString();

        return view('terrains.index', compact('terrains'));
    }

    public function show(Terrain $terrain)
    {
        $terrain->load('images');

        return view('terrains.show', compact('terrain'));
    }
}
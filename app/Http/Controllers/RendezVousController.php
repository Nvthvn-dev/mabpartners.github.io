<?php

namespace App\Http\Controllers;

use App\Models\RendezVous;
use App\Models\Terrain;
use Illuminate\Http\Request;

class RendezVousController extends Controller
{
    public function create(?Terrain $terrain = null)
    {
        $terrains = Terrain::where('statut', 'Disponible')->orderBy('titre')->get();
        return view('rendezvous.create', compact('terrains', 'terrain'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'terrain_id' => ['required', 'exists:terrains,id'],
            'nom' => ['required', 'string', 'max:120'],
            'telephone' => ['required', 'string', 'max:30'],
            'email' => ['nullable', 'email', 'max:150'],
            'date_rendez_vous' => ['required', 'date', 'after_or_equal:today'],
            'heure_rendez_vous' => ['required', 'date_format:H:i'],
            'message' => ['nullable', 'string', 'max:1000'],
        ]);

        $validated['statut'] = 'En attente';
        $rdv = RendezVous::create($validated);

        return redirect()->route('rendezvous.confirmation', $rdv)->with('success', 'Votre demande de rendez-vous a bien été enregistrée.');
    }

    public function confirmation(RendezVous $rendezVous)
    {
        $rendezVous->load('terrain');
        return view('rendezvous.confirmation', compact('rendezVous'));
    }
}

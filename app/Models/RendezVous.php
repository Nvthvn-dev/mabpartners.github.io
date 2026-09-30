<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RendezVous extends Model
{
    protected $table = 'rendez_vous';

    protected $fillable = [
        'terrain_id', 'nom', 'telephone', 'email', 'date_rendez_vous',
        'heure_rendez_vous', 'message', 'statut'
    ];

    protected $casts = [
        'date_rendez_vous' => 'date',
    ];

    public function terrain(): BelongsTo
    {
        return $this->belongsTo(Terrain::class);
    }
}

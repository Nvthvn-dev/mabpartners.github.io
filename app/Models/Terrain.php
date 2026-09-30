<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Terrain extends Model
{
    protected $fillable = [
        'reference', 'titre', 'slug', 'ville', 'quartier', 'surface',
        'prix', 'description', 'image', 'video', 'statut', 'caracteristiques'
    ];

    protected $casts = [
        'caracteristiques' => 'array',
        'surface' => 'integer',
        'prix' => 'decimal:0',
    ];

    public function rendezVous(): HasMany
    {
        return $this->hasMany(RendezVous::class);
    }
}

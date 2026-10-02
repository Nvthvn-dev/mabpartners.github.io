<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TerrainImage extends Model
{
    protected $fillable = [
        'terrain_id',
        'image',
        'ordre',
    ];

    public function terrain(): BelongsTo
    {
        return $this->belongsTo(Terrain::class);
    }
}
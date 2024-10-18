<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Temporada extends Model
{
    use HasFactory;

    public function seriado(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Seriado::class);
    }

    public function episodios(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Episodio::class);
    }
}

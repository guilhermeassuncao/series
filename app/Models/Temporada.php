<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


/**
 * @property int $id
 * @property string $numero
 * @property int $seriado_id
 * @property Seriado $seriado
 * @property Episodio[] $episodios
 */

class Temporada extends Model
{
    use HasFactory;
    protected $fillable = ['numero'];

    public function seriado(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Seriado::class);
    }

    public function episodios(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Episodio::class);
    }
}

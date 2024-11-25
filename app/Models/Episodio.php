<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $numero
 * @property int $temporada_id
 * @property Temporada $temporada
 */

class Episodio extends Model
{
    use HasFactory;
    protected $fillable = ['numero'];

    public $timestamps = false;

    public function temporada(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Temporada::class);
    }
}

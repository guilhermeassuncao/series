<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property string nome
 */

class Seriado extends Model
{
    use HasFactory;

    protected $fillable = ['nome'];

    public function temporadas(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Temporada::class);
    }

    protected static function booted()
    {
        self::addGlobalScope();
    }
}

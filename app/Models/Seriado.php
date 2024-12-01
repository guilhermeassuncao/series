<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\HasMany;


/**
 * @property int $id
 * @property string $nome
 * @property Temporada[]|Collection $temporadas
 */

class Seriado extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'capa'];

    public function temporadas(): HasMany
    {
        return $this->hasMany(Temporada::class);
    }

    protected static function booted(): void
    {
        self::addGlobalScope('ordenado', function (Builder $queryBuilder) {
            $queryBuilder->orderBy('nome');
        });
    }
}

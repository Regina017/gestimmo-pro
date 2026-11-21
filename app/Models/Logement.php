<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Logement extends Model
{
    use HasFactory;

    protected $table = 'logements';

    protected $fillable = [
        'immeuble_id',
        'numero',
        'type',
        'loyer',
        'statut',
    ];

    protected $casts = [
        'loyer' => 'decimal:2',
    ];

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */

    public function immeuble()
    {
        return $this->belongsTo(
            Immeuble::class
        );
    }

    public function contrats()
    {
        return $this->hasMany(
            Contrat::class
        );
    }

    /*
    |--------------------------------------------------------------------------
    | ACCESSORS
    |--------------------------------------------------------------------------
    */

    public function getLoyerFormateAttribute()
    {
        return number_format(
            $this->loyer,
            2,
            ',',
            ' '
        ) . ' $';
    }

    /*
    |--------------------------------------------------------------------------
    | SCOPES
    |--------------------------------------------------------------------------
    */

    public function scopeVacants($query)
    {
        return $query->where(
            'statut',
            'Vacant'
        );
    }

    public function scopeOccupes($query)
    {
        return $query->where(
            'statut',
            'Occupé'
        );
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Immeuble extends Model
{
    protected $fillable = [
        'proprietaire_id',
        'nom',
        'adresse',
        'ville',
        'nombre_logements',
        'description'
    ];

    public function proprietaire()
    {
        return $this->belongsTo(Proprietaire::class);
    }

    public function logements()
    {
        return $this->hasMany(Logement::class);
    }
}
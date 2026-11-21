<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Locataire extends Model
{
    protected $fillable = [
        'nom',
        'prenom',
        'telephone',
        'email',
        'adresse',
        'piece_identite',
        'photo'
    ];

    public function occupations()
    {
        return $this->hasMany(Occupation::class);
    }

    public function contrats()
    {
        return $this->hasMany(Contrat::class);
    }
}
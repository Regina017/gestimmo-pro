<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Proprietaire extends Model
{
    protected $fillable = [
        'nom',
        'prenom',
        'telephone',
        'email',
        'adresse'
    ];

    public function immeubles()
    {
        return $this->hasMany(Immeuble::class);
    }
}
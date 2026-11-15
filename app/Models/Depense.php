<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Depense extends Model
{
    protected $fillable = [
        'date_depense',
        'categorie',
        'libelle',
        'montant'
    ];
}

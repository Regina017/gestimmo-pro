<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Approbation extends Model
{
    protected $fillable = [

        'module',
        'action',
        'utilisateur',
        'donnees',
        'statut',

    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Caisse extends Model
{
    protected $fillable = [

        'date_operation',
        'type_operation',
        'libelle',
        'montant'

    ];
}

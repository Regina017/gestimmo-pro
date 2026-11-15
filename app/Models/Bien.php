<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bien extends Model
{
    protected $fillable = [
        'reference',
        'type',
        'adresse',
        'loyer',
        'caution',
        'statut'
    ];

    public function occupations()
    {
        return $this->hasMany(Occupation::class);
    }
}
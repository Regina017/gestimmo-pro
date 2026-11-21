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
        'statut',
        'proprietaire_id'
    ];

    /**
     * Propriétaire du bien
     */
    public function proprietaire()
    {
        return $this->belongsTo(Proprietaire::class);
    }

    /**
     * Occupations du bien
     */
    public function occupations()
    {
        return $this->hasMany(Occupation::class);
    }

    /**
     * Contrats liés au bien
     */
    public function contrats()
    {
        return $this->hasMany(Contrat::class);
    }

    /**
     * Locataire actuel
     */
    public function locataireActuel()
    {
        return $this->hasOne(Occupation::class)
            ->whereNull('date_fin')
            ->latest();
    }
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Contrat extends Model
{
    use HasFactory;

    protected $table = 'contrats';

    protected $fillable = [
        'locataire_id',
        'logement_id',
        'date_debut',
        'date_fin',
        'loyer',
        'caution',
        'statut',
    ];

    protected $casts = [
        'date_debut' => 'date',
        'date_fin'   => 'date',
        'loyer'      => 'decimal:2',
        'caution'    => 'decimal:2',
    ];

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */

    public function locataire()
    {
        return $this->belongsTo(
            Locataire::class
        );
    }

    public function logement()
    {
        return $this->belongsTo(
            Logement::class
        );
    }

    public function paiements()
    {
        return $this->hasMany(
            Paiement::class
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

    public function getCautionFormateeAttribute()
    {
        return number_format(
            $this->caution,
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

    public function scopeActifs($query)
    {
        return $query->where(
            'statut',
            'Actif'
        );
    }

    public function scopeTermines($query)
    {
        return $query->where(
            'statut',
            'Terminé'
        );
    }
}
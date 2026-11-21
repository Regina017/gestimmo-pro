<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paiement extends Model
{
    use HasFactory;

    protected $fillable = [
        'contrat_id',
        'date_paiement',
        'montant',
        'mode_paiement',
        'reference',
        'observation',
    ];

    protected $casts = [
        'date_paiement' => 'date',
    ];

    public function contrat()
    {
        return $this->belongsTo(Contrat::class);
    }
}
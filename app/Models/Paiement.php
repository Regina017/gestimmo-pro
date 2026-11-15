<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Paiement extends Model
{
    protected $fillable = [
        'occupation_id',
        'date_paiement',
        'montant',
        'reste',
        'mode_paiement'
    ];

    public function occupation()
    {
        return $this->belongsTo(Occupation::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Societe extends Model
{
    protected $table = 'societes';

    protected $fillable = [
        'nom',
        'telephone',
        'email',
        'adresse',
        'ville',
        'logo',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * URL complète du logo
     */
public function getLogoUrlAttribute(): ?string
{
    if (empty($this->logo)) {
        return null;
    }

    return asset(
        'storage/' . $this->logo
    );
}
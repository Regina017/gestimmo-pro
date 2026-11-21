<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'identifiant',
        'telephone',
        'email',
        'password',
        'role',
        'statut',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /*
    |--------------------------------------------------------------------------
    | Rôles
    |--------------------------------------------------------------------------
    */

    public function isAdmin(): bool
    {
        return $this->role === 'Administrateur';
    }

    public function isUtilisateur(): bool
    {
        return $this->role === 'Utilisateur';
    }

    public function isConsultation(): bool
    {
        return $this->role === 'Consultation';
    }

    /*
    |--------------------------------------------------------------------------
    | Statut
    |--------------------------------------------------------------------------
    */

    public function isActif(): bool
    {
        return $this->statut === 'Actif';
    }

    public function isBloque(): bool
    {
        return $this->statut === 'Bloqué';
    }
}
<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            [
                'identifiant' => 'Clement'
            ],
            [
                'name'        => 'Clement',
                'identifiant' => 'Clement',
                'email'       => 'clement_mathe@hotmail.com',
                'telephone'   => null,
                'password'    => Hash::make('Sebastien$1114'),
                'role'        => 'Administrateur',
                'statut'      => 'Actif',
            ]
        );
    }
}
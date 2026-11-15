<?php

namespace App\Http\Controllers;

use App\Models\Occupation;

class EcheancierController extends Controller
{
    public function index()
    {
        $occupations = Occupation::with([
            'bien',
            'locataire'
        ])->orderBy(
            'date_sortie',
            'asc'
        )->get();

        return view(
            'echeancier.index',
            compact('occupations')
        );
    }
}
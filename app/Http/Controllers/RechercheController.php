<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Bien;
use App\Models\Locataire;
use App\Models\Occupation;
use App\Models\Paiement;
use App\Models\Depense;

class RechercheController extends Controller
{
    public function index(Request $request)
    {
        $mot = $request->get('mot');

        $biens = collect();
        $locataires = collect();
        $paiements = collect();
        $depenses = collect();

        if ($mot) {

            $biens = Bien::where(
                'reference',
                'like',
                "%{$mot}%"
            )
            ->orWhere(
                'adresse',
                'like',
                "%{$mot}%"
            )
            ->get();

            $locataires = Locataire::where(
                'nom',
                'like',
                "%{$mot}%"
            )
            ->orWhere(
                'prenom',
                'like',
                "%{$mot}%"
            )
            ->orWhere(
                'telephone',
                'like',
                "%{$mot}%"
            )
            ->get();

            $paiements = Paiement::where(
                'montant',
                'like',
                "%{$mot}%"
            )->get();

            $depenses = Depense::where(
                'libelle',
                'like',
                "%{$mot}%"
            )
            ->orWhere(
                'categorie',
                'like',
                "%{$mot}%"
            )
            ->get();
        }

        return view(
            'recherche.index',
            compact(
                'mot',
                'biens',
                'locataires',
                'paiements',
                'depenses'
            )
        );
    }
}
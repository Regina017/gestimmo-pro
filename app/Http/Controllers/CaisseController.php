<?php

namespace App\Http\Controllers;

use App\Models\Paiement;
use App\Models\Depense;

class CaisseController extends Controller
{
    public function index()
    {
        $totalPaiements = Paiement::sum('montant');

        $totalDepenses = Depense::sum('montant');

        $solde = $totalPaiements - $totalDepenses;

        return view(
            'caisse.index',
            compact(
                'totalPaiements',
                'totalDepenses',
                'solde'
            )
        );
    }
}
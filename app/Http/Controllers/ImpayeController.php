<?php

namespace App\Http\Controllers;

use App\Models\Contrat;
use App\Models\Paiement;

class ImpayeController extends Controller
{
    public function index()
    {
        $impayes = [];

        $contrats = Contrat::with(
            'locataire',
            'logement'
        )->get();

        foreach ($contrats as $contrat) {

            $paiement = Paiement::where(
                'contrat_id',
                $contrat->id
            )
            ->whereMonth(
                'date_paiement',
                now()->month
            )
            ->whereYear(
                'date_paiement',
                now()->year
            )
            ->first();

            if (!$paiement) {

                $impayes[] = $contrat;

            }
        }

        return view(
            'impayes.index',
            compact('impayes')
        );
    }
}
<?php

namespace App\Http\Controllers;

use App\Models\Paiement;
use App\Models\Occupation;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class PaiementController extends Controller
{
    public function index()
    {
        $paiements = Paiement::with([
            'occupation'
        ])->get();

        return view(
            'paiements.index',
            compact('paiements')
        );
    }

    public function create()
    {
        if (auth()->user()->role == 'Consultation') {
            abort(403);
        }

        $occupations = Occupation::with([
            'bien',
            'locataire'
        ])->get();

        return view(
            'paiements.create',
            compact('occupations')
        );
    }

    public function store(Request $request)
    {
        if (auth()->user()->role == 'Consultation') {
            abort(403);
        }

        $request->validate([
            'occupation_id' => 'required',
            'date_paiement' => 'required|date',
            'montant' => 'required|numeric',
        ]);

        Paiement::create(
            $request->all()
        );

        return redirect()
            ->route('paiements.index')
            ->with(
                'success',
                'Paiement enregistré avec succès.'
            );
    }

    public function show(Paiement $paiement)
    {
        return view(
            'paiements.show',
            compact('paiement')
        );
    }

    public function edit(Paiement $paiement)
    {
        if (auth()->user()->role == 'Consultation') {
            abort(403);
        }

        $occupations = Occupation::with([
            'bien',
            'locataire'
        ])->get();

        return view(
            'paiements.edit',
            compact(
                'paiement',
                'occupations'
            )
        );
    }

    public function update(
        Request $request,
        Paiement $paiement
    ) {
        if (auth()->user()->role == 'Consultation') {
            abort(403);
        }

        $request->validate([
            'occupation_id' => 'required',
            'date_paiement' => 'required|date',
            'montant' => 'required|numeric',
        ]);

        $paiement->update(
            $request->all()
        );

        return redirect()
            ->route('paiements.index')
            ->with(
                'success',
                'Paiement modifié avec succès.'
            );
    }

    public function destroy(Paiement $paiement)
    {
        if (
            auth()->user()->role !=
            'Administrateur'
        ) {
            abort(403);
        }

        $paiement->delete();

        return redirect()
            ->route('paiements.index')
            ->with(
                'success',
                'Paiement supprimé avec succès.'
            );
    }

    /*
    |--------------------------------------------------------------------------
    | REÇU PDF
    |--------------------------------------------------------------------------
    */

    public function recu(
        Paiement $paiement
    ) {
        $occupation = Occupation::with([
            'locataire',
            'bien'
        ])->find(
            $paiement->occupation_id
        );

        $pdf = Pdf::loadView(
            'paiements.recu',
            [
                'paiement' => $paiement,
                'occupation' => $occupation
            ]
        );

        return $pdf->download(
            'Recu-' .
            str_pad(
                $paiement->id,
                6,
                '0',
                STR_PAD_LEFT
            ) .
            '.pdf'
        );
    }
}
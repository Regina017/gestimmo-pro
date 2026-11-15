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
        $paiements = Paiement::with('occupation')->get();

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

        Paiement::create($request->all());

        return redirect()
            ->route('paiements.index');
    }

    public function edit(Paiement $paiement)
    {
        if (auth()->user()->role == 'Consultation') {
            abort(403);
        }

        return view(
            'paiements.edit',
            compact('paiement')
        );
    }

    public function update(
        Request $request,
        Paiement $paiement
    )
    {
        if (auth()->user()->role == 'Consultation') {
            abort(403);
        }

        $paiement->update(
            $request->all()
        );

        return redirect()
            ->route('paiements.index');
    }

    public function destroy(Paiement $paiement)
    {
        if (auth()->user()->role != 'Administrateur') {
            abort(403);
        }

        $paiement->delete();

        return redirect()
            ->route('paiements.index');
    }

    public function recu(Paiement $paiement)
    {
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
            $paiement->id .
            '.pdf'
        );
    }
}
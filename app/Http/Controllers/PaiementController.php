<?php

namespace App\Http\Controllers;

use App\Models\Paiement;
use App\Models\Contrat;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class PaiementController extends Controller
{
    public function index()
    {
        $paiements = Paiement::latest()->paginate(10);

        return view(
            'paiements.index',
            compact('paiements')
        );
    }

    public function create()
    {
        $contrats = Contrat::all();

        return view(
            'paiements.create',
            compact('contrats')
        );
    }

    public function store(Request $request)
    {
        $request->validate([
            'contrat_id'    => 'required',
            'date_paiement' => 'required|date',
            'montant'       => 'required|numeric',
            'mode_paiement' => 'required',
        ]);

        Paiement::create($request->all());

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
        $contrats = Contrat::all();

        return view(
            'paiements.edit',
            compact(
                'paiement',
                'contrats'
            )
        );
    }

    public function update(
        Request $request,
        Paiement $paiement
    )
    {
        $request->validate([
            'contrat_id'    => 'required',
            'date_paiement' => 'required|date',
            'montant'       => 'required|numeric',
            'mode_paiement' => 'required',
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
        $paiement->delete();

        return redirect()
            ->route('paiements.index')
            ->with(
                'success',
                'Paiement supprimé.'
            );
    }

    public function recu(Paiement $paiement)
    {
        $pdf = Pdf::loadView(
            'paiements.recu',
            compact('paiement')
        );

        return $pdf->stream(
            'recu-'.$paiement->id.'.pdf'
        );
    }

    public function quittance(Paiement $paiement)
    {
        $pdf = Pdf::loadView(
            'paiements.quittance',
            compact('paiement')
        );

        return $pdf->stream(
            'quittance-'.$paiement->id.'.pdf'
        );
    }
}
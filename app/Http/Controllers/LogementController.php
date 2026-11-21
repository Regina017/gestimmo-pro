<?php

namespace App\Http\Controllers;

use App\Models\Logement;
use App\Models\Immeuble;
use Illuminate\Http\Request;

class LogementController extends Controller
{
    /**
     * Liste des logements
     */
    public function index()
    {
        $logements = Logement::with('immeuble')
            ->latest()
            ->paginate(10);

        return view(
            'logements.index',
            compact('logements')
        );
    }

    /**
     * Formulaire de création
     */
    public function create()
    {
        $immeubles = Immeuble::orderBy('nom')
            ->get();

        return view(
            'logements.create',
            compact('immeubles')
        );
    }

    /**
     * Enregistrement
     */
    public function store(Request $request)
    {
        $request->validate([
            'numero'      => 'required|max:50',
            'type'        => 'required|max:100',
            'loyer'       => 'required|numeric|min:0',
            'immeuble_id' => 'required|exists:immeubles,id',
        ]);

        Logement::create([
            'numero'      => $request->numero,
            'type'        => $request->type,
            'loyer'       => $request->loyer,
            'immeuble_id' => $request->immeuble_id,
        ]);

        return redirect()
            ->route('logements.index')
            ->with(
                'success',
                'Logement ajouté avec succès.'
            );
    }

    /**
     * Affichage détail
     */
    public function show(Logement $logement)
    {
        return view(
            'logements.show',
            compact('logement')
        );
    }

    /**
     * Formulaire modification
     */
    public function edit(Logement $logement)
    {
        $immeubles = Immeuble::orderBy('nom')
            ->get();

        return view(
            'logements.edit',
            compact(
                'logement',
                'immeubles'
            )
        );
    }

    /**
     * Mise à jour
     */
    public function update(
        Request $request,
        Logement $logement
    )
    {
        $request->validate([
            'numero'      => 'required|max:50',
            'type'        => 'required|max:100',
            'loyer'       => 'required|numeric|min:0',
            'immeuble_id' => 'required|exists:immeubles,id',
        ]);

        $logement->update([
            'numero'      => $request->numero,
            'type'        => $request->type,
            'loyer'       => $request->loyer,
            'immeuble_id' => $request->immeuble_id,
        ]);

        return redirect()
            ->route('logements.index')
            ->with(
                'success',
                'Logement modifié avec succès.'
            );
    }

    /**
     * Suppression
     */
    public function destroy(Logement $logement)
    {
        $logement->delete();

        return redirect()
            ->route('logements.index')
            ->with(
                'success',
                'Logement supprimé avec succès.'
            );
    }
}
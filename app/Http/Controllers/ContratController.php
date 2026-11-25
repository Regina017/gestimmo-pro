<?php

namespace App\Http\Controllers;

use App\Models\Contrat;
use App\Models\Locataire;
use App\Models\Logement;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class ContratController extends Controller
{
    /**
     * Liste des contrats
     */
    public function index()
    {
        $contrats = Contrat::with([
            'locataire',
            'logement'
        ])
        ->latest()
        ->paginate(10);

        return view(
            'contrats.index',
            compact('contrats')
        );
    }

    /**
     * Formulaire création
     */
    public function create()
    {
        $locataires = Locataire::orderBy('nom')->get();

        $logements = Logement::orderBy('numero')->get();

        return view(
            'contrats.create',
            compact(
                'locataires',
                'logements'
            )
        );
    }

    /**
     * Enregistrement
     */
    public function store(Request $request)
    {
        $request->validate([
            'locataire_id' => 'required|exists:locataires,id',
            'logement_id'  => 'required|exists:logements,id',
            'date_debut'   => 'required|date',
            'date_fin'     => 'required|date|after_or_equal:date_debut',
            'loyer'        => 'required|numeric|min:0',
            'caution'      => 'nullable|numeric|min:0',
            'statut'       => 'required',
        ]);

        Contrat::create([
            'locataire_id' => $request->locataire_id,
            'logement_id'  => $request->logement_id,
            'date_debut'   => $request->date_debut,
            'date_fin'     => $request->date_fin,
            'loyer'        => $request->loyer,
            'caution'      => $request->caution ?? 0,
            'statut'       => $request->statut ?? 'Actif',
        ]);

        return redirect()
            ->route('contrats.index')
            ->with(
                'success',
                'Contrat créé avec succès.'
            );
    }

    /**
     * Affichage
     */
    public function show(Contrat $contrat)
    {
        $contrat->load([
            'locataire',
            'logement'
        ]);

        return view(
            'contrats.show',
            compact('contrat')
        );
    }

    /**
     * Formulaire modification
     */
    public function edit(Contrat $contrat)
    {
        $locataires = Locataire::orderBy('nom')->get();

        $logements = Logement::orderBy('numero')->get();

        return view(
            'contrats.edit',
            compact(
                'contrat',
                'locataires',
                'logements'
            )
        );
    }

    /**
     * Mise à jour
     */
    public function update(
        Request $request,
        Contrat $contrat
    )
    {
        $request->validate([
            'locataire_id' => 'required|exists:locataires,id',
            'logement_id'  => 'required|exists:logements,id',
            'date_debut'   => 'required|date',
            'date_fin'     => 'required|date|after_or_equal:date_debut',
            'loyer'        => 'required|numeric|min:0',
            'caution'      => 'nullable|numeric|min:0',
            'statut'       => 'required',
        ]);

        $contrat->update([
            'locataire_id' => $request->locataire_id,
            'logement_id'  => $request->logement_id,
            'date_debut'   => $request->date_debut,
            'date_fin'     => $request->date_fin,
            'loyer'        => $request->loyer,
            'caution'      => $request->caution ?? 0,
            'statut'       => $request->statut,
        ]);

        return redirect()
            ->route('contrats.index')
            ->with(
                'success',
                'Contrat modifié avec succès.'
            );
    }

    /**
     * Suppression
     */
    public function destroy(Contrat $contrat)
    {
        try {

            $contrat->delete();

            return redirect()
                ->route('contrats.index')
                ->with(
                    'success',
                    'Contrat supprimé avec succès.'
                );

        } catch (\Exception $e) {

            return redirect()
                ->route('contrats.index')
                ->with(
                    'error',
                    'Impossible de supprimer ce contrat.'
                );
        }
    }

    /**
     * PDF du contrat
     */
 public function pdf(Contrat $contrat)
{
    $contrat->load([
        'locataire',
        'logement'
    ]);

    $logoBase64 = $this->getLogoBase64();

    $pdf = Pdf::loadView(
        'contrats.pdf',
        compact(
            'contrat',
            'logoBase64'
        )
    );

    $pdf->setPaper(
        'A4',
        'portrait'
    );

    return $pdf->stream(
        'Contrat-' . $contrat->id . '.pdf'
    );
}

private function getLogoBase64()
{
    $societe = \App\Models\Societe::first();

    if (!$societe || empty($societe->logo)) {
        return null;
    }

    $path = public_path(
        'storage/' . $societe->logo
    );

    if (!file_exists($path)) {
        return null;
    }

    $extension = strtolower(
        pathinfo(
            $path,
            PATHINFO_EXTENSION
        )
    );

    return 'data:image/' .
        $extension .
        ';base64,' .
        base64_encode(
            file_get_contents($path)
        );
}
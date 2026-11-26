<?php

namespace App\Http\Controllers;

use App\Models\Paiement;
use App\Models\Contrat;
use App\Models\Societe;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class PaiementController extends Controller
{
    /**
     * Liste des paiements
     */
    public function index()
    {
        $paiements = Paiement::with([
            'contrat.locataire',
            'contrat.logement'
        ])
        ->latest()
        ->paginate(10);

        return view(
            'paiements.index',
            compact('paiements')
        );
    }

    /**
     * Formulaire création
     */
    public function create()
    {
        $contrats = Contrat::with([
            'locataire',
            'logement'
        ])->get();

        return view(
            'paiements.create',
            compact('contrats')
        );
    }

    /**
     * Enregistrement
     */
    public function store(Request $request)
    {
        $request->validate([
            'contrat_id'     => 'required|exists:contrats,id',
            'date_paiement'  => 'required|date',
            'montant'        => 'required|numeric|min:0',
            'mode_paiement'  => 'required|string|max:255',
        ]);

        Paiement::create([
            'contrat_id'    => $request->contrat_id,
            'date_paiement' => $request->date_paiement,
            'montant'       => $request->montant,
            'mode_paiement' => $request->mode_paiement,
        ]);

        return redirect()
            ->route('paiements.index')
            ->with(
                'success',
                'Paiement enregistré avec succès.'
            );
    }

    /**
     * Affichage
     */
    public function show(Paiement $paiement)
    {
        $paiement->load([
            'contrat.locataire',
            'contrat.logement'
        ]);

        return view(
            'paiements.show',
            compact('paiement')
        );
    }

    /**
     * Formulaire modification
     */
    public function edit(Paiement $paiement)
    {
        $contrats = Contrat::with([
            'locataire',
            'logement'
        ])->get();

        return view(
            'paiements.edit',
            compact(
                'paiement',
                'contrats'
            )
        );
    }

    /**
     * Mise à jour
     */
    public function update(
        Request $request,
        Paiement $paiement
    ) {
        $request->validate([
            'contrat_id'     => 'required|exists:contrats,id',
            'date_paiement'  => 'required|date',
            'montant'        => 'required|numeric|min:0',
            'mode_paiement'  => 'required|string|max:255',
        ]);

        $paiement->update([
            'contrat_id'    => $request->contrat_id,
            'date_paiement' => $request->date_paiement,
            'montant'       => $request->montant,
            'mode_paiement' => $request->mode_paiement,
        ]);

        return redirect()
            ->route('paiements.index')
            ->with(
                'success',
                'Paiement modifié avec succès.'
            );
    }

    /**
     * Suppression
     */
    public function destroy(Paiement $paiement)
    {
        try {

            $paiement->delete();

            return redirect()
                ->route('paiements.index')
                ->with(
                    'success',
                    'Paiement supprimé avec succès.'
                );

        } catch (\Exception $e) {

            return redirect()
                ->route('paiements.index')
                ->with(
                    'error',
                    'Impossible de supprimer ce paiement.'
                );
        }
    }

    /**
     * Reçu PDF
     */
    public function recu(Paiement $paiement)
    {
        $paiement->load([
            'contrat.locataire',
            'contrat.logement'
        ]);

        $logoBase64 = $this->getLogoBase64();

        $pdf = Pdf::loadView(
            'paiements.recu',
            compact(
                'paiement',
                'logoBase64'
            )
        );

        $pdf->setPaper(
            'A4',
            'portrait'
        );

        return $pdf->stream(
            'recu-' . $paiement->id . '.pdf'
        );
    }

    /**
     * Quittance PDF
     */
    public function quittance(Paiement $paiement)
    {
        $paiement->load([
            'contrat.locataire',
            'contrat.logement'
        ]);

        $logoBase64 = $this->getLogoBase64();

        $pdf = Pdf::loadView(
            'paiements.quittance',
            compact(
                'paiement',
                'logoBase64'
            )
        );

        $pdf->setPaper(
            'A4',
            'portrait'
        );

        return $pdf->stream(
            'quittance-' . $paiement->id . '.pdf'
        );
    }

    /**
     * Conversion logo en Base64
     */
    private function getLogoBase64()
    {
        $societe = Societe::first();

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
}
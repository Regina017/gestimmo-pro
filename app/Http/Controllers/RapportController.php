<?php

namespace App\Http\Controllers;

use App\Models\Bien;
use App\Models\Locataire;
use App\Models\Occupation;
use App\Models\Paiement;
use App\Models\Depense;
use App\Models\Contrat;

use App\Exports\BiensExport;
use App\Exports\LocatairesExport;
use App\Exports\PaiementsExport;
use App\Exports\DepensesExport;

use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;

class RapportController extends Controller
{
    public function index()
    {
        return view('rapports.index');
    }

    public function biensPdf()
    {
        $biens = Bien::all();

        $pdf = Pdf::loadView(
            'rapports.biens_pdf',
            compact('biens')
        );

        return $pdf->download('rapport_biens.pdf');
    }

    public function locatairesPdf()
    {
        $locataires = Locataire::all();

        $pdf = Pdf::loadView(
            'rapports.locataires_pdf',
            compact('locataires')
        );

        return $pdf->download('rapport_locataires.pdf');
    }

    public function contratsPdf()
    {
        $contrats = Contrat::with([
            'locataire',
            'logement'
        ])->get();

        $pdf = Pdf::loadView(
            'rapports.contrats_pdf',
            compact('contrats')
        );

        return $pdf->download('rapport_contrats.pdf');
    }

    public function occupationsPdf()
    {
        $occupations = Occupation::with([
            'bien',
            'locataire'
        ])->get();

        $pdf = Pdf::loadView(
            'rapports.occupations_pdf',
            compact('occupations')
        );

        return $pdf->download('rapport_occupations.pdf');
    }

    public function paiementsPdf()
    {
        $paiements = Paiement::all();

        $pdf = Pdf::loadView(
            'rapports.paiements_pdf',
            compact('paiements')
        );

        return $pdf->download('rapport_paiements.pdf');
    }

    public function depensesPdf()
    {
        $depenses = Depense::all();

        $pdf = Pdf::loadView(
            'rapports.depenses_pdf',
            compact('depenses')
        );

        return $pdf->download('rapport_depenses.pdf');
    }

    public function caissePdf()
    {
        $totalPaiements = Paiement::sum('montant');

        $totalDepenses = Depense::sum('montant');

        $solde = $totalPaiements - $totalDepenses;

        $pdf = Pdf::loadView(
            'rapports.caisse_pdf',
            compact(
                'totalPaiements',
                'totalDepenses',
                'solde'
            )
        );

        return $pdf->download('rapport_caisse.pdf');
    }

    public function biensExcel()
    {
        return Excel::download(
            new BiensExport(),
            'Biens.xlsx'
        );
    }

    public function locatairesExcel()
    {
        return Excel::download(
            new LocatairesExport(),
            'Locataires.xlsx'
        );
    }

    public function paiementsExcel()
    {
        return Excel::download(
            new PaiementsExport(),
            'Paiements.xlsx'
        );
    }

    public function depensesExcel()
    {
        return Excel::download(
            new DepensesExport(),
            'Depenses.xlsx'
        );
    }
}
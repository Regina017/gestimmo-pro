<?php

namespace App\Http\Controllers;

use App\Models\Bien;
use App\Models\Locataire;
use App\Models\Occupation;
use App\Models\Paiement;
use App\Models\Depense;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        if (!auth()->check()) {
            return redirect('/login');
        }

        $revenus = Paiement::sum('montant');

        $depenses = Depense::sum('montant');

        $solde = $revenus - $depenses;

        $notifications = [];

        /*
        |--------------------------------------------------------------------------
        | Situation financière
        |--------------------------------------------------------------------------
        */

        if ($revenus > $depenses) {

            $notifications[] = [
                'type' => 'success',
                'message' =>
                    'Les revenus sont supérieurs aux dépenses.'
            ];
        }

        if ($depenses > $revenus) {

            $notifications[] = [
                'type' => 'warning',
                'message' =>
                    'Les dépenses dépassent les revenus.'
            ];
        }

        if ($solde <= 0) {

            $notifications[] = [
                'type' => 'danger',
                'message' =>
                    'Le solde est négatif ou nul.'
            ];
        }

        /*
        |--------------------------------------------------------------------------
        | Vérifications générales
        |--------------------------------------------------------------------------
        */

        if (Bien::count() == 0) {

            $notifications[] = [
                'type' => 'warning',
                'message' =>
                    'Aucun bien enregistré.'
            ];
        }

        if (Locataire::count() == 0) {

            $notifications[] = [
                'type' => 'warning',
                'message' =>
                    'Aucun locataire enregistré.'
            ];
        }

        /*
        |--------------------------------------------------------------------------
        | Paiements en retard
        |--------------------------------------------------------------------------
        */

        $paiementsRetard = Paiement::where(
            'reste',
            '>',
            0
        )->get();

        foreach ($paiementsRetard as $paiement) {

            $occupation = Occupation::find(
                $paiement->occupation_id
            );

            if (
                $occupation &&
                $occupation->locataire
            ) {

                $notifications[] = [

                    'type' => 'danger',

                    'message' =>
                        $occupation->locataire->nom .
                        ' doit encore ' .
                        number_format(
                            $paiement->reste,
                            2
                        ) .
                        ' $'

                ];
            }
        }

        /*
        |--------------------------------------------------------------------------
        | Biens vacants
        |--------------------------------------------------------------------------
        */

        $biensVacants = Bien::whereNotIn(
            'id',
            Occupation::where(
                'statut',
                'Occupé'
            )->pluck('bien_id')
        )->count();

        if ($biensVacants > 0) {

            $notifications[] = [

                'type' => 'success',

                'message' =>
                    $biensVacants .
                    ' bien(s) vacant(s) disponible(s) à la location.'

            ];
        }

        /*
        |--------------------------------------------------------------------------
        | Taux d'occupation
        |--------------------------------------------------------------------------
        */

        $biensTotal = Bien::count();

        $biensOccupes = Occupation::where(
            'statut',
            'Occupé'
        )
        ->distinct('bien_id')
        ->count('bien_id');

        $tauxOccupation = $biensTotal > 0
            ? round(
                ($biensOccupes / $biensTotal) * 100,
                2
            )
            : 0;

        /*
        |--------------------------------------------------------------------------
        | Contrats arrivant à expiration
        |--------------------------------------------------------------------------
        */

        $contratsExpiration = Occupation::with([
            'locataire',
            'bien'
        ])
        ->whereNotNull('date_sortie')
        ->where('date_sortie', '>=', now())
        ->where(
            'date_sortie',
            '<=',
            now()->addDays(30)
        )
        ->get();

        foreach ($contratsExpiration as $occupation) {

            if (
                $occupation->locataire &&
                $occupation->bien
            ) {

                $notifications[] = [

                    'type' => 'warning',

                    'message' =>
                        $occupation->locataire->nom .
                        ' quittera le bien ' .
                        $occupation->bien->reference .
                        ' le ' .
                        date(
                            'd/m/Y',
                            strtotime(
                                $occupation->date_sortie
                            )
                        )

                ];
            }
        }

        /*
        |--------------------------------------------------------------------------
        | Statistiques mensuelles
        |--------------------------------------------------------------------------
        */

        $revenusMensuels = [];

        $depensesMensuelles = [];

        $soldeMensuel = [];

        for ($mois = 1; $mois <= 12; $mois++) {

            $revenu = Paiement::whereMonth(
                'date_paiement',
                $mois
            )->sum('montant');

            $depense = Depense::whereMonth(
                'date_depense',
                $mois
            )->sum('montant');

            $revenusMensuels[] = $revenu;

            $depensesMensuelles[] = $depense;

            $soldeMensuel[] = $revenu - $depense;
        }

        return view(
            'dashboard.index',
            [

                'role' => auth()->user()->role,

                'biens' => Bien::count(),

                'locataires' =>
                    Locataire::count(),

                'biensVacants' =>
                    $biensVacants,

                'biensOccupes' =>
                    $biensOccupes,

                'tauxOccupation' =>
                    $tauxOccupation,

                'utilisateurs' =>
                    User::count(),

                'paiements' =>
                    $revenus,

                'depenses' =>
                    $depenses,

                'solde' =>
                    $solde,

                'notifications' =>
                    $notifications,

                'contratsExpiration' =>
                    $contratsExpiration,

                'revenusMensuels' =>
                    $revenusMensuels,

                'depensesMensuelles' =>
                    $depensesMensuelles,

                'soldeMensuel' =>
                    $soldeMensuel,

            ]
        );
    }
}
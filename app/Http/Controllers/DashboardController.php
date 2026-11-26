<?php

namespace App\Http\Controllers;

use App\Models\Logement;
use App\Models\Locataire;
use App\Models\Contrat;
use App\Models\Paiement;
use App\Models\Depense;

class DashboardController extends Controller
{
    public function index()
    {
        /*
        |--------------------------------------------------------------------------
        | Statistiques générales
        |--------------------------------------------------------------------------
        */

        $totalBiens = Logement::count();

        $totalLocataires = Locataire::count();

        /*
        |--------------------------------------------------------------------------
        | Contrats actifs
        |--------------------------------------------------------------------------
        */

        $contratsActifs = Contrat::where(
            'statut',
            'Actif'
        )->get();

        $totalContrats = $contratsActifs->count();

        /*
        |--------------------------------------------------------------------------
        | Revenus du mois
        |--------------------------------------------------------------------------
        */

        $revenus = Paiement::whereMonth(
            'date_paiement',
            now()->month
        )
        ->whereYear(
            'date_paiement',
            now()->year
        )
        ->sum('montant');

        /*
        |--------------------------------------------------------------------------
        | Dépenses du mois
        |--------------------------------------------------------------------------
        */

        $depenses = Depense::whereMonth(
            'date_depense',
            now()->month
        )
        ->whereYear(
            'date_depense',
            now()->year
        )
        ->sum('montant');

        /*
        |--------------------------------------------------------------------------
        | Bénéfice
        |--------------------------------------------------------------------------
        */

        $benefice = $revenus - $depenses;

        /*
        |--------------------------------------------------------------------------
        | Loyers attendus
        |--------------------------------------------------------------------------
        */

        $loyersAttendus = $contratsActifs->sum(
            'loyer'
        );

        /*
        |--------------------------------------------------------------------------
        | Impayés
        |--------------------------------------------------------------------------
        */

        $impayes = 0;

        foreach ($contratsActifs as $contrat) {

            $paiementExiste = Paiement::where(
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
            ->exists();

            if (!$paiementExiste) {
                $impayes++;
            }
        }

        /*
        |--------------------------------------------------------------------------
        | Échéances sous 7 jours
        |--------------------------------------------------------------------------
        */

        $echeancesLoyer = Contrat::where(
            'statut',
            'Actif'
        )
        ->whereDate(
            'date_fin',
            '<=',
            now()->addDays(7)
        )
        ->whereDate(
            'date_fin',
            '>=',
            now()
        )
        ->count();

        /*
        |--------------------------------------------------------------------------
        | Contrats expirés
        |--------------------------------------------------------------------------
        */

        $contratsEnRetard = Contrat::where(
            'statut',
            'Actif'
        )
        ->whereDate(
            'date_fin',
            '<',
            now()
        )
        ->count();

        /*
        |--------------------------------------------------------------------------
        | Paiements récents
        |--------------------------------------------------------------------------
        */

        $paiementsRecents = Paiement::latest()
            ->take(10)
            ->get();

        /*
        |--------------------------------------------------------------------------
        | Notifications
        |--------------------------------------------------------------------------
        */

        $totalNotifications =
            $impayes +
            $echeancesLoyer +
            $contratsEnRetard;

        /*
        |--------------------------------------------------------------------------
        | Courbe impayés
        |--------------------------------------------------------------------------
        */

        $impayesParMois = [];

        for ($mois = 1; $mois <= 12; $mois++) {

            $nbImpayes = 0;

            foreach ($contratsActifs as $contrat) {

                $paiementTrouve = Paiement::where(
                    'contrat_id',
                    $contrat->id
                )
                ->whereMonth(
                    'date_paiement',
                    $mois
                )
                ->whereYear(
                    'date_paiement',
                    now()->year
                )
                ->exists();

                if (!$paiementTrouve) {
                    $nbImpayes++;
                }
            }

            $impayesParMois[] = $nbImpayes;
        }

        /*
|--------------------------------------------------------------------------
| Graphique Occupation logements
|--------------------------------------------------------------------------
*/

$logementsOccupes = $totalContrats;

$logementsLibres = max(
    0,
    $totalBiens - $totalContrats
);

/*
|--------------------------------------------------------------------------
| Graphique Contrats
|--------------------------------------------------------------------------
*/

$contratsActifsCount = Contrat::where(
    'statut',
    'Actif'
)->count();

$contratsTerminesCount = Contrat::where(
    'statut',
    'Terminé'
)->count();

$contratsSuspendusCount = Contrat::where(
    'statut',
    'Suspendu'
)->count();
return view(
            'dashboard.index',
compact(
    'totalBiens',
    'totalLocataires',
    'totalContrats',
    'revenus',
    'depenses',
    'benefice',
    'impayes',
    'totalNotifications',
    'echeancesLoyer',
    'contratsEnRetard',
    'paiementsRecents',
    'impayesParMois',
    'loyersAttendus',

    'logementsOccupes',
    'logementsLibres',

    'contratsActifsCount',
    'contratsTerminesCount',
    'contratsSuspendusCount'
)

        );
    }
}
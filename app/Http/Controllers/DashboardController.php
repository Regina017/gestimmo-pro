<?php

namespace App\Http\Controllers;

use App\Models\Immeuble;
use App\Models\Logement;
use App\Models\Locataire;
use App\Models\Contrat;
use App\Models\Paiement;

class DashboardController extends Controller
{
    public function index()
    {
        /*
        |--------------------------------------------------------------------------
        | Statistiques générales
        |--------------------------------------------------------------------------
        */

        $nbImmeubles = Immeuble::count();
        $nbLogements = Logement::count();
        $nbLocataires = Locataire::count();

        /*
        |--------------------------------------------------------------------------
        | Contrats actifs
        |--------------------------------------------------------------------------
        */

        $contratsActifs = Contrat::where(
            'statut',
            'Actif'
        )->get();

        $nbContrats = $contratsActifs->count();

        /*
        |--------------------------------------------------------------------------
        | Logements
        |--------------------------------------------------------------------------
        */

        $logementsOccupes = $nbContrats;

        $logementsLibres =
            max(
                0,
                $nbLogements - $logementsOccupes
            );

        /*
        |--------------------------------------------------------------------------
        | Revenus du mois
        |--------------------------------------------------------------------------
        */

        $revenusMois = Paiement::whereMonth(
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
        | Loyers attendus
        |--------------------------------------------------------------------------
        */

        $loyersAttendus =
            $contratsActifs->sum('loyer');

        /*
        |--------------------------------------------------------------------------
        | Loyers impayés
        |--------------------------------------------------------------------------
        */

        $impayes = 0;

        foreach ($contratsActifs as $contrat) {

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

            if (! $paiement) {
                $impayes++;
            }
        }

        /*
        |--------------------------------------------------------------------------
        | Contrats expirant sous 30 jours
        |--------------------------------------------------------------------------
        */

        $contratsExpirant = Contrat::whereDate(
                'date_fin',
                '<=',
                now()->addDays(30)
            )
            ->whereDate(
                'date_fin',
                '>=',
                now()
            )
            ->get();

        /*
        |--------------------------------------------------------------------------
        | NOUVEAU V1.2
        | Échéances dans les 7 jours
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
        | NOUVEAU V1.2
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
        | Données financières
        |--------------------------------------------------------------------------
        */

        $revenus = $revenusMois;

        $depenses = 0;

        $benefice =
            $revenus - $depenses;

        /*
        |--------------------------------------------------------------------------
        | Notifications
        |--------------------------------------------------------------------------
        */

        $totalNotifications =
            $impayes
            + $contratsExpirant->count()
            + $logementsLibres
            + $echeancesLoyer
            + $contratsEnRetard;

        /*
        |--------------------------------------------------------------------------
        | Graphique impayés
        |--------------------------------------------------------------------------
        */

        $impayesParMois = [];

        for ($mois = 1; $mois <= 12; $mois++) {

            $nbImpayesMois = 0;

            foreach ($contratsActifs as $contrat) {

                $paiementMois = Paiement::where(
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
                    ->first();

                if (! $paiementMois) {

                    $nbImpayesMois++;
                }
            }

            $impayesParMois[] =
                $nbImpayesMois;
        }

        return view(
            'dashboard.index',
            [

                'totalBiens' => $nbLogements,
                'totalLocataires' => $nbLocataires,
                'totalImmeubles' => $nbImmeubles,
                'totalContrats' => $nbContrats,

                'revenus' => $revenus,
                'depenses' => $depenses,
                'benefice' => $benefice,

                'impayes' => $impayes,

                'contratsExpirants' =>
                    $contratsExpirant->count(),

                'logementsVacants' =>
                    $logementsLibres,

                'totalNotifications' =>
                    $totalNotifications,

                'echeancesLoyer' =>
                    $echeancesLoyer,

                'contratsEnRetard' =>
                    $contratsEnRetard,

                'nbLocataires' =>
                    $nbLocataires,

                'nbLogements' =>
                    $nbLogements,

                'nbImmeubles' =>
                    $nbImmeubles,

                'nbContrats' =>
                    $nbContrats,

                'revenusMois' =>
                    $revenusMois,

                'loyersAttendus' =>
                    $loyersAttendus,

                'paiementsRecents' =>
                    $paiementsRecents,

                'contratsExpirantListe' =>
                    $contratsExpirant,

                'impayesParMois' =>
                    $impayesParMois,
            ]
        );
    }
}
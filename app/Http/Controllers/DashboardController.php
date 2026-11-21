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

        $contratsActifs = Contrat::where('statut', 'Actif')->get();

        $nbContrats = $contratsActifs->count();

        /*
        |--------------------------------------------------------------------------
        | Logements
        |--------------------------------------------------------------------------
        */

        $logementsOccupes = $nbContrats;
        $logementsLibres = max(0, $nbLogements - $logementsOccupes);

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

        $loyersAttendus = $contratsActifs->sum('loyer');

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

            if (!$paiement) {
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

        // Mettre la vraie somme des dépenses plus tard
        $depenses = 0;

        $benefice = $revenus - $depenses;

        /*
        |--------------------------------------------------------------------------
        | Notifications
        |--------------------------------------------------------------------------
        */

        $totalNotifications =
            $impayes
            + $contratsExpirant->count()
            + $logementsLibres;

        /*
        |--------------------------------------------------------------------------
        | Données Graphique Impayés
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

                if (!$paiementMois) {
                    $nbImpayesMois++;
                }
            }

            $impayesParMois[] = $nbImpayesMois;
        }

        return view('dashboard.index', [

            // Cartes
            'totalBiens' => $nbLogements,
            'totalLocataires' => $nbLocataires,
            'totalImmeubles' => $nbImmeubles,
            'totalContrats' => $nbContrats,

            'revenus' => $revenus,
            'depenses' => $depenses,
            'benefice' => $benefice,

            'impayes' => $impayes,

            'contratsExpirants' => $contratsExpirant->count(),

            'logementsVacants' => $logementsLibres,

            'totalNotifications' => $totalNotifications,

            // Détails
            'nbLocataires' => $nbLocataires,
            'nbLogements' => $nbLogements,
            'nbImmeubles' => $nbImmeubles,
            'nbContrats' => $nbContrats,

            'revenusMois' => $revenusMois,
            'loyersAttendus' => $loyersAttendus,

            'paiementsRecents' => $paiementsRecents,
            'contratsExpirantListe' => $contratsExpirant,

            // Graphiques
            'impayesParMois' => $impayesParMois,
        ]);
    }
}
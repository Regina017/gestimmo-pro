<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ImmeubleController;
use App\Http\Controllers\LogementController;
use App\Http\Controllers\LocataireController;
use App\Http\Controllers\ContratController;
use App\Http\Controllers\PaiementController;
use App\Http\Controllers\DepenseController;
use App\Http\Controllers\RapportController;
use App\Http\Controllers\SocieteController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ExportController;

/*
|--------------------------------------------------------------------------
| Accueil
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return redirect()->route('dashboard');
});

/*
|--------------------------------------------------------------------------
| Routes protégées
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {

    /*
    |--------------------------------------------------------------------------
    | Dashboard
    |--------------------------------------------------------------------------
    */

    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

    /*
    |--------------------------------------------------------------------------
    | Gestion immobilière
    |--------------------------------------------------------------------------
    */

    Route::resource('immeubles', ImmeubleController::class);

    Route::resource('logements', LogementController::class);

    Route::resource('locataires', LocataireController::class);

    Route::resource('contrats', ContratController::class);

    Route::resource('paiements', PaiementController::class);

    Route::resource('depenses', DepenseController::class);

    /*
    |--------------------------------------------------------------------------
    | Exports Excel
    |--------------------------------------------------------------------------
    */

    Route::get(
        '/export/locataires',
        [ExportController::class, 'locataires']
    )->name('export.locataires');

    Route::get(
        '/export/contrats',
        [ExportController::class, 'contrats']
    )->name('export.contrats');

    Route::get(
        '/export/paiements',
        [ExportController::class, 'paiements']
    )->name('export.paiements');

    Route::get(
        '/export/depenses',
        [ExportController::class, 'depenses']
    )->name('export.depenses');

    /*
    |--------------------------------------------------------------------------
    | Reçus et Quittances
    |--------------------------------------------------------------------------
    */

    Route::get(
        '/paiements/{paiement}/recu',
        [PaiementController::class, 'recu']
    )->name('paiements.recu');

    Route::get(
        '/paiements/{paiement}/quittance',
        [PaiementController::class, 'quittance']
    )->name('paiements.quittance');

    /*
    |--------------------------------------------------------------------------
    | Rapports PDF
    |--------------------------------------------------------------------------
    */

    Route::prefix('rapports')
        ->name('rapports.')
        ->group(function () {

            Route::get('/', [RapportController::class, 'index'])
                ->name('index');

            Route::get('/biens', [RapportController::class, 'biensPdf'])
                ->name('biens');

            Route::get('/locataires', [RapportController::class, 'locatairesPdf'])
                ->name('locataires');

            Route::get('/contrats', [RapportController::class, 'contratsPdf'])
                ->name('contrats');

            Route::get('/paiements', [RapportController::class, 'paiementsPdf'])
                ->name('paiements');

            Route::get('/depenses', [RapportController::class, 'depensesPdf'])
                ->name('depenses');
        });

    /*
    |--------------------------------------------------------------------------
    | Société
    |--------------------------------------------------------------------------
    */

    Route::get(
        '/societe',
        [SocieteController::class, 'edit']
    )->name('societe.edit');

    Route::put(
        '/societe',
        [SocieteController::class, 'update']
    )->name('societe.update');
});

/*
|--------------------------------------------------------------------------
| Administration
|--------------------------------------------------------------------------
*/

Route::middleware([
    'auth',
    'role:Administrateur'
])->group(function () {

    Route::resource('users', UserController::class);

    Route::put(
        '/users/{user}/bloquer',
        [UserController::class, 'bloquer']
    )->name('users.bloquer');

    Route::put(
        '/users/{user}/debloquer',
        [UserController::class, 'debloquer']
    )->name('users.debloquer');
});

/*
|--------------------------------------------------------------------------
| Authentification
|--------------------------------------------------------------------------
*/

require __DIR__.'/auth.php';
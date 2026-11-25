<?php

use Illuminate\Support\Facades\Route;

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

    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

    Route::resource('immeubles', ImmeubleController::class);

    Route::resource('logements', LogementController::class);

    Route::resource('locataires', LocataireController::class);

    Route::resource('contrats', ContratController::class);

    Route::get(
        '/contrats/{contrat}/pdf',
        [ContratController::class, 'pdf']
    )->name('contrats.pdf');

    Route::resource('paiements', PaiementController::class);

    Route::resource('depenses', DepenseController::class);

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

    Route::get(
        '/paiements/{paiement}/recu',
        [PaiementController::class, 'recu']
    )->name('paiements.recu');

    Route::get(
        '/paiements/{paiement}/quittance',
        [PaiementController::class, 'quittance']
    )->name('paiements.quittance');

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

Route::middleware(['auth'])->group(function () {

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
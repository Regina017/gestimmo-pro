<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BienController;
use App\Http\Controllers\LocataireController;
use App\Http\Controllers\OccupationController;
use App\Http\Controllers\PaiementController;
use App\Http\Controllers\DepenseController;
use App\Http\Controllers\CaisseController;
use App\Http\Controllers\RapportController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\JournalController;
use App\Http\Controllers\ApprobationController;
use App\Http\Controllers\EcheancierController;
use App\Http\Controllers\RechercheController;

Route::get('/', function () {
    return redirect('/dashboard');
});

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->name('dashboard');

Route::resource('biens', BienController::class);

Route::resource('locataires', LocataireController::class);

Route::resource('occupations', OccupationController::class);

Route::resource('paiements', PaiementController::class);

Route::get(
    '/paiements/{paiement}/recu',
    [PaiementController::class, 'recu']
)->name('paiements.recu');

Route::resource('depenses', DepenseController::class);

Route::get('/caisse', [CaisseController::class, 'index'])
    ->name('caisse.index');

Route::get('/rapports', [RapportController::class, 'index'])
    ->name('rapports.index');

/*
|--------------------------------------------------------------------------
| ÉCHÉANCIER
|--------------------------------------------------------------------------
*/

Route::get(
    '/echeancier',
    [EcheancierController::class, 'index']
)->name('echeancier.index');

/*
|--------------------------------------------------------------------------
| RECHERCHE GLOBALE
|--------------------------------------------------------------------------
*/

Route::get(
    '/recherche',
    [RechercheController::class, 'index']
)->name('recherche.index');

/*
|--------------------------------------------------------------------------
| RAPPORTS PDF
|--------------------------------------------------------------------------
*/

Route::get(
    '/rapports/biens/pdf',
    [RapportController::class, 'biensPdf']
)->name('rapports.biens.pdf');

Route::get(
    '/rapports/locataires/pdf',
    [RapportController::class, 'locatairesPdf']
)->name('rapports.locataires.pdf');

Route::get(
    '/rapports/occupations/pdf',
    [RapportController::class, 'occupationsPdf']
)->name('rapports.occupations.pdf');

Route::get(
    '/rapports/paiements/pdf',
    [RapportController::class, 'paiementsPdf']
)->name('rapports.paiements.pdf');

Route::get(
    '/rapports/depenses/pdf',
    [RapportController::class, 'depensesPdf']
)->name('rapports.depenses.pdf');

Route::get(
    '/rapports/caisse/pdf',
    [RapportController::class, 'caissePdf']
)->name('rapports.caisse.pdf');

/*
|--------------------------------------------------------------------------
| RAPPORTS EXCEL
|--------------------------------------------------------------------------
*/

Route::get(
    '/rapports/biens/excel',
    [RapportController::class, 'biensExcel']
)->name('rapports.biens.excel');

Route::get(
    '/rapports/locataires/excel',
    [RapportController::class, 'locatairesExcel']
)->name('rapports.locataires.excel');

Route::get(
    '/rapports/paiements/excel',
    [RapportController::class, 'paiementsExcel']
)->name('rapports.paiements.excel');

Route::get(
    '/rapports/depenses/excel',
    [RapportController::class, 'depensesExcel']
)->name('rapports.depenses.excel');

/*
|--------------------------------------------------------------------------
| ROUTES AUTHENTIFIÉES
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    Route::resource('users', UserController::class);

    Route::get(
        '/users/{user}/block',
        [UserController::class, 'block']
    )->name('users.block');

    Route::get(
        '/users/{user}/unblock',
        [UserController::class, 'unblock']
    )->name('users.unblock');

    Route::get(
        '/users/{user}/password',
        [UserController::class, 'editPassword']
    )->name('users.password.edit');

    Route::put(
        '/users/{user}/password',
        [UserController::class, 'updatePassword']
    )->name('users.password.update');

    Route::get(
        '/journaux',
        [JournalController::class, 'index']
    )->name('journaux.index');

    Route::get(
        '/approbations',
        [ApprobationController::class, 'index']
    )->name('approbations.index');

    Route::get(
        '/approbations/{approbation}/approve',
        [ApprobationController::class, 'approve']
    )->name('approbations.approve');

    Route::get(
        '/approbations/{approbation}/reject',
        [ApprobationController::class, 'reject']
    )->name('approbations.reject');
});

require __DIR__.'/auth.php';
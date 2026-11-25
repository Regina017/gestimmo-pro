<?php

namespace App\Http\Controllers;

use App\Exports\LocatairesExport;
use App\Exports\ContratsExport;
use App\Exports\PaiementsExport;
use App\Exports\DepensesExport;
use Maatwebsite\Excel\Facades\Excel;

class ExportController extends Controller
{
    public function locataires()
    {
        return Excel::download(
            new LocatairesExport(),
            'locataires.xlsx'
        );
    }

    public function contrats()
    {
        return Excel::download(
            new ContratsExport(),
            'contrats.xlsx'
        );
    }

    public function paiements()
    {
        return Excel::download(
            new PaiementsExport(),
            'paiements.xlsx'
        );
    }

    public function depenses()
    {
        return Excel::download(
            new DepensesExport(),
            'depenses.xlsx'
        );
    }
}
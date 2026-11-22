<?php

namespace App\Exports;

use App\Models\Depense;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class DepensesExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Depense::all([
            'id',
            'libelle',
            'montant',
            'date_depense',
            'created_at'
        ]);
    }

    public function headings(): array
    {
        return [
            'ID',
            'Libellé',
            'Montant',
            'Date dépense',
            'Créé le'
        ];
    }
}
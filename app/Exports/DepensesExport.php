<?php

namespace App\Exports;

use App\Models\Depense;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class DepensesExport implements FromCollection, WithHeadings
{
    public function collection(): Collection
    {
        return Depense::select(
            'date_depense',
            'categorie',
            'libelle',
            'montant'
        )->get();
    }

    public function headings(): array
    {
        return [
            'Date',
            'Catégorie',
            'Libellé',
            'Montant',
        ];
    }
}


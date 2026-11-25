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
            'id',
            'libelle',
            'montant',
            'date_depense',
            'created_at'
        )->get();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Libellé',
            'Montant',
            'Date dépense',
            'Créé le',
        ];
    }
}
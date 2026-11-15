<?php

namespace App\Exports;

use App\Models\Paiement;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PaiementsExport implements FromCollection, WithHeadings
{
    public function collection(): Collection
    {
        return Paiement::select(
            'date_paiement',
            'montant'
        )->get();
    }

    public function headings(): array
    {
        return [
            'Date',
            'Montant',
        ];
    }
}
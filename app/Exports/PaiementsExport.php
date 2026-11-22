<?php

namespace App\Exports;

use App\Models\Paiement;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PaiementsExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Paiement::all([
            'id',
            'contrat_id',
            'montant',
            'date_paiement',
            'created_at'
        ]);
    }

    public function headings(): array
    {
        return [
            'ID',
            'Contrat',
            'Montant',
            'Date paiement',
            'Créé le'
        ];
    }
}
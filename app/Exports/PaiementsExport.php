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
            'id',
            'contrat_id',
            'montant',
            'date_paiement',
            'created_at'
        )->get();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Contrat',
            'Montant',
            'Date paiement',
            'Créé le',
        ];
    }
}
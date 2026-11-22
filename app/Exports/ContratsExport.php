<?php

namespace App\Exports;

use App\Models\Contrat;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ContratsExport implements FromCollection, WithHeadings
{
    public function collection(): Collection
    {
        return Contrat::select(
            'id',
            'locataire_id',
            'logement_id',
            'loyer',
            'date_debut',
            'date_fin',
            'statut'
        )->get();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Locataire',
            'Logement',
            'Loyer',
            'Date début',
            'Date fin',
            'Statut',
        ];
    }
}
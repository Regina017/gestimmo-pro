<?php

namespace App\Exports;

use App\Models\Bien;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class BiensExport implements FromCollection, WithHeadings
{
    public function collection(): Collection
    {
        return Bien::select(
            'reference',
            'type',
            'adresse',
            'loyer',
            'statut'
        )->get();
    }

    public function headings(): array
    {
        return [
            'Référence',
            'Type',
            'Adresse',
            'Loyer',
            'Statut',
        ];
    }
}
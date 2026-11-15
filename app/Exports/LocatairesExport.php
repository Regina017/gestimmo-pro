<?php

namespace App\Exports;

use App\Models\Locataire;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class LocatairesExport implements FromCollection, WithHeadings
{
    public function collection(): Collection
    {
        return Locataire::select(
            'nom',
            'telephone',
            'email'
        )->get();
    }

    public function headings(): array
    {
        return [
            'Nom',
            'Téléphone',
            'Email',
        ];
    }
}

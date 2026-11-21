<?php

namespace App\Exports;

use App\Models\Locataire;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class LocatairesExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Locataire::select(
            'id',
            'nom',
            'prenom',
            'telephone',
            'email',
            'created_at'
        )->get();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Nom',
            'Prénom',
            'Téléphone',
            'Email',
            'Date création',
        ];
    }
}
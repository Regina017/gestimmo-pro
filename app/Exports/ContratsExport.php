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
        return Contrat::with([
            'locataire',
            'logement',
        ])
        ->get()
        ->map(function ($contrat) {

            return [

                $contrat->id,

                ($contrat->locataire->nom ?? '') . ' ' .
                ($contrat->locataire->prenom ?? ''),

                $contrat->logement->numero ?? '',

                $contrat->loyer,

                $contrat->date_debut,

                $contrat->date_fin,

                $contrat->statut,

            ];
        });
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
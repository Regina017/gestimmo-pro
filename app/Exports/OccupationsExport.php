<?php

namespace App\Exports;

use App\Models\Occupation;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;

class OccupationsExport implements FromCollection
{
    public function collection(): Collection
    {
        return Occupation::all();
    }
}

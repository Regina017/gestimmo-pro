<?php

namespace App\Http\Controllers;

use App\Models\Approbation;

class ApprobationController extends Controller
{
    public function index()
    {
        $approbations = Approbation::latest()->get();

        return view(
            'approbations.index',
            compact('approbations')
        );
    }

    public function approve(
        Approbation $approbation
    )
    {
        $approbation->update([

            'statut' => 'Approuvée'

        ]);

        return back();
    }

    public function reject(
        Approbation $approbation
    )
    {
        $approbation->update([

            'statut' => 'Refusée'

        ]);

        return back();
    }
}

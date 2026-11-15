<?php

namespace App\Http\Controllers;

use App\Models\Occupation;
use App\Models\Bien;
use App\Models\Locataire;
use Illuminate\Http\Request;

class OccupationController extends Controller
{
    public function index()
    {
        $occupations = Occupation::with([
            'bien',
            'locataire'
        ])->get();

        return view(
            'occupations.index',
            compact('occupations')
        );
    }

    public function create()
    {
        if (auth()->user()->role == 'Consultation') {
            abort(403);
        }

        $biens = Bien::all();

        $locataires = Locataire::all();

        return view(
            'occupations.create',
            compact(
                'biens',
                'locataires'
            )
        );
    }

    public function store(Request $request)
    {
        if (auth()->user()->role == 'Consultation') {
            abort(403);
        }

        Occupation::create($request->all());

        return redirect()
            ->route('occupations.index');
    }

    public function edit(Occupation $occupation)
    {
        if (auth()->user()->role == 'Consultation') {
            abort(403);
        }

        $biens = Bien::all();

        $locataires = Locataire::all();

        return view(
            'occupations.edit',
            compact(
                'occupation',
                'biens',
                'locataires'
            )
        );
    }

    public function update(
        Request $request,
        Occupation $occupation
    )
    {
        if (auth()->user()->role == 'Consultation') {
            abort(403);
        }

        $occupation->update(
            $request->all()
        );

        return redirect()
            ->route('occupations.index');
    }

    public function destroy(Occupation $occupation)
    {
        if (auth()->user()->role != 'Administrateur') {
            abort(403);
        }

        $occupation->delete();

        return redirect()
            ->route('occupations.index');
    }
}

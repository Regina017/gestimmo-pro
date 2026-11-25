<?php

namespace App\Http\Controllers;

use App\Models\Depense;
use Illuminate\Http\Request;

class DepenseController extends Controller
{
    public function index()
    {
        $depenses = Depense::latest()->get();

        return view(
            'depenses.index',
            compact('depenses')
        );
    }

    public function create()
    {
        if (auth()->user()->role == 'Consultation') {
            abort(403);
        }

        return view('depenses.create');
    }

    public function store(Request $request)
    {
        if (auth()->user()->role == 'Consultation') {
            abort(403);
        }

        $request->validate([
            'date_depense' => 'required|date',
            'categorie'    => 'required|string|max:255',
            'libelle'      => 'required|string|max:255',
            'montant'      => 'required|numeric|min:0',
        ]);

        Depense::create($request->all());

        return redirect()
            ->route('depenses.index')
            ->with(
                'success',
                'Dépense enregistrée avec succès.'
            );
    }

    public function show(Depense $depense)
    {
        return view(
            'depenses.show',
            compact('depense')
        );
    }

    public function edit(Depense $depense)
    {
        if (auth()->user()->role == 'Consultation') {
            abort(403);
        }

        return view(
            'depenses.edit',
            compact('depense')
        );
    }

    public function update(
        Request $request,
        Depense $depense
    ) {
        if (auth()->user()->role == 'Consultation') {
            abort(403);
        }

        $request->validate([
            'date_depense' => 'required|date',
            'categorie'    => 'required|string|max:255',
            'libelle'      => 'required|string|max:255',
            'montant'      => 'required|numeric|min:0',
        ]);

        $depense->update(
            $request->all()
        );

        return redirect()
            ->route('depenses.index')
            ->with(
                'success',
                'Dépense modifiée avec succès.'
            );
    }

    public function destroy(Depense $depense)
    {
        if (auth()->user()->role != 'Administrateur') {
            abort(403);
        }

        $depense->delete();

        return redirect()
            ->route('depenses.index')
            ->with(
                'success',
                'Dépense supprimée avec succès.'
            );
    }
}
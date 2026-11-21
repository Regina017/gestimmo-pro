<?php

namespace App\Http\Controllers;

use App\Models\Immeuble;
use App\Models\Proprietaire;
use Illuminate\Http\Request;

class ImmeubleController extends Controller
{
    public function index()
    {
        $immeubles = Immeuble::latest()->paginate(10);

        return view('immeubles.index', compact('immeubles'));
    }

    public function create()
    {
        $proprietaires = Proprietaire::all();

        return view('immeubles.create', compact('proprietaires'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'adresse' => 'required',
        ]);

        Immeuble::create($request->all());

        return redirect()
            ->route('immeubles.index')
            ->with('success', 'Immeuble ajouté avec succès.');
    }

    public function show(Immeuble $immeuble)
    {
        return view('immeubles.show', compact('immeuble'));
    }

    public function edit(Immeuble $immeuble)
    {
        $proprietaires = Proprietaire::all();

        return view(
            'immeubles.edit',
            compact('immeuble', 'proprietaires')
        );
    }

    public function update(Request $request, Immeuble $immeuble)
    {
        $request->validate([
            'nom' => 'required',
            'adresse' => 'required',
        ]);

        $immeuble->update($request->all());

        return redirect()
            ->route('immeubles.index')
            ->with('success', 'Immeuble modifié avec succès.');
    }

    public function destroy(Immeuble $immeuble)
    {
        $immeuble->delete();

        return redirect()
            ->route('immeubles.index')
            ->with('success', 'Immeuble supprimé.');
    }
}
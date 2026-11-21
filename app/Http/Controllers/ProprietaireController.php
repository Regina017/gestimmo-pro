<?php

namespace App\Http\Controllers;

use App\Models\Proprietaire;
use Illuminate\Http\Request;

class ProprietaireController extends Controller
{
    public function index()
    {
        $proprietaires = Proprietaire::latest()->paginate(10);

        return view('proprietaires.index', compact('proprietaires'));
    }

    public function create()
    {
        return view('proprietaires.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
        ]);

        Proprietaire::create($request->all());

        return redirect()
            ->route('proprietaires.index')
            ->with('success', 'Propriétaire ajouté avec succès.');
    }

    public function show(Proprietaire $proprietaire)
    {
        return view('proprietaires.show', compact('proprietaire'));
    }

    public function edit(Proprietaire $proprietaire)
    {
        return view('proprietaires.edit', compact('proprietaire'));
    }

    public function update(Request $request, Proprietaire $proprietaire)
    {
        $proprietaire->update($request->all());

        return redirect()
            ->route('proprietaires.index')
            ->with('success', 'Propriétaire modifié avec succès.');
    }

    public function destroy(Proprietaire $proprietaire)
    {
        $proprietaire->delete();

        return redirect()
            ->route('proprietaires.index')
            ->with('success', 'Propriétaire supprimé.');
    }
}

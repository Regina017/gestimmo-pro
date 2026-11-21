<?php

namespace App\Http\Controllers;

use App\Models\Locataire;
use Illuminate\Http\Request;

class LocataireController extends Controller
{
    public function index()
    {
        $locataires = Locataire::latest()->get();

        return view(
            'locataires.index',
            compact('locataires')
        );
    }

    public function create()
    {
        if (auth()->user()->role == 'Consultation') {
            abort(403);
        }

        return view('locataires.create');
    }

    public function store(Request $request)
    {
        if (auth()->user()->role == 'Consultation') {
            abort(403);
        }

        $request->validate([
            'nom'       => 'required|max:255',
            'prenom'    => 'required|max:255',
            'telephone' => 'nullable|max:50',
            'email'     => 'nullable|email|max:255',
        ]);

        Locataire::create([
            'nom'       => $request->nom,
            'prenom'    => $request->prenom,
            'telephone' => $request->telephone,
            'email'     => $request->email,
        ]);

        return redirect()
            ->route('locataires.index')
            ->with(
                'success',
                'Locataire ajouté avec succès.'
            );
    }

    public function show(Locataire $locataire)
    {
        return view(
            'locataires.show',
            compact('locataire')
        );
    }

    public function edit(Locataire $locataire)
    {
        if (auth()->user()->role == 'Consultation') {
            abort(403);
        }

        return view(
            'locataires.edit',
            compact('locataire')
        );
    }

    public function update(
        Request $request,
        Locataire $locataire
    )
    {
        if (auth()->user()->role == 'Consultation') {
            abort(403);
        }

        $request->validate([
            'nom'       => 'required|max:255',
            'prenom'    => 'required|max:255',
            'telephone' => 'nullable|max:50',
            'email'     => 'nullable|email|max:255',
        ]);

        $locataire->update([
            'nom'       => $request->nom,
            'prenom'    => $request->prenom,
            'telephone' => $request->telephone,
            'email'     => $request->email,
        ]);

        return redirect()
            ->route('locataires.index')
            ->with(
                'success',
                'Locataire modifié avec succès.'
            );
    }

    public function destroy(Locataire $locataire)
    {
        if (auth()->user()->role != 'Administrateur') {
            abort(403);
        }

        $locataire->delete();

        return redirect()
            ->route('locataires.index')
            ->with(
                'success',
                'Locataire supprimé.'
            );
    }
}

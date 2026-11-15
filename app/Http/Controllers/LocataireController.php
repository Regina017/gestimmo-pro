<?php

namespace App\Http\Controllers;

use App\Models\Locataire;
use Illuminate\Http\Request;

class LocataireController extends Controller
{
    public function index()
    {
        $locataires = Locataire::all();

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

        Locataire::create($request->all());

        return redirect()
            ->route('locataires.index');
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

        $locataire->update(
            $request->all()
        );

        return redirect()
            ->route('locataires.index');
    }

    public function destroy(Locataire $locataire)
    {
        if (auth()->user()->role != 'Administrateur') {
            abort(403);
        }

        $locataire->delete();

        return redirect()
            ->route('locataires.index');
    }
}
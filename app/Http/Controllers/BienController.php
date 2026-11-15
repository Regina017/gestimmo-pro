<?php

namespace App\Http\Controllers;

use App\Models\Bien;
use Illuminate\Http\Request;

class BienController extends Controller
{
    public function index()
    {
        $biens = Bien::all();

        return view('biens.index', compact('biens'));
    }

    public function create()
    {
        if (auth()->user()->role == 'Consultation') {
            abort(403);
        }

        return view('biens.create');
    }

    public function store(Request $request)
    {
        if (auth()->user()->role == 'Consultation') {
            abort(403);
        }

        Bien::create($request->all());

        return redirect()->route('biens.index');
    }

    public function edit(Bien $bien)
    {
        if (auth()->user()->role == 'Consultation') {
            abort(403);
        }

        return view('biens.edit', compact('bien'));
    }

    public function update(Request $request, Bien $bien)
    {
        if (auth()->user()->role == 'Consultation') {
            abort(403);
        }

        $bien->update($request->all());

        return redirect()->route('biens.index');
    }

    public function destroy(Bien $bien)
    {
        if (auth()->user()->role != 'Administrateur') {
            abort(403);
        }

        $bien->delete();

        return redirect()->route('biens.index');
    }
}
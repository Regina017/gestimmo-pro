<?php

namespace App\Http\Controllers;

use App\Models\Depense;
use Illuminate\Http\Request;

class DepenseController extends Controller
{
    public function index()
    {
        $depenses = Depense::all();

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

        Depense::create($request->all());

        return redirect()
            ->route('depenses.index');
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
    )
    {
        if (auth()->user()->role == 'Consultation') {
            abort(403);
        }

        $depense->update(
            $request->all()
        );

        return redirect()
            ->route('depenses.index');
    }

    public function destroy(Depense $depense)
    {
        if (auth()->user()->role != 'Administrateur') {
            abort(403);
        }

        $depense->delete();

        return redirect()
            ->route('depenses.index');
    }
}
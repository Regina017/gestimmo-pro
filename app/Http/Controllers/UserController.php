<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Journal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        if (!auth()->check()) {
            return redirect('/login');
        }

        if (auth()->user()->role !== 'Administrateur') {
            abort(403);
        }

        $users = User::all();

        return view('users.index', compact('users'));
    }

    public function create()
    {
        if (!auth()->check()) {
            return redirect('/login');
        }

        if (auth()->user()->role !== 'Administrateur') {
            abort(403);
        }

        return view('users.create');
    }

    public function store(Request $request)
    {
        if (!auth()->check()) {
            return redirect('/login');
        }

        if (auth()->user()->role !== 'Administrateur') {
            abort(403);
        }

        User::create([
            'name' => $request->name,
            'identifiant' => $request->identifiant,
            'telephone' => $request->telephone,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
            'statut' => 'Actif',
        ]);

        Journal::create([
            'utilisateur' => auth()->user()->name,
            'action' => 'Création utilisateur '.$request->name,
        ]);

        return redirect()->route('users.index');
    }

    public function edit(User $user)
    {
        if (!auth()->check()) {
            return redirect('/login');
        }

        if (auth()->user()->role !== 'Administrateur') {
            abort(403);
        }

        return view('users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        if (!auth()->check()) {
            return redirect('/login');
        }

        if (auth()->user()->role !== 'Administrateur') {
            abort(403);
        }

        $user->update([
            'name' => $request->name,
            'identifiant' => $request->identifiant,
            'telephone' => $request->telephone,
            'email' => $request->email,
            'role' => $request->role,
        ]);

        Journal::create([
            'utilisateur' => auth()->user()->name,
            'action' => 'Modification utilisateur '.$user->name,
        ]);

        return redirect()->route('users.index');
    }

    public function destroy(User $user)
    {
        if (!auth()->check()) {
            return redirect('/login');
        }

        if (auth()->user()->role !== 'Administrateur') {
            abort(403);
        }

        Journal::create([
            'utilisateur' => auth()->user()->name,
            'action' => 'Suppression utilisateur '.$user->name,
        ]);

        $user->delete();

        return redirect()->route('users.index');
    }

    public function block(User $user)
    {
        if (!auth()->check()) {
            return redirect('/login');
        }

        if (auth()->user()->role !== 'Administrateur') {
            abort(403);
        }

        $user->update([
            'statut' => 'Bloqué'
        ]);

        Journal::create([
            'utilisateur' => auth()->user()->name,
            'action' => 'Blocage utilisateur '.$user->name,
        ]);

        return redirect()->route('users.index');
    }

    public function unblock(User $user)
    {
        if (!auth()->check()) {
            return redirect('/login');
        }

        if (auth()->user()->role !== 'Administrateur') {
            abort(403);
        }

        $user->update([
            'statut' => 'Actif'
        ]);

        Journal::create([
            'utilisateur' => auth()->user()->name,
            'action' => 'Déblocage utilisateur '.$user->name,
        ]);

        return redirect()->route('users.index');
    }

    public function editPassword(User $user)
    {
        if (!auth()->check()) {
            return redirect('/login');
        }

        if (auth()->user()->role !== 'Administrateur') {
            abort(403);
        }

        return view('users.password', compact('user'));
    }

    public function updatePassword(Request $request, User $user)
    {
        if (!auth()->check()) {
            return redirect('/login');
        }

        if (auth()->user()->role !== 'Administrateur') {
            abort(403);
        }

        $request->validate([
            'password' => 'required|min:8',
        ]);

        $user->update([
            'password' => Hash::make($request->password),
        ]);

        Journal::create([
            'utilisateur' => auth()->user()->name,
            'action' => 'Réinitialisation mot de passe de '.$user->name,
        ]);

        return redirect()->route('users.index');
    }
}
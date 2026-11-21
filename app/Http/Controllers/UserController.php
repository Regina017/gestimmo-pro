<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Affichage de la liste des utilisateurs
     */
    public function index()
    {
        $users = User::latest()->paginate(15);

        return view('users.index', compact('users'));
    }

    /**
     * Formulaire de création
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Enregistrement
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'         => 'required|max:255',
            'identifiant'  => 'required|max:255|unique:users,identifiant',
            'telephone'    => 'nullable|max:50',
            'email'        => 'required|email|unique:users,email',
            'password'     => 'required|min:6|confirmed',
            'role'         => 'required',
            'statut'       => 'required',
        ]);

        User::create([
            'name'        => $request->name,
            'identifiant' => $request->identifiant,
            'telephone'   => $request->telephone,
            'email'       => $request->email,
            'password'    => Hash::make($request->password),
            'role'        => $request->role,
            'statut'      => $request->statut,
        ]);

        return redirect()
            ->route('users.index')
            ->with('success', 'Utilisateur créé avec succès.');
    }

    /**
     * Affichage détail
     */
    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    /**
     * Formulaire modification
     */
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    /**
     * Mise à jour
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name'         => 'required|max:255',
            'identifiant'  => 'required|max:255|unique:users,identifiant,' . $user->id,
            'telephone'    => 'nullable|max:50',
            'email'        => 'required|email|unique:users,email,' . $user->id,
            'role'         => 'required',
            'statut'       => 'required',
        ]);

        $data = [
            'name'        => $request->name,
            'identifiant' => $request->identifiant,
            'telephone'   => $request->telephone,
            'email'       => $request->email,
            'role'        => $request->role,
            'statut'      => $request->statut,
        ];

        if ($request->filled('password')) {

            $request->validate([
                'password' => 'min:6|confirmed',
            ]);

            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);

        return redirect()
            ->route('users.index')
            ->with('success', 'Utilisateur modifié avec succès.');
    }

    /**
     * Suppression
     */
    public function destroy(User $user)
    {
        if ($user->id === auth()->id()) {

            return back()->with(
                'error',
                'Vous ne pouvez pas supprimer votre propre compte.'
            );
        }

        $user->delete();

        return redirect()
            ->route('users.index')
            ->with('success', 'Utilisateur supprimé avec succès.');
    }

    /**
     * Bloquer utilisateur
     */
    public function bloquer(User $user)
    {
        $user->update([
            'statut' => 'Bloqué'
        ]);

        return back()->with(
            'success',
            'Utilisateur bloqué.'
        );
    }

    /**
     * Débloquer utilisateur
     */
    public function debloquer(User $user)
    {
        $user->update([
            'statut' => 'Actif'
        ]);

        return back()->with(
            'success',
            'Utilisateur débloqué.'
        );
    }
}
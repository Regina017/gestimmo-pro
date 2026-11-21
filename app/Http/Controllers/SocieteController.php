<?php

namespace App\Http\Controllers;

use App\Models\Societe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SocieteController extends Controller
{
    /**
     * Affichage des paramètres société
     */
    public function edit()
    {
        $societe = Societe::first();

        if (!$societe) {

            $societe = Societe::create([
                'nom'        => 'BÂTIMENTS MATHE SEBASTIEN',
                'telephone'  => '',
                'email'      => '',
                'adresse'    => '',
                'ville'      => '',
                'logo'       => null,
            ]);
        }

        return view(
            'societe.edit',
            compact('societe')
        );
    }

    /**
     * Mise à jour des paramètres société
     */
    public function update(Request $request)
    {
        $request->validate([
            'nom'        => 'required|string|max:255',
            'telephone'  => 'nullable|string|max:50',
            'email'      => 'nullable|email|max:255',
            'adresse'    => 'nullable|string|max:255',
            'ville'      => 'nullable|string|max:255',
            'logo'       => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $societe = Societe::first();

        if (!$societe) {

            $societe = new Societe();
        }

        $societe->nom       = $request->nom;
        $societe->telephone = $request->telephone;
        $societe->email     = $request->email;
        $societe->adresse   = $request->adresse;
        $societe->ville     = $request->ville;

        /*
        |--------------------------------------------------------------------------
        | UPLOAD LOGO
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('logo')) {

            if (
                !empty($societe->logo)
                && Storage::disk('public')->exists($societe->logo)
            ) {

                Storage::disk('public')->delete(
                    $societe->logo
                );
            }

            $logo = $request
                ->file('logo')
                ->store(
                    'logos',
                    'public'
                );

            $societe->logo = $logo;
        }

        $societe->save();

        return redirect()
            ->route('societe.edit')
            ->with(
                'success',
                'Paramètres société enregistrés avec succès.'
            );
    }
}
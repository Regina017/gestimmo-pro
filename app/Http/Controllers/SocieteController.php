<?php

namespace App\Http\Controllers;

use App\Models\Societe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SocieteController extends Controller
{
    public function edit()
    {
        $societe = Societe::first();

        if (!$societe) {
            $societe = Societe::create([
                'nom' => 'BÂTIMENTS MATHE SEBASTIEN',
                'telephone' => '',
                'email' => '',
                'adresse' => '',
                'ville' => '',
                'logo' => null,
            ]);
        }

        return view('societe.edit', compact('societe'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'telephone' => 'nullable|string|max:50',
            'email' => 'nullable|email|max:255',
            'adresse' => 'nullable|string|max:255',
            'ville' => 'nullable|string|max:255',
            'logo' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $societe = Societe::first() ?? new Societe();

        $societe->nom = $request->nom;
        $societe->telephone = $request->telephone;
        $societe->email = $request->email;
        $societe->adresse = $request->adresse;
        $societe->ville = $request->ville;

if ($request->hasFile('logo')) {

    if (!empty($societe->logo)) {

        $ancienLogo = public_path(
            'storage/' . $societe->logo
        );

        if (file_exists($ancienLogo)) {
            @unlink($ancienLogo);
        }
    }

    $file = $request->file('logo');

    $filename = time() . '_' .
        preg_replace(
            '/[^A-Za-z0-9.\-_]/',
            '',
            $file->getClientOriginalName()
        );

    $destination = public_path(
        'storage/logos'
    );

    if (!file_exists($destination)) {
        mkdir($destination, 0755, true);
    }

    $file->move(
        $destination,
        $filename
    );

    $societe->logo = 'logos/' . $filename;
}
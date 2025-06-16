<?php

namespace App\Http\Controllers;

use App\Models\formateur;
use App\Http\Requests\StoreformateurRequest;
use App\Http\Requests\UpdateformateurRequest;

class FormateurController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $formateurs = formateur::all();
        return response()->json([
            'success' => true,
            'data' => $formateurs
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreformateurRequest $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'identification' => 'required|numeric|unique:formateurs,identification',
        ]);

        $formateur = formateur::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Formateur créé avec succès',
            'data' => $formateur
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(formateur $formateur)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(formateur $formateur)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateformateurRequest $request, formateur $formateur)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'identification' => 'required|numeric|unique:formateurs,identification,' . $formateur->id,
        ]);

        $formateur->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Formateur mis à jour avec succès',
            'data' => $formateur
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(formateur $formateur)
    {
        $formateur->delete();

        return response()->json([
            'success' => true,
            'message' => 'Formateur supprimé avec succès'
        ]);
    }
}

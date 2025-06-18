<?php

namespace App\Http\Controllers;

use App\Models\process;
use App\Http\Requests\StoreprocessRequest;
use App\Http\Requests\UpdateprocessRequest;

class ProcessController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $processes = process::all();
        return view('home', compact('processes'));
    }

    /**
     * Display a listing for admin dashboard (AJAX)
     */
    public function ajaxIndex()
    {
        $processes = process::withCount('categories')->with('categories')->get();
        return response()->json([
            'success' => true,
            'data' => $processes
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
    public function store(StoreprocessRequest $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
        ]);

        $validated['create_at'] = now();
        $process = process::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Processus créé avec succès',
            'data' => $process
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(process $process)
    {
        // Load the process with its categories and question counts
        $process->load(['categories' => function($query) {
            $query->withCount('quzs');
        }]);
        
        return view('process.categories', compact('process'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(process $process)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateprocessRequest $request, process $process)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
        ]);

        $process->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Processus mis à jour avec succès',
            'data' => $process
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(process $process)
    {
        $process->delete();

        return response()->json([
            'success' => true,
            'message' => 'Processus supprimé avec succès'
        ]);
    }
}

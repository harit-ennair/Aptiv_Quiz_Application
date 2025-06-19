<?php

namespace App\Http\Controllers;

use App\Models\test;
use App\Http\Requests\StoretestRequest;
use App\Http\Requests\UpdatetestRequest;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tests = test::with(['user', 'formateur', 'quzs.category.process'])->get();
        
        // Transform the data to include categories and processes at the top level
        $tests = $tests->map(function ($test) {
            $categories = $test->quzs->map(function ($quz) {
                return $quz->category;
            })->filter()->unique('id')->values();
            
            $processes = $categories->map(function ($category) {
                return $category->process;
            })->filter()->unique('id')->values();
            
            $test->categories = $categories;
            $test->processes = $processes;
            return $test;
        });
        
        return response()->json([
            'success' => true,
            'data' => $tests
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
    public function store(StoretestRequest $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'description' => 'nullable|string|max:1000',
            'formateur_id' => 'required|exists:formateurs,id',
            'resultat' => 'required|integer|min:0|max:100',
            'pourcentage' => 'required|integer|min:0|max:100',
        ]);

        $test = test::create($validated);
        $testWithRelations = $test->load(['user', 'formateur', 'quzs.category.process']);
        
        // Add categories and processes at the top level
        $categories = $testWithRelations->quzs->map(function ($quz) {
            return $quz->category;
        })->filter()->unique('id')->values();
        
        $processes = $categories->map(function ($category) {
            return $category->process;
        })->filter()->unique('id')->values();
        
        $testWithRelations->categories = $categories;
        $testWithRelations->processes = $processes;

        return response()->json([
            'success' => true,
            'message' => 'Test créé avec succès',
            'data' => $testWithRelations
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(test $test)
    {
        $testWithRelations = $test->load(['user', 'formateur', 'quzs.category.process']);
        
        // Add categories and processes at the top level
        $categories = $testWithRelations->quzs->map(function ($quz) {
            return $quz->category;
        })->filter()->unique('id')->values();
        
        $processes = $categories->map(function ($category) {
            return $category->process;
        })->filter()->unique('id')->values();
        
        $testWithRelations->categories = $categories;
        $testWithRelations->processes = $processes;
        
        return response()->json([
            'success' => true,
            'data' => $testWithRelations
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(test $test)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatetestRequest $request, test $test)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'description' => 'nullable|string|max:1000',
            'formateur_id' => 'required|exists:formateurs,id',
            'resultat' => 'required|integer|min:0|max:100',
            'pourcentage' => 'required|integer|min:0|max:100',
        ]);

        $test->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Test mis à jour avec succès',
            'data' => $test->load(['user', 'formateur'])
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(test $test)
    {
        $test->delete();

        return response()->json([
            'success' => true,
            'message' => 'Test supprimé avec succès'
        ]);
    }
}

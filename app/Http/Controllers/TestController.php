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
        $tests = test::with(['user', 'formateur', 'process', 'category', 'quzs.category.process'])->get();
        
        // Transform the data to include categories and processes at the top level
        $tests = $tests->map(function ($test) {
            // Get categories and processes from related questions (legacy approach)
            $questionCategories = $test->quzs->map(function ($quz) {
                return $quz->category;
            })->filter()->unique('id')->values();
            
            $questionProcesses = $questionCategories->map(function ($category) {
                return $category->process;
            })->filter()->unique('id')->values();
            
            // Add legacy data for backwards compatibility
            $test->categories = $questionCategories;
            $test->processes = $questionProcesses;
            
            // Add direct relationship data (new approach)
            if ($test->process) {
                $test->process_name = $test->process->title;
                $test->process_id = $test->process->id;
            }
            
            if ($test->category) {
                $test->category_name = $test->category->title;
                $test->category_id = $test->category->id;
                
                // If category has a process, use that as well
                if ($test->category->process) {
                    $test->process_name = $test->category->process->title;
                    $test->process_id = $test->category->process->id;
                }
            }
            
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
        // Use validated data directly from the request
        $validated = $request->validated();

        $test = test::create($validated);
        $testWithRelations = $test->load(['user', 'formateur', 'process', 'category', 'quzs.category.process']);
        
        // Add categories and processes at the top level
        $categories = $testWithRelations->quzs->map(function ($quz) {
            return $quz->category;
        })->filter()->unique('id')->values();
        
        $processes = $categories->map(function ($category) {
            return $category->process;
        })->filter()->unique('id')->values();
        
        $testWithRelations->categories = $categories;
        $testWithRelations->processes = $processes;

        // Add direct relationship data (new approach)
        if ($testWithRelations->process) {
            $testWithRelations->process_name = $testWithRelations->process->title;
            $testWithRelations->process_id = $testWithRelations->process->id;
        }
        
        if ($testWithRelations->category) {
            $testWithRelations->category_name = $testWithRelations->category->title;
            $testWithRelations->category_id = $testWithRelations->category->id;
        }

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
        $testWithRelations = $test->load(['user', 'formateur', 'process', 'category', 'quzs.category.process']);
        
        // Add categories and processes at the top level
        $categories = $testWithRelations->quzs->map(function ($quz) {
            return $quz->category;
        })->filter()->unique('id')->values();
        
        $processes = $categories->map(function ($category) {
            return $category->process;
        })->filter()->unique('id')->values();
        
        $testWithRelations->categories = $categories;
        $testWithRelations->processes = $processes;
        
        // Add direct relationship data (new approach)
        if ($testWithRelations->process) {
            $testWithRelations->process_name = $testWithRelations->process->title;
            $testWithRelations->process_id = $testWithRelations->process->id;
        }
        
        if ($testWithRelations->category) {
            $testWithRelations->category_name = $testWithRelations->category->title;
            $testWithRelations->category_id = $testWithRelations->category->id;
        }
        
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
        $validated = $request->validated();

        $test->update($validated);

        // Load full relations for response
        $testWithRelations = $test->load(['user', 'formateur', 'process', 'category', 'quzs.category.process']);
        
        // Add categories and processes at the top level
        $categories = $testWithRelations->quzs->map(function ($quz) {
            return $quz->category;
        })->filter()->unique('id')->values();
        
        $processes = $categories->map(function ($category) {
            return $category->process;
        })->filter()->unique('id')->values();
        
        $testWithRelations->categories = $categories;
        $testWithRelations->processes = $processes;

        // Add direct relationship data (new approach)
        if ($testWithRelations->process) {
            $testWithRelations->process_name = $testWithRelations->process->title;
            $testWithRelations->process_id = $testWithRelations->process->id;
        }
        
        if ($testWithRelations->category) {
            $testWithRelations->category_name = $testWithRelations->category->title;
            $testWithRelations->category_id = $testWithRelations->category->id;
        }

        return response()->json([
            'success' => true,
            'message' => 'Test mis à jour avec succès',
            'data' => $testWithRelations
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

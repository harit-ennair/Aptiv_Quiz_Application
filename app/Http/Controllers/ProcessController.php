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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(process $process)
    {
        // Load the process with its categories
        $process->load('categories');
        
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(process $process)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\repo;
use App\Http\Requests\StorerepoRequest;
use App\Http\Requests\UpdaterepoRequest;

class RepoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(StorerepoRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(repo $repo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(repo $repo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdaterepoRequest $request, repo $repo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(repo $repo)
    {
        //
    }
}

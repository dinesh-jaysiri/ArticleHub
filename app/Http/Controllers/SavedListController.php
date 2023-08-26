<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSavedListRequest;
use App\Http\Requests\UpdateSavedListRequest;
use App\Models\SavedList;

class SavedListController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSavedListRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(SavedList $savedList)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSavedListRequest $request, SavedList $savedList)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SavedList $savedList)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreWaitingRequest;
use App\Http\Requests\UpdateWaitingRequest;
use App\Models\Waiting;

class WaitingController extends Controller
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
    public function store(StoreWaitingRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Waiting $waiting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Waiting $waiting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateWaitingRequest $request, Waiting $waiting)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Waiting $waiting)
    {
        //
    }
}

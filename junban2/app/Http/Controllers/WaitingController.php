<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreWaitingRequest;
use App\Http\Requests\UpdateWaitingRequest;
use App\Models\Waiting;
use App\Models\Patient;
use Inertia\Inertia;

class WaitingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render('Waitings/Create');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Waitings/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreWaitingRequest $request)
    {
        $patient=Patient::select('patient_id','name')
        ->where('patient_id', $request->patient_id)
        ->get();

        Waiting::create([
            'patient_id'=> $patient->patient_id,
            'name'=> $patient->name,
            'status'=> 1,
        ]);

        return to_route('waitings.show');

        // if ($patient->isEmpty()) {
        //     return Inertia::render('Waitings/Create',[
        //         'patient_id'=>$request->patient_id,
        //         'message'=>'診察券番号が登録されていないか、正しく入力されていません。',
        //     ]);
        // } else {
        //     Waiting::create([
        //         'patient_id'=> $patient->patient_id,
        //         'name'=> $patient->name,
        //         'status'=> 1,
        //     ]);
    
        //     return Inertia::render('Waitings/Show',[
        //         'name'=>$patient->name,
        //     ]);
        // }
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

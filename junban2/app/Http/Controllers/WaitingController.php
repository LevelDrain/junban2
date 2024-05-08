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
        // return Inertia::render('Waitings/Create');
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
        $request->validate([
            'patient_id'=>['required','exists:patients,patient_id']
            // ,'unique:waitings,patient_id'
        ],[
            'exists'=>'診察券番号が登録されていないか、正しく入力されていません。',
            // 'unique'=>'受付番号'.Waiting::where('patient_id',$request->patient_id)->first()->order_id.'で登録されています。'
        ]);

        $created= Waiting::create([
            'patient_id'=> $request->patient_id,
            'order_id'=> rand(100, 999),
            'order_num'=> 1,
        ]);
    //    $order_id=Waiting::where('patient_id',$request->patient_id)->first()->order_id;

        return Inertia::render('Waitings/Show',[
            'info'=>$created->order_id
        ]);
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

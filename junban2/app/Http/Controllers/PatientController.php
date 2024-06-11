<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePatientRequest;
use App\Http\Requests\UpdatePatientRequest;
use App\Models\Waiting;
use App\Models\Patient;
use Inertia\Inertia;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $patients=Patient::leftJoin('waitings', 'waitings.patient_id','=','patients.patient_id')
        ->select('patients.id','patients.patient_id','patients.name','waitings.order_id','waitings.order_num')
        ->get();

        return Inertia::render('Patients/Index',[
            'patients'=>$patients,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Patients/Create');
    }


    public function confirm(StorePatientRequest $request)
    {
        $request->validate([
            'patient_id'=>'required | unique:patients,patient_id',
        ],[
            'unique'=>'既に登録されています'
        ]);

        $formData=[
            'patient_id'=>$request->patient_id,
            'name'=>$request->name,
        ];

        return Inertia::render('Patients/Confirm', $formData);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePatientRequest $request)
    {
        $create=Patient::create([
            'patient_id'=>$request->patient_id,
            'name'=>$request->name,
            'status'=>1,
        ]);

        return to_route('dashboard');
    }

    /**
     * Display the specified resource.
     */
    public function show(Patient $patient)
    {
        $patient_info=Patient::leftJoin('waitings', 'waitings.patient_id','=','patients.patient_id')
        ->select('patients.id','patients.patient_id','patients.name','waitings.order_id','waitings.order_num')
        ->find($patient->id);

        // $patient_info=Patient::find($patient->id);

        return Inertia::render('Patients/Show',[
            'patient_info'=>$patient_info,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Patient $patient)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePatientRequest $request, Patient $patient)
    {
        $waiting=Waiting::where('patient_id', '=', $patient->patient_id)->first();
        $patient->name = $request->name;
        if($waiting!=null){
            $waiting->fill(['order_num'=>$request->order_num])->save();
        }
        $patient->save();

        return redirect(route('patients.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Patient $patient)
    {
        $waiting=Waiting::where('patient_id', '=', $patient->patient_id)->first();
        $patient->delete();
        $waiting->delete();

        return redirect(route('patients.index'));
    }
}

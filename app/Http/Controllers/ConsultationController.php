<?php

namespace App\Http\Controllers;

use App\Models\Consultation;
use App\Models\ConsultationResponse;
use App\Models\Record;
use Illuminate\Http\Request;

class ConsultationController extends Controller
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
    public function create(Record $record)
    {
        return view('nurse.record.consultation.record-consultation-create', compact('record'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Connect Consultation ID to that specific Record ID
        $recordID = $request->input('record_id');
        $consultationData = $request->all();
        $consultationData['record_id'] = $recordID;

        // Create Consultation
        $consultation = Consultation::create($consultationData);

        // Connect Consultation Response ID to the Consultation ID
        $request->validate([
            'complaint' => 'required|string',
            'pulse' => 'required|integer',
            'oxygen' => 'required|integer',
            'respiratory_rate' => 'required|integer',
            'top_bp' => 'required|integer',
            'bot_bp' => 'required|integer',
            'temperature' => 'required|numeric',
            'treatment' => 'required',
            'remarks' => 'in:Monitoring Case,Resolved Case',
        ]);

        $consultationID = $consultation->id;
        $consultationResponseData = $request->all();
        $consultationResponseData['consultation_id'] = $consultationID;

        // Create Consultation Response
        ConsultationResponse::create($consultationResponseData);
        
        if(auth()->user()->role->role == 'Nurse')
        {
            return redirect()->route('nurse.recordShow', ['record' => $recordID])->with('success', 'Consultation created successfully.');
        }
        elseif(auth()->user()->role->role == 'Doctor')
        {
            return redirect()->route('doctor.recordShow', ['record' => $recordID])->with('success', 'Consultation created successfully.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Consultation $consultation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Consultation $consultation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Consultation $consultation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Consultation $consultation)
    {
        //
    }
}

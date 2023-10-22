<?php

namespace App\Http\Controllers;

use App\Models\Record;
use App\Models\MedicalExam;
use App\Models\PastMedicalHistory;
use App\Models\PMHFinding;
use App\Models\FamilyHistory;
use App\Models\FHFinding;
use App\Models\PersonalSocial;
use App\Models\OBGyneReview;
use App\Models\OBRFinding;
use App\Models\PhysicalExamination;
use App\Models\PEFinding;
use Illuminate\Http\Request;

class MedicalExamController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(MedicalExam $medical_exam)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MedicalExam $medical_exam)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MedicalExam $medical_exam)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MedicalExam $medical_exam)
    {
        //
    }
}

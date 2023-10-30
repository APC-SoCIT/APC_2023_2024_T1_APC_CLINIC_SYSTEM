<?php

namespace App\Http\Controllers;

use App\Models\Record;
use App\Models\DentalExam;
use App\Models\DentalExamResult;
use App\Models\Restoration;
use App\Models\Extraction;
use Illuminate\Http\Request;

class DentalExamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function date(Request $request, Record $recordId)
    {
        $responseData = [
            'den_output' => '',
            'first_output' => '',
            'second_output' => '',
            'third_output' => '',
            'fourth_output' => '',
            'fifth_output' => '',
            'sixth_output' => '',
            'seventh_output' => '',
            'eighth_output' => '',
        ];

        $dental_exams = DentalExam::where('id', $request->dental_exam_id)
            ->where(function ($query) use ($request) {
                $query->where(function ($query) use ($request) {
                    $query->whereDate('date_created', $request->date_created)
                        ->orWhereNull('date_created');
                })
                ->orWhere(function ($query) use ($request) {
                    $query->whereDate('date_updated', $request->date_updated)
                        ->orWhereNull('date_updated');
                })
                ->orWhere('id', $request->id); 
            })
            ->get();

        foreach ($dental_exams as $dental_exam) {

        }
    }
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
        return view('dentist.record.dental-exam.record-de-create', compact('record'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Connect Medical Exam ID to a specific Record ID
        $recordID = $request->input('record_id');
        $dental_examData = $request->all();
        $dental_examData['record_id'] = $recordID;

        //Creating Medical Exam
        $dental_exam = DentalExam::create($dental_examData);

        //Connect Past Medical History ID to a specific Medical Exam ID
        $request->validate([
            'oral_hygiene' => 'in:Good,Fair,Poor',
            'gingival_color' => 'in:Pink,Pale,Bright Red',
            'consistency_of_the_gingiva' => 'in:Firm,Smooth,Enlarge',
            'oral_prophylaxis' => 'string',
            'oral_prophylaxis_result' => 'max:250',
            'restoration' => 'string',
            'extraction' => 'string',
            'prosthodontic_restoration' => 'string',
            'prosthodontic_restoration_result' => 'max:250',
            'orthodontist' => 'string',
            'orthodontist_result' => 'max:250',
        ]);

        $dental_examID = $dental_exam->id;
        $dental_exam_resultData = $request->all();
        $dental_exam_resultData['dental_exam_id'] = $dental_examID;

        //Creating Past Medical History
        $dental_exam_result = DentalExamResult::create($dental_exam_resultData);

        //Connect Past Medical History Findings ID to a specific Past Medical History ID
        $request->validate([
            'r_top_left_one' => 'string',
            'r_top_left_two' => 'string',
            'r_top_left_three' => 'string',
            'r_top_left_four' => 'string',
            'r_top_left_five' => 'string',
            'r_top_left_six' => 'string',
            'r_top_left_seven' => 'string',
            'r_top_left_eight' => 'string',
            'r_top_right_one' => 'string',
            'r_top_right_two' => 'string',
            'r_top_right_three' => 'string',
            'r_top_right_four' => 'string',
            'r_top_right_five' => 'string',
            'r_top_right_six' => 'string',
            'r_top_right_seven' => 'string',
            'r_top_right_eight' => 'string',
            'r_bot_left_one' => 'string',
            'r_bot_left_two' => 'string',
            'r_bot_left_three' => 'string',
            'r_bot_left_four' => 'string',
            'r_bot_left_five' => 'string',
            'r_bot_left_six' => 'string',
            'r_bot_left_seven' => 'string',
            'r_bot_left_eight' => 'string',
            'r_bot_right_one' => 'string',
            'r_bot_right_two' => 'string',
            'r_bot_right_three' => 'string',
            'r_bot_right_four' => 'string',
            'r_bot_right_five' => 'string',
            'r_bot_right_six' => 'string',
            'r_bot_right_seven' => 'string',
            'r_bot_right_eight' => 'string',
        ]);

        $dental_exam_resultID = $dental_exam_result->id;
        $restorationData  = $request->all();
        $restorationData['dental_exam_result_id'] = $dental_exam_resultID;

        Restoration::create($restorationData);

        //Connect Family History ID to a specific Medical Exam ID
        $request->validate([
            'e_top_left_one' => 'string',
            'e_top_left_two' => 'string',
            'e_top_left_three' => 'string',
            'e_top_left_four' => 'string',
            'e_top_left_five' => 'string',
            'e_top_left_six' => 'string',
            'e_top_left_seven' => 'string',
            'e_top_left_eight' => 'string',
            'e_top_right_one' => 'string',
            'e_top_right_two' => 'string',
            'e_top_right_three' => 'string',
            'e_top_right_four' => 'string',
            'e_top_right_five' => 'string',
            'e_top_right_six' => 'string',
            'e_top_right_seven' => 'string',
            'e_top_right_eight' => 'string',
            'e_bot_left_one' => 'string',
            'e_bot_left_two' => 'string',
            'e_bot_left_three' => 'string',
            'e_bot_left_four' => 'string',
            'e_bot_left_five' => 'string',
            'e_bot_left_six' => 'string',
            'e_bot_left_seven' => 'string',
            'e_bot_left_eight' => 'string',
            'e_bot_right_one' => 'string',
            'e_bot_right_two' => 'string',
            'e_bot_right_three' => 'string',
            'e_bot_right_four' => 'string',
            'e_bot_right_five' => 'string',
            'e_bot_right_six' => 'string',
            'e_bot_right_seven' => 'string',
            'e_bot_right_eight' => 'string',
        ]);

        $extractionData = $request->all();
        $extractionData['dental_exam_result_id'] = $dental_exam_resultID;

        //Create Family History
        Extraction::create($extractionData);

        return redirect()->route('dentist.recordShow', ['record' => $recordID])->with('success', 'Dental exam created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(DentalExam $dental_exam)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DentalExam $dental_exam)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DentalExam $dental_exam)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DentalExam $dental_exam)
    {
        //
    }
}

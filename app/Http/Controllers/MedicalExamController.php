<?php

namespace App\Http\Controllers;

use App\Models\Record;
use App\Models\MedicalExam;
use App\Models\PastMedicalHistory;
use App\Models\PastMedicalHistoryFinding;
use App\Models\FamilyHistory;
use App\Models\FamilyHistoryFinding;
use App\Models\PersonalSocial;
use App\Models\ObGyneReview;
use App\Models\ObGyneReviewFinding;
use App\Models\PhysicalExamination;
use App\Models\PhysicalExaminationFinding;
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
        if(auth()->user()->role->role == 'Nurse')
        {
            return view('nurse.record.medical-exam.record-me-create', compact('record'));
        }
        //elseif(auth()->user()->role->role == 'Doctor')
        //{
        //    return view('doctor.record.medical-exan.record-me-create', compact('record'));
        //}
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Connect Medical Exam ID to a specific Record ID
        $recordID = $request->input('record_id');
        $medical_examData = $request->all();
        $medical_examData['record_id'] = $recordID;

        //Creating Medical Exam
        $medical_exam = MedicalExam::create($medical_examData);

        //Connect Past Medical History ID to a specific Medical Exam ID
        $request->validate([
            'pmh_allergies' => 'string',
            'pmh_skin_disease' => 'string',
            'pmh_opthalmologic_disorder' => 'string',
            'pmh_ent_disorder' => 'string',
            'pmh_bronchial_asthma' => 'string',
            'pmh_cardiac_disorder' => 'string',
            'pmh_diabetes_mellitus' => 'string',
            'pmh_chronic_headache' => 'string',
            'pmh_hepatitis' => 'string',
            'pmh_hypertension' => 'string',
            'pmh_thyroid_disorder' => 'string',
            'pmh_blood_disorder' => 'string',
            'pmh_tuberculosis' => 'string',
            'pmh_peptic_ulcer' => 'string',
            'pmh_musculoskeletal_disorder' => 'string',
            'pmh_infectious_disease' => 'string',
        ]);

        $medical_examID = $medical_exam->id;
        $past_medical_historyData = $request->all();
        $past_medical_historyData['medical_exam_id'] = $medical_examID;

        //Creating Past Medical History
        $past_medical_history = PastMedicalHistory::create($past_medical_historyData);

        //Connect Past Medical History Findings ID to a specific Past Medical History ID
        $request->validate([
            'pmh_allergies_findings' => 'max:250',
            'pmh_skin_disease_findings' => 'max:250',
            'pmh_opthalmologic_disorder_findings' => 'max:250',
            'pmh_ent_disorder_findings' => 'max:250',
            'pmh_bronchial_asthma_findings' => 'max:250',
            'pmh_cardiac_disorder_findings' => 'max:250',
            'pmh_diabetes_mellitus_findings' => 'max:250',
            'pmh_chronic_headache_findings' => 'max:250',
            'pmh_hepatitis_findings' => 'max:250',
            'pmh_hypertension_findings' => 'max:250',
            'pmh_thyroid_disorder_findings' => 'max:250',
            'pmh_blood_disorder_findings' => 'max:250',
            'pmh_tuberculosis_findings' => 'max:250',
            'pmh_peptic_ulcer_findings' => 'max:250',
            'pmh_musculoskeletal_disorder_findings' => 'max:250',
            'pmh_infectious_disease_findings' => 'max:250',
            'pmh_others' => 'max:250',
        ]);

        $past_medical_historyID = $past_medical_history->id;
        $past_medical_history_findingData  = $request->all();
        $past_medical_history_findingData['past_medical_history_id'] = $past_medical_historyID;

        PastMedicalHistoryFinding::create($past_medical_history_findingData);

        //Connect Family History ID to a specific Medical Exam ID
        $request->validate([
            'fh_bronchial_asthma' => 'string',
            'fh_diabetes_mellitus' => 'string',
            'fh_thyroid_disease' => 'string',
            'fh_opthalmologic_disease' => 'string',
            'fh_cancer' => 'string',
            'fh_cardiac_disorder' => 'string',
            'fh_hypertension' => 'string',
            'fh_tuberculosis' => 'string',
            'fh_nervous_disorder' => 'string',
            'fh_musculoskeletal' => 'string',
            'fh_liver_disease' => 'string',
            'fh_kidney_disease' => 'string',
        ]);

        $family_historyData = $request->all();
        $family_historyData['medical_exam_id'] = $medical_examID;

        //Create Family History
        $family_history = FamilyHistory::create($family_historyData);

        //Connect Family History Findings ID to a specific Family History ID
        $request->validate([
            'fh_bronchial_asthma_findings' => 'max:250',
            'fh_diabetes_mellitus_findings' => 'max:250',
            'fh_thyroid_disease_findings' => 'max:250',
            'fh_opthalmologic_disease_findings' => 'max:250',
            'fh_cancer_findings' => 'max:250',
            'fh_cardiac_disorder_findings' => 'max:250',
            'fh_hypertension_findings' => 'max:250',
            'fh_tuberculosis_findings' => 'max:250',
            'fh_nervous_disorder_findings' => 'max:250',
            'fh_musculoskeletal_findings' => 'max:250',
            'fh_liver_disease_findings' => 'max:250',
            'fh_kidney_disease_findings' => 'max:250',
            'fh_others' => 'max:250',
        ]);

        $family_historyID = $family_history->id;
        $family_history_findingData = $request->all();
        $family_history_findingData['family_history_id'] = $family_historyID;

        FamilyHistoryFinding::create($family_history_findingData);

        //Connect Personal and Social ID to a specific Medical Exam ID
        $request->validate([
            'smoker' => 'string',
            'day' => 'integer',
            'year' => 'integer',
            'alcoholic' => 'string',
            'shot' => 'integer',
            'week' => 'integer',
            'med_take' => 'string',
            'hospitalization' => 'max:250',
            'hospitalization_result' => 'integer',
            'operation' => 'string',
            'operation_result' => 'integer',
        ]);

        $personal_socialData = $request->all();
        $personal_socialData['medical_exam_id'] = $medical_examID;

        PersonalSocial::create($personal_socialData);

        //Connect OB-Gyne and Review of the System ID to a specific Medical Exam ID
        $request->validate([
            'obg_lnmp' => 'string',
            'obg_ob_score' => 'string',
            'obg_abnormal_pregnancies' => 'string',
            'obg_last_delivery' => 'string',
            'obg_breast_uterus_ovaries' => 'string',
            'rs_skin' => 'string',
            'rs_opthalmologic' => 'string',
            'rs_ent' => 'string',
            'rs_cardiovascular' => 'string',
            'rs_respiratory' => 'string',
            'rs_gastro_intestinal' => 'string',
            'rs_neuro_psychiatric' => 'string',
            'rs_hematology' => 'string',
            'rs_genitourinary' => 'string',
            'rs_musculo_skeletal' => 'string',
        ]);
        
        $ob_gyne_reviewData = $request->all();
        $ob_gyne_reviewData['medical_exam_id'] = $medical_examID;
        
        //Create OB-Gyne and Review of the System
        $ob_gyne_review = OBGyneReview::create($ob_gyne_reviewData);
        
        //Connect OB-Gyne and Review of the System Findings ID to a specific OB-Gyne and Review of the System ID
        $request->validate([
            'obg_lnmp_findings' => 'max:250',
            'obg_ob_score_findings' => 'max:250',
            'obg_abnormal_pregnancies_findings' => 'max:250',
            'obg_last_delivery_findings' => 'max:250',
            'obg_breast_uterus_ovaries_findings' => 'max:250',
            'rs_skin_findings' => 'max:250',
            'rs_opthalmologic_findings' => 'max:250',
            'rs_ent_findings' => 'max:250',
            'rs_cardiovascular_findings' => 'max:250',
            'rs_respiratory_findings' => 'max:250',
            'rs_gastro_intestinal_findings' => 'max:250',
            'rs_neuro_psychiatric_findings' => 'max:250',
            'rs_hematology_findings' => 'max:250',
            'rs_genitourinary_findings' => 'max:250',
            'rs_musculo_skeletal_findings' => 'max:250',
        ]);
        
        $ob_gyne_reviewID = $ob_gyne_review->id;
        $ob_gyne_review_findingData = $request->all();
        $ob_gyne_review_findingData['ob_gyn_review_id'] = $ob_gyne_reviewID;
        
        ObGyneReviewFinding::create($ob_gyne_review_findingData);

        //Connect OB-Gyne and Review of the System ID to a specific Medical Exam ID
        $request->validate([
            'height' => 'integer',
            'weight' => 'integer',
            'top_bp' => 'integer',
            'bot_bp' => 'integer',
            'pulse' => 'integer',
            'respiratory_rate' => 'integer',
            'bmi' => 'numeric',
            'pe_general_appearance' => 'string',
            'pe_skin' => 'string',
            'pe_head_scalp' => 'string',
            'pe_eyes' => 'string',
            'pe_corrected' => 'string',
            'pe_pupils' => 'string',
            'pe_ear_eardrums' => 'string',
            'pe_nose_sinuses' => 'string',
            'pe_mouth_throat' => 'string',
            'pe_neck_thyroid' => 'string',
            'pe_chest_breast_axilla' => 'string',
            'pe_heart_cardiovascular' => 'string',
            'pe_lungs_respiratory' => 'string',
            'pe_abdomen' => 'string',
            'pe_back_flanks' => 'string',
            'pe_anus_rectum' => 'string',
            'pe_genito_urinary_system' => 'string',
            'pe_inguinal_genitals' => 'string',
            'pe_musculo_skeletal' => 'string',
            'pe_extremities' => 'string',
            'pe_reflexes' => 'string',
            'pe_neurological' => 'string',
        ]);
        
        $physical_examinationData = $request->all();
        $physical_examinationData['medical_exam_id'] = $medical_examID;
        
        //Create OB-Gyne and Review of the System
        $physical_examination = PhysicalExamination::create($physical_examinationData);
        
        //Connect OB-Gyne and Review of the System Findings ID to a specific OB-Gyne and Review of the System ID
        $request->validate([
            'pe_general_appearance_findings' => 'max:250',
            'pe_skin_findings' => 'max:250',
            'pe_head_scalp_findings' => 'max:250',
            'pe_eyes_top_od' => 'max:250',
            'pe_eyes_bot_od' => 'max:250',
            'pe_eyes_top_os' => 'max:250',
            'pe_eyes_bot_os' => 'max:250',
            'pe_corrected_top_od' => 'max:250',
            'pe_corrected_bot_od' => 'max:250',
            'pe_corrected_top_os' => 'max:250',
            'pe_corrected_bot_os' => 'max:250',
            'pe_pupils_findings' => 'max:250',
            'pe_ear_eardrums_findings' => 'max:250',
            'pe_nose_sinuses_findings' => 'max:250',
            'pe_mouth_throat_findings' => 'max:250',
            'pe_neck_thyroid_findings' => 'max:250',
            'pe_chest_breast_axilla_findings' => 'max:250',
            'pe_heart_cardiovascular_findings' => 'max:250',
            'pe_lungs_respiratory_findings' => 'max:250',
            'pe_abdomen_findings' => 'max:250',
            'pe_back_flanks_findings' => 'max:250',
            'pe_anus_rectum_findings' => 'max:250',
            'pe_genito_urinary_system_findings' => 'max:250',
            'pe_inguinal_genitals_findings' => 'max:250',
            'pe_musculo_skeletal_findings' => 'max:250',
            'pe_extremities_findings' => 'max:250',
            'pe_reflexes_findings' => 'max:250',
            'pe_neurological_findings' => 'max:250',
            'diagnosis' => 'max:250',
        ]);
        
        $physical_examinationID = $physical_examination->id;
        $physical_examination_findingData = $request->all();
        $physical_examination_findingData['physical_examination_id'] = $physical_examinationID;
        
        PhysicalExaminationFinding::create($physical_examination_findingData);

        if(auth()->user()->role->role == 'Nurse')
        {
            return redirect()->route('nurse.recordShow', ['record' => $recordID])->with('success', 'Medical exam created successfully.');
        }
        //elseif(auth()->user()->role->role == 'Doctor')
        //{
        //    return redirect()->route('doctor.recordShow', ['record' => $recordID])->with('success', 'Medical exam created successfully.');
        //}
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

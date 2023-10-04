@extends('adminlte::page')

<!-- Tabs Title -->
@section('title', 'Health Record')

<!-- Content Header -->
@section('content_header')
    <h1>Health Record for {{ $record->user->name }}</h1>
@stop

<!-- Content Body -->
@section('content')
<!-- Go back from the last page -->
<a class="btn btn-danger mb-2" href="{{ route('nurse.recordIndex') }}">Go Back</a>

<!-- Body -->
<div class="container-xxl mb-2 record-customize-show-container-height">
    <div class="row mx-auto mt-4 mb-2 record-show-info-header">
        <!-- Left Side -->
        <div class="col">
            <div class="row-col-1 py-3" >
                <!-- Patient's Name -->
                <div class="col my-1">
                    <label class="info"><b>Name:</b></label>
                    <span class="info">{{ $record->user->name }}</span>
                </div>

                <!-- Patient's School ID -->
                <div class="col my-1">
                    <label class="info"><b>ID:</b></label>
                    <span class="info">{{ $record->user->school_id }}</span>
                </div>

                <!-- Patient's Grade, Year, or Specialization -->
                <div class="col my-1">
                    @if($record->user->role->role == 'Student')
                        @if($record->user->grade)
                        <label class="info"><b>Grade:</b></label>
                        <span class="info">{{ $record->user->grade }}</span>
                        @elseif($record->user->year)
                        <label class="info"><b>Year:</b></label>
                        <span class="info">{{ $record->user->year }}</span>
                        @endif
                    @else
                    <label class="info"><b>Specialization:</b></label>
                    <span class="info">{{ $record->user->specialization }}</span>
                    @endif
                </div>
                
                <!-- Patient's Course and Section (Student) -->
                @if($record->user->role->role == 'Student')
                <div class="col my-1">
                    <label class="info"><b>Course:</b></label>
                    <span class="info">{{ $record->user->course }}</span>
                </div>
                
                <div class="col my-1">
                    <label class="info"><b>Section:</b></label>
                    <span class="info">{{ $record->user->section }}</span>
                </div>
                @endif

                <!-- Patient's Mobile Number -->
                <div class="col my-1">
                    <label class="info"><b>Mobile Number:</b></label>
                    <span class="info">{{ $record->mobile_number }}</span>
                </div>

                <!-- Edit Info -->
                <div class="col my-1">
                    <button type="button" class="btn btn-outline-info" data-bs-toggle="modal" data-bs-target="#staticBackdropUpdate{{ $record->id }}">Update Info</button>
                </div>
            </div>
        </div>

        <!-- Right Side -->
        <div class="col">
            <div class="row-col-1 py-3">
                
                <!-- Patient's Birth Date -->
                <div class="col my-1">
                    <label class="info"><b>Birth Date:</b></label>
                    <span class="info">{{ $record->birth_date->format('F d, Y') }}</span>
                </div>
                
                <!-- Patient's Age -->
                <div class="col my-1">
                    <label class="info"><b>Age:</b></label>
                    <span class="info">{{ $record->age }}</span>
                </div>
                
                <!-- Patient's Sex -->
                <div class="col my-1">
                    <label class="info"><b>Sex:</b></label>
                    <span class="info">{{ $record->sex }}</span>
                </div>
                
                <!-- Patient's Civil Status -->
                <div class="col my-1">
                    <label class="info"><b>Civil Status:</b></label>
                    <span class="info">{{ $record->civil_status }}</span>
                </div>
                
                <!-- Patient's Address -->
                <div class="col my-1">
                    <label class="info"><b>Address:</b></label>
                    <span class="info">{{ $record->address }}, </span>
                    <span class="info">{{ $record->street }}, </span>
                    <span class="info">{{ $record->city }}, </span>
                    <span class="info">{{ $record->province }}, </span>
                    <span class="info">{{ $record->zip }}</span>
                </div>
                
                <!-- Patient's Contact Person -->
                <div class="col my-1">
                    <label class="info"><b>Contact Person:</b></label>
                    <span class="info">{{ $record->contact_person }}</span>
                </div>
                
                <!-- Patient's Contact Person Number -->
                <div class="col my-1">
                    <label class="info"><b>Contact Person Number:</b></label>
                    <span class="info">{{ $record->contact_person_number }}</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Consultation -->
    <div class="record-show-consultation-header border-top border-bottom border-secondary btn-info mx-auto text-center" id="consultation-header">
        <label class="info h4">Consultation</label>
    </div>
    <!-- If user doesn't have made Consultation -->
    <div class="border border-secondary mx-auto text-center" id="consultation-content-empty">
        <span class="info">No Consultation has been made, would you like to <a href="#">Create</a>?</span> 
    </div>
    <!-- If user have made Consultation -->
    <div class="border border-secondary mx-auto" id="consultation-content">
    </div>
    

    <!-- Medical Medical -->
    <div class="record-show-medical-exam-header border-top border-bottom border-secondary btn-info mx-auto mx-auto text-center" id="medical-exam-header">
        <label class="info h4">Medical Exam</label>
    </div>
    <!-- If user doesn't have made Medical Exam -->
    <div class="border border-secondary mx-auto text-center" id="medical-exam-content-empty">
        <span class="info">No Medical Exam has been made, would you like to <a href="#">Create</a>?</span> 
    </div>
    <!-- If user have made Medical Exam -->
    <div class="border border-secondary mx-auto" id="medical-exam-content">
    </div>
    
    
    <!-- Dental Record -->
    <div class="record-show-dental-exam-header border-top border-bottom border-secondary btn-info mx-auto mx-auto text-center" id="dental-exam-header">
        <label class="info h4">Dental Exam</label>
    </div>
    <!-- If user doesn't have made Dental Exam -->
    <div class="border border-secondary mx-auto text-center" id="dental-exam-content-empty">
        <span class="info">No Dental Exam has been made, only the dentist can provide this area.</span> 
    </div>
    <!-- If user have made Dental Exam -->
    <div class="border border-secondary mx-auto" id="dental-exam-content">
    </div>
</div>
@stop

<!-- CSS -->
@section('css')
    <!-- AdminLTE css -->
    <link rel="stylesheet" href="/css/admin_custom.css">

    <!-- ZomProj css -->
    <link rel="stylesheet" href="{{ asset('assets/css/record/zomproj-record.css') }}">
    
    <!-- Google Font css -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300&display=swap" rel="stylesheet">
@stop

<!-- JavaScript -->
@section('js')
<!-- JQuery CDN (Content Delivery Network) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<!-- Bootstrap package -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

<!-- Sticky Header -->
<script>
    $(document).ready(function () {
        // When the consultation-header is clicked
        $("#consultation-header").click(function () {
            @if (isset($record->consultations->record_id) === $record->id)
            // Show consultation-content
            $("#consultation-content").slideToggle(500);
            @else
            // Show consultation-empty-content
            $("#consultation-content-empty").slideToggle(100);
            @endif;
        });

        // When the medical-exam-header is clicked
        $("#medical-exam-header").click(function () {
            // Show medical-exam-content
            $("#medical-exam-content").slideToggle(500);
        });

        // When the dental-exam-header is clicked
        $("#dental-exam-header").click(function () {
            // Show dental-exam-content
            $("#dental-exam-content").slideToggle(500);
        });
    });
</script>
@stop
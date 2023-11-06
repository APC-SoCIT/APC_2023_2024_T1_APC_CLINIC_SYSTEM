@extends('adminlte::page')

<!-- Tabs Title -->
@section('title', 'Homepage')

<!-- Content Header -->
@section('content_header')
    <h1>Daily Visits</h1>
@stop

<!-- Content Body -->
@section('content')
<div class="container-xxl border mb-2 record-customize-container-height-daily">
    <!-- Form Row -->
    <form method="POST" action="" onsubmit="return confirm('Are you sure you want to submit this medical exam?');">
        @csrf
        <div class="row row-cols-1 border">
            <!-- General Information Row -->
            <div class="col">
                <div class="row"> 
                    <!-- Patient Name -->
                    <div class="col">
                        <div class="input-group mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-default">Name</span>
                        <input type="text" class="form-control" name="" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                        </div>
                    </div> 

                    <!-- ID -->
                        <div class="col">
                        <div class="input-group mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-default">Student ID</span>
                        <input type="text" class="form-control-plaintext" name="" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" readonly>
                        </div>
                    </div>
                    <!-- Date -->
                    <div class="col-2">
                        <div class="input-group mb-3">
                            <span class="input-group-text mr-2" id="inputGroup-sizing-default"><i class="far fa-calendar"></i></span>
                            <input type="date" class="form-control-plaintext" id="current_date" name="" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" readonly>
                        </div>
                    </div>

                    <!-- Time -->
                    <div class="col-2">
                        <input type="time" class="form-control-plaintext" id="current_time" name="" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" readonly>
                    </div>
                </div> 
            </div> 
            <!-- Second Row -->
            <div class="row row-cols-1 border mb-2">
                <!-- Complaint Row -->
                <div class="col">
                    <div class="row"> 
                        <!-- Main Complaint -->
                        <div class="col">
                            <div class="input-group mb-3">
                                <label class="input-group-text" for="main_compliant">Main Complaint</label>
                                <select class="form-control" name="main_complaint" id="main_compliant">
                                    <option selected hidden>Choose...</option>
                                    <option value="Cardiology">Cardiology</option>
                                    <option value="Pulmonology">Pulmonology</option>
                                    <option value="Gastroenterology">Gastroenterology</option>
                                    <option value="Musculo Skeletal">Musculo Skeletal</option>
                                    <option value="Opthalmology">Opthalmology</option>
                                    <option value="ENT">ENT</option>
                                    <option value="Neurology">Neurology</option>
                                    <option value="Dermatology">Dermatology</option>
                                    <option value="Nephrology">Nephrology</option>
                                    <option value="Endocrinology">Endocrinology</option>
                                    <option value="OB-Gyne">OB-Gyne</option>
                                    <option value="Hematologic">Hematologic</option>
                                    <option value="Surgery">Surgery</option>
                                    <option value="Allergology">Allergology</option>
                                </select>
                            </div>
                        </div>  

                        <!-- Sub Complaint -->
                        <div class="col">
                            <div class="input-group mb-3">
                                <label class="input-group-text" for="sub_complaint">Sub Complaint</label>
                                <select class="form-control" name="sub_complaint" id="sub_complaint">
                                    <option selected hidden>Choose...</option>
                                </select>
                            </div>
                        </div> 
                    </div>
                </div> 
            </div>
            <!-- Third Row -->
            <div class="col">
                <!-- Treatment Row -->
                <div class="input-group">
                    <span class="input-group-text">Treatment Notes</span>
                    <textarea class="form-control" name="" aria-label="Treatment Notes"></textarea>
                </div>
            </div> 
            
            <!-- Submit -->
            <div class="col text-right px-3 my-2" style="width: 75px;">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
</div>

<!-- Daily Visits Log -->
<div class="container-xxl border mt-2 record-customize-container-height-visit">
    <h1 class="text-center">Visits for the Day</h1>
    <div>
        <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Complainant Name</th>
                <th scope="col">ID Number</th>
                <th scope="col">Time of Visit</th>
            </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>John Doe</td>
                    <td>2018-343002</td>
                    <td>12:00 PM</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Layla Dingle</td>
                    <td>2020-000221</td>
                    <td>9:25 AM</td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Ayaka Kamisato</td>
                    <td>2020-444201</td>
                    <td>2:30 PM</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@stop

<!-- CSS -->
@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">

    <!-- ZomProj css -->
    <link rel="stylesheet" href="{{ asset('assets/css/zomproj-record-daily.css') }}">
@stop

<!-- JavaScript -->
@section('js')
<!-- JQuery CDN (Content Delivery Network) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<!-- Bootstrap package -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

<!-- Get Current Date and Time Live -->
<script>
    $(document).ready(function(){
        function updateDateTime() {
            const date = new Date();

            // Update Date
            var currentDate = document.getElementById("current_date");
            var formattedDate = date.toISOString().split('T')[0];
            currentDate.value = formattedDate;

            // Update Time
            var currentTime = document.getElementById("current_time");
            var formattedTime = date.toTimeString().split(' ')[0];
            currentTime.value = formattedTime;
        }

        // Update every second (1000 milliseconds)
        setInterval(updateDateTime, 1000);

        // Initial update
        updateDateTime();
    });
</script>

<!-- Change option of sub complaint -->
<script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function () {
        var main_compliant = document.getElementById('main_compliant');

        main_compliant.addEventListener('change', function(){
            var selectedMainOption = $(this).find(':selected');
            var selectedMainID = selectedMainOption.val();
            var subComplaintSelect = $('#sub_complaint');

            if (selectedMainID == 'Cardiology'){
                subComplaintSelect.empty();
                subComplaintSelect.append('<option value="Hypertension">Hypertension</option>');
                subComplaintSelect.append('<option value="BP Monitoring">BP Monitoring</option>');
                subComplaintSelect.append('<option value="Bradycardia">Bradycardia</option>');
                subComplaintSelect.append('<option value="Hypotension">Hypotension</option>');
            } else if (selectedMainID == 'Pulmonology'){
                subComplaintSelect.empty();
                subComplaintSelect.append('<option value="URTI">URTI</option>');
                subComplaintSelect.append('<option value="Pneumonia">Pneumonia</option>');
                subComplaintSelect.append('<option value="PTB">PTB</option>');
                subComplaintSelect.append('<option value="Bronchitis">Bronchitis</option>');
                subComplaintSelect.append('<option value="Lung Pathology">Lung Pathology</option>');
                subComplaintSelect.append('<option value="Acute Bronchitis">Acute Bronchitis</option>');
            } else if (selectedMainID == 'Gastroenterology'){
                subComplaintSelect.empty();
                subComplaintSelect.append('<option value="Acute Gastroenteritis">Acute Gastroenteritis</option>');
                subComplaintSelect.append('<option value="GERD">GERD</option>');
                subComplaintSelect.append('<option value="Hemorrhoids">Hemorrhoids</option>');
                subComplaintSelect.append('<option value="Anorexia">Anorexia</option>');
            } else if (selectedMainID == 'Musculo Skeletal'){
                subComplaintSelect.empty();
                subComplaintSelect.append('<option value="Ligament Sprain">Ligament Sprain</option>');
                subComplaintSelect.append('<option value="Muscle Sprain">Muscle Sprain</option>');
                subComplaintSelect.append('<option value="Costochondritis">Costochondritis</option>');
                subComplaintSelect.append('<option value="Soft Tissue Contusion">Soft Tissue Contusion</option>');
                subComplaintSelect.append('<option value="Fracture">Fracture</option>');
                subComplaintSelect.append('<option value="Gouty Arthritis">Gouty Arthritis</option>');
                subComplaintSelect.append('<option value="Plantar Fascitis">Plantar Fascitis</option>');
                subComplaintSelect.append('<option value="Dislocation">Dislocation</option>');
            } else if (selectedMainID == 'Opthalmology'){
                subComplaintSelect.empty();
                subComplaintSelect.append('<option value="Conjunctivitis">Conjunctivitis</option>');
                subComplaintSelect.append('<option value="Stye">Stye</option>');
                subComplaintSelect.append('<option value="Foreign Body">Foreign Body</option>');
            } else if (selectedMainID == 'ENT'){
                subComplaintSelect.empty();
                subComplaintSelect.append('<option value="Stomatitis">Stomatitis</option>');
                subComplaintSelect.append('<option value="Epitaxis">Epitaxis</option>');
                subComplaintSelect.append('<option value="Otitis Media">Otitis Media</option>');
                subComplaintSelect.append('<option value="Foreign Body Removal">Foreign Body Removal</option>');
            } else if (selectedMainID == 'Neurology'){
                subComplaintSelect.empty();
                subComplaintSelect.append('<option value="Tension Headache">Tension Headache</option>');
                subComplaintSelect.append('<option value="Migraine">Migraine</option>');
                subComplaintSelect.append('<option value="Vertigo">Vertigo</option>');
                subComplaintSelect.append('<option value="Hyperventilation Syndrome">Hyperventilation Syndrome</option>');
                subComplaintSelect.append('<option value="Insomai">Insomai</option>');
                subComplaintSelect.append('<option value="Seizure">Seizure</option>');
                subComplaintSelect.append("<option value='Bell's Palsy'>Bell's Palsy</option>");
            } else if (selectedMainID == 'Dermatology'){
                subComplaintSelect.empty();
                subComplaintSelect.append('<option value="Folliculitis">Folliculitis</option>');
                subComplaintSelect.append('<option value="Carburncle">Carburncle</option>');
                subComplaintSelect.append('<option value="Burn">Burn</option>');
                subComplaintSelect.append('<option value="Wound Dressing">Wound Dressing</option>');
                subComplaintSelect.append('<option value="Infected Wound">Infected Wound</option>');
                subComplaintSelect.append('<option value="Blister Wound">Blister Wound</option>');
                subComplaintSelect.append('<option value="Seborrheic Dermatitis">Seborrheic Dermatitis</option>');
                subComplaintSelect.append('<option value="Bruise/Hermatoma">Bruise/Hermatoma</option>');
            } else if (selectedMainID == 'Nephrology'){
                subComplaintSelect.empty();
                subComplaintSelect.append('<option value="Urinary Tract Infection">Urinary Tract Infection</option>');
                subComplaintSelect.append('<option value="Renal Disease">Renal Disease</option>');
                subComplaintSelect.append('<option value="Urolithiasis">Urolithiasis</option>');
            } else if (selectedMainID == 'Endocrinology'){
                subComplaintSelect.empty();
                subComplaintSelect.append('<option value="Hypoglycemia">Hypoglycemia</option>');
                subComplaintSelect.append('<option value="Dyslipidemia">Dyslipidemia</option>');
                subComplaintSelect.append('<option value="Diabetes Mellitus">Diabetes Mellitus</option>');
            } else if (selectedMainID == 'OB-Gyne'){
                subComplaintSelect.empty();
                subComplaintSelect.append('<option value="Dysmenorrhea">Dysmenorrhea</option>');
                subComplaintSelect.append('<option value="Hormonal Imbalance">Hormonal Imbalance</option>');
                subComplaintSelect.append('<option value="Pregnancy">Pregnancy</option>');
            } else if (selectedMainID == 'Hematologic'){
                subComplaintSelect.empty();
                subComplaintSelect.append('<option value="Leukemia">Leukemia</option>');
                subComplaintSelect.append('<option value="Blood Dyscrasia">Blood Dyscrasia</option>');
                subComplaintSelect.append('<option value="Anemia">Anemia</option>');
            } else if (selectedMainID == 'Surgery'){
                subComplaintSelect.empty();
                subComplaintSelect.append('<option value="Lacerated Wound">Lacerated Wound</option>');
                subComplaintSelect.append('<option value="Punctured Wound">Punctured Wound</option>');
                subComplaintSelect.append('<option value="Animal Bite">Animal Bite</option>');
                subComplaintSelect.append('<option value="Superficail Abrasions">Superficail Abrasions</option>');
                subComplaintSelect.append('<option value="Foreign Body Removal">Foreign Body Removal</option>');
            } else if (selectedMainID == 'Allergology'){
                subComplaintSelect.empty();
                subComplaintSelect.append('<option value="Contact Dermatitis">Contact Dermatitis</option>');
                subComplaintSelect.append('<option value="Allergic Rhinitis">Allergic Rhinitis</option>');
                subComplaintSelect.append('<option value="Bronchial Asthma">Bronchial Asthma</option>');
                subComplaintSelect.append('<option value="Hypersensitivity">Hypersensitivity</option>');
            }
        });
    });
</script>
@stop
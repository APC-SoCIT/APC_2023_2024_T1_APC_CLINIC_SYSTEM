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
    <!-- First Row -->
    <div class="row row-cols-1 border mb-2">
        <!-- General Information Row -->
        <div class="col">
            <div class="row"> 
                <!-- Patient Name -->
                <div class="col">
                    <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">Name</span>
                    <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                    </div>
                </div> 
                <!-- ID -->
                    <div class="col">
                    <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">Student ID</span>
                    <input type="text" class="form-control-plaintext" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" readonly>
                    </div>
                </div>
                <!-- Date -->
                <div class="col">
                    <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">Date</span>
                    <input type="text" class="form-control-plaintext" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" readonly>
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
                    <label class="input-group-text" for="inputGroupSelect01">Main Complaint</label>
                    <select class="form-select" id="inputGroupSelect01">
                        <option selected>Choose...</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                </div>
                </div>  
                <!-- Sub Complaint -->
                <div class="col">
                <div class="input-group mb-3">
                    <label class="input-group-text" for="inputGroupSelect01">Sub Complaint</label>
                    <select class="form-select" id="inputGroupSelect01">
                        <option selected>Choose...</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                </div>
                </div> 
            </div>
        </div> 
        <!-- Third Row -->
        <div class="col">
            <!-- Treatment Row -->
            <div class="input-group">
                <span class="input-group-text">Treatment Notes</span>
                <textarea class="form-control" aria-label="Treatment Notes"></textarea>
            </div>
        </div> 
    </div> 
</div>
<!-- Daily Visits Log -->
<div class="container-sm border mb-2 record-customize-container-height-visit">
    <h1>Visits for the Day</h1>
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

@stop
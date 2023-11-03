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
        <!-- First Row -->
        <div class="col">
            <div class="row"> 
                <!-- Name -->
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
                    <span class="input-group-text" id="inputGroup-sizing-default">Student ID</span>
                    <input type="text" class="form-control-plaintext" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" readonly>
                </div> 
            </div> 
        </div> 
        <div class="col">
            
        </div> 
        <div class="col">
            
        </div> 
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
@extends('adminlte::page')

<!-- Tabs Title -->
@section('title', 'Reports')

<!-- Content Header -->
@section('content_header')
    <h1>Reports</h1>
@stop

<!-- Content Body -->
@section('content')
<!-- Body -->
<div class="container-xxl mb-2 record-customize-container-height">
    <div class="row row-cols-1">
        <!-- Summary table of today's visit (can be change depends on date) -->
        <div class="col">

        </div>

        <!-- Medicine reduce and add for today -->
        <div class="col">
            <div class="row">
                <!-- reduce -->
                <div class="col">
                </div>

                <!-- add -->
                <div class="col">
                </div>
            </div>
        </div>

        <!-- Visit List (Full Detail) -->
        <div class="col">
            
        </div>
    </div>
</div>
@stop

<!-- CSS -->
@section('css')
    <!-- AdminLTE css -->
    <link rel="stylesheet" href="/css/admin_custom.css">

    <!-- ZomProj css -->
    <link rel="stylesheet" href="{{ asset('assets/css/record/zomproj-record.css') }}">
@stop

<!-- JavaScript -->
@section('js')
<!-- JQuery CDN (Content Delivery Network) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<!-- Bootstrap package -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
@stop
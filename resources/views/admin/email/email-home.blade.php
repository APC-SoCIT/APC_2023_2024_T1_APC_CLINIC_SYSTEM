@extends('adminlte::page')

<!-- Tabs Title -->
@section('title', 'Emergency Email')

<!-- Content Header -->
@section('content_header')
    <h1>Emergency Email</h1>
@stop

<!-- Content Body -->
@section('content')
<!-- Body -->
<div class="container-xxl mb-2 record-customize-container-height">
    <div class="row row-cols-1">
        <div class="col" style="overflow-y: auto; height: 250px;">
            <form method="POST" action="{{ route('admin.emailStore') }}" onsubmit="return confirm('Are you sure you want to record this visit?');">            
                @csrf
                <div class="row">
                    <div class="col text-left my-2">
                        <button type="button" onclick="addInput()">Add New Input</button>
                    </div>
                    <div class="col">
                        <input type="text" class="form-control" name="section_handle" placeholder="Section Target">
                    </div>
                    <div class="col text-right my-2">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <input type="email" class="form-control" name="email[]" placeholder="Email of Faculty">
                    </div>
                </div>
            </form>
        </div>

        <div class="col">
            <table>
                <thead>
                    <tr>
                        <th class="text-center" colspan="2">List of the Faculty Staff that will be able to send an Emergency Email on current handle Section</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($emails as $email)
                    <tr>
                        <td class="text-center">{{ $email->section_handle }}</td>
                        <td class="text-center">Delete</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
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

<script>
    function addInput() {
        var newRow = '<div class="row my-2">' +
            '<div class="col">' +
            '<input type="email" class="form-control" name="email[]" placeholder="Email of Faculty">' +
            '</div>' +
            '</div>';

        // Append the new row to the form
        $('.row:last').after(newRow);
    }
</script>
@stop
@extends('adminlte::page')

<!------ Include the above in your HEAD tag ---------->

<!-- Tabs Title -->
@section('title', 'Appointments')

<!-- Content Header -->
@section('content_header')
    <h1>Upcoming Appointments</h1>
@stop

<!-- Content Body -->
@section('content')
<!-- Body -->
<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">	
	
	<div class="container">
		<div class="row row-striped">
			<div class="col-2 text-right">
				<h1 class="display-4"><span class="badge badge-secondary">DAY</span></h1>
				<h2>MONTH</h2>
			</div>
			<div class="col-10">
				<h3 class="text-uppercase"><strong>Consultation</strong></h3>
				<ul class="list-inline">
				    <li class="list-inline-item"><i class="fa fa-calendar-o" aria-hidden="true"></i> DAY</li>
					<li class="list-inline-item"><i class="fa fa-clock-o" aria-hidden="true"></i> TIME</li>
				</ul>
				<p>Brief information about the appointment</p>
			</div>
		</div>
		<div class="row row-striped">
			<div class="col-2 text-right">
				<h1 class="display-4"><span class="badge badge-secondary">DAY</span></h1>
				<h2>MONTH</h2>
			</div>
			<div class="col-10">
				<h3 class="text-uppercase"><strong>Dental Checkup</strong></h3>
				<ul class="list-inline">
				    <li class="list-inline-item"><i class="fa fa-calendar-o" aria-hidden="true"></i> DAY</li>
					<li class="list-inline-item"><i class="fa fa-clock-o" aria-hidden="true"></i> TIME</li>
				</ul>
				<p>Brief information about the appointment</p>
			</div>
		</div>
	</div>

    <div class="container text-center">
    <a href="https://outlook.office365.com/calendar/view/month" class="btn btn-primary btn-lg" target="_blank">Schedule Appointment</a>
    </div>
@stop

<!-- CSS -->
@section('css')
    <!-- AdminLTE css -->
    <link rel="stylesheet" href="/css/admin_custom.css">

    <!-- Bootstrap Calendar CSS -->
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

    <!-- ZomProj css -->
    <link rel="stylesheet" href="{{ asset('assets/css/record/zomproj-record.css') }}">
@stop

<!-- JavaScript -->
@section('js')
<!-- JQuery CDN (Content Delivery Network) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<!-- Bootstrap package -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

<!-- Bootstrap Calendar JS -->
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
@stop
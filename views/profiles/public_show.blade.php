@extends('layout')


<div class="jumbotron">
	<div class="container " style="padding-top:50px">
		<div class="row">
			<div class="col-md-8">
				<h1>Gledate profil korisnika: {{ $profile->user->username }}</h1>
				<p>Možete pogledati statistiku i napredak ali takođe i ostaviti poruku.</p>
			</div>
				
			<div class="col-md-4">
				<img src="/upload/profile/{{ $profile->getAvatar('original') }}" alt="Korisnik nema sliku!" class="img-rounded" width="300px" height="275px">
			</div>
		</div>
	</div>
</div>

@section('content')

@if($profile)

	
	
	@if($profile->quit == 1)

	<h2>Napredak korisnika: {{ $profile->user->username }}</h2>

	@include('common.progress')	

@else

	<h2>Korisnik nije uneo podatke</h2>

@endif

	<hr class="featurette-divider">

@else

	{{-- PROFILE DOES NOT EXIST --}}
	<h2>Profil ne postoji</h2>

@endif

	@include('common.messages')

	@include('messages.create')

	<h2>Poruke korisnika: {{ $profile->user->username }} </h2>

	@include('messages.index')
	
@stop

@section('sidebar')
	
	@include('common.public_sidebar')
	
@stop

@section('bottom_js')

	<script type="text/javascript" src="{{ asset('bootstrap/js/bootstrap-datepicker.js') }}"></script>
	<script type="text/javascript">
		$('[date-picker-field]').datepicker()
	</script>

@stop

@section('top_css')

	<link rel="stylesheet" type="text/css" href="{{ asset('bootstrap/css/datepicker3.css') }}">
	
@stop
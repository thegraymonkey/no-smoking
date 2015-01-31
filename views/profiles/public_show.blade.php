@extends('layout')


<div class="well well-sm">
		<div class="container" style="padding-top:60px">
		<div class="row">
			<div class="col-md-9">
				<h1>Gledate profil korisnika: {{ $profile->user->username }}</h1>
				<h4>Možete pogledati statistiku i napredak ali takođe i ostaviti poruku.</h4>
			</div>
			@if($profile->avatar)
			<div class="col-md-3">
				<img src="/upload/profile/{{ $profile->getAvatar('original') }}" class="img-rounded" width="200px" height="175px">
			</div>
			@else
			<div class="col-md-3">
				<img src="/images/blank.png" class="img-rounded" width="200px" height="175px">
			</div>
			@endif
		</div>
	</div>
</div>

@section('content')

@if($profile)

	
	
	@if($profile->quit == 1)

	<h2>Napredak korisnika: {{ $profile->user->username }}</h2>

	@include('common.progress')	

@else

	<h2>Korisnik nije prestao da puši</h2>

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
    @include('common.sidebar_forum')
    @include('common.sidebar_fb')
  
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
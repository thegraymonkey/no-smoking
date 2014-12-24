@extends('layout')


<div class="jumbotron">
		<div class="container " style="padding-top:50px">
			<div class="row">
				<div class="col-md-8">
					<h1>Gledate profil korisnika: {{ $profile->user->username }}</h1>
					<p></p>
				</div>
				
				<div class="col-md-4">
					<img src="/upload/profile/{{ $profile->getAvatar('original') }}" alt="Nobody should smoke!" class="img-rounded" width="300px" height="275px">
				</div>
			</div>
		</div>
		</div>

@section('content')

@if($profile)
	{{-- PROFILE EXISTS --}}
	<strong><p>Datum kad ste poceli da pušite:</strong> {{ $profile->start_date }}</p>
	<strong><p>Dan kad ste prestali da pušite:</strong> {{ $profile->quit_date }}</p>
	<strong><p>Dnevno potrošeno novca na cigarete:</strong> {{ $profile->daily_expense }} dinara</p>
	<strong><p>Dnevno popušeno cigareta:</strong> {{ $profile->daily_amount }} cigareta</p>

	<hr class="featurette-divider">
	
	@if($profile->quit == 1)

	<label>1 dan -- Organizam se oporavlja od unosa Ugljen Monoksida</label>
	@if($profile->non_smoke_one_day < 100)	
	<div class="progress">
	  <div class="progress-bar progress-bar-striped active " role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: {{ $profile->non_smoke_one_day }}%">
	    <span>{{ $profile->non_smoke_one_day }}% </span>
	  </div>
	</div>
	@else
	<div class="progress">
  		<div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
    		<span>100% -- Svaka Čast! Uspeli ste!</span>
  		</div>
	</div>
	@endif

	<label>2 dana -- Smanjuje se rizik od srčanog udara </label>
 	@if($profile->non_smoke_two_days < 100)	
	<div class="progress">
	  <div class="progress-bar progress-bar-striped active " role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: {{ $profile->non_smoke_two_days }}%">
	    <span>{{ $profile->non_smoke_two_days }}% </span>
	  </div>
	</div>
	@else
	<div class="progress">
  		<div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
    		<span>100% -- Svaka Čast! Uspeli ste!</span>
  		</div>
	</div>
	@endif

	<label>7 dana -- bez nikotina u organizmu</label>
 	@if($profile->non_smoke_seven_days < 100)	
	<div class="progress">
	  <div class="progress-bar progress-bar-striped active " role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: {{ $profile->non_smoke_seven_days }}%">
	    <span>{{ $profile->non_smoke_seven_days }}% </span>
	  </div>
	</div>
	@else
	<div class="progress">
  		<div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
    		<span>100% -- Svaka Čast! Uspeli ste!</span>
  		</div>
	</div>
	@endif

	<label>10 dana -- Nestanak fizičke zavisnosti</label>
 	@if($profile->non_smoke_ten_days < 100)	
	<div class="progress">
	  <div class="progress-bar progress-bar-striped active " role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: {{ $profile->non_smoke_ten_days }}%">
	    <span>{{ $profile->non_smoke_ten_days }}% </span>
	  </div>
	</div>
	@else
	<div class="progress">
  		<div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
    		<span>100% -- Svaka Čast! Uspeli ste!</span>
  		</div>
	</div>
	@endif

	<label>30 dana -- poboljšanje kondicije i disanja </label>
 	@if($profile->non_smoke_month < 100)	
	<div class="progress">
	  <div class="progress-bar progress-bar-striped active " role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: {{ $profile->non_smoke_month }}%">
	    <span>{{ $profile->non_smoke_month }}% </span>
	  </div>
	</div>
	@else
	<div class="progress">
  		<div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
    		<span>100% -- Svaka Čast! Uspeli ste!</span>
  		</div>
	</div>
	@endif

	<label>3 meseca -- pluća otpornija na infekcije </label>
 	@if($profile->non_smoke_three_month < 100)	
	<div class="progress">
	  <div class="progress-bar progress-bar-striped active " role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: {{ $profile->non_smoke_three_month }}%">
	    <span>{{ $profile->non_smoke_three_month }}% </span>
	  </div>
	</div>
	@else
	<div class="progress">
  		<div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
    		<span>100% -- Svaka Čast! Uspeli ste!</span>
  		</div>
	</div>
	@endif

	<label>1 godina -- rizik od srčanog udara smanjen za 50%</label>
 	@if($profile->non_smoke_year < 100)	
	<div class="progress">
	  <div class="progress-bar progress-bar-striped active " role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: {{ $profile->non_smoke_year }}%">
	    <span>{{ $profile->non_smoke_year }}% </span>
	  </div>
	</div>
	@else
	<div class="progress">
  		<div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
    		<span>100% -- Svaka Čast! Uspeli ste!</span>
  		</div>
	</div>
	@endif

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
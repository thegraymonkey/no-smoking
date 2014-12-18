@extends('layout')


<div class="jumbotron">
		<div class="container " style="padding-top:50px">
			<div class="row">
				<div class="col-md-8">
					<h1></h1>
					<p></p>
				</div>
				
				<div class="col-md-4">
					<img src="/images/no-smoking.jpg" alt="Nobody should smoke!" class="img-rounded" width="300px" height="275px">
				</div>
			</div>
		</div>
		</div>

@section('content')

@if($profile)
	{{-- PROFILE EXISTS --}}
	<strong><p>Datum kad ste poceli da pusite:</strong> {{ $profile->start_date }}</p>
	<strong><p>Dan kad ste prestali da pusite:</strong> {{ $profile->quit_date }}</p>
	<strong><p>Dnevno potroseno novca na cigarete:</strong> {{ $profile->daily_expense }} dinara</p>
	<strong><p>Dnevno popuseno cigareta:</strong> {{ $profile->daily_amount }} cigareta</p>

	
	
	@if(Auth::user()->profile->quit == 1)

	<label>1 dan Organizam se oporavlja od unosa Ugljen Monoksida</label>
	@if(Auth::user()->profile->non_smoke_one_day < 100)	
	<div class="progress">
	  <div class="progress-bar progress-bar-striped active " role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: {{ Auth::user()->profile->non_smoke_one_day }}%">
	    <span>{{ Auth::user()->profile->non_smoke_one_day }}% -- Organizam se oporavlja od unosa Ugljen Monoksida </span>
	  </div>
	</div>
	@else
	<div class="progress">
  		<div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
    		<span>100% -- Svaka Cast! Uspeli ste!</span>
  		</div>
	</div>
	@endif

	<label>2 dana Smanjuje se rizik od srcanog udara </label>
 	@if(Auth::user()->profile->non_smoke_two_days < 100)	
	<div class="progress">
	  <div class="progress-bar progress-bar-striped active " role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: {{ Auth::user()->profile->non_smoke_two_days }}%">
	    <span>{{ Auth::user()->profile->non_smoke_two_days }}% -- Smanjuje se rizik od srcanog udara </span>
	  </div>
	</div>
	@else
	<div class="progress">
  		<div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
    		<span>100% -- Svaka Cast! Uspeli ste!</span>
  		</div>
	</div>
	@endif

	<label>7 dana</label>
 	@if(Auth::user()->profile->non_smoke_seven_days < 100)	
	<div class="progress">
	  <div class="progress-bar progress-bar-striped active " role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: {{ Auth::user()->profile->non_smoke_seven_days }}%">
	    <span>{{ Auth::user()->profile->non_smoke_seven_days }}% -- bez nikotina u organizmu </span>
	  </div>
	</div>
	@else
	<div class="progress">
  		<div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
    		<span>100% -- Svaka Cast! Uspeli ste!</span>
  		</div>
	</div>
	@endif

	<label>10 dana</label>
 	@if(Auth::user()->profile->non_smoke_ten_days < 100)	
	<div class="progress">
	  <div class="progress-bar progress-bar-striped active " role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: {{ Auth::user()->profile->non_smoke_ten_days }}%">
	    <span>{{ Auth::user()->profile->non_smoke_ten_days }}% -- Nestanak fizicke zavisnosti </span>
	  </div>
	</div>
	@else
	<div class="progress">
  		<div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
    		<span>100% -- Svaka Cast! Uspeli ste!</span>
  		</div>
	</div>
	@endif

	<label>30 dana</label>
 	@if(Auth::user()->profile->non_smoke_month < 100)	
	<div class="progress">
	  <div class="progress-bar progress-bar-striped active " role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: {{ Auth::user()->profile->non_smoke_month }}%">
	    <span>{{ Auth::user()->profile->non_smoke_month }}% -- poboljsanje kondicije i disanja </span>
	  </div>
	</div>
	@else
	<div class="progress">
  		<div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
    		<span>100% -- Svaka Cast! Uspeli ste!</span>
  		</div>
	</div>
	@endif

	<label>3 meseca</label>
 	@if(Auth::user()->profile->non_smoke_three_month < 100)	
	<div class="progress">
	  <div class="progress-bar progress-bar-striped active " role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: {{ Auth::user()->profile->non_smoke_three_month }}%">
	    <span>{{ Auth::user()->profile->non_smoke_three_month }}% -- pluca otpornija na infekcije </span>
	  </div>
	</div>
	@else
	<div class="progress">
  		<div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
    		<span>100% -- Svaka Cast! Uspeli ste!</span>
  		</div>
	</div>
	@endif

	<label>1 godina</label>
 	@if(Auth::user()->profile->non_smoke_year < 100)	
	<div class="progress">
	  <div class="progress-bar progress-bar-striped active " role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: {{ Auth::user()->profile->non_smoke_year }}%">
	    <span>{{ Auth::user()->profile->non_smoke_year }}% -- rizik od srcanog udara smanjen za 50%</span>
	  </div>
	</div>
	@else
	<div class="progress">
  		<div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
    		<span>100% -- Svaka Cast! Uspeli ste!</span>
  		</div>
	</div>
	@endif

@endif

	
@else
	{{-- PROFILE DOES NOT EXIST --}}
	<h2>Profil ne postoji</h2>
@endif
	@include('common.messages')



	

@stop

@section('sidebar')
	
		@include('common.sidebar')
	
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
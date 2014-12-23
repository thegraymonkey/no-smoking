@extends('layout')


@section('intro')
	@include('common.intro', [
		'intro_title' => 'Vas Profil',
		'intro_subtitle' => 'Podesite svoj profil i uzivajte u statistici i podacima koji ce vas hrabriti svaki dan vase borbe.'  
	])	
@stop

@section('content')

<h2>Vasi podaci</h2>

@if($profile)
	{{-- PROFILE EXISTS --}}
	<strong><p>Datum kad ste poceli da pusite:</strong> {{ $profile->start_date }}</p>
	<strong><p>Dan kad ste prestali da pusite:</strong> {{ $profile->quit_date }}</p>
	<strong><p>Dnevno potroseno novca na cigarete:</strong> {{ $profile->daily_expense }} dinara</p>
	<strong><p>Dnevno popuseno cigareta:</strong> {{ $profile->daily_amount }} cigareta</p>


<hr class="featurette-divider">


<h2>Vas napredak</h2>
	
@if(Auth::user()->profile->quit == 1)

	<label>1 dan -- Organizam se oporavlja od unosa Ugljen Monoksida</label>
	@if(Auth::user()->profile->non_smoke_one_day < 100)	
	<div class="progress">
	  <div class="progress-bar progress-bar-striped active " role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: {{ Auth::user()->profile->non_smoke_one_day }}%">
	    <span> {{ Auth::user()->profile->non_smoke_one_day }}% </span>
	  </div>
	</div>
	@else
	<div class="progress">
  		<div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
    		<span>100% -- Svaka Cast! Uspeli ste!</span>
  		</div>
	</div>
	@endif

	<label>2 dana -- Smanjuje se rizik od srcanog udara </label>
 	@if(Auth::user()->profile->non_smoke_two_days < 100)	
	<div class="progress">
	  <div class="progress-bar progress-bar-striped active " role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: {{ Auth::user()->profile->non_smoke_two_days }}%">
	    <span>{{ Auth::user()->profile->non_smoke_two_days }}% </span>
	  </div>
	</div>
	@else
	<div class="progress">
  		<div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
    		<span>100% -- Svaka Cast! Uspeli ste!</span>
  		</div>
	</div>
	@endif

	<label>7 dana -- bez nikotina u organizmu</label>
 	@if(Auth::user()->profile->non_smoke_seven_days < 100)	
	<div class="progress">
	  <div class="progress-bar progress-bar-striped active " role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: {{ Auth::user()->profile->non_smoke_seven_days }}%">
	    <span>{{ Auth::user()->profile->non_smoke_seven_days }}%  </span>
	  </div>
	</div>
	@else
	<div class="progress">
  		<div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
    		<span>100% -- Svaka Cast! Uspeli ste!</span>
  		</div>
	</div>
	@endif

	<label>10 dana -- Nestanak fizicke zavisnosti </label>
 	@if(Auth::user()->profile->non_smoke_ten_days < 100)	
	<div class="progress">
	  <div class="progress-bar progress-bar-striped active " role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: {{ Auth::user()->profile->non_smoke_ten_days }}%">
	    <span>{{ Auth::user()->profile->non_smoke_ten_days }}% </span>
	  </div>
	</div>
	@else
	<div class="progress">
  		<div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
    		<span>100% -- Svaka Cast! Uspeli ste!</span>
  		</div>
	</div>
	@endif

	<label>30 dana -- poboljsanje kondicije i disanja </label>
 	@if(Auth::user()->profile->non_smoke_month < 100)	
	<div class="progress">
	  <div class="progress-bar progress-bar-striped active " role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: {{ Auth::user()->profile->non_smoke_month }}%">
	    <span>{{ Auth::user()->profile->non_smoke_month }}% </span>
	  </div>
	</div>
	@else
	<div class="progress">
  		<div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
    		<span>100% -- Svaka Cast! Uspeli ste!</span>
  		</div>
	</div>
	@endif

	<label>3 meseca -- pluca otpornija na infekcije </label>
 	@if(Auth::user()->profile->non_smoke_three_month < 100)	
	<div class="progress">
	  <div class="progress-bar progress-bar-striped active " role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: {{ Auth::user()->profile->non_smoke_three_month }}%">
	    <span>{{ Auth::user()->profile->non_smoke_three_month }}% </span>
	  </div>
	</div>
	@else
	<div class="progress">
  		<div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
    		<span>100% -- Svaka Cast! Uspeli ste!</span>
  		</div>
	</div>
	@endif

	<label>1 godina -- rizik od srcanog udara smanjen za 50%</label>
 	@if(Auth::user()->profile->non_smoke_year < 100)	
	<div class="progress">
	  <div class="progress-bar progress-bar-striped active " role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: {{ Auth::user()->profile->non_smoke_year }}%">
	    <span>{{ Auth::user()->profile->non_smoke_year }}% </span>
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

	
<hr class="featurette-divider">


	<h2>Izmenite svoj profil</h2>
@else
	{{-- PROFILE DOES NOT EXIST --}}
	<h2>Napravite svoj profil</h2>
@endif
	@include('common.messages')



	<div class="well">
	<form method="post" action="{{ url('profile/update') }}" enctype="multipart/form-data">

		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		
		<div class="form-group">	
		<label for="avatar">Vasa profil slika</label>
			<input class="form-control" type="file" name="avatar" id="avatar">
		
			@if ($profile && $profile->avatar)
				<p><img class="img-thumbnail" src="/upload/profile/{{ $profile->getStatusAvatar() }}"/></p>
			@endif
			
		 		</div>
				
		<div class="form-group">	
		<label for="start_date">Kada ste poceli da pusite?</label>
			<input date-picker-field class="form-control" data-date-format="yyyy-mm-dd" type="text" name="start_date" id="start_date" value="{{ isset($profile->start_date) ? $profile->start_date->format('Y-m-d') : '' }}" >
		</div>

		<div class="form-group">	
    		<label for="checkbox">Da li ste prestali da pusite?</label>
	      		<input type="checkbox" name="quit" {{ (isset($profile) and $profile->quit == 1) ? 'checked' : '' }} value="1"> da!
  		</div>

		<div class="form-group">		
		<label for="quit_date">Kada ste prestali da pusite?</label>
			<input date-picker-field class="form-control" data-date-format="yyyy-mm-dd" type="text" name="quit_date" id="quit_date" value="{{ isset($profile->quit_date) ? $profile->quit_date->format('Y-m-d') : '' }}" >
		</div>

		<div class="form-group">		
		<label for="daily_expense">Koliko novca ste dnevno trosili na cigarete?</label>
			<input class="form-control" name="daily_expense" id="daily_expense" value="{{ isset($profile->daily_expense) ? $profile->daily_expense : '' }}" placeholder="dnevno potroseno novca" >
		</div>

		<div class="form-group">		
		<label for="daily_amount">Koliko cigareta ste pusili dnevno?</label>
			<input class="form-control" name="daily_amount" id="daily_amount" value="{{ isset($profile->daily_amount) ? $profile->daily_amount : '' }}" placeholder="dnevno popuseno cigareta" >
		</div>

		<div class="form-group">			
			<input class="btn btn-primary" type="submit" value="Sacuvaj"/>
		</div>
		
	</form>
	</div>

	<div class="well">
	<form method="post" action="{{ url('user/update') }}">

		<input type="hidden" name="_token" value="{{ csrf_token() }}">

		<div class="form-group">		
		<label for="username">Promenite korisnicko ime</label>
			<input class="form-control" type="text" name="username" id="username" value="{{ isset($profile) ? $profile->user->username : '' }}">
		</div>

		<div class="form-group">			
			<input class="btn btn-primary" type="submit" value="Sacuvaj"/>
		</div>

	</form>
	</div>

	<hr class="featurette-divider">

	<h2>Vase poruke</h2>

	@include('messages.index')
	
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
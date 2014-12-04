@extends('layout')


@section('intro')
	@include('common.intro', [
		'intro_title' => 'Vas Profil',
		'intro_subtitle' => 'Podesite svoj profil i uzivajte u statistici i podacima koji ce vas hrabriti svaki dan vase borbe.'  
	])	
@stop

@section('content')

@if($profile)
	{{-- PROFILE EXISTS --}}
	<strong><p>Datum kad ste poceli da pusite:</strong> {{ $profile->start_date }}</p>
	<strong><p>Dan kad ste prestali da pusite:</strong> {{ $profile->quit_date }}</p>
	<strong><p>Dnevno potroseno novca na cigarete:</strong> {{ $profile->daily_expense }} dinara</p>
	<strong><p>Dnevno popuseno cigareta:</strong> {{ $profile->daily_amount }} cigareta</p>

	
	
	<div class="progress">
	  <div class="progress-bar progress-bar-striped active " role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 10%">
	    <span>45% -- Nestanak fizicke zavisnosti nakon 10 dana</span>
	  </div>
	</div>

	
	<div class="progress">
  		<div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 45%">
    		<span>45% -- Nestanak fizicke zavisnosti nakon 10 dana</span>
  		</div>
	</div>

	<div class="progress">
  		<div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 45%">
    		<span>45% -- Nestanak fizicke zavisnosti nakon 10 dana</span>
  		</div>
	</div>

	<div class="progress">
  		<div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 45%">
    		<span>45% -- Nestanak fizicke zavisnosti nakon 10 dana</span>
  		</div>
	</div>

	<div class="progress">
  		<div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 45%">
    		<span>45% -- Nestanak fizicke zavisnosti nakon 10 dana</span>
  		</div>
	</div>

	<div class="progress">
  		<div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 45%">
    		<span>45% -- Nestanak fizicke zavisnosti nakon 10 dana</span>
  		</div>
	</div>

	<div class="progress">
  		<div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 45%">
    		<span>45% -- Nestanak fizicke zavisnosti nakon 10 dana</span>
  		</div>
	</div>

	<div class="progress">
  		<div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 45%">
    		<span>45% -- Nestanak fizicke zavisnosti nakon 10 dana</span>
  		</div>
	</div>

	<div class="progress">
  		<div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 45%">
    		<span>45% -- Nestanak fizicke zavisnosti nakon 10 dana</span>
  		</div>
	</div>


	<div class="progress">
  		<div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 45%">
    		<span>45% -- Nestanak fizicke zavisnosti nakon 10 dana</span>
  		</div>
	</div>



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
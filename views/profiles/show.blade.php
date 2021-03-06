@extends('layout')


<div class="well well-sm">
		<div class="container" style="padding-top:60px">
		<div class="row">
			<div class="col-md-9">
				<h1>Vaš profil</h1>
				<h4>Vaša statistika, podaci i poruke... </h4>
			</div>
			@if($profile)
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

@include('common.messages')



@if($profile)
	


	

	
	
	@if(Auth::user()->profile->quit == 1)

	<h2>Vaš napredak</h2>

	@include('common.progress')

	@else

	<h2>Niste popunili profil</h2>
	@endif
	
	<hr class="featurette-divider">

	
	<h2>Vaše poruke</h2>

	@include('messages.index')


	<hr class="featurette-divider">

	<h2>Izmenite svoj profil</h2>

@else

	{{-- PROFILE DOES NOT EXIST --}}
	<h2>Napravite svoj profil</h2>

@endif
	
	<div class="well">
		<form method="post" action="{{ url('profile/update') }}" enctype="multipart/form-data">
			
			<input type="hidden" name="_token" value="{{ csrf_token() }}">		
			
		<div class="form-group">	
			<label for="avatar">Vaša profil slika</label>
			<input class="form-control" type="file" name="avatar" id="avatar">		
			@if ($profile && $profile->avatar)
				<p><img class="img-thumbnail" src="/upload/profile/{{ $profile->getStatusAvatar() }}"/></p>
			@endif			
		 </div>
				
		<div class="form-group">	
			<label for="start_date">Kada ste počeli da pušite?</label>
			<input date-picker-field class="form-control" data-date-format="yyyy-mm-dd" type="text" name="start_date" id="start_date" value="{{ isset($profile->start_date) ? $profile->start_date->format('Y-m-d') : '' }}" >
		</div>

		<div class="form-group">	
    		<label for="checkbox">Da li ste prestali da pušite?</label>
	      	<input type="checkbox" name="quit" {{ (isset($profile) and $profile->quit == 1) ? 'checked' : '' }} value="1"> da!
  		</div>

		<div class="form-group">		
			<label for="quit_date">Kada ste prestali da pušite?</label>
			<input date-picker-field class="form-control" data-date-format="yyyy-mm-dd" type="text" name="quit_date" id="quit_date" value="{{ isset($profile->quit_date) ? $profile->quit_date->format('Y-m-d') : '' }}" >
		</div>

		<div class="form-group">		
			<label for="daily_expense">Koliko novca ste dnevno trošili na cigarete?</label>
			<input class="form-control" name="daily_expense" id="daily_expense" value="{{ isset($profile->daily_expense) ? $profile->daily_expense : '' }}" placeholder="dnevno potroseno novca" >
		</div>

		<div class="form-group">		
			<label for="daily_amount">Koliko cigareta ste pušili dnevno?</label>
			<input class="form-control" name="daily_amount" id="daily_amount" value="{{ isset($profile->daily_amount) ? $profile->daily_amount : '' }}" placeholder="dnevno popuseno cigareta" >
		</div>

		<div class="form-group">			
			<input class="btn btn-primary" type="submit" value="Sačuvaj"/>
		</div>
		
		</form>
	</div>


	<div class="well">
		<form method="post" action="{{ url('users/update') }}">

			<input type="hidden" name="_token" value="{{ csrf_token() }}">

		<div class="form-group">		
			<label for="username">Promenite korisničko ime</label>
			<input class="form-control" type="text" name="username" id="username" value="{{ isset($profile) ? $profile->user->username : '' }}">
		</div>

		<div class="form-group">			
			<input class="btn btn-primary" type="submit" value="Sačuvaj"/>
		</div>

		</form>
	</div>
	
@stop

@section('sidebar')
  
    @include('common.sidebar')
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
@extends('layout')

@section('intro')
	
		@include('common.intro', [
		'intro_title' => 'Izmenite naslov i uputstva sekcije.',
		'intro_subtitle' => 'Greške se dešavaju svima, možete lako izmeniti sve podatke vezano za sekciju foruma.'  
	])
	
@stop

@section('content')

@if(Auth::check() and Auth::user()->isAdmin())

@include('common.messages')

<form method="POST" action="{{ route('forums.update', [$forum->id]) }}">
	
	<input type="hidden" name="id" value="{{ $forum->id }}">
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	<input type="hidden" name="_method" value="PUT">

	<div class="form-group">	
		<label>Sekcija</label>
		<textarea  class="form-control" name="topic">{{ $forum->topic }}</textarea>
	</div>

	<div class="form-group">	
		<label>Opis</label>
		<textarea  class="form-control" name="description">{{ $forum->description }}</textarea>
	</div>

	<div class="form-group">	
		<input class="btn btn-warning" type="submit" value="Sačuvaj izmene"/>
	</div>

</form>

@else

	<h1>Samo administrator može menjati sekcije foruma i njihove opise!</h1>
	
@endif

@stop

@section('sidebar')
  
    @include('common.sidebar')
  
@stop
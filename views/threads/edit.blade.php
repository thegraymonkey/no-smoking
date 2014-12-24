@extends('layout')

@section('intro')
	
		@include('common.intro', [
		'intro_title' => 'Izmenite svoju temu.',
		'intro_subtitle' => 'Greške se dešavaju svima, možete lako izmeniti svoju temu. Nažalost temu i sadržaj ne možete menjati ako se neko već uključio u diskusiju.'  
	])
	
@stop

@section('content')

@include('common.messages')

<form method="POST" action="{{ route('threads.update', [$thread->id]) }}">
	
	<input type="hidden" name="thread_id" value="{{ $thread->id }}">
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	<input type="hidden" name="_method" value="PUT">

	<div class="form-group">	
		<label>Tema</label>
		<textarea  class="form-control" name="title">{{ $thread->title }}</textarea>
	</div>

	<div class="form-group">	
		<label>Sadržaj</label>
		<textarea  class="form-control" name="content">{{ $thread->content }}</textarea>
	</div>

	<div class="form-group">	
		<input class="btn btn-warning" type="submit" value="Sačuvaj izmene"/>
	</div>

</form>

@stop

@section('sidebar')
  
    @include('common.sidebar')
  
@stop
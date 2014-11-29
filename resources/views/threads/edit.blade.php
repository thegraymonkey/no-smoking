@extends('layout')

@section('intro')
	
		@include('common.intro', [
		'intro_title' => 'Izmenite svoju temu.',
		'intro_subtitle' => 'Greske se desavaju svima i mozete lako izmeniti svoju temu. Nazalost temu i sadrzaj ne mozete menjati ako se neko ve ukljucio u diskusiju.'  
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
		<label>Sadrzaj</label>
		<textarea  class="form-control" name="content">{{ $thread->content }}</textarea>
	</div>

	<div class="form-group">	
		<input class="btn btn-warning" type="submit" value="Sacuvaj"/>
	</div>

</form>

@stop

@section('sidebar')
  
    @include('common.sidebar')
  
@stop
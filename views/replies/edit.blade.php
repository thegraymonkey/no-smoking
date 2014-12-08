@extends('layout')


@section('intro')
	
		@include('common.intro', [
		'intro_title' => 'Izmenite svoj odgovor.',
		'intro_subtitle' => 'Greske se desavaju svima i mozete lako izmeniti svoj odgovor...'  
	])
	
@stop

@section('content')

@include('common.messages')

<form method="POST" action="{{ route('replies.update', [$reply->id]) }}">
	
	<input type="hidden" name="thread_id" value="{{ $reply->thread->id }}">
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	<input type="hidden" name="_method" value="PUT">

	<div class="form-group">	
		<label>Izmeni svoj odgovor</label>
		<textarea  class="form-control" name="content">{{ $reply->content }}</textarea>
	</div>

	<div class="form-group">
		<input class="btn btn-warning" type="submit" value="Sacuvaj promenu"/>
	</div>

</form>

@stop

@section('sidebar')
  
    @include('common.sidebar')
  
@stop